<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anunt;

class HomeController extends Controller
{
    public function index()
    {
        $anunturi = Anunt::latest()->take(6)->get();

        return view('pages.home', compact('anunturi'));
    }
}
