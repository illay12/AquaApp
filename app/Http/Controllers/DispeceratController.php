<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Anunt;
use App\Models\AnuntFisier;
use App\Models\BuletinAnaliza;
use App\Models\DispeceratUser;

class DispeceratController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */

    private function categoriiPermise(): array
    {
        $categorie = session('dispecerat_categorie');
        return match($categorie) {
            'avarie' => ['avarie', 'anunturi'],
            default  => [$categorie],
        };
    }

    private function salveazaFisiere(Anunt $anunt, Request $request): void
    {
        if (!$request->hasFile('fisiere')) return;

        foreach ($request->file('fisiere') as $fisier) {
            if (!$fisier->isValid()) continue;

            $extensie = strtolower($fisier->getClientOriginalExtension());
            $cale     = $fisier->store('anunturi/fisiere', 'public');

            AnuntFisier::create([
                'anunt_id'      => $anunt->id,
                'nume_original' => $fisier->getClientOriginalName(),
                'cale'          => $cale,
                'tip'           => $extensie,
                'marime'        => $fisier->getSize(),
            ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | AUTENTIFICARE
    |--------------------------------------------------------------------------
    */

    public function loginForm()
    {
        if (session('dispecerat_user')) {
            return redirect()->route('dispecerat.dashboard');
        }
        return view('dispecerat.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Utilizatorul este obligatoriu.',
            'password.required' => 'Parola este obligatorie.',
        ]);

        $user = DispeceratUser::autentifica($request->username, $request->password);

        if ($user) {
            session([
                'dispecerat_user'      => $user->id,
                'dispecerat_username'  => $user->username,
                'dispecerat_nume'      => $user->nume,
                'dispecerat_categorie' => $user->categorie,
                'dispecerat_token'     => $user->token,
                'dispecerat_expires'   => $user->token_expires_at->format('H:i'),
            ]);

            return redirect()->route('dispecerat.dashboard')
                ->with('success', 'Bun venit, ' . $user->nume . '!');
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Utilizator sau parolă incorecte.']);
    }

    public function logout(Request $request)
    {
        // Invalidează token-ul în baza de date
        $userId = session('dispecerat_user');
        if ($userId) {
            $user = \App\Models\DispeceratUser::find($userId);
            if ($user) $user->invalideazaToken();
        }

        $request->session()->forget([
            'dispecerat_user', 'dispecerat_username',
            'dispecerat_nume', 'dispecerat_categorie',
            'dispecerat_token', 'dispecerat_expires',
        ]);

        return redirect()->route('dispecerat.login')
            ->with('success', 'V-ați deconectat cu succes.');
    }

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function dashboard(Request $request)
    {
        $categorii = $this->categoriiPermise();
        $categorie = session('dispecerat_categorie');

        $query = Anunt::latest()->whereIn('categorie', $categorii);

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('titlu', 'like', '%' . $request->q . '%')
                  ->orWhere('continut', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('categorie') && in_array($request->categorie, $categorii)) {
            $query->where('categorie', $request->categorie);
        }

        $anunturi = $query->paginate(15)->withQueryString();
        $total    = Anunt::whereIn('categorie', $categorii)->count();

        // Buletine pentru laborator
        $buletine = null;
        if ($categorie === 'calitate') {
            $ordineLuni = BuletinAnaliza::ordineLuni();
            $buletine = BuletinAnaliza::groupatPeAni()
                            ->get()
                            ->groupBy('an')
                            ->sortKeysDesc()
                            ->map(function($grupAn) use ($ordineLuni) {
                                return $grupAn
                                    ->groupBy('luna')
                                    ->sortByDesc(fn($_, $luna) => $ordineLuni[$luna] ?? 0);
                            });
        }

        return view('dispecerat.dashboard', compact('anunturi', 'total', 'categorie', 'categorii', 'buletine'));
    }

    /*
    |--------------------------------------------------------------------------
    | CRUD ANUNTURI
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categorie = session('dispecerat_categorie');
        $categorii = $this->categoriiPermise();
        return view('dispecerat.anunt-create', compact('categorie', 'categorii'));
    }

    public function store(Request $request)
    {
        $categorii = $this->categoriiPermise();

        $validated = $request->validate([
            'titlu'     => 'required|string|min:5|max:500',
            'continut'  => 'required|string|min:10',
            'categorie' => 'required|string|in:' . implode(',', $categorii),
            'fisiere.*' => 'nullable|file|extensions:pdf,docx,xlsx|max:10240',
        ], [
            'titlu.required'     => 'Titlul este obligatoriu.',
            'titlu.min'          => 'Titlul trebuie să aibă cel puțin 5 caractere.',
            'continut.required'  => 'Conținutul este obligatoriu.',
            'continut.min'       => 'Conținutul trebuie să aibă cel puțin 10 caractere.',
            'categorie.required' => 'Categoria este obligatorie.',
            'fisiere.*.extensions' => 'Sunt permise doar PDF, Word (.docx) și Excel (.xlsx).',
            'fisiere.*.max'      => 'Fiecare fișier poate avea maxim 10 MB.',
        ]);

        $anunt = Anunt::create([
            'titlu'     => $validated['titlu'],
            'continut'  => $validated['continut'],
            'categorie' => $validated['categorie'],
        ]);

        $this->salveazaFisiere($anunt, $request);

        return redirect()->route('dispecerat.dashboard')
            ->with('success', 'Anunțul a fost publicat cu succes!');
    }

    public function edit(int $id)
    {
        $categorii = $this->categoriiPermise();
        $categorie = session('dispecerat_categorie');

        $anunt = Anunt::with('fisiere')
                      ->whereIn('categorie', $categorii)
                      ->where('id', $id)
                      ->firstOrFail();

        return view('dispecerat.anunt-edit', compact('anunt', 'categorie', 'categorii'));
    }

    public function update(Request $request, int $id)
    {
        $categorii = $this->categoriiPermise();

        $anunt = Anunt::whereIn('categorie', $categorii)->where('id', $id)->firstOrFail();

        $validated = $request->validate([
            'titlu'     => 'required|string|min:5|max:500',
            'continut'  => 'required|string|min:10',
            'categorie' => 'required|string|in:' . implode(',', $categorii),
            'fisiere.*' => 'nullable|file|extensions:pdf,docx,xlsx|max:10240',
        ], [
            'titlu.required'       => 'Titlul este obligatoriu.',
            'titlu.min'            => 'Titlul trebuie să aibă cel puțin 5 caractere.',
            'continut.required'    => 'Conținutul este obligatoriu.',
            'continut.min'         => 'Conținutul trebuie să aibă cel puțin 10 caractere.',
            'categorie.required'   => 'Categoria este obligatorie.',
            'fisiere.*.extensions' => 'Sunt permise doar PDF, Word (.docx) și Excel (.xlsx).',
            'fisiere.*.max'        => 'Fiecare fișier poate avea maxim 10 MB.',
        ]);

        $anunt->update([
            'titlu'     => $validated['titlu'],
            'continut'  => $validated['continut'],
            'categorie' => $validated['categorie'],
        ]);

        $this->salveazaFisiere($anunt, $request);

        return redirect()->route('dispecerat.anunturi.edit', $anunt->id)
            ->with('success', 'Anunțul a fost actualizat cu succes!');
    }

    public function destroy(int $id)
    {
        $categorii = $this->categoriiPermise();

        $anunt = Anunt::with('fisiere')->whereIn('categorie', $categorii)->where('id', $id)->firstOrFail();

        foreach ($anunt->fisiere as $fisier) {
            Storage::disk('public')->delete($fisier->cale);
        }

        $anunt->delete();

        return redirect()->route('dispecerat.dashboard')
            ->with('success', 'Anunțul și fișierele atașate au fost șterse.');
    }

    public function stergeFisier(int $id)
    {
        $categorii = $this->categoriiPermise();

        $fisier = AnuntFisier::whereHas('anunt', function ($q) use ($categorii) {
            $q->whereIn('categorie', $categorii);
        })->findOrFail($id);

        Storage::disk('public')->delete($fisier->cale);
        $fisier->delete();

        return back()->with('success', 'Fișierul a fost șters.');
    }

    /*
    |--------------------------------------------------------------------------
    | BULETINE ANALIZĂ – doar pentru laborator
    |--------------------------------------------------------------------------
    */

    public function buletinCreate()
    {
        if (session('dispecerat_categorie') !== 'calitate') abort(403);

        $luni = ['Ianuarie','Februarie','Martie','Aprilie','Mai','Iunie',
                 'Iulie','August','Septembrie','Octombrie','Noiembrie','Decembrie'];
        $ani  = range(date('Y'), 2020);

        return view('dispecerat.buletin-create', compact('luni', 'ani'));
    }

    public function buletinStore(Request $request)
    {
        if (session('dispecerat_categorie') !== 'calitate') abort(403);

        $request->validate([
            'luna'    => 'required|string|in:Ianuarie,Februarie,Martie,Aprilie,Mai,Iunie,Iulie,August,Septembrie,Octombrie,Noiembrie,Decembrie',
            'an'      => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'fisier'  => 'required|file|extensions:pdf|max:20480',
        ], [
            'luna.required'   => 'Luna este obligatorie.',
            'an.required'     => 'Anul este obligatoriu.',
            'fisier.required' => 'Fișierul PDF este obligatoriu.',
            'fisier.extensions' => 'Buletinul trebuie să fie în format PDF.',
            'fisier.max'      => 'Fișierul poate avea maxim 20 MB.',
        ]);

        $fisier = $request->file('fisier');
        $cale   = $fisier->store('buletine', 'public');

        BuletinAnaliza::create([
            'luna'          => $request->luna,
            'an'            => $request->an,
            'cale'          => $cale,
            'nume_original' => $fisier->getClientOriginalName(),
            'marime'        => $fisier->getSize(),
        ]);

        return redirect()->route('dispecerat.dashboard')
            ->with('success', 'Buletinul ' . $request->luna . ' ' . $request->an . ' a fost încărcat!');
    }

    public function buletinDestroy(int $id)
    {
        if (session('dispecerat_categorie') !== 'calitate') abort(403);

        $buletin = BuletinAnaliza::findOrFail($id);
        Storage::disk('public')->delete($buletin->cale);
        $buletin->delete();

        return back()->with('success', 'Buletinul a fost șters.');
    }
}
