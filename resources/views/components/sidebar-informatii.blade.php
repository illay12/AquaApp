{{-- Sidebar reutilizabil pentru paginile de informații publice --}}

<div class="card mb-4">
    <div class="card-header"><i class="bi bi-grid me-2"></i> Informații publice</div>
    <div class="list-group list-group-flush">
        @foreach([
            ['/informatii/tarife','bi-cash-coin','Tarife'],
            ['/informatii/calitatea-apei','bi-droplet-half','Calitatea apei'],
            ['/informatii/legislatie','bi-book','Legislație'],
            ['/informatii/formulare','bi-file-earmark-arrow-down','Formulare utile'],
            ['/program-casierii','bi-clock','Program casierii'],
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
        <p style="font-size:1.7rem;font-weight:800;color:#dc3545;margin:0;">0340 131 111</p>
    </div>
</div>

<div class="card">
    <div class="card-header"><i class="bi bi-link-45deg me-2"></i> Link-uri utile</div>
    <div class="list-group list-group-flush">
        <a href="https://www.anrsc.ro" target="_blank" class="list-group-item list-group-item-action" style="font-size:0.875rem;">
            <i class="bi bi-box-arrow-up-right text-aqua me-2"></i> A.N.R.S.C.
        </a>
        <a href="https://www.mae.ro" target="_blank" class="list-group-item list-group-item-action" style="font-size:0.875rem;">
            <i class="bi bi-box-arrow-up-right text-aqua me-2"></i> Ministerul Mediului
        </a>
        <a href="{{ url('/gdpr') }}" class="list-group-item list-group-item-action" style="font-size:0.875rem;">
            <i class="bi bi-shield-lock text-aqua me-2"></i> Politică GDPR
        </a>
    </div>
</div>
