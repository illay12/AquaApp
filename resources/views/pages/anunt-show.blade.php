@extends('layouts.app')

@section('title', $anunt->titlu ?? 'Anunț')

@php
$catLabel = [
    'anunturi' => 'Anunț',
    'avarie'   => 'Avarie',
    'angajare' => 'Angajare',
    'calitate' => 'Calitate apă',
    'diverse'  => 'Diverse',
];
$catColor = [
    'anunturi' => '#90e0ef',
    'avarie'   => '#ff9b9b',
    'angajare' => '#8ee6c0',
    'calitate' => '#90e0ef',
    'diverse'  => '#c9b8ff',
];
$catColorDark = [
    'anunturi' => '#0077b6',
    'avarie'   => '#d64545',
    'angajare' => '#15936b',
    'calitate' => '#0aa2c0',
    'diverse'  => '#7c5cd6',
];
$cat = $anunt->categorie ?? '';
@endphp

@section('page_hero')
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/anunturi') }}">Anunțuri</a></li>
        </ol>
    </nav>
    <div class="as-hero-meta">
        <span class="as-hero-cat" style="--c:{{ $catColor[$cat] ?? '#cbd5e1' }};">{{ $catLabel[$cat] ?? ($cat ?: 'Anunț') }}</span>
        @isset($anunt->created_at)
            <time datetime="{{ $anunt->created_at->toDateString() }}">{{ $anunt->created_at->locale('ro')->translatedFormat('j F Y') }}</time>
        @endisset
    </div>
    <h1 class="as-hero-title">{{ $anunt->titlu ?? 'Anunț' }}</h1>
@endsection

