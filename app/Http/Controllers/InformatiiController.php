<?php

namespace App\Http\Controllers;

class InformatiiController extends Controller
{
    /**
     * Index informații publice
     * GET /informatii
     */
    public function index()
    {
        return view('pages.informatii.index');
    }

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
     * Avize și acorduri
     * GET /informatii/avize
     */
    public function avize()
    {
        return view('pages.informatii.avize');
    }

    /**
     * Legea 544/2001 — acces la informații de interes public
     * GET /informatii/legea-544-2001
     */
    public function legea544()
    {
        return view('pages.informatii.legea-544-2001');
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
