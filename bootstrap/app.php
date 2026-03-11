<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'dispecerat' => \App\Http\Middleware\DispeceratAuth::class,
        ]);

        // Înlocuiește middleware-ul implicit de criptare cu al nostru
        // care exclude cookie_consent (setat din JavaScript)
        $middleware->web(replace: [
            \Illuminate\Cookie\Middleware\EncryptCookies::class => \App\Http\Middleware\EncryptCookies::class,
        ]);

        // Cookie consent
        $middleware->appendToGroup('web', \App\Http\Middleware\CookieConsent::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();