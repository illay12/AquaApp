<?php

namespace App\Http\Controllers;

class ServiciiController extends Controller
{
    /**
     * Pagina principală servicii
     * GET /servicii
     */
    public function index()
    {
        return view('pages.servicii.index');
    }

    /**
     * Alimentare cu apă
     * GET /servicii/alimentare-apa
     */
    public function alimentareApa()
    {
        return view('pages.servicii.alimentare-apa');
    }

    /**
     * Canalizare
     * GET /servicii/canalizare
     */
    public function canalizare()
    {
        return view('pages.servicii.canalizare');
    }

    /**
     * Epurare ape uzate
     * GET /servicii/epurare
     */
    public function epurare()
    {
        return view('pages.servicii.epurare');
    }

    /**
     * Avize și autorizații
     * GET /servicii/avize
     */
    public function avize()
    {
        return view('pages.servicii.avize');
    }
}
