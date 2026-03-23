<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Contor;
use App\Models\Client;

class ClientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AUTH
    |--------------------------------------------------------------------------
    */

    public function loginForm()
    {
        if (Auth::check()) return redirect()->route('client.dashboard');
        return view('pages.client.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('client.dashboard'));
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => 'Email sau parolă incorecte.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'V-ați deconectat cu succes.');
    }

    /*
    |--------------------------------------------------------------------------
    | INDEX CONTOR
    |--------------------------------------------------------------------------
    */

    public function indexContor()
    {
        return view('pages.client.index-contor');
    }

    /**
     * AJAX – caută clientul și returnează contoarele
     * Obligatoriu: cod_client
     * Opțional (verificare suplimentară): telefon, email
     *
     * GET /client/contoare?cod_client=XXX&telefon=07xx&email=x@x.ro
     */
    public function getContoare(Request $request)
    {
        $request->validate([
            'cod_client' => 'required|string|max:20',
            'telefon'    => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:100',
        ]);

        $codClient = strtoupper(trim($request->cod_client));
        $client    = Client::gasesteDupaCod($codClient);

        if (!$client) {
            return response()->json([
                'found' => false,
                'mesaj' => 'Codul de client introdus nu este valid sau contorul dumneavoastră este cu telecitire
                și va fi citit de către personalul Aquaserv!',
            ]);
        }

        $contoare = Contor::pentruClient($codClient)->map(fn($c) => [
            'id'           => $c->id,
            'serie_contor' => $c->serie_contor,
            'adresa'       => $c->adresa,
            'index_vechi'  => (string)(int)$c->index_vechi,
            'index_nou'    => $c->index_nou !== null ? (string)(int)$c->index_nou : null,
        ]);

        if ($contoare->isEmpty()) {
            return response()->json([
                'found' => false,
                'mesaj' => 'Clientul există, dar nu are contoare asociate. Contactați relații clienți.',
            ]);
        }

        return response()->json([
            'found'       => true,
            'nume_client' => $client->nume,
            'contoare'    => $contoare,
        ]);
    }

    /**
     * POST – salvează indexul transmis
     */
    public function trimiteIndex(Request $request)
    {
        $zi = (int) now()->format('d');
        if ($zi <= 30 || $zi >= 0) {
            $mesaj = 'Transmiterea indexului este posibilă doar în perioada 10–20 a fiecărei luni.';
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'mesaj' => $mesaj], 422);
            }
            return redirect()->route('client.index-contor')->withErrors(['general' => $mesaj]);
        }

        $validated = $request->validate([
            'cod_client' => 'required|string|max:20',
            'telefon'    => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:100',
            'contor_id'  => 'required|exists:contoare,id',
            'index_nou'  => 'required|integer|min:0',
        ], [
            'contor_id.required' => 'Selectați un contor.',
            'contor_id.exists'   => 'Contorul selectat nu există.',
            'index_nou.required' => 'Introduceți indexul nou.',
            'index_nou.numeric'  => 'Indexul trebuie să fie un număr.',
        ]);

        $contor = Contor::find($validated['contor_id']);

        // Verificare ownership: contorul trebuie să aparțină clientului din cerere
        if (strtoupper(trim($validated['cod_client'])) !== strtoupper(trim($contor->cod_client))) {
            abort(403, 'Contorul nu aparține acestui client.');
        }

        // Validam doar fata de index_vechi (originalul), nu fata de cel trimis anterior
        if ((int) $validated['index_nou'] < (int) $contor->index_vechi) {
            return back()->withInput()->withErrors([
                'index_nou' => "Indexul nou ({$validated['index_nou']}) nu poate fi mai mic decât indexul anterior ({$contor->index_vechi}).",
            ]);
        }

        $contor->update(['index_nou' => $validated['index_nou']]);

        Log::info('[AUDIT] Index contor transmis', [
            'contor_id'    => $contor->id,
            'serie_contor' => $contor->serie_contor,
            'cod_client'   => $validated['cod_client'],
            'index_vechi'  => $contor->index_vechi,
            'index_nou'    => $validated['index_nou'],
            'ip'           => $request->ip(),
        ]);

        // Actualizam telefonul si emailul clientului cu datele introduse
        Client::gasesteDupaCod(strtoupper(trim($validated['cod_client'])))
              ?->update([
                  'telefon' => $validated['telefon'] ?? null,
                  'email'   => $validated['email']   ?? null,
              ]);

        // Daca e cerere AJAX returnam JSON
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'mesaj'   => "Indexul {$validated['index_nou']} m³ a fost transmis cu succes pentru contorul {$contor->serie_contor}. Vă mulțumim!",
            ]);
        }

        return redirect()->route('client.index-contor')
            ->with('success', "Indexul {$validated['index_nou']} m³ a fost transmis cu succes pentru contorul {$contor->serie_contor}. Vă mulțumim!");
    }

    /*
    |--------------------------------------------------------------------------
    | ALTE PAGINI PUBLICE
    |--------------------------------------------------------------------------
    */

    public function factura()   { return view('pages.client.factura'); }
    public function avarie()    { return view('pages.client.avarie'); }
    public function contract()  { return view('pages.client.contract'); }

    public function trimiteAvarie(Request $request)
    {
        $request->validate([
            'nume'      => 'required|string|max:100',
            'telefon'   => 'required|string|max:20',
            'adresa'    => 'required|string|max:255',
            'descriere' => 'required|string|min:10|max:1000',
        ]);

        return redirect()->route('client.avarie')
            ->with('success', 'Avaria a fost raportată! Dispeceratul va interveni în cel mai scurt timp. Pentru urgențe sunați la 0340 131 111.');
    }

    /*
    |--------------------------------------------------------------------------
    | PAGINI PROTEJATE
    |--------------------------------------------------------------------------
    */

    public function dashboard()       { return view('pages.client.dashboard', ['user' => Auth::user()]); }
    public function facturi()         { return view('pages.client.facturi',   ['user' => Auth::user()]); }
    public function consum()          { return view('pages.client.consum',    ['user' => Auth::user()]); }
    public function datePersonale()   { return view('pages.client.date-personale', ['user' => Auth::user()]); }

    public function updateDatePersonale(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'telefon'  => 'nullable|string|max:20',
            'adresa'   => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name    = $validated['name'];
        $user->telefon = $validated['telefon'] ?? $user->telefon;
        $user->adresa  = $validated['adresa']  ?? $user->adresa;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();
        return redirect()->route('client.date-personale')
            ->with('success', 'Datele personale au fost actualizate cu succes.');
    }
}