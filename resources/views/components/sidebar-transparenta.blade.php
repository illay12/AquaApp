{{-- Sidebar reutilizabil pentru paginile de transparență --}}

<div class="card mb-4">
    <div class="card-header"><i class="bi bi-shield-check me-2"></i> Transparență</div>
    <div class="list-group list-group-flush">
        @foreach([
            ['/informatii/hotarari-aga',           'bi-people',                    'Hotărâri AGA'],
            ['/informatii/surse-buget-bilant',      'bi-bar-chart-line',            'Surse, Buget, Bilanț'],
            ['/transparenta/buget-investitii',      'bi-wallet2',                   'Buget investiții'],
            ['/transparenta/rapoarte-evaluare',     'bi-clipboard-data',            'Rapoarte de evaluare'],
            ['/transparenta/raport-anual',          'bi-file-earmark-text',         'Raport anual activitate'],
            ['/transparenta/raport-audit',          'bi-search',                    'Raport audit extern'],
            ['/transparenta/raporturi-cnr',         'bi-file-earmark-bar-graph',     'Rapoarte CNR'],
            ['/transparenta/cod-etica',             'bi-award',                     'Cod de etică'],
            ['/transparenta/componenta-ca',         'bi-people-fill',               'Componența CA'],
            ['/transparenta/guvernanta-corporativa','bi-building-check',            'Guvernanță corporativă'],
            ['/transparenta/cheltuieli-personal',   'bi-currency-exchange',         'Cheltuieli personal'],
            ['/transparenta/plan-integritate',      'bi-shield-lock',               'Plan de integritate'],
        ] as [$url, $icon, $label])
        <a href="{{ url($url) }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is(ltrim($url,'/')) ? 'active' : '' }}"
           style="{{ request()->is(ltrim($url,'/')) ? 'background:var(--aqua-primary);border-color:var(--aqua-primary);color:#fff;' : '' }}">
            <i class="bi {{ $icon }}"></i> {{ $label }}
        </a>
        @endforeach
    </div>
</div>

<div class="card mb-4" style="border-color:#f8d7da;">
    <div class="card-body" style="background:#fff5f5;border-radius:12px;text-align:center;">
        <p class="fw-bold mb-1" style="color:#dc3545;font-size:0.9rem;">
            <i class="bi bi-telephone-fill me-1"></i> Dispecerat avarii 24/7
        </p>
        <p style="font-size:1.7rem;font-weight:800;color:#dc3545;margin:0;">0747 022 009</p>
    </div>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-link-45deg me-2"></i> Link-uri utile</div>
    <div class="list-group list-group-flush">
        <a href="https://www.anrsc.ro" target="_blank" class="list-group-item list-group-item-action" style="font-size:0.875rem;">
            <i class="bi bi-box-arrow-up-right text-aqua me-2"></i> A.N.R.S.C.
        </a>
        <a href="{{ url('/gdpr') }}" class="list-group-item list-group-item-action" style="font-size:0.875rem;">
            <i class="bi bi-shield-lock text-aqua me-2"></i> Politică GDPR
        </a>
    </div>
</div>
