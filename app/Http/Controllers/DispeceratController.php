<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Anunt;
use App\Models\AnuntFisier;
use App\Models\DispeceratUser;

class DispeceratController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HELPER
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

    private function validareComuna(): array
    {
        return [
            'titlu'                  => 'required|string|min:5|max:500',
            'continut'               => 'required|string|min:10',
            'categorie'              => 'required|string|in:' . implode(',', $this->categoriiPermise()),
            'fisiere.*' => 'nullable|file|extensions:pdf,docx,xlsx|max:10240',
        ];
    }

    private function mesajeValidare(): array
    {
        return [
            'titlu.required'         => 'Titlul este obligatoriu.',
            'titlu.min'              => 'Titlul trebuie să aibă cel puțin 5 caractere.',
            'continut.required'      => 'Conținutul este obligatoriu.',
            'continut.min'           => 'Conținutul trebuie să aibă cel puțin 10 caractere.',
            'categorie.required'     => 'Categoria este obligatorie.',
            'categorie.in'           => 'Nu aveți acces la categoria selectată.',
            'fisiere.*.mimes'        => 'Sunt permise doar fișiere PDF, Word (.docx) și Excel (.xlsx).',
            'fisiere.*.max'          => 'Fiecare fișier poate avea maxim 10 MB.',
        ];
    }

    private function salveazaFisiere(Anunt $anunt, Request $request): void
    {
        if (!$request->hasFile('fisiere')) return;

        foreach ($request->file('fisiere') as $fisier) {
            if (!$fisier->isValid()) continue;

            $extensie    = strtolower($fisier->getClientOriginalExtension());
            $numeOriginal = $fisier->getClientOriginalName();
            $cale         = $fisier->store('anunturi/fisiere', 'public');

            AnuntFisier::create([
                'anunt_id'      => $anunt->id,
                'nume_original' => $numeOriginal,
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
        $request->session()->forget([
            'dispecerat_user',
            'dispecerat_username',
            'dispecerat_nume',
            'dispecerat_categorie',
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

        return view('dispecerat.dashboard', compact('anunturi', 'total', 'categorie', 'categorii'));
    }

    /*
    |--------------------------------------------------------------------------
    | CRUD
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
        $validated = $request->validate($this->validareComuna(), $this->mesajeValidare());

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

        $anunt = Anunt::whereIn('categorie', $categorii)
                      ->where('id', $id)
                      ->firstOrFail();

        $validated = $request->validate($this->validareComuna(), $this->mesajeValidare());

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

        $anunt = Anunt::with('fisiere')
                      ->whereIn('categorie', $categorii)
                      ->where('id', $id)
                      ->firstOrFail();

        // Șterge fișierele din storage
        foreach ($anunt->fisiere as $fisier) {
            Storage::disk('public')->delete($fisier->cale);
        }

        $anunt->delete(); // cascade șterge și din anunt_fisiere

        return redirect()->route('dispecerat.dashboard')
            ->with('success', 'Anunțul și fișierele atașate au fost șterse cu succes.');
    }

    /**
     * Șterge un fișier individual
     * DELETE /dispecerat/fisiere/{id}
     */
    public function stergeFisier(int $id)
    {
        $categorii = $this->categoriiPermise();

        $fisier = AnuntFisier::whereHas('anunt', function ($q) use ($categorii) {
            $q->whereIn('categorie', $categorii);
        })->findOrFail($id);

        Storage::disk('public')->delete($fisier->cale);
        $fisier->delete();

        return back()->with('success', 'Fișierul a fost șters cu succes.');
    }
}
