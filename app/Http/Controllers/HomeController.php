<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anunt;

class HomeController extends Controller
{
    public function index()
    {
        $anunturi = Anunt::latest()->take(6)->get();

        // Bara de stare (mobil): avariile anunțate în ultimele 48h
        $avariiRecente = Anunt::categorie('avarie')
            ->where('created_at', '>=', now()->subHours(48))
            ->latest()
            ->get(['id', 'titlu', 'slug', 'created_at']);

        return view('pages.home', compact('anunturi', 'avariiRecente'));
    }
}
