<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\DispeceratUser;

class DispeceratAuth
{
    public function handle(Request $request, Closure $next)
    {
        $userId = session('dispecerat_user');
        $token  = session('dispecerat_token');

        // Nu e logat deloc
        if (!$userId || !$token) {
            return redirect()->route('dispecerat.login')
                ->with('error', 'Trebuie să vă autentificați pentru a accesa panoul.');
        }

        // Verifică token-ul în baza de date
        if (!DispeceratUser::verificaToken($userId, $token)) {
            // Șterge sesiunea
            $request->session()->forget([
                'dispecerat_user', 'dispecerat_username',
                'dispecerat_nume', 'dispecerat_categorie',
                'dispecerat_token',
            ]);

            return redirect()->route('dispecerat.login')
                ->with('error', 'Sesiunea a expirat. Vă rugăm să vă autentificați din nou.');
        }

        return $next($request);
    }
}
