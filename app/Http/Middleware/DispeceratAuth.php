<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DispeceratAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('dispecerat_user')) {
            return redirect()->route('dispecerat.login')
                ->with('error', 'Trebuie să vă autentificați pentru a accesa panoul.');
        }

        return $next($request);
    }
}
