<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Credențiale Dispecerat
    |--------------------------------------------------------------------------
    | Setează în fișierul .env:
    |   DISPECERAT_USER=dispecerat
    |   DISPECERAT_PASSWORD=<parola hash-uita>
    |
    | Generează hash-ul parolei cu:
    |   php artisan tinker
    |   >>> Hash::make('parola_ta_secreta')
    */

    'username' => env('DISPECERAT_USER', 'dispecerat'),
    'password' => env('DISPECERAT_PASSWORD'),
];
