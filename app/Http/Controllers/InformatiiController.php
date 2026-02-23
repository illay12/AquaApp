<?php

namespace App\Http\Controllers;

class InformatiiController extends Controller
{
    /**
     * Tarife
     * GET /informatii/tarife
     */
    public function tarife()
    {
        return view('pages.informatii.tarife');
    }

    /**
     * Calitatea apei
     * GET /informatii/calitatea-apei
     */
    public function calitateaApei()
    {
        return view('pages.informatii.calitatea-apei');
    }

    /**
     * Legislație
     * GET /informatii/legislatie
     */
    public function legislatie()
    {
        return view('pages.informatii.legislatie');
    }

    /**
     * Formulare utile
     * GET /informatii/formulare
     */
    public function formulare()
    {
        return view('pages.informatii.formulare');
    }

    /**
     * Program casierii
     * GET /program-casierii
     */
    public function programCasierii()
    {
        return view('pages.program-casierii');
    }
}
