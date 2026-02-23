<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anunt;

class AnuntController extends Controller
{
    /**
     * Lista anunțuri cu filtrare și paginație
     * GET /anunturi
     */
    public function index(Request $request)
    {
        $query = Anunt::latest();

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('titlu', 'like', '%' . $request->q . '%')
                  ->orWhere('continut', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('categorie')) {
            $query->where('categorie', $request->categorie);
        }

        $anunturi = $query->paginate(10)->withQueryString();

        return view('pages.anunturi', compact('anunturi'));
    }

    /**
     * Pagina unui anunț individual
     * GET /anunturi/{slug}
     */
    public function show(string $slug)
    {
        $anunt = Anunt::where('slug', $slug)->firstOrFail();

        $anunturiRecente = Anunt::latest()
            ->where('id', '!=', $anunt->id)
            ->take(5)
            ->get();

        return view('pages.anunt-show', compact('anunt', 'anunturiRecente'));
    }
}
