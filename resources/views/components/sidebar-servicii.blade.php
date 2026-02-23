{{-- Sidebar reutilizabil pentru paginile de servicii --}}

<div class="card mb-4">
    <div class="card-header"><i class="bi bi-grid me-2"></i> Servicii</div>
    <div class="list-group list-group-flush">
        <a href="{{ url('/servicii/alimentare-apa') }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('servicii/alimentare-apa') ? 'active' : '' }}"
           style="{{ request()->is('servicii/alimentare-apa') ? 'background:var(--aqua-primary);border-color:var(--aqua-primary);' : '' }}">
            <i class="bi bi-droplet-fill"></i> Alimentare cu apă
        </a>
        <a href="{{ url('/servicii/canalizare') }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('servicii/canalizare') ? 'active' : '' }}"
           style="{{ request()->is('servicii/canalizare') ? 'background:var(--aqua-primary);border-color:var(--aqua-primary);' : '' }}">
            <i class="bi bi-filter-circle-fill"></i> Canalizare
        </a>
        <a href="{{ url('/servicii/epurare') }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('servicii/epurare') ? 'active' : '' }}"
           style="{{ request()->is('servicii/epurare') ? 'background:var(--aqua-primary);border-color:var(--aqua-primary);' : '' }}">
            <i class="bi bi-recycle"></i> Epurare ape uzate
        </a>
        <a href="{{ url('/servicii/avize') }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('servicii/avize') ? 'active' : '' }}"
           style="{{ request()->is('servicii/avize') ? 'background:var(--aqua-primary);border-color:var(--aqua-primary);' : '' }}">
            <i class="bi bi-file-earmark-check-fill"></i> Avize și autorizații
        </a>
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
    <div class="card-header"><i class="bi bi-download me-2"></i> Formulare utile</div>
    <div class="list-group list-group-flush">
        <a href="{{ url('/informatii/formulare') }}" class="list-group-item list-group-item-action" style="font-size:0.875rem;">
            <i class="bi bi-file-earmark-word text-aqua me-2"></i> Cerere branșament apă
        </a>
        <a href="{{ url('/informatii/formulare') }}" class="list-group-item list-group-item-action" style="font-size:0.875rem;">
            <i class="bi bi-file-earmark-word text-aqua me-2"></i> Cerere racord canal
        </a>
        <a href="{{ url('/informatii/formulare') }}" class="list-group-item list-group-item-action" style="font-size:0.875rem;">
            <i class="bi bi-file-earmark-word text-aqua me-2"></i> Fișă tehnică aviz amplasament
        </a>
        <a href="{{ url('/informatii/formulare') }}" class="list-group-item list-group-item-action" style="font-size:0.875rem;">
            <i class="bi bi-file-earmark-word text-aqua me-2"></i> Cerere schimbare titular
        </a>
    </div>
</div>
