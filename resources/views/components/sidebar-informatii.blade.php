{{-- Sidebar reutilizabil pentru paginile de informații publice --}}

<div class="card mb-4">
    <div class="card-header"><i class="bi bi-grid me-2"></i> Informații publice</div>
    <div class="list-group list-group-flush">
        @foreach([
            ['/program-casierii',               'bi-clock',                   'Program casierii'],
            ['/informatii/calitatea-apei',       'bi-droplet-half',            'Calitatea apei'],
            ['/informatii/tarife',               'bi-cash-coin',               'Tarife și Taxe'],
            ['/informatii/legislatie',           'bi-book',                    'Legislație'],
            ['/informatii/formulare',            'bi-file-earmark-arrow-down', 'Formulare utile'],
            ['/informatii/avize',                'bi-patch-check',             'Avize și acorduri'],
            ['/informatii/legea-544-2001',       'bi-journal-bookmark',        'Legea 544/2001'],
            ['/informatii/buletin-informativ',   'bi-newspaper',               'Buletin informativ'],
            ['/informatii/contracte-achizitii',  'bi-file-earmark-check',      'Contracte achiziții'],
            ['/informatii/cheltuieli-personal',  'bi-currency-exchange',       'Cheltuieli personal'],
            ['/informatii/datoriile-societatii', 'bi-cash-stack',              'Datoriile Societății'],
            ['/informatii/detalierea-serviciilor','bi-list-check',             'Detalierea serviciilor'],
        ] as [$url, $icon, $label])
        <a href="{{ url($url) }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is(ltrim($url,'/')) ? 'active' : '' }}">
            <i class="bi {{ $icon }}"></i> {{ $label }}
        </a>
        @endforeach
    </div>
</div>

<a href="tel:0747022009" class="side-call mb-4">
    <span class="side-call__icon"><i class="bi bi-telephone-fill"></i></span>
    <span><small>Dispecerat avarii 24/7</small><strong>0747 022 009</strong></span>
</a>

<div class="card">
    <div class="card-header"><i class="bi bi-link-45deg me-2"></i> Link-uri utile</div>
    <div class="list-group list-group-flush">
        <a href="https://www.anrsc.ro" target="_blank" class="list-group-item list-group-item-action">
            <i class="bi bi-box-arrow-up-right me-2"></i> A.N.R.S.C.
        </a>
        <a href="https://www.mae.ro" target="_blank" class="list-group-item list-group-item-action">
            <i class="bi bi-box-arrow-up-right me-2"></i> Ministerul Mediului
        </a>
        <a href="{{ url('/gdpr') }}" class="list-group-item list-group-item-action">
            <i class="bi bi-shield-lock me-2"></i> Politică GDPR
        </a>
    </div>
</div>
