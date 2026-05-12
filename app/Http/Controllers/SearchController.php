<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anunt;
use App\Models\BuletinAnaliza;

class SearchController extends Controller
{
    private static array $pagini = [
        ['titlu' => 'Acasă',                       'url' => '/',                                      'desc' => 'Pagina principală Aquaserv Tulcea'],
        ['titlu' => 'Despre noi',                   'url' => '/despre',                                'desc' => 'Informații despre companie'],
        ['titlu' => 'Centre Operaționale',          'url' => '/despre/centre-operationale',            'desc' => 'Sucursale și centre operaționale Tulcea, Isaccea, Sulina, Babadag'],
        ['titlu' => 'Structură Organizațională',    'url' => '/despre/structura-organizationala',      'desc' => 'Organigrama companiei'],
        ['titlu' => 'Servicii',                     'url' => '/servicii',                              'desc' => 'Servicii de alimentare cu apă și canalizare'],
        ['titlu' => 'Alimentare cu apă',            'url' => '/servicii/alimentare-apa',               'desc' => 'Serviciu de distribuție apă potabilă'],
        ['titlu' => 'Canalizare',                   'url' => '/servicii/canalizare',                   'desc' => 'Serviciu de colectare ape uzate'],
        ['titlu' => 'Epurare ape uzate',            'url' => '/servicii/epurare',                      'desc' => 'Stații de epurare'],
        ['titlu' => 'Program casierii',             'url' => '/program-casierii',                      'desc' => 'Program de lucru casierii și agenții județ'],
        ['titlu' => 'Calitatea apei',               'url' => '/informatii/calitatea-apei',             'desc' => 'Buletine de analiză apă potabilă'],
        ['titlu' => 'Tarife și Taxe',               'url' => '/informatii/tarife',                     'desc' => 'Tarife servicii apă și canal'],
        ['titlu' => 'Legislație',                   'url' => '/informatii/legislatie',                 'desc' => 'Acte normative și legislație'],
        ['titlu' => 'Formulare utile',              'url' => '/informatii/formulare',                  'desc' => 'Formulare pentru cereri și solicitări'],
        ['titlu' => 'Avize și acorduri',            'url' => '/informatii/avize',                      'desc' => 'Avize de racordare și acorduri'],
        ['titlu' => 'Legea 544/2001',               'url' => '/informatii/legea-544-2001',             'desc' => 'Acces la informații de interes public'],
        ['titlu' => 'Hotărâri AGA',                 'url' => '/informatii/hotarari-aga',               'desc' => 'Hotărâri Adunare Generală Acționari'],
        ['titlu' => 'Surse, Buget, Bilanț',         'url' => '/informatii/surse-buget-bilant',         'desc' => 'Situații financiare'],
        ['titlu' => 'Contracte de achiziții',       'url' => '/informatii/contracte-achizitii',        'desc' => 'Contracte achiziții publice'],
        ['titlu' => 'Anunțuri',                     'url' => '/anunturi',                              'desc' => 'Anunțuri, avarii, angajări'],
        ['titlu' => 'Avarii',                       'url' => '/anunturi?categorie=avarie',             'desc' => 'Anunțuri avarii rețea apă'],
        ['titlu' => 'Angajare',                     'url' => '/anunturi?categorie=angajare',           'desc' => 'Posturi vacante și concursuri'],
        ['titlu' => 'Contact',                      'url' => '/contact',                               'desc' => 'Date de contact și formular solicitare'],
        ['titlu' => 'GDPR',                         'url' => '/gdpr',                                  'desc' => 'Politica de confidențialitate'],
        ['titlu' => 'Trimite index contor',         'url' => '/client/index-contor',                   'desc' => 'Transmitere index apometru online'],
        ['titlu' => 'Raportare avarie',             'url' => '/client/avarie',                         'desc' => 'Raportează o avarie la rețea'],
        ['titlu' => 'Cont MyApa',                   'url' => 'https://my.aquaservtulcea.ro',           'desc' => 'Zona clienți – facturi și consum'],
        ['titlu' => 'Cod de etică',                 'url' => '/transparenta/cod-etica',                'desc' => 'Codul de etică al companiei'],
        ['titlu' => 'Componența CA',                'url' => '/transparenta/componenta-ca',            'desc' => 'Consiliul de Administrație'],
        ['titlu' => 'Raport anual activitate',      'url' => '/transparenta/raport-anual',             'desc' => 'Raport anual de activitate'],
        ['titlu' => 'Rapoarte de evaluare',         'url' => '/transparenta/rapoarte-evaluare',        'desc' => ''],
        ['titlu' => 'Buget investiții',             'url' => '/transparenta/buget-investitii',         'desc' => ''],
        ['titlu' => 'Declarații de avere',          'url' => '/integritate/declaratii-de-avere',       'desc' => 'Declarații de avere și interese'],
    ];

    public function search(Request $request)
    {
        $q = trim($request->get('q', ''));

        if (mb_strlen($q) < 2) {
            return response()->json(['anunturi' => [], 'pagini' => [], 'buletine' => [], 'total' => 0]);
        }

        $ql = mb_strtolower($q);

        // Anunțuri din DB
        $anunturi = Anunt::where('titlu', 'like', "%{$q}%")
            ->orWhere('continut', 'like', "%{$q}%")
            ->latest()
            ->limit(6)
            ->get(['id', 'titlu', 'slug', 'categorie', 'created_at'])
            ->map(fn($a) => [
                'titlu'     => $a->titlu,
                'url'       => url('/anunturi/' . $a->slug),
                'categorie' => $a->categorie,
                'data'      => $a->created_at->format('d.m.Y'),
            ]);

        // Buletine analiză
        $buletine = BuletinAnaliza::where('luna', 'like', "%{$q}%")
            ->orWhere('an', 'like', "%{$q}%")
            ->orderBy('an', 'desc')
            ->limit(4)
            ->get(['id', 'luna', 'an'])
            ->map(fn($b) => [
                'titlu' => 'Buletin analiză apă – ' . $b->luna . ' ' . $b->an,
                'url'   => url('/fisiere/buletin/' . $b->id . '/download'),
            ]);

        // Pagini statice
        $pagini = array_values(array_filter(
            self::$pagini,
            fn($p) => str_contains(mb_strtolower($p['titlu']), $ql)
                   || str_contains(mb_strtolower($p['desc']),  $ql)
        ));
        $pagini = array_slice($pagini, 0, 5);

        $total = $anunturi->count() + $buletine->count() + count($pagini);

        return response()->json(compact('anunturi', 'buletine', 'pagini', 'total'));
    }
}
