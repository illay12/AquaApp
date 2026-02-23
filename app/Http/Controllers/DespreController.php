<?php

namespace App\Http\Controllers;

class DespreController extends Controller
{
    /**
     * Pagina Despre noi
     * GET /despre
     */
    public function index()
    {
        return view('pages.despre');
    }
}
