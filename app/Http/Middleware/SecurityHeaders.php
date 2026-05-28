<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $nonce = base64_encode(random_bytes(16));
        app()->instance('csp-nonce', $nonce);

        $isDispeceratOrAdmin = $request->is('dispecerat') || $request->is('dispecerat/*')
                           || $request->is('admin') || $request->is('admin/*');

        $response = $next($request);

        if ($isDispeceratOrAdmin) {
            // TinyMCE necesită unsafe-inline; aceste rute sunt accesibile doar intern
            $csp = implode('; ', [
                "default-src 'self'",
                "script-src 'self' 'unsafe-inline' cdn.jsdelivr.net",
                "style-src 'self' 'unsafe-inline' cdn.jsdelivr.net fonts.googleapis.com",
                "font-src 'self' fonts.gstatic.com cdn.jsdelivr.net",
                "img-src * data: blob:",
                "connect-src 'self' cdn.jsdelivr.net",
                "frame-src maps.google.com www.google.com",
                "object-src 'none'",
                "frame-ancestors 'self'",
                "base-uri 'self'",
                "form-action 'self'",
            ]);
        } else {
            $csp = implode('; ', [
                "default-src 'self'",
                "script-src 'self' 'nonce-{$nonce}' cdn.jsdelivr.net www.googletagmanager.com",
                "style-src 'self' 'unsafe-inline' cdn.jsdelivr.net fonts.googleapis.com",
                "font-src 'self' fonts.gstatic.com cdn.jsdelivr.net",
                "img-src * data: blob:",
                "connect-src 'self' cdn.jsdelivr.net www.google-analytics.com stats.g.doubleclick.net",
                "frame-src maps.google.com www.google.com",
                "object-src 'none'",
                "frame-ancestors 'self'",
                "base-uri 'self'",
                "form-action 'self'",
            ]);
        }

        $response->headers->set('Content-Security-Policy', $csp);
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');

        return $response;
    }
}
