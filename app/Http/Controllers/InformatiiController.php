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

    // ── Informații publice — pagini noi ─────────────────────────────────────

    public function buletinInformativ()
    {
        return view('pages.documente-lista', [
            'titlu'       => 'Buletin informativ',
            'iconClasa'   => 'bi-newspaper',
            'ani'         => $this->citesteAniFisiere(storage_path('app/public/documente/buletin informativ')),
            'storageUrl'  => 'documente/buletin%20informativ',
            'culoareIcon' => '#0077b6',
        ]);
    }

    public function contracteAchizitii()
    {
        return view('pages.informatii.contracte-achizitii');
    }


    // ── Transparență ────────────────────────────────────────────────────────

    public function rapoarteEvaluare()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Rapoarte de evaluare',
            'iconClasa'        => 'bi-clipboard-data',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/rapoarte evaluare')),
            'storageUrl'       => 'documente/rapoarte%20evaluare',
            'culoareIcon'      => '#dc3545',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/rapoarte-evaluare',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
    }


    public function bugetInvestitii()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Buget investiții',
            'iconClasa'        => 'bi-wallet2',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/buget investitii')),
            'storageUrl'       => 'documente/buget%20investitii',
            'culoareIcon'      => '#198754',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/buget-investitii',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
    }

    public function raportAnual()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Raport anual activitate',
            'iconClasa'        => 'bi-file-earmark-text',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/raport anual')),
            'storageUrl'       => 'documente/raport%20anual',
            'culoareIcon'      => '#0dcaf0',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/raport-anual',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
    }

    public function codEtica()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Cod de etică',
            'iconClasa'        => 'bi-award',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/cod etica')),
            'storageUrl'       => 'documente/cod%20etica',
            'culoareIcon'      => '#fd7e14',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/cod-etica',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
    }

    public function componentaCa()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Componența CA și Directori',
            'iconClasa'        => 'bi-people-fill',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/componenta ca')),
            'storageUrl'       => 'documente/componenta%20ca',
            'culoareIcon'      => '#6f42c1',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/componenta-ca',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
    }

    public function guvernantaCorporativa()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Guvernanță corporativă',
            'iconClasa'        => 'bi-building-check',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/guvernanta corporativa')),
            'storageUrl'       => 'documente/guvernanta%20corporativa',
            'culoareIcon'      => '#6f42c1',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/guvernanta-corporativa',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
    }

    public function cheltuieliPersonal()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Cheltuieli totale cu personalul',
            'iconClasa'        => 'bi-currency-exchange',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/cheltuieli personal')),
            'storageUrl'       => 'documente/cheltuieli%20personal',
            'culoareIcon'      => '#198754',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/cheltuieli-personal',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
    }

    public function planIntegritate()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Plan de integritate',
            'iconClasa'        => 'bi-shield-lock',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/plan integritate')),
            'storageUrl'       => 'documente/plan%20integritate',
            'culoareIcon'      => '#fd7e14',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/plan-integritate',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
    }

    public function raporturiCnr()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Raporturi CNR',
            'iconClasa'        => 'bi-file-earmark-bar-graph',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/raporturi cnr')),
            'storageUrl'       => 'documente/raporturi%20cnr',
            'culoareIcon'      => '#0077b6',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/raporturi-cnr',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
    }

    public function raportAudit()
    {
        return view('pages.documente-lista', [
            'titlu'            => 'Raport audit extern',
            'iconClasa'        => 'bi-search',
            'ani'              => $this->citesteAniFisiere(storage_path('app/public/documente/raport audit')),
            'storageUrl'       => 'documente/raport%20audit',
            'culoareIcon'      => '#dc3545',
            'breadcrumbParent' => 'Transparență',
            'breadcrumbUrl'    => '/transparenta/raport-audit',
            'sidebar'          => 'components.sidebar-transparenta',
        ]);
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
