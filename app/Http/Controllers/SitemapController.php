<?php

namespace App\Http\Controllers;

use App\Models\Anunt;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function xml()
    {
        $static = [
            ['url' => '/',                                    'priority' => '1.0',  'changefreq' => 'weekly'],
            ['url' => '/anunturi',                            'priority' => '0.9',  'changefreq' => 'daily'],
            ['url' => '/contact',                             'priority' => '0.8',  'changefreq' => 'monthly'],
            ['url' => '/despre',                              'priority' => '0.7',  'changefreq' => 'monthly'],
            ['url' => '/despre/structura-organizationala',    'priority' => '0.6',  'changefreq' => 'monthly'],
            ['url' => '/despre/centre-operationale',          'priority' => '0.6',  'changefreq' => 'monthly'],
            ['url' => '/servicii',                            'priority' => '0.8',  'changefreq' => 'monthly'],
            ['url' => '/servicii/alimentare-apa',             'priority' => '0.7',  'changefreq' => 'monthly'],
            ['url' => '/servicii/canalizare',                 'priority' => '0.7',  'changefreq' => 'monthly'],
            ['url' => '/servicii/epurare',                    'priority' => '0.7',  'changefreq' => 'monthly'],
            ['url' => '/informatii/tarife',                   'priority' => '0.8',  'changefreq' => 'monthly'],
            ['url' => '/informatii/calitatea-apei',           'priority' => '0.7',  'changefreq' => 'weekly'],
            ['url' => '/informatii/legislatie',               'priority' => '0.6',  'changefreq' => 'monthly'],
            ['url' => '/informatii/formulare',                'priority' => '0.7',  'changefreq' => 'monthly'],
            ['url' => '/informatii/avize',                    'priority' => '0.6',  'changefreq' => 'monthly'],
            ['url' => '/informatii/legea-544-2001',           'priority' => '0.5',  'changefreq' => 'yearly'],
            ['url' => '/informatii/hotarari-aga',             'priority' => '0.6',  'changefreq' => 'monthly'],
            ['url' => '/informatii/surse-buget-bilant',       'priority' => '0.6',  'changefreq' => 'monthly'],
            ['url' => '/informatii/buletin-informativ',       'priority' => '0.7',  'changefreq' => 'monthly'],
            ['url' => '/informatii/contracte-achizitii',      'priority' => '0.5',  'changefreq' => 'monthly'],
            ['url' => '/transparenta/componenta-ca',          'priority' => '0.6',  'changefreq' => 'monthly'],
            ['url' => '/transparenta/cod-etica',              'priority' => '0.5',  'changefreq' => 'yearly'],
            ['url' => '/transparenta/guvernanta-corporativa', 'priority' => '0.5',  'changefreq' => 'yearly'],
            ['url' => '/transparenta/plan-integritate',       'priority' => '0.5',  'changefreq' => 'yearly'],
            ['url' => '/transparenta/rapoarte-evaluare',      'priority' => '0.5',  'changefreq' => 'monthly'],
            ['url' => '/transparenta/raport-anual',           'priority' => '0.5',  'changefreq' => 'yearly'],
            ['url' => '/transparenta/raport-audit',           'priority' => '0.5',  'changefreq' => 'yearly'],
            ['url' => '/transparenta/buget-investitii',       'priority' => '0.5',  'changefreq' => 'monthly'],
            ['url' => '/program-casierii',                    'priority' => '0.7',  'changefreq' => 'monthly'],
            ['url' => '/client/index-contor',                 'priority' => '0.8',  'changefreq' => 'monthly'],
            ['url' => '/gdpr',                                'priority' => '0.3',  'changefreq' => 'yearly'],
            ['url' => '/cookies',                             'priority' => '0.3',  'changefreq' => 'yearly'],
        ];

        $anunturi = Anunt::orderByDesc('created_at')->get();

        $lastmod = Carbon::now()->toAtomString();

        return response(
            view('sitemap.xml', compact('static', 'anunturi', 'lastmod'))->render(),
            200,
            ['Content-Type' => 'application/xml']
        );
    }
}
