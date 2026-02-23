<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Pagina de contact
     * GET /contact
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Procesare formular contact
     * POST /contact/trimite
     */
    public function trimite(Request $request)
    {
        $validated = $request->validate([
            'nume'    => 'required|string|min:3|max:100',
            'email'   => 'required|email|max:100',
            'telefon' => 'nullable|string|max:20',
            'subiect' => 'required|string|in:avarie,facturare,contract,calitate,altele',
            'mesaj'   => 'required|string|min:10|max:2000',
            'gdpr'    => 'accepted',
        ], [
            'nume.required'    => 'Numele este obligatoriu.',
            'nume.min'         => 'Numele trebuie să aibă cel puțin 3 caractere.',
            'email.required'   => 'Adresa de email este obligatorie.',
            'email.email'      => 'Adresa de email nu este validă.',
            'subiect.required' => 'Vă rugăm să alegeți un subiect.',
            'subiect.in'       => 'Subiectul ales nu este valid.',
            'mesaj.required'   => 'Mesajul este obligatoriu.',
            'mesaj.min'        => 'Mesajul trebuie să aibă cel puțin 10 caractere.',
            'gdpr.accepted'    => 'Trebuie să acceptați politica de confidențialitate.',
        ]);

        try {
            // Decomentează când ai Mail configurat în .env:
            // Mail::to(config('mail.contact_address', 'office@aquaserv.ro'))
            //     ->send(new \App\Mail\ContactMail($validated));

            Log::info('Mesaj contact nou', $validated);

            return redirect()
                ->route('contact.index')
                ->with('success', 'Mesajul a fost trimis cu succes! Vă vom contacta în cel mai scurt timp.');

        } catch (\Exception $e) {
            Log::error('Eroare trimitere email contact: ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['general' => 'A apărut o eroare. Vă rugăm să încercați din nou sau să ne contactați telefonic.']);
        }
    }
}
