<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AUTH – Login / Logout
    |--------------------------------------------------------------------------
    */

    /**
     * Formular login
     * GET /client/login
     */
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('client.dashboard');
        }
        return view('pages.client.login');
    }

    /**
     * Procesare login
     * POST /client/login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'Adresa de email este obligatorie.',
            'email.email'       => 'Adresa de email nu este validă.',
            'password.required' => 'Parola este obligatorie.',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('client.dashboard'));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Email sau parolă incorecte.']);
    }

    /**
     * Logout
     * POST /client/logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'V-ați deconectat cu succes.');
    }

    /*
    |--------------------------------------------------------------------------
    | PAGINI PUBLICE – fără autentificare
    |--------------------------------------------------------------------------
    */

    /**
     * Pagina plată factură
     * GET /client/factura
     */
    public function factura()
    {
        return view('pages.client.factura');
    }

    /**
     * Pagina transmitere index contor
     * GET /client/index-contor
     */
    public function indexContor()
    {
        return view('pages.client.index-contor');
    }

    /**
     * Procesare trimitere index contor
     * POST /client/index-contor
     */
    public function trimiteIndex(Request $request)
    {
        $validated = $request->validate([
            'cod_client' => 'required|string|max:20',
            'nr_contor'  => 'required|string|max:30',
            'index'      => 'required|numeric|min:0',
            'data'       => 'required|date|before_or_equal:today',
        ], [
            'cod_client.required'  => 'Codul clientului este obligatoriu.',
            'nr_contor.required'   => 'Numărul contorului este obligatoriu.',
            'index.required'       => 'Indexul citit este obligatoriu.',
            'index.numeric'        => 'Indexul trebuie să fie un număr.',
            'data.required'        => 'Data citirii este obligatorie.',
            'data.before_or_equal' => 'Data nu poate fi în viitor.',
        ]);

        // TODO: Salvează în DB sau trimite la API-ul de facturare
        // \App\Models\IndexContor::create($validated + ['ip' => $request->ip()]);

        Log::info('Index contor transmis', $validated);

        return redirect()
            ->route('client.index-contor')
            ->with('success', 'Indexul a fost transmis cu succes! Va fi procesat în cel mai scurt timp.');
    }

    /**
     * Pagina raportare avarie
     * GET /client/avarie
     */
    public function avarie()
    {
        return view('pages.client.avarie');
    }

    /**
     * Procesare raportare avarie
     * POST /client/avarie
     */
    public function trimiteAvarie(Request $request)
    {
        $validated = $request->validate([
            'nume'      => 'required|string|max:100',
            'telefon'   => 'required|string|max:20',
            'adresa'    => 'required|string|max:255',
            'descriere' => 'required|string|min:10|max:1000',
        ], [
            'nume.required'      => 'Numele este obligatoriu.',
            'telefon.required'   => 'Telefonul este obligatoriu.',
            'adresa.required'    => 'Adresa avariei este obligatorie.',
            'descriere.required' => 'Descrierea este obligatorie.',
            'descriere.min'      => 'Descrierea trebuie să aibă cel puțin 10 caractere.',
        ]);

        // TODO: Salvează avaria și notifică dispeceratul
        // \App\Models\Avarie::create($validated + ['status' => 'noua', 'ip' => $request->ip()]);

        Log::info('Avarie raportată', $validated);

        return redirect()
            ->route('client.avarie')
            ->with('success', 'Avaria a fost raportată! Dispeceratul va interveni în cel mai scurt timp. Pentru urgențe sunați la 0340 131 111.');
    }

    /**
     * Pagina cerere contract nou
     * GET /client/contract
     */
    public function contract()
    {
        return view('pages.client.contract');
    }

    /*
    |--------------------------------------------------------------------------
    | PAGINI PROTEJATE – necesită autentificare (middleware auth)
    |--------------------------------------------------------------------------
    */

    /**
     * Dashboard client autentificat
     * GET /client/dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();

        // TODO: date reale din DB
        // $facturiNeplatite = \App\Models\Factura::where('user_id', $user->id)->where('platita', false)->count();
        // $ultimulIndex = \App\Models\IndexContor::where('user_id', $user->id)->latest()->first();

        return view('pages.client.dashboard', compact('user'));
    }

    /**
     * Istoricul facturilor
     * GET /client/facturi
     */
    public function facturi()
    {
        $user = Auth::user();

        // TODO: date reale din DB
        // $facturi = \App\Models\Factura::where('user_id', $user->id)->latest()->paginate(12);

        return view('pages.client.facturi', compact('user'));
    }

    /**
     * Istoricul consumului
     * GET /client/consum
     */
    public function consum()
    {
        $user = Auth::user();

        // TODO: date reale din DB
        // $consumLunar = \App\Models\IndexContor::where('user_id', $user->id)->latest()->take(12)->get();

        return view('pages.client.consum', compact('user'));
    }

    /**
     * Date personale
     * GET /client/date-personale
     */
    public function datePersonale()
    {
        $user = Auth::user();
        return view('pages.client.date-personale', compact('user'));
    }

    /**
     * Actualizare date personale
     * PUT /client/date-personale
     */
    public function updateDatePersonale(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'telefon'  => 'nullable|string|max:20',
            'adresa'   => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required'      => 'Numele este obligatoriu.',
            'password.min'       => 'Parola trebuie să aibă cel puțin 8 caractere.',
            'password.confirmed' => 'Confirmarea parolei nu coincide.',
        ]);

        $user->name    = $validated['name'];
        $user->telefon = $validated['telefon'] ?? $user->telefon;
        $user->adresa  = $validated['adresa']  ?? $user->adresa;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()
            ->route('client.date-personale')
            ->with('success', 'Datele personale au fost actualizate cu succes.');
    }
}
