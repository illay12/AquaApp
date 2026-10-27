{{-- Sidebar reutilizabil pentru paginile de servicii --}}

<div class="card mb-4">
    <div class="card-header"><i class="bi bi-grid me-2"></i> Servicii</div>
    <div class="list-group list-group-flush">
        <a href="{{ url('/servicii/alimentare-apa') }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('servicii/alimentare-apa') ? 'active' : '' }}">
            <i class="bi bi-droplet-fill"></i> Alimentare cu apă
        </a>
        <a href="{{ url('/servicii/canalizare') }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('servicii/canalizare') ? 'active' : '' }}">
            <i class="bi bi-filter-circle-fill"></i> Canalizare
        </a>
        <a href="{{ url('/servicii/epurare') }}"
           class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('servicii/epurare') ? 'active' : '' }}">
            <i class="bi bi-recycle"></i> Epurare ape uzate
        </a>
    </div>
</div>

<a href="tel:0747022009" class="side-call mb-4">
    <span class="side-call__icon"><i class="bi bi-telephone-fill"></i></span>
    <span><small>Dispecerat avarii 24/7</small><strong>0747 022 009</strong></span>
</a>
