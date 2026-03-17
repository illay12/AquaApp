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
     * Surse, Buget, Bilanț — citește dinamic fișierele de pe disc
     * GET /informatii/surse-buget-bilant
     */
    /**
     * Hotărâri AGA + Raportări CA — citește dinamic fișierele de pe disc
     * GET /informatii/hotarari-aga
     */
    public function hotarariAga()
    {
        $ani   = $this->citesteAniFisiere(storage_path('app/public/documente/aga'));
        $aniCa = $this->citesteAniFisiere(storage_path('app/public/documente/raportari ca'));
        return view('pages.informatii.hotarari-aga', compact('ani', 'aniCa'));
    }

    public function surseBugetBilant()
    {
        $base = storage_path('app/public/documente');

        $bugete = $this->citesteAniFisiere($base . '/bugete');
        $bilant = $this->citesteAniFisiere($base . '/bilant contabil');

        return view('pages.informatii.surse-buget-bilant', compact('bugete', 'bilant'));
    }

    private function citesteAniFisiere(string $cale): array
    {
        if (!is_dir($cale)) return [];

        $ani = [];
        foreach (scandir($cale) as $an) {
            if ($an === '.' || $an === '..') continue;
            $calean = $cale . DIRECTORY_SEPARATOR . $an;
            if (!is_dir($calean) || !preg_match('/^\d{4}$/', $an)) continue;

            $fisiere = [];
            foreach (scandir($calean) as $f) {
                if ($f === '.' || $f === '..') continue;
                if (strtolower(pathinfo($f, PATHINFO_EXTENSION)) !== 'pdf') continue;
                $fisiere[] = $f;
            }
            sort($fisiere);
            if (!empty($fisiere)) {
                $ani[(int)$an] = $fisiere;
            }
        }

        krsort($ani);
        return $ani;
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
