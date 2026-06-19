@extends('layouts.app')

@section('title', $anunt->titlu ?? 'Anunț')

@section('page_hero')
    <h1><i class="bi bi-megaphone-fill me-2"></i> Anunțuri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/anunturi') }}">Anunțuri</a></li>
            <li class="breadcrumb-item active breadcrumb-item-titlu">{{ Str::limit($anunt->titlu ?? 'Detalii anunț', 50) }}</li>
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
    .fisier-preview-trigger { cursor: pointer; }
    .fisier-download-btn { flex-shrink: 0; color: var(--aqua-gray); }
    .fisier-download-btn:hover { color: var(--aqua-primary); background: #fff; }
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
        .breadcrumb-item-titlu { display: none; }
        .anunt-show-title { font-size: 1.05rem; }
        .anunt-continut { font-size: 0.9rem !important; line-height: 1.75 !important; }
        .fisier-link-card { padding: 0.75rem !important; gap: 0.65rem !important; }
        .fisier-link-card .fisier-icon { font-size: 1.4rem !important; }
        .anunt-meta-bar { gap: 0.5rem !important; }
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
                        @if($fisier->tip === 'pdf')
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
                        @else
                        <div class="d-flex align-items-center fisier-link-card gap-3 p-3 mb-2"
                             style="background:var(--aqua-bg);border-radius:10px;border:1px solid var(--aqua-border);transition:all 0.2s;">
                            <i class="bi {{ $fisier->icon }} fisier-icon"
                               style="font-size:1.8rem;color:{{ $fisier->culoare_icon }};flex-shrink:0;"></i>
                            <div class="fisier-preview-trigger"
                                 data-url="{{ $fisier->url }}"
                                 data-name="{{ $fisier->nume_original }}"
                                 data-tip="{{ $fisier->tip }}"
                                 style="flex:1;overflow:hidden;color:var(--aqua-text);">
                                <div style="font-size:0.875rem;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                    {{ $fisier->nume_original }}
                                </div>
                                <div style="font-size:0.75rem;color:var(--aqua-gray);">
                                    {{ strtoupper($fisier->tip) }} &bull; {{ $fisier->marime_fomatata }}
                                    &bull; <span class="text-aqua fw-bold">Previzualizare</span>
                                </div>
                            </div>
                            <a href="{{ $fisier->url }}" class="btn btn-sm fisier-download-btn" title="Descarcă fișierul original">
                                <i class="bi bi-download"></i>
                            </a>
                        </div>
                        @endif
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
