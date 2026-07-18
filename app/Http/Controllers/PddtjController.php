<?php

namespace App\Http\Controllers;

class PddtjController extends Controller
{
    /**
     * Prezentare — pagina principală a microsite-ului
     * GET /
     */
    public function prezentare()
    {
        return view('pddtj.prezentare');
    }

    /**
     * Prezentare » Despre PDDTJ
     * GET /prezentare/despre-pddtj
     */
    public function desprePddtj()
    {
        return view('pddtj.despre-pddtj');
    }

    /**
     * Prezentare » Despre proiect
     * GET /prezentare/despre-proiect
     */
    public function despreProiect()
    {
        return view('pddtj.despre-proiect');
    }

    /**
     * Contracte — Lucrări / Servicii / Furnizare
     * GET /contracte
     */
    public function contracte()
    {
        return view('pddtj.contracte');
    }

    /**
     * Comunicare — comunicate de presă
     * GET /comunicare
     */
    public function comunicare()
    {
        return view('pddtj.comunicare');
    }

    /**
     * Galerie foto, organizată pe contracte
     * GET /galerie
     */
    public function galerie()
    {
        return view('pddtj.galerie');
    }

    /**
     * Contact
     * GET /contact
     */
    public function contact()
    {
        return view('pddtj.contact');
    }
}
