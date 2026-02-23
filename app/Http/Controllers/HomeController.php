<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anunt;

class HomeController extends Controller
{
    public function index()
    {
        $anunturi = Anunt::orderBy('created_at','desc')->take(5)->get();
        return view('index', compact('anunturi'));
    }
}