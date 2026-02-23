<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DespreController;
use App\Http\Controllers\AnuntController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiciiController;
use App\Http\Controllers\InformatiiController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| PAGINI PRINCIPALE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/despre', [DespreController::class, 'index'])->name('despre');

Route::get('/program-casierii', [InformatiiController::class, 'programCasierii'])->name('program-casierii');

// Pagini statice simple
Route::view('/gdpr',    'pages.gdpr')->name('gdpr');
Route::view('/cookies', 'pages.cookies')->name('cookies');
Route::view('/sitemap', 'pages.sitemap')->name('sitemap');

/*
|--------------------------------------------------------------------------
| SERVICII
|--------------------------------------------------------------------------
*/

Route::prefix('servicii')->name('servicii.')->group(function () {
    Route::get('/',              [ServiciiController::class, 'index'])->name('index');
    Route::get('/alimentare-apa',[ServiciiController::class, 'alimentareApa'])->name('alimentare-apa');
    Route::get('/canalizare',    [ServiciiController::class, 'canalizare'])->name('canalizare');
    Route::get('/epurare',       [ServiciiController::class, 'epurare'])->name('epurare');
    Route::get('/avize',         [ServiciiController::class, 'avize'])->name('avize');
});

/*
|--------------------------------------------------------------------------
| ANUNȚURI
|--------------------------------------------------------------------------
*/

Route::prefix('anunturi')->name('anunturi.')->group(function () {
    Route::get('/',       [AnuntController::class, 'index'])->name('index');
    Route::get('/{slug}', [AnuntController::class, 'show'])->name('show');
});

/*
|--------------------------------------------------------------------------
| INFORMAȚII PUBLICE
|--------------------------------------------------------------------------
*/

Route::prefix('informatii')->name('informatii.')->group(function () {
    Route::get('/tarife',         [InformatiiController::class, 'tarife'])->name('tarife');
    Route::get('/calitatea-apei', [InformatiiController::class, 'calitateaApei'])->name('calitatea-apei');
    Route::get('/legislatie',     [InformatiiController::class, 'legislatie'])->name('legislatie');
    Route::get('/formulare',      [InformatiiController::class, 'formulare'])->name('formulare');
});

/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/',       [ContactController::class, 'index'])->name('index');
    Route::post('/trimite',[ContactController::class, 'trimite'])->name('trimite');
});

/*
|--------------------------------------------------------------------------
| ZONA CLIENȚI – publică (fără autentificare)
|--------------------------------------------------------------------------
*/

Route::prefix('client')->name('client.')->group(function () {
    Route::get('/login',         [ClientController::class, 'loginForm'])->name('login');
    Route::post('/login',        [ClientController::class, 'login'])->name('login.post');
    Route::get('/factura',       [ClientController::class, 'factura'])->name('factura');
    Route::get('/index-contor',  [ClientController::class, 'indexContor'])->name('index-contor');
    Route::post('/index-contor', [ClientController::class, 'trimiteIndex'])->name('index-contor.post');
    Route::get('/avarie',        [ClientController::class, 'avarie'])->name('avarie');
    Route::post('/avarie',       [ClientController::class, 'trimiteAvarie'])->name('avarie.post');
    Route::get('/contract',      [ClientController::class, 'contract'])->name('contract');

    /*
    |--------------------------------------------------------------------------
    | ZONA CLIENȚI – protejată (necesită autentificare)
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard',          [ClientController::class, 'dashboard'])->name('dashboard');
        Route::get('/facturi',            [ClientController::class, 'facturi'])->name('facturi');
        Route::get('/consum',             [ClientController::class, 'consum'])->name('consum');
        Route::get('/date-personale',     [ClientController::class, 'datePersonale'])->name('date-personale');
        Route::put('/date-personale',     [ClientController::class, 'updateDatePersonale'])->name('date-personale.update');
        Route::post('/logout',            [ClientController::class, 'logout'])->name('logout');
    });
});
