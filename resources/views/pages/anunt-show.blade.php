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

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">

            {{-- CONTINUT ANUNT --}}
            <div class="col-lg-8">
                <article class="card p-4 p-lg-5">

                    {{-- META --}}
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-4 pb-3"
                         style="border-bottom:1px solid var(--aqua-border);">
                        <span class="badge-aqua">{{ $anunt->categorie ?? 'Anunț' }}</span>
                        <span class="text-muted" style="font-size:0.82rem;">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ isset($anunt->created_at) ? $anunt->created_at->format('d.m.Y') : '' }}
                        </span>
                    </div>

                    {{-- TITLU --}}
                    <h1 style="font-family:'Merriweather',serif;font-size:1.5rem;font-weight:700;color:var(--aqua-dark);line-height:1.4;margin-bottom:1.5rem;">
                        {{ $anunt->titlu ?? 'Titlu anunț' }}
                    </h1>

                    {{-- CONTINUT --}}
                    <div class="anunt-continut" style="font-size:0.95rem;line-height:1.9;color:#333;">
                        {!! $anunt->continut ?? '' !!}
                    </div>

                    {{-- FISIERE ATASATE --}}
                    @if(isset($anunt->fisiere) && $anunt->fisiere->count() > 0)
                    <div class="mt-4 pt-4" style="border-top:1px solid var(--aqua-border);">
                        <h6 class="fw-bold mb-3" style="color:var(--aqua-dark);">
                            <i class="bi bi-paperclip me-2"></i> Documente atașate
                        </h6>
                        @foreach($anunt->fisiere as $fisier)
                        <a href="{{ $fisier->url }}" target="_blank"
                           class="d-flex align-items-center gap-3 p-3 mb-2 text-decoration-none"
                           style="background:var(--aqua-bg);border-radius:10px;border:1px solid var(--aqua-border);color:var(--aqua-text);transition:all 0.2s;"
                           onmouseover="this.style.background='#e0f0ff';this.style.borderColor='var(--aqua-primary)'"
                           onmouseout="this.style.background='var(--aqua-bg)';this.style.borderColor='var(--aqua-border)'">
                            <i class="bi {{ $fisier->icon }}"
                               style="font-size:1.8rem;color:{{ $fisier->culoare_icon }};flex-shrink:0;"></i>
                            <div style="flex:1;overflow:hidden;">
                                <div style="font-size:0.9rem;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                    {{ $fisier->nume_original }}
                                </div>
                                <div style="font-size:0.75rem;color:var(--aqua-gray);">
                                    {{ strtoupper($fisier->tip) }} &bull; {{ $fisier->marime_fomatata }}
                                </div>
                            </div>
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:6px;padding:0.3rem 0.75rem;font-size:0.78rem;font-weight:700;flex-shrink:0;">
                                <i class="bi bi-download me-1"></i> Descarcă
                            </span>
                        </a>
                        @endforeach
                    </div>
                    @endif

                    {{-- NAVIGARE --}}
                    <div class="d-flex justify-content-between align-items-center mt-5 pt-3"
                         style="border-top:1px solid var(--aqua-border);">
                        <a href="{{ url('/anunturi') }}" class="btn btn-outline-aqua btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Înapoi la anunțuri
                        </a>
                        <a href="#" onclick="window.print()" class="btn btn-sm btn-light" title="Printează">
                            <i class="bi bi-printer"></i>
                        </a>
                    </div>

                </article>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <div class="card mb-4" style="border-color:#f8d7da;">
                    <div class="card-body text-center" style="background:#fff5f5;border-radius:12px;">
                        <i class="bi bi-telephone-fill" style="font-size:2rem;color:#dc3545;"></i>
                        <p class="fw-bold mt-2 mb-0" style="color:#dc3545;">Dispecerat avarii 24/7</p>
                        <p style="font-size:1.8rem;font-weight:800;color:#dc3545;margin:0;">0340 131 111</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-clock-history me-2"></i> Anunțuri recente
                    </div>
                    <div class="card-body p-0">
                        @forelse($anunturiRecente ?? [] as $recent)
                            <a href="{{ url('/anunturi/' . $recent->slug) }}"
                               class="d-block p-3 text-decoration-none"
                               style="border-bottom:1px solid var(--aqua-border);color:var(--aqua-text);"
                               onmouseover="this.style.background='var(--aqua-bg)'"
                               onmouseout="this.style.background='transparent'">
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

@push('styles')
<style>
    .anunt-continut p  { margin-bottom: 1.2rem; }
    .anunt-continut ul, .anunt-continut ol { padding-left: 1.5rem; margin-bottom: 1.2rem; }
    .anunt-continut li { margin-bottom: 0.4rem; }
    .anunt-continut strong { color: var(--aqua-dark); }
    @media print {
        nav, footer, .col-lg-4 { display: none !important; }
        .col-lg-8 { width: 100% !important; }
    }
</style>
@endpush

@endsection
