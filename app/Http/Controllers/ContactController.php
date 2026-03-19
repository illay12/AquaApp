<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

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
            'nume'      => 'required|string|min:3|max:100',
            'email'     => 'required|email:rfc|max:100',
            'telefon'   => ['required', 'string', 'max:20', 'regex:/^(\+40|0)[0-9\s.\-]{8,12}$/'],
            'subiect'   => 'required|string|in:reclamatie,sesizare,informatie,altele',
            'mesaj'     => 'required|string|min:10|max:2000',
            'fisiere'   => 'nullable|array|max:3',
            'fisiere.*' => 'file|max:5120|mimes:pdf,jpg,jpeg,png,doc,docx',
        ], [
            'nume.required'     => 'Numele este obligatoriu.',
            'nume.min'          => 'Numele trebuie să aibă cel puțin 3 caractere.',
            'email.required'    => 'Adresa de email este obligatorie.',
            'email.email'       => 'Adresa de email nu este validă (ex: nume@domeniu.ro).',
            'telefon.required'  => 'Numărul de telefon este obligatoriu.',
            'telefon.regex'     => 'Numărul de telefon nu este valid (ex: 07xx xxx xxx sau 0240.524.310).',
            'subiect.required'  => 'Vă rugăm să alegeți un tip de solicitare.',
            'subiect.in'        => 'Tipul de solicitare ales nu este valid.',
            'mesaj.required'    => 'Mesajul este obligatoriu.',
            'mesaj.min'         => 'Mesajul trebuie să aibă cel puțin 10 caractere.',
            'fisiere.max'       => 'Puteți atașa maximum 3 fișiere.',
            'fisiere.*.max'     => 'Fiecare fișier poate avea maximum 5 MB.',
            'fisiere.*.mimes'   => 'Sunt acceptate doar fișiere PDF, imagini (JPG, PNG) și documente Word.',
        ]);

        $files = array_filter($request->file('fisiere', []));

        try {
            Mail::to(config('mail.contact_to', 'secretariat@aquaservtulcea.ro'))
                ->bcc('sesizari@aquaservtulcea.ro')
                ->send(new ContactMail($validated, $files));

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
