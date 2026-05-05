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

@push('styles')
<style>
    .anunturi-section { padding: 2rem 0 3rem; }
    .anunt-card { margin-bottom: 0.85rem; border-radius: 12px; }
    .anunt-card-title { font-size: 1rem; font-weight: 700; line-height: 1.4; }
    .anunt-card-excerpt { font-size: 0.875rem; }
    .cat-badge { display:inline-block; padding:0.25em 0.75em; border-radius:20px; font-size:0.75rem; font-weight:700; white-space:nowrap; }

    /* Sidebar mobile: dispecerat deasupra listei, categorii ascunse */
    @media (max-width: 991.98px) {
        .anunturi-section { padding: 1.25rem 0 2rem; }
        .sidebar-anunturi { order: -1; margin-bottom: 0.5rem; }
        .sidebar-categorii { display: none; }
        .dispecerat-card-anunturi { border-radius: 12px !important; border: 2px solid #dc3545 !important; }
        .dispecerat-card-anunturi .card-body { padding: 0 !important; }
        .dispecerat-card-anunturi .card-body a {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 0.65rem;
            padding: 0.7rem 1rem;
            text-decoration: none;
            background: #fff;
            border-radius: 10px;
        }
        .dispecerat-card-anunturi .disp-text-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .dispecerat-card-anunturi .disp-icon { font-size: 1.2rem !important; color: #dc3545; flex-shrink: 0; }
        .dispecerat-card-anunturi .disp-text { font-size: 0.75rem; color: var(--aqua-gray); margin: 0; line-height: 1.2; }
        .dispecerat-card-anunturi .disp-num { font-size: 1.1rem !important; font-weight: 800 !important; margin: 0 !important; white-space: nowrap; color: #dc3545 !important; line-height: 1.2; }
    }
    @media (max-width: 575.98px) {
        .anunt-card-title { font-size: 0.925rem; }
        .anunt-card-excerpt { font-size: 0.82rem; }
        .anunt-card { padding: 0.85rem !important; }
        .form-filtre-card { padding: 0.75rem !important; }
        .paginatie { margin-top: 1rem !important; }
    }
</style>
@endpush

@section('content')
<section class="anunturi-section">
    <div class="container">
        <div class="row g-3 g-lg-4">

            {{-- LISTA ANUNTURI --}}
            <div class="col-lg-8">

                {{-- FILTRE --}}
                <form method="GET" action="{{ url('/anunturi') }}" id="form-filtre"
                      class="card mb-3 form-filtre-card p-3" style="border-color:var(--aqua-border);">
                    <div class="row g-2 align-items-end">
                        <div class="col-8 col-md-8">
                            <label class="form-label fw-bold small mb-1">Caută</label>
                            <input type="text" name="q" class="form-control form-control-sm"
                                   placeholder="Cuvânt cheie..." value="{{ request('q') }}">
                        </div>
                        <div class="col-4 col-md-4">
                            <label class="form-label fw-bold small mb-1">Categorie</label>
                            <select name="categorie" id="selectCategorie" class="form-select form-select-sm">
                                <option value="">Toate</option>
                                <option value="anunturi" {{ request('categorie')=='anunturi'?'selected':'' }}>Anunțuri</option>
                                <option value="avarie"   {{ request('categorie')=='avarie'  ?'selected':'' }}>Avarii</option>
                                <option value="angajare" {{ request('categorie')=='angajare'?'selected':'' }}>Angajare</option>
                                <option value="calitate" {{ request('categorie')=='calitate'?'selected':'' }}>Calitate</option>
                                <option value="diverse"  {{ request('categorie')=='diverse' ?'selected':'' }}>Diverse</option>
                            </select>
                        </div>
                    </div>
                </form>

                {{-- ANUNTURI LIST --}}
                @forelse($anunturi ?? [] as $anunt)
                    <div class="card anunt-card p-3">
                        <div class="d-flex justify-content-between align-items-center mb-1 gap-2">
                            <span class="cat-badge"
                                  style="{{ $categorieStyle[$anunt->categorie] ?? 'background:#f1f5f9;color:#475569;' }}">
                                {{ $categorieLabel[$anunt->categorie] ?? $anunt->categorie }}
                            </span>
                            <small class="text-muted flex-shrink-0" style="font-size:0.78rem;">
                                <i class="bi bi-calendar3 me-1"></i>{{ $anunt->created_at->format('d.m.Y') }}
                            </small>
                        </div>
                        <h5 class="anunt-card-title mt-2 mb-1">
                            <a href="{{ url('/anunturi/'.$anunt->slug) }}"
                               style="color:var(--aqua-text);text-decoration:none;">
                                {{ $anunt->titlu }}
                            </a>
                        </h5>
                        <p class="text-muted mb-2 anunt-card-excerpt">
                            {{ Str::limit(strip_tags(html_entity_decode($anunt->continut, ENT_QUOTES | ENT_HTML5, 'UTF-8')), 200) }}
                        </p>
                        <a href="{{ url('/anunturi/' . $anunt->slug) }}" class="btn btn-sm btn-outline-aqua align-self-start">
                            Citește mai mult <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                @empty
                    @foreach([
                        ['Avarie rețea apă potabilă – zona Centrală', '20.02.2026', 'Avarie'],
                        ['Concurs post vacant – muncitor calificat', '15.02.2026', 'Angajare'],
                        ['Buletin de analiză apă potabilă Februarie 2026', '10.02.2026', 'Calitate apă'],
                        ['Întrerupere programată alimentare apă – cartier Vest', '05.02.2026', 'Anunț'],
                    ] as $item)
                    <div class="card anunt-card p-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="badge-aqua">{{ $item[2] }}</span>
                            <small class="text-muted" style="font-size:0.78rem;">
                                <i class="bi bi-calendar3 me-1"></i>{{ $item[1] }}
                            </small>
                        </div>
                        <h5 class="anunt-card-title mt-2 mb-1">
                            <a href="#" style="color:var(--aqua-text);text-decoration:none;">{{ $item[0] }}</a>
                        </h5>
                        <p class="text-muted mb-2 anunt-card-excerpt">
                            SC AquaServ SA informează abonații cu privire la situația curentă...
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-aqua align-self-start">
                            Citește mai mult <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                    @endforeach
                @endforelse

                {{-- PAGINATIE --}}
                @isset($anunturi)
                    <div class="d-flex justify-content-center paginatie mt-3">
                        {{ $anunturi->links() }}
                    </div>
                @endisset
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4 sidebar-anunturi">

                {{-- Dispecerat --}}
                <div class="card mb-3 dispecerat-card-anunturi" style="border-color:#f8d7da;">
                    <div class="card-body" style="background:#fff5f5;border-radius:12px;text-align:center;">
                        {{-- desktop --}}
                        <div class="d-none d-lg-block">
                            <i class="bi bi-telephone-fill" style="font-size:2rem;color:#dc3545;"></i>
                            <p class="fw-bold mt-2 mb-0" style="color:#dc3545;">Dispecerat avarii</p>
                            <p style="font-size:1.8rem;font-weight:800;color:#dc3545;margin:0;">
                                <a href="tel:+40747022009" style="color:inherit;text-decoration:none;">0747 022 009</a>
                            </p>
                        </div>
                        {{-- mobil --}}
                        <a href="tel:+40747022009" class="d-lg-none">
                            <i class="bi bi-telephone-fill disp-icon"></i>
                            <div class="disp-text-wrap">
                                <p class="disp-text">Dispecerat avarii</p>
                                <p class="disp-num">0747 022 009</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Categorii --}}
                <div class="card sidebar-categorii">
                    <div class="card-header"><i class="bi bi-tag me-2"></i> Categorii</div>
                    <div class="card-body p-0">
                        <ul class="list-unstyled mb-0">
                            <li class="border-bottom">
                                <a href="{{ url('/anunturi?categorie=avarie') }}"
                                   class="d-flex align-items-center gap-2 px-3 py-2 text-decoration-none"
                                   style="color:var(--aqua-text);font-size:0.875rem;transition:background 0.15s;">
                                    <i class="bi bi-tools text-aqua"></i> Avarii
                                </a>
                            </li>
                            <li class="border-bottom">
                                <a href="{{ url('/anunturi?categorie=angajare') }}"
                                   class="d-flex align-items-center gap-2 px-3 py-2 text-decoration-none"
                                   style="color:var(--aqua-text);font-size:0.875rem;transition:background 0.15s;">
                                    <i class="bi bi-person-plus text-aqua"></i> Angajare
                                </a>
                            </li>
                            <li class="border-bottom">
                                <a href="{{ url('/anunturi?categorie=calitate') }}"
                                   class="d-flex align-items-center gap-2 px-3 py-2 text-decoration-none"
                                   style="color:var(--aqua-text);font-size:0.875rem;transition:background 0.15s;">
                                    <i class="bi bi-droplet-half text-aqua"></i> Calitate apă
                                </a>
                            </li>
                            <li class="border-bottom">
                                <a href="{{ url('/anunturi?categorie=diverse') }}"
                                   class="d-flex align-items-center gap-2 px-3 py-2 text-decoration-none"
                                   style="color:var(--aqua-text);font-size:0.875rem;transition:background 0.15s;">
                                    <i class="bi bi-collection text-aqua"></i> Diverse
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/anunturi') }}"
                                   class="d-flex align-items-center gap-2 px-3 py-2 text-decoration-none"
                                   style="color:var(--aqua-text);font-size:0.875rem;transition:background 0.15s;">
                                    <i class="bi bi-list text-aqua"></i> Toate anunțurile
                                </a>
                            </li>
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
