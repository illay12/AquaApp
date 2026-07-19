<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PddtjController;

/*
|--------------------------------------------------------------------------
| MICROSITE PDDTJ — pddtj.aquaservtulcea.ro
|--------------------------------------------------------------------------
|
| Rute grupate pe domeniu, servite din același Laravel install ca site-ul
| principal. cPanel trebuie să configureze subdomeniul pddtj astfel încât
| document root-ul lui să pointeze către același folder public/ ca
| aquaservtulcea.ro — Laravel decide conținutul după header-ul Host.
|
| Acest fișier este inclus la începutul routes/web.php, ÎNAINTEA rutelor
| fără constrângere de domeniu, ca ruta '/' de-a AquaApp să nu intercepteze
| cererile către pddtj.aquaservtulcea.ro.
|
*/

Route::domain(config('app.pddtj_domain'))->name('pddtj.')->group(function () {
    Route::get('/', [PddtjController::class, 'prezentare'])->name('prezentare');

    Route::prefix('prezentare')->group(function () {
        Route::get('/despre-pddtj',   [PddtjController::class, 'desprePddtj'])->name('despre-pddtj');
        Route::get('/despre-proiect', [PddtjController::class, 'despreProiect'])->name('despre-proiect');
    });

    Route::get('/contracte/detaliu/{cod}', [PddtjController::class, 'contractDetaliu'])->name('contract-detaliu');
    Route::get('/comunicare', [PddtjController::class, 'comunicare'])->name('comunicare');
    Route::get('/galerie',    [PddtjController::class, 'galerie'])->name('galerie');
    Route::get('/contact',    [PddtjController::class, 'contact'])->name('contact');
});
