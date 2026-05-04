@extends('layouts.app')

@section('title', 'Componența CA și Directori — AquaServ Tulcea')

@section('page_hero')
    <h1><i class="bi bi-people-fill me-2"></i> Componența CA și Directori</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/transparenta/componenta-ca') }}">Transparență</a></li>
            <li class="breadcrumb-item active">Componența CA și Directori</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    .person-card { background:#fff; border:1.5px solid var(--aqua-border); border-radius:12px; padding:1.1rem 1.25rem; display:flex; align-items:center; gap:1rem; transition:all 0.2s; }
    .person-card:hover { border-color:var(--aqua-primary); box-shadow:0 4px 16px rgba(0,119,182,0.10); transform:translateY(-2px); }
    .person-avatar { width:46px; height:46px; min-width:46px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:1.1rem; font-weight:800; color:#fff; flex-shrink:0; }
    .person-name { font-weight:700; font-size:0.9rem; color:var(--aqua-dark); line-height:1.3; }
    .person-role { font-size:0.78rem; color:var(--aqua-gray); margin-top:0.15rem; }

    .doc-item { display:flex; align-items:center; gap:0.85rem; padding:0.75rem 1.1rem; text-decoration:none; color:inherit; border-bottom:1px solid #f1f5f9; transition:background 0.14s; }
    .doc-item:last-child { border-bottom:none; }
    .doc-item:hover { background:#f8fafc; }
    .doc-icon { width:36px; height:36px; min-width:36px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:1rem; color:#fff; background:#dc3545; }
    .doc-title { flex:1; font-size:0.855rem; font-weight:600; color:#1e293b; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
    .doc-pdf-badge { font-size:0.68rem; font-weight:700; padding:0.22rem 0.6rem; border-radius:5px; background:#fff0f0; color:#dc3545; flex-shrink:0; display:inline-flex; align-items:center; gap:3px; }

    .year-accordion { border:1.5px solid #e2e8f0; border-radius:12px; overflow:hidden; margin-bottom:0.75rem; }
    .year-header { display:flex; align-items:center; justify-content:space-between; padding:0.9rem 1.25rem; background:#f8fafc; cursor:pointer; transition:background 0.16s; user-select:none; }
    .year-header:hover { background:#eef4fb; }
    .year-header.open { background:var(--aqua-primary); color:#fff; }
    .year-header.open .year-badge { background:rgba(255,255,255,0.2); color:#fff; }
    .year-header.open .year-chevron { color:#fff; transform:rotate(180deg); }
    .year-label { font-weight:800; font-size:0.95rem; display:flex; align-items:center; gap:0.6rem; }
    .year-badge { font-size:0.7rem; font-weight:700; background:#e8f4fd; color:var(--aqua-primary); padding:0.2rem 0.6rem; border-radius:20px; }
    .year-chevron { font-size:0.85rem; color:#94a3b8; transition:transform 0.22s, color 0.18s; }
    .year-body { display:none; border-top:1px solid #e2e8f0; }
    .year-body.open { display:block; }

    @media (max-width:575.98px) {
        .person-card { padding:0.9rem 1rem; }
        .doc-title { white-space:normal; }
    }
</style>
@endpush

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                {{-- CONSILIU DE ADMINISTRAȚIE --}}
                <h2 class="section-title mb-4">Consiliul de Administrație</h2>
                <div class="row g-3 mb-5">
                    @php
                    $membri = [
                        ['MORARU ANASTASE',        'Președinte CA',     '#023e8a'],
                        ['VÂLCU STOIAN',            'Membru CA',         '#0077b6'],
                        ['MIHAI VERONICA',          'Membru CA',         '#0077b6'],
                        ['BUMBAC IONELA',           'Membru CA',         '#0077b6'],
                        ['IONEL ZAMFIR',            'Membru CA',         '#0077b6'],
                        ['ANTONESCU ALINA',         'Membru CA',         '#0077b6'],
                        ['MATEI SELDA',             'Membru CA',         '#0077b6'],
                        ['PASCALE RODICA',          'Membru CA',         '#0077b6'],
                        ['VALENTIN C. IFRIM',       'Membru CA',         '#0077b6'],
                        ['CRĂCIUN BOGDAN',          'Secretar CA',       '#00b4d8'],
                    ];
                    @endphp
                    @foreach($membri as [$nume, $rol, $culoare])
                    <div class="col-md-6">
                        <div class="person-card">
                            <div class="person-avatar" style="background:{{ $culoare }};">
                                {{ mb_strtoupper(mb_substr($nume, 0, 1)) }}
                            </div>
                            <div>
                                <div class="person-name">{{ $nume }}</div>
                                <div class="person-role">{{ $rol }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- DIRECTORI EXECUTIVI --}}
                <h2 class="section-title mb-4">Directori Executivi</h2>
                <div class="row g-3 mb-5">
                    @php
                    $directori = [
                        ['IFRIM CĂTRINESCU VALENTIN', 'Director General',   '#dc3545'],
                        ['MATEI SELDA GEORGIANA',      'Director Economic',  '#198754'],
                        ['ILIE GEORGE',                'Inginer Șef',        '#6f42c1'],
                    ];
                    @endphp
                    @foreach($directori as [$nume, $rol, $culoare])
                    <div class="col-md-6">
                        <div class="person-card">
                            <div class="person-avatar" style="background:{{ $culoare }};">
                                {{ mb_strtoupper(mb_substr($nume, 0, 1)) }}
                            </div>
                            <div>
                                <div class="person-name">{{ $nume }}</div>
                                <div class="person-role">{{ $rol }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- CV-URI --}}
                <h2 class="section-title mb-3">CV-uri Consiliu de Administrație</h2>
                @if(!empty($cv))
                    @foreach($cv as $an => $fisiere)
                    <div class="year-accordion">
                        <div class="year-header {{ $loop->first ? 'open' : '' }}">
                            <div class="year-label">
                                <i class="bi bi-calendar3" style="color:{{ $loop->first ? '#fff' : 'var(--aqua-primary)' }};"></i>
                                {{ $an }}
                                <span class="year-badge">{{ count($fisiere) }} {{ count($fisiere) == 1 ? 'document' : 'documente' }}</span>
                            </div>
                            <i class="bi bi-chevron-down year-chevron" style="{{ $loop->first ? 'transform:rotate(180deg);color:#fff;' : '' }}"></i>
                        </div>
                        <div class="year-body {{ $loop->first ? 'open' : '' }}">
                            @foreach($fisiere as $fisier)
                            <a href="{{ asset('storage/documente/componenta%20ca/cv/' . $an . '/' . rawurlencode($fisier)) }}"
                               target="_blank" rel="noopener" class="doc-item">
                                <div class="doc-icon" style="background:#0077b6;">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </div>
                                <span class="doc-title">{{ pathinfo($fisier, PATHINFO_FILENAME) }}</span>
                                <span class="doc-pdf-badge"><i class="bi bi-download"></i> PDF</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="text-muted" style="font-size:0.9rem;">Nu există documente disponibile momentan.</p>
                @endif

                {{-- DECLARAȚII DE AVERE --}}
                <h2 class="section-title mt-4 mb-3">Declarații de avere</h2>
                @if(!empty($declaratii))
                    @foreach($declaratii as $an => $fisiere)
                    <div class="year-accordion">
                        <div class="year-header {{ $loop->first ? 'open' : '' }}">
                            <div class="year-label">
                                <i class="bi bi-calendar3" style="color:{{ $loop->first ? '#fff' : 'var(--aqua-primary)' }};"></i>
                                {{ $an }}
                                <span class="year-badge">{{ count($fisiere) }} {{ count($fisiere) == 1 ? 'document' : 'documente' }}</span>
                            </div>
                            <i class="bi bi-chevron-down year-chevron" style="{{ $loop->first ? 'transform:rotate(180deg);color:#fff;' : '' }}"></i>
                        </div>
                        <div class="year-body {{ $loop->first ? 'open' : '' }}">
                            @foreach($fisiere as $fisier)
                            <a href="{{ asset('storage/documente/componenta%20ca/declaratii%20avere/' . $an . '/' . rawurlencode($fisier)) }}"
                               target="_blank" rel="noopener" class="doc-item">
                                <div class="doc-icon">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </div>
                                <span class="doc-title">{{ pathinfo($fisier, PATHINFO_FILENAME) }}</span>
                                <span class="doc-pdf-badge"><i class="bi bi-download"></i> PDF</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="text-muted" style="font-size:0.9rem;">Nu există documente disponibile momentan.</p>
                @endif

            </div>
            <div class="col-lg-4 d-none d-lg-block">
                @include('components.sidebar-transparenta')
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script nonce="@nonce">
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.year-header').forEach(function(header) {
        header.addEventListener('click', function() {
            const body = this.nextElementSibling;
            const chevron = this.querySelector('.year-chevron');
            const icon = this.querySelector('.bi-calendar3');
            const isOpen = this.classList.contains('open');
            this.classList.toggle('open', !isOpen);
            body.classList.toggle('open', !isOpen);
            chevron.style.transform = isOpen ? '' : 'rotate(180deg)';
            chevron.style.color = isOpen ? '' : '#fff';
            if (icon) icon.style.color = isOpen ? 'var(--aqua-primary)' : '#fff';
        });
    });
});
</script>
@endpush
