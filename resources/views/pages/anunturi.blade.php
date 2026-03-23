@extends('layouts.app')

@section('title', 'Anunțuri')

@section('page_hero')
    <h1><i class="bi bi-megaphone-fill me-2"></i> Anunțuri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Anunțuri</li>
        </ol>
    </nav>
@endsection
    
@php
$categorieStyle = [
    'anunturi' => 'background:#dbeafe;color:#1d4ed8;',
    'avarie'   => 'background:#fee2e2;color:#b91c1c;',
    'angajare' => 'background:#dcfce7;color:#15803d;',
    'calitate' => 'background:#e0f2fe;color:#0369a1;',
    'diverse'  => 'background:#f3e8ff;color:#7e22ce;',
];
$categorieLabel = [
    'anunturi' => 'Anunțuri',
    'avarie'   => 'Avarie',
    'angajare' => 'Angajare',
    'calitate' => 'Calitate apă',
    'diverse'  => 'Diverse',
];
@endphp

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-4">

            {{-- LISTA ANUNTURI --}}
            <div class="col-lg-8">

                {{-- FILTRE --}}
                <form method="GET" action="{{ url('/anunturi') }}" id="form-filtre" class="card mb-4 p-3" style="border-color:var(--aqua-border);">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-8">
                            <label class="form-label fw-bold small">Caută</label>
                            <input type="text" name="q" class="form-control form-control-sm" placeholder="Cuvânt cheie..." value="{{ request('q') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold small">Categorie</label>
                            <select name="categorie" id="selectCategorie" class="form-select form-select-sm">
                                <option value="">Toate categoriile</option>
                                <option value="anunturi" {{ request('categorie')=='anunturi'?'selected':'' }}>Anunțuri</option>
                                <option value="avarie" {{ request('categorie')=='avarie'?'selected':'' }}>Avarii</option>
                                <option value="angajare" {{ request('categorie')=='angajare'?'selected':'' }}>Angajare</option>
                                <option value="calitate" {{ request('categorie')=='calitate'?'selected':'' }}>Calitate apă</option>
                                <option value="diverse" {{ request('categorie')=='diverse'?'selected':'' }}>Diverse</option>
                            </select>
                        </div>
                    </div>
                </form>

                {{-- ANUNTURI LIST --}}
                @forelse($anunturi ?? [] as $anunt)
                    <div class="card mb-3 p-3">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <span style="display:inline-block;padding:0.25em 0.75em;border-radius:20px;font-size:0.75rem;font-weight:700;{{ $categorieStyle[$anunt->categorie] ?? 'background:#f1f5f9;color:#475569;' }}">
                                {{ $categorieLabel[$anunt->categorie] ?? $anunt->categorie }}
                            </span>
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $anunt->created_at->format('d.m.Y') }}</small>
                        </div>
                        <h5 class="mt-2" style="font-size:1rem;font-weight:700;">
                            <a href="{{ url('/anunturi/'.$anunt->slug) }}" style="color:var(--aqua-text);text-decoration:none;">
                                {{ $anunt->titlu }}
                            </a>
                        </h5>
                        <p class="text-muted mb-2" style="font-size:0.875rem;">{{ Str::limit(strip_tags(html_entity_decode($anunt->continut, ENT_QUOTES | ENT_HTML5, 'UTF-8')), 400) }}</p>
                        <a href="{{ url('/anunturi/' . $anunt->slug) }}" class="btn btn-sm btn-outline-aqua">
                            Citește mai mult <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                @empty
                    {{-- PLACEHOLDER --}}
                    @foreach([
                        ['Avarie rețea apă potabilă – zona Centrală', '20.02.2026', 'Avarie'],
                        ['Concurs post vacant – muncitor calificat', '15.02.2026', 'Angajare'],
                        ['Buletin de analiză apă potabilă Februarie 2026', '10.02.2026', 'Calitate apă'],
                        ['Întrerupere programată alimentare apă – cartier Vest', '05.02.2026', 'Anunț'],
                    ] as $item)
                    <div class="card mb-3 p-3">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <span class="badge-aqua">{{ $item[2] }}</span>
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $item[1] }}</small>
                        </div>
                        <h5 class="mt-2" style="font-size:1rem;font-weight:700;">
                            <a href="#" style="color:var(--aqua-text);text-decoration:none;">{{ $item[0] }}</a>
                        </h5>
                        <p class="text-muted mb-2" style="font-size:0.875rem;">
                            SC AquaServ SA informează abonații cu privire la situația curentă. Vă rugăm să urmăriți anunțurile oficiale...
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-aqua">Citește mai mult <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                    @endforeach

                    {{-- PAGINATIE PLACEHOLDER --}}
                    <nav>
                        <ul class="pagination pagination-sm justify-content-center mt-4">
                            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </nav>
                @endforelse

                {{-- PAGINATIE REALA --}}
                @isset($anunturi)
                    <div class="d-flex justify-content-center mt-4">
                        {{ $anunturi->links() }}
                    </div>
                @endisset
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <div class="card mb-4" style="border-color:#f8d7da;">
                    <div class="card-body" style="background:#fff5f5;border-radius:12px;text-align:center;">
                        <i class="bi bi-telephone-fill" style="font-size:2rem;color:#dc3545;"></i>
                        <p class="fw-bold mt-2 mb-0" style="color:#dc3545;">Dispecerat avarii 24/7</p>
                        <p style="font-size:1.8rem;font-weight:800;color:#dc3545;margin:0;">
                            <a href="tel:+40747022009" style="color:inherit;text-decoration:none;">0747 022 009</a>
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><i class="bi bi-tag me-2"></i> Categorii</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="py-1 border-bottom"><a href="{{ url('/anunturi?categorie=avarie') }}" class="d-flex justify-content-between text-decoration-none" style="color:var(--aqua-text);">
                                <span><i class="bi bi-tools text-aqua me-2"></i>Avarii</span>
                            </a></li>
                            <li class="py-1 border-bottom"><a href="{{ url('/anunturi?categorie=angajare') }}" class="d-flex justify-content-between text-decoration-none" style="color:var(--aqua-text);">
                                <span><i class="bi bi-person-plus text-aqua me-2"></i>Angajare</span>
                            </a></li>
                            <li class="py-1 border-bottom"><a href="{{ url('/anunturi?categorie=calitate') }}" class="d-flex justify-content-between text-decoration-none" style="color:var(--aqua-text);">
                                <span><i class="bi bi-droplet-half text-aqua me-2"></i>Calitate apă</span>
                            </a></li>
                            <li class="py-1 border-bottom"><a href="{{ url('/anunturi?categorie=diverse') }}" class="d-flex justify-content-between text-decoration-none" style="color:var(--aqua-text);">
                                <span><i class="bi bi-collection text-aqua me-2"></i>Diverse</span>
                            </a></li>
                            <li class="py-1"><a href="{{ url('/anunturi') }}" class="d-flex justify-content-between text-decoration-none" style="color:var(--aqua-text);">
                                <span><i class="bi bi-list text-aqua me-2"></i>Toate anunțurile</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script nonce="@nonce">
document.getElementById('selectCategorie').addEventListener('change', function () {
    document.getElementById('form-filtre').submit();
});
</script>
@endpush
