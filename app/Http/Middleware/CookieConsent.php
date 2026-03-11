<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CookieConsent Middleware
 *
 * Injectează cookie-ul de sesiune Laravel și verifică consimțământul.
 * Se poate folosi pentru a bloca scripturi terțe dacă userul a refuzat.
 *
 * Înregistrare în bootstrap/app.php (Laravel 11):
 *   ->withMiddleware(function (Middleware $middleware) {
 *       $middleware->append(\App\Http\Middleware\CookieConsent::class);
 *   })
 *
 * SAU în app/Http/Kernel.php (Laravel 10 și mai vechi),
 * în $middlewareGroups['web']:
 *   \App\Http\Middleware\CookieConsent::class,
 */
class CookieConsent
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Dacă nu există deja consimțământul, îl lăsăm pentru banner
        // Nu forțăm nimic — bannerul din Blade se ocupă de UI

        return $response;
    }

    /**
     * Helper static — verifică dacă userul a acceptat cookies
     * Utilizare în Blade: @if(CookieConsent::accepted())
     * Utilizare în Controller: CookieConsent::accepted()
     */
    public static function accepted(): bool
    {
        return request()->cookie('cookie_consent') === 'accepted';
    }

    public static function refused(): bool
    {
        return request()->cookie('cookie_consent') === 'refused';
    }

    public static function hasDecided(): bool
    {
        return request()->hasCookie('cookie_consent');
    }
}
