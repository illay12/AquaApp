<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoimController;

/*
|--------------------------------------------------------------------------
| MICROSITE POIM — poim.aquaservtulcea.ro
|--------------------------------------------------------------------------
|
| Rute grupate pe domeniu, servite din același Laravel install ca site-ul
| principal. cPanel trebuie să configureze subdomeniul poim astfel încât
| document root-ul lui să pointeze către același folder public/ ca
| aquaservtulcea.ro — Laravel decide conținutul după header-ul Host.
|
| Acest fișier este inclus la începutul routes/web.php, ÎNAINTEA rutelor
| fără constrângere de domeniu, ca ruta '/' de-a AquaApp să nu intercepteze
| cererile către poim.aquaservtulcea.ro.
|
*/

Route::domain(config('app.poim_domain'))->name('poim.')->group(function () {
    Route::get('/', [PoimController::class, 'prezentare'])->name('prezentare');

    Route::prefix('prezentare')->group(function () {
        Route::get('/despre-poim',    [PoimController::class, 'desprePoim'])->name('despre-poim');
        Route::get('/despre-proiect', [PoimController::class, 'despreProiect'])->name('despre-proiect');
    });

    Route::get('/contracte', [PoimController::class, 'contracte'])->name('contracte');
    Route::get('/contracte/detaliu/{cod}', [PoimController::class, 'contractDetaliu'])->name('contract-detaliu');
    Route::get('/comunicare', [PoimController::class, 'comunicare'])->name('comunicare');
    Route::get('/galerie',    [PoimController::class, 'galerie'])->name('galerie');
    Route::get('/contact',    [PoimController::class, 'contact'])->name('contact');
});
