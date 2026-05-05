@extends('layouts.app')

@section('title', $anunt->titlu ?? 'Anunț')

@section('page_hero')
    <h1><i class="bi bi-megaphone-fill me-2"></i> Anunțuri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/anunturi') }}">Anunțuri</a></li>
            <li class="breadcrumb-item active">{{ Str::limit($anunt->titlu ?? 'Detalii anunț', 50) }}</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    .anunt-show-section { padding: 2rem 0 3rem; }
    .anunt-show-title { font-family:'Merriweather',serif; font-size:1.5rem; font-weight:700; color:var(--aqua-dark); line-height:1.4; margin-bottom:1.25rem; }
    .anunt-continut p  { margin-bottom: 1.2rem; }
    .anunt-continut ul, .anunt-continut ol { padding-left: 1.5rem; margin-bottom: 1.2rem; }
    .anunt-continut li { margin-bottom: 0.4rem; }
    .anunt-continut strong { color: var(--aqua-dark); }
    .anunt-continut img { max-width: 100%; height: auto; border-radius: 4px; }
    .anunt-continut p > img:only-child { display: block; margin: 1rem auto; }
    .anunt-continut table { max-width: 100%; overflow-x: auto; display: block; }
    .fisier-link-card:hover { background: #e0f0ff !important; border-color: var(--aqua-primary) !important; }
    .recent-anunt-link:hover { background: var(--aqua-bg) !important; }

    @media (max-width: 991.98px) {
        .anunt-show-section { padding: 1.25rem 0 2rem; }
        .anunt-show-row { --bs-gutter-y: 1rem; }
        .anunt-show-title { font-size: 1.2rem; margin-bottom: 1rem; }
        .anunt-show-article { padding: 1rem !important; }
        /* Dispecerat compact orizontal pe mobil */
        .disp-sidebar-card .card-body {
            display: flex !important;
            align-items: center;
            gap: 0.75rem;
            text-align: left !important;
            padding: 0.75rem 1rem !important;
        }
        .disp-sidebar-card .disp-icon { font-size: 1.4rem !important; flex-shrink: 0; }
        .disp-sidebar-card .disp-num  { font-size: 1.2rem !important; margin: 0 !important; }
        .disp-sidebar-card .disp-label { margin: 0 !important; font-size: 0.82rem; }
        /* Anunțuri recente ascunse pe mobil — nu aglomera */
        .recent-anunturi-card { display: none; }
    }
    @media (max-width: 575.98px) {
        .anunt-show-title { font-size: 1.05rem; }
        .anunt-continut { font-size: 0.9rem !important; line-height: 1.75 !important; }
        .fisier-link-card { padding: 0.75rem !important; gap: 0.65rem !important; }
        .fisier-link-card .fisier-icon { font-size: 1.4rem !important; }
        .anunt-meta-bar { gap: 0.5rem !important; }
    }
    @media print {
        nav, footer, .col-lg-4 { display: none !important; }
        .col-lg-8 { width: 100% !important; }
    }
</style>
@endpush

@section('content')
<section class="anunt-show-section">
    <div class="container">
        <div class="row g-3 g-lg-5 anunt-show-row">

            {{-- CONTINUT ANUNT --}}
            <div class="col-lg-8">
                <article class="card anunt-show-article p-4 p-lg-5">

                    {{-- META --}}
                    <div class="d-flex flex-wrap align-items-center anunt-meta-bar gap-2 mb-3 pb-3"
                         style="border-bottom:1px solid var(--aqua-border);">
                        <span class="badge-aqua">{{ $anunt->categorie ?? 'Anunț' }}</span>
                        <span class="text-muted" style="font-size:0.82rem;">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ isset($anunt->created_at) ? $anunt->created_at->format('d.m.Y') : '' }}
                        </span>
                    </div>

                    {{-- TITLU --}}
                    <h1 class="anunt-show-title">{{ $anunt->titlu ?? 'Titlu anunț' }}</h1>

                    {{-- CONTINUT --}}
                    <div class="anunt-continut" style="font-size:0.95rem;line-height:1.9;color:#333;">
                        {!! $anunt->continut ?? '' !!}
                    </div>

                    {{-- FISIERE ATASATE --}}
                    @if(isset($anunt->fisiere) && $anunt->fisiere->count() > 0)
                    <div class="mt-4 pt-3" style="border-top:1px solid var(--aqua-border);">
                        <h6 class="fw-bold mb-3" style="color:var(--aqua-dark);font-size:0.875rem;">
                            <i class="bi bi-paperclip me-2"></i> Documente atașate
                        </h6>
                        @foreach($anunt->fisiere as $fisier)
                        <a href="{{ $fisier->url }}" target="_blank"
                           class="d-flex align-items-center fisier-link-card gap-3 p-3 mb-2 text-decoration-none"
                           style="background:var(--aqua-bg);border-radius:10px;border:1px solid var(--aqua-border);color:var(--aqua-text);transition:all 0.2s;">
                            <i class="bi {{ $fisier->icon }} fisier-icon"
                               style="font-size:1.8rem;color:{{ $fisier->culoare_icon }};flex-shrink:0;"></i>
                            <div style="flex:1;overflow:hidden;">
                                <div style="font-size:0.875rem;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                    {{ $fisier->nume_original }}
                                </div>
                                <div style="font-size:0.75rem;color:var(--aqua-gray);">
                                    {{ strtoupper($fisier->tip) }} &bull; {{ $fisier->marime_fomatata }}
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif

                    {{-- NAVIGARE --}}
                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3"
                         style="border-top:1px solid var(--aqua-border);">
                        <a href="{{ url('/anunturi') }}" class="btn btn-outline-aqua btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Înapoi la anunțuri
                        </a>
                        <a href="#" id="btn-print" class="btn btn-sm btn-light d-none d-md-inline-flex" title="Printează">
                            <i class="bi bi-printer"></i>
                        </a>
                    </div>

                </article>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">

                {{-- Dispecerat --}}
                <div class="card mb-3 disp-sidebar-card" style="border-color:#f8d7da;">
                    <div class="card-body text-center" style="background:#fff5f5;border-radius:12px;">
                        <i class="bi bi-telephone-fill disp-icon" style="font-size:2rem;color:#dc3545;"></i>
                        <p class="fw-bold mt-2 mb-0 disp-label" style="color:#dc3545;">Dispecerat avarii 24/7</p>
                        <p class="disp-num" style="font-size:1.8rem;font-weight:800;color:#dc3545;margin:0;">
                            <a href="tel:+40747022009" style="color:inherit;text-decoration:none;">0747 022 009</a>
                        </p>
                    </div>
                </div>

                {{-- Anunțuri recente --}}
                <div class="card recent-anunturi-card">
                    <div class="card-header">
                        <i class="bi bi-clock-history me-2"></i> Anunțuri recente
                    </div>
                    <div class="card-body p-0">
                        @forelse($anunturiRecente ?? [] as $recent)
                            <a href="{{ url('/anunturi/' . $recent->slug) }}"
                               class="d-block p-3 text-decoration-none recent-anunt-link"
                               style="border-bottom:1px solid var(--aqua-border);color:var(--aqua-text);transition:background 0.15s;">
                                <div style="font-size:0.75rem;color:var(--aqua-gray);margin-bottom:0.2rem;">
                                    <span class="badge-aqua me-1">{{ $recent->categorie }}</span>
                                    {{ $recent->created_at->format('d.m.Y') }}
                                </div>
                                <div style="font-size:0.875rem;font-weight:600;line-height:1.4;">
                                    {{ Str::limit($recent->titlu, 80) }}
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                    <div class="card-footer text-center p-2">
                        <a href="{{ url('/anunturi') }}" style="font-size:0.85rem;"
                           class="text-aqua text-decoration-none fw-bold">
                            Toate anunțurile <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script nonce="@nonce">
    var btnPrint = document.getElementById('btn-print');
    if (btnPrint) {
        btnPrint.addEventListener('click', function(e) {
            e.preventDefault();
            window.print();
        });
    }
</script>
@endpush