@push('styles')
<style>
    /* Hero articol */
    .as-hero-meta { display: flex; align-items: center; gap: .75rem; margin-bottom: .6rem; font-size: .85rem; font-weight: 700; color: rgba(255,255,255,.75); }
    .as-hero-cat { display: inline-flex; align-items: center; gap: .4rem; font-size: .72rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: var(--c); }
    .as-hero-cat::before { content: ""; width: 8px; height: 8px; border-radius: 50%; background: var(--c); }
    .page-hero h1.as-hero-title { font-size: clamp(1.4rem, 3vw, 2.2rem); max-width: 40ch; }

    .anunt-show-section { padding: 1.75rem 0 4rem; }

    /* Textul articolului — lățime de citire confortabilă */
    .anunt-continut { font-size: 1.05rem; line-height: 1.8; color: #26384a; max-width: 68ch; overflow-wrap: anywhere; }
    .anunt-continut p  { margin-bottom: 1.15rem; font-size: inherit; line-height: inherit; }
    .anunt-continut ul, .anunt-continut ol { padding-left: 1.4rem; margin-bottom: 1.15rem; }
    .anunt-continut li { margin-bottom: 0.4rem; }
    .anunt-continut strong { color: var(--site-ink); }
    .anunt-continut a { color: var(--aqua-primary); font-weight: 700; }
    .anunt-continut img { max-width: 100%; height: auto; border-radius: 14px; }
    .anunt-continut p > img:only-child { display: block; margin: 1rem auto; }
    .anunt-continut table { max-width: 100%; overflow-x: auto; display: block; font-size: .9rem; }

    /* Fișiere */
    .as-files { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--site-line); max-width: 68ch; }
    .as-label { font-size: .75rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; color: #6b7a8c; margin-bottom: .9rem; }
    .fisier-link-card {
        display: flex; align-items: center; gap: .9rem; padding: .85rem 1rem; margin-bottom: .6rem;
        border-radius: 14px; background: #f6fafd; border: 1px solid transparent; color: var(--site-ink); text-decoration: none;
        transition: background .2s, border-color .2s;
    }
    .fisier-link-card:hover { background: #eef6fb; border-color: var(--site-line); color: var(--site-ink); }
    .fisier-link-card .fisier-icon { font-size: 1.6rem; flex-shrink: 0; }
    .fisier-name { font-size: .92rem; font-weight: 800; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .fisier-meta { font-size: .78rem; color: #6b7a8c; font-weight: 600; }
    .fisier-preview-trigger { cursor: pointer; }
    .fisier-download-btn { flex-shrink: 0; width: 40px; height: 40px; border-radius: 50%; color: #6b7a8c; display: inline-flex; align-items: center; justify-content: center; }
    .fisier-download-btn:hover { color: var(--aqua-primary); background: #fff; }
    .as-gallery { width: 100%; }
    .fisier-galerie-thumb {
        position: relative; width: 110px; aspect-ratio: 1; border-radius: 14px; overflow: hidden; background: #eef3f7;
        flex-shrink: 0; transition: transform 0.2s, box-shadow 0.2s;
    }
    /* imaginea absolută: dimensiunea ei naturală nu mai poate deforma miniatura */
    .fisier-galerie-thumb img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; display: block; }
    .fisier-galerie-thumb:hover { transform: translateY(-2px); box-shadow: 0 10px 24px -10px rgba(13,34,54,.4); }

    .as-actions { display: flex; justify-content: space-between; align-items: center; gap: 1rem; margin-top: 2.25rem; padding-top: 1.5rem; border-top: 1px solid var(--site-line); max-width: 68ch; }

    /* Sidebar + recente */
    .as-side { position: sticky; top: 110px; }
    .as-recent a { display: block; padding: .9rem 0; border-bottom: 1px solid var(--site-line); color: var(--site-ink); text-decoration: none; }
    .as-recent a:hover .as-recent__title { color: var(--aqua-primary); }
    .as-recent__meta { font-size: .72rem; font-weight: 800; letter-spacing: .06em; text-transform: uppercase; color: var(--c); margin-bottom: .2rem; }
    .as-recent__meta time { color: #8a9aab; margin-left: .4rem; letter-spacing: 0; text-transform: none; font-weight: 600; }
    .as-recent__title { font-size: .95rem; font-weight: 700; line-height: 1.4; transition: color .2s; overflow-wrap: anywhere; }
    #previewModal .modal-content { overflow: hidden; }
    #previewModal .modal-body { height: 75vh; overflow: auto; padding: 0; }
    #previewModalContent { padding: 1.25rem 1.5rem; font-size: 0.92rem; line-height: 1.75; color: #333; }
    #previewModalContent img { max-width: 100%; height: auto; border-radius: 4px; }
    #previewModalContent table { border-collapse: collapse; width: 100%; margin-bottom: 1rem; }
    #previewModalContent table, #previewModalContent th, #previewModalContent td { border: 1px solid #dee2e6; }
    #previewModalContent th, #previewModalContent td { padding: 0.45rem 0.65rem; font-size: 0.85rem; }
    #previewModalContent .table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; margin-bottom: 1.25rem; }
    #previewModalContent .xlsx-sheet-title { font-size: 0.85rem; font-weight: 700; color: var(--aqua-dark); margin: 0 0 0.5rem; }

    @media (max-width: 991.98px) {
        .as-side { position: static; }
    }
    @media (max-width: 767.98px) {
        .page-hero h1.as-hero-title { font-size: 1.35rem; line-height: 1.3; }
        .as-hero-meta { font-size: .8rem; }
        .anunt-show-section { padding: 1rem 0 3rem; }
        .anunt-continut { font-size: 1rem; line-height: 1.75; }
        .as-files { margin-top: 1.5rem; }
        .fisier-galerie-thumb { width: calc(33.333% - .34rem); }
        .as-actions { margin-top: 1.75rem; }
        .as-actions .btn { width: 100%; }
        #previewModal .modal-body { height: auto; flex: 1 1 auto; }
        #previewModalContent { padding: 0.9rem 1rem; font-size: 0.85rem; }
        #previewModalContent th, #previewModalContent td { font-size: 0.75rem; padding: 0.3rem 0.45rem; }
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
        <div class="row g-4 g-xl-5">

            {{-- ARTICOL --}}
            <div class="col-lg-8">
                <article>
                    <div class="anunt-continut">
                        {!! $anunt->continut ?? '' !!}
                    </div>

                    {{-- FIȘIERE ATAȘATE --}}
                    @if(isset($anunt->fisiere) && $anunt->fisiere->count() > 0)
                    <div class="as-files">
                        <div class="as-label">Fișiere atașate</div>
                        @php
                            $poze      = $anunt->fisiere->whereIn('tip', ['jpg', 'png']);
                            $documente = $anunt->fisiere->whereNotIn('tip', ['jpg', 'png']);
                        @endphp

                        @if($poze->count() > 0)
                        <div class="as-gallery d-flex flex-wrap gap-2 mb-3">
                            @foreach($poze as $fisier)
                            <div class="fisier-preview-trigger fisier-galerie-thumb"
                                 data-url="{{ $fisier->url }}"
                                 data-name="{{ $fisier->nume_original }}"
                                 data-tip="{{ $fisier->tip }}"
                                 title="Previzualizare">
                                <img src="{{ $fisier->url }}" alt="Imagine atașată" loading="lazy">
                            </div>
                            @endforeach
                        </div>
                        @endif

                        @foreach($documente as $fisier)
                        @if($fisier->tip === 'pdf')
                        <a href="{{ $fisier->url }}" target="_blank" class="fisier-link-card">
                            <i class="bi {{ $fisier->icon }} fisier-icon" style="color:{{ $fisier->culoare_icon }};"></i>
                            <div style="flex:1;min-width:0;">
                                <div class="fisier-name">{{ $fisier->nume_original }}</div>
                                <div class="fisier-meta">{{ strtoupper($fisier->tip) }} · {{ $fisier->marime_fomatata }}</div>
                            </div>
                            <i class="bi bi-box-arrow-up-right" style="color:#8a9aab;"></i>
                        </a>
                        @else
                        <div class="fisier-link-card">
                            <i class="bi {{ $fisier->icon }} fisier-icon" style="color:{{ $fisier->culoare_icon }};"></i>
                            <div class="fisier-preview-trigger"
                                 data-url="{{ $fisier->url }}"
                                 data-name="{{ $fisier->nume_original }}"
                                 data-tip="{{ $fisier->tip }}"
                                 style="flex:1;min-width:0;">
                                <div class="fisier-name">{{ $fisier->nume_original }}</div>
                                <div class="fisier-meta">
                                    {{ strtoupper($fisier->tip) }} · {{ $fisier->marime_fomatata }}
                                    · <span class="text-aqua fw-bold">Previzualizare</span>
                                </div>
                            </div>
                            <a href="{{ $fisier->url }}" class="fisier-download-btn" title="Descarcă fișierul original" aria-label="Descarcă">
                                <i class="bi bi-download"></i>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif

                    <div class="as-actions">
                        <a href="{{ url('/anunturi') }}" class="btn btn-outline-aqua">
                            <i class="bi bi-arrow-left me-2"></i> Toate anunțurile
                        </a>
                        <a href="#" id="btn-print" class="btn btn-outline-aqua d-none d-md-inline-flex" title="Printează" aria-label="Printează">
                            <i class="bi bi-printer"></i>
                        </a>
                    </div>
                </article>
            </div>

            {{-- SIDEBAR (doar desktop) --}}
            <aside class="col-lg-4 d-none d-lg-block">
                <div class="as-side">
                    <a href="tel:+40747022009" class="side-call mb-4">
                        <span class="side-call__icon"><i class="bi bi-telephone-fill"></i></span>
                        <span><small>Dispecerat avarii 24/7</small><strong>0747 022 009</strong></span>
                    </a>

                    @if(($anunturiRecente ?? collect())->isNotEmpty())
                        <div class="as-label">Alte anunțuri</div>
                        <div class="as-recent">
                            @foreach($anunturiRecente->take(4) as $recent)
                                <a href="{{ url('/anunturi/' . $recent->slug) }}" style="--c:{{ $catColorDark[$recent->categorie] ?? '#64748b' }};">
                                    <div class="as-recent__meta">
                                        {{ $catLabel[$recent->categorie] ?? $recent->categorie }}
                                        <time datetime="{{ $recent->created_at->toDateString() }}">{{ $recent->created_at->format('d.m.Y') }}</time>
                                    </div>
                                    <div class="as-recent__title">{{ Str::limit($recent->titlu, 90) }}</div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </aside>

        </div>
    </div>
</section>

{{-- MODAL PREVIZUALIZARE DOCUMENTE WORD/EXCEL --}}
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-lg">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h6 class="modal-title text-truncate mb-0" id="previewModalLabel"></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div id="previewModalLoading" class="d-flex flex-column align-items-center justify-content-center h-100 text-muted py-5">
                    <div class="spinner-border mb-2" style="color:var(--aqua-primary);" role="status"></div>
                    <div style="font-size:0.875rem;">Se încarcă previzualizarea...</div>
                </div>
                <div id="previewModalError" class="d-none text-center text-muted py-5 px-3">
                    <i class="bi bi-exclamation-circle" style="font-size:2rem;"></i>
                    <p class="mt-2 mb-0" style="font-size:0.875rem;">
                        Previzualizarea nu este disponibilă pentru acest fișier.<br>Îl poți descărca mai jos.
                    </p>
                </div>
                <div id="previewModalContent" class="d-none"></div>
            </div>
            <div class="modal-footer py-2">
                <a id="previewModalDownload" href="#" class="btn btn-aqua btn-sm">
                    <i class="bi bi-download me-1"></i> Descarcă fișierul original
                </a>
            </div>
        </div>
    </div>
</div>
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

    var previewModalEl = document.getElementById('previewModal');
    if (previewModalEl) {
        var previewModal    = new bootstrap.Modal(previewModalEl);
        var previewLabel    = document.getElementById('previewModalLabel');
        var previewDownload = document.getElementById('previewModalDownload');
        var previewLoading  = document.getElementById('previewModalLoading');
        var previewError    = document.getElementById('previewModalError');
        var previewContent  = document.getElementById('previewModalContent');

        var scriptCache = {};
        function loadScript(src) {
            if (!scriptCache[src]) {
                scriptCache[src] = new Promise(function(resolve, reject) {
                    var s = document.createElement('script');
                    s.src = src;
                    s.onload = resolve;
                    s.onerror = reject;
                    document.head.appendChild(s);
                });
            }
            return scriptCache[src];
        }

        function renderDocx(buffer) {
            return loadScript('https://cdn.jsdelivr.net/npm/mammoth@1.8.0/mammoth.browser.min.js')
                .then(function() { return mammoth.convertToHtml({ arrayBuffer: buffer }); })
                .then(function(result) { previewContent.innerHTML = result.value; });
        }

        function renderXlsx(buffer) {
            return loadScript('https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js')
                .then(function() {
                    var workbook = XLSX.read(buffer, { type: 'array' });
                    var html = '';
                    workbook.SheetNames.forEach(function(sheetName, idx) {
                        html += '<div class="xlsx-sheet-title">' + sheetName + '</div>';
                        html += '<div class="table-responsive">'
                              + XLSX.utils.sheet_to_html(workbook.Sheets[sheetName], { id: 'xlsx-sheet-' + idx })
                              + '</div>';
                    });
                    previewContent.innerHTML = html;
                });
        }

        document.querySelectorAll('.fisier-preview-trigger').forEach(function(trigger) {
            trigger.addEventListener('click', function() {
                var url  = trigger.getAttribute('data-url');
                var name = trigger.getAttribute('data-name');
                var tip  = trigger.getAttribute('data-tip');

                previewLabel.textContent = name;
                previewDownload.href     = url;

                previewContent.classList.add('d-none');
                previewContent.innerHTML = '';
                previewError.classList.add('d-none');
                previewLoading.classList.remove('d-none');

                previewModal.show();

                if (tip === 'jpg' || tip === 'png') {
                    var img = new Image();
                    img.className = 'd-block mx-auto';
                    img.alt = name;
                    img.onload = function() {
                        previewContent.innerHTML = '';
                        previewContent.appendChild(img);
                        previewLoading.classList.add('d-none');
                        previewContent.classList.remove('d-none');
                    };
                    img.onerror = function() {
                        previewLoading.classList.add('d-none');
                        previewError.classList.remove('d-none');
                    };
                    img.src = url;
                    return;
                }

                fetch(url)
                    .then(function(res) {
                        if (!res.ok) throw new Error('fetch-failed');
                        return res.arrayBuffer();
                    })
                    .then(function(buffer) {
                        if (tip === 'docx') return renderDocx(buffer);
                        if (tip === 'xlsx') return renderXlsx(buffer);
                        throw new Error('unsupported-type');
                    })
                    .then(function() {
                        previewLoading.classList.add('d-none');
                        previewContent.classList.remove('d-none');
                    })
                    .catch(function() {
                        previewLoading.classList.add('d-none');
                        previewError.classList.remove('d-none');
                    });
            });
        });

        // Curăță conținutul randat după închiderea modalului
        previewModalEl.addEventListener('hidden.bs.modal', function() {
            previewContent.innerHTML = '';
        });
    }
</script>
@endpush
