<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * Cookie-urile din această listă NU sunt criptate/decriptate de Laravel.
     * cookie_consent e setat din JavaScript, deci trebuie exclus.
     */
    protected $except = [
        'cookie_consent',
    ];
}