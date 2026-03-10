<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DespreController;
use App\Http\Controllers\AnuntController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiciiController;
use App\Http\Controllers\InformatiiController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DispeceratController;
use App\Http\Middleware\DispeceratAuth;
use App\Http\Controllers\FisierController;
use App\Http\Controllers\CalitateaApeiController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuth;

/*
|--------------------------------------------------------------------------
| PAGINI PRINCIPALE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/despre', [DespreController::class, 'index'])->name('despre');
Route::get('/despre/centre-operationale', fn() => view('pages.despre.centre-operationale'))->name('despre.centre-operationale');
Route::get('/despre/structura-organizationala', fn() => view('pages.despre.structura-organizationala'))->name('despre.structura-organizationala');

Route::get('/program-casierii', [InformatiiController::class, 'programCasierii'])->name('program-casierii');

Route::view('/gdpr',    'pages.gdpr')->name('gdpr');
Route::view('/cookies', 'pages.cookies')->name('cookies');
Route::view('/sitemap', 'pages.sitemap')->name('sitemap');

/*
|--------------------------------------------------------------------------
| SERVICII
|--------------------------------------------------------------------------
*/

Route::prefix('servicii')->name('servicii.')->group(function () {
    Route::get('/',               [ServiciiController::class, 'index'])->name('index');
    Route::get('/alimentare-apa', [ServiciiController::class, 'alimentareApa'])->name('alimentare-apa');
    Route::get('/canalizare',     [ServiciiController::class, 'canalizare'])->name('canalizare');
    Route::get('/epurare',        [ServiciiController::class, 'epurare'])->name('epurare');
    Route::get('/avize',          [ServiciiController::class, 'avize'])->name('avize');
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
    Route::get('/calitatea-apei', [CalitateaApeiController::class, 'index'])->name('calitatea-apei');
    Route::get('/legislatie',     [InformatiiController::class, 'legislatie'])->name('legislatie');
    Route::get('/formulare',      [InformatiiController::class, 'formulare'])->name('formulare');
});

/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/',        [ContactController::class, 'index'])->name('index');
    Route::post('/trimite',[ContactController::class, 'trimite'])->name('trimite');
});

/*
|--------------------------------------------------------------------------
| DOWNLOAD FISIERE — public
|--------------------------------------------------------------------------
*/

Route::get('/fisiere/{id}/download',         [FisierController::class, 'download'])->name('fisiere.download');
Route::get('/fisiere/buletin/{id}/download', [FisierController::class, 'downloadBuletin'])->name('fisiere.buletin.download');

/*
|--------------------------------------------------------------------------
| ZONA CLIENȚI
|--------------------------------------------------------------------------
*/

Route::prefix('client')->name('client.')->group(function () {
    Route::get('/login',         [ClientController::class, 'loginForm'])->name('login');
    Route::post('/login',        [ClientController::class, 'login'])->name('login.post');
    Route::get('/factura',       [ClientController::class, 'factura'])->name('factura');
    Route::get('/contoare',      [ClientController::class, 'getContoare'])->name('contoare');
    Route::get('/index-contor',  [ClientController::class, 'indexContor'])->name('index-contor');
    Route::post('/index-contor', [ClientController::class, 'trimiteIndex'])->name('index-contor.post');
    Route::get('/avarie',        [ClientController::class, 'avarie'])->name('avarie');
    Route::post('/avarie',       [ClientController::class, 'trimiteAvarie'])->name('avarie.post');
    Route::get('/contract',      [ClientController::class, 'contract'])->name('contract');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard',      [ClientController::class, 'dashboard'])->name('dashboard');
        Route::get('/facturi',        [ClientController::class, 'facturi'])->name('facturi');
        Route::get('/consum',         [ClientController::class, 'consum'])->name('consum');
        Route::get('/date-personale', [ClientController::class, 'datePersonale'])->name('date-personale');
        Route::put('/date-personale', [ClientController::class, 'updateDatePersonale'])->name('date-personale.update');
        Route::post('/logout',        [ClientController::class, 'logout'])->name('logout');
    });
});

/*
|--------------------------------------------------------------------------
| DISPECERAT
|--------------------------------------------------------------------------
*/

Route::prefix('dispecerat')->name('dispecerat.')->group(function () {
    Route::get('/login',  [DispeceratController::class, 'loginForm'])->name('login');
    Route::post('/login', [DispeceratController::class, 'login'])->name('login.post');
    Route::post('/logout',[DispeceratController::class, 'logout'])->name('logout');

    Route::middleware(DispeceratAuth::class)->group(function () {
        Route::get('/',                   [DispeceratController::class, 'dashboard'])->name('dashboard');
        Route::get('/anunturi/create',    [DispeceratController::class, 'create'])->name('anunturi.create');
        Route::post('/anunturi',          [DispeceratController::class, 'store'])->name('anunturi.store');
        Route::get('/anunturi/{id}/edit', [DispeceratController::class, 'edit'])->name('anunturi.edit');
        Route::put('/anunturi/{id}',      [DispeceratController::class, 'update'])->name('anunturi.update');
        Route::delete('/anunturi/{id}',   [DispeceratController::class, 'destroy'])->name('anunturi.destroy');
        Route::delete('/fisiere/{id}',    [DispeceratController::class, 'stergeFisier'])->name('fisiere.sterge');
        Route::get('/buletin/create',     [DispeceratController::class, 'buletinCreate'])->name('buletin.create');
        Route::post('/buletin',           [DispeceratController::class, 'buletinStore'])->name('buletin.store');
        Route::delete('/buletin/{id}',    [DispeceratController::class, 'buletinDestroy'])->name('buletin.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',  [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.post');

    Route::middleware(AdminAuth::class)->group(function () {
        Route::get('/',                [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout',         [AdminController::class, 'logout'])->name('logout');
        Route::get('/export/indecsi',  [AdminController::class, 'exportIndecsi'])->name('export.indecsi');
        Route::post('/import/indecsi', [AdminController::class, 'importIndecsi'])->name('import.indecsi');
        Route::post('/sincronizare',   [AdminController::class, 'sincronizare'])->name('sincronizare');
        Route::post('/compara',        [AdminController::class, 'comparaExporturi'])->name('compara');
    });
});