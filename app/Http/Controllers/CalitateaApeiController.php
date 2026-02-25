<?php

namespace App\Http\Controllers;

use App\Models\BuletinAnaliza;

class CalitateaApeiController extends Controller
{
    public function index()
    {
        $ordineLuni = BuletinAnaliza::ordineLuni();

        // Grupare: an -> luna -> fisiere
        $buletine = BuletinAnaliza::groupatPeAni()
                        ->get()
                        ->groupBy('an')
                        ->sortKeysDesc()
                        ->map(function($grupAn) use ($ordineLuni) {
                            return $grupAn
                                ->groupBy('luna')
                                ->sortByDesc(fn($_, $luna) => $ordineLuni[$luna] ?? 0);
                        });

        return view('pages.informatii.calitatea-apei', compact('buletine'));
    }
}
