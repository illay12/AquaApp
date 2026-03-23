@extends('layouts.app')

@section('title', 'Hotărâri AGA — AquaServ Tulcea')

@section('page_hero')
    <h1><i class="bi bi-people me-2"></i> Hotărâri AGA</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații publice</a></li>
            <li class="breadcrumb-item active">Hotărâri AGA</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    /* ── Tabs ── */
    .aga-tabs { display: flex; gap: 0.5rem; margin-bottom: 1.75rem; flex-wrap: wrap; }
    .aga-tab {
        padding: 0.6rem 1.4rem;
        border-radius: 8px;
        font-size: 0.875rem; font-weight: 700;
        cursor: pointer; border: 2px solid transparent;
        text-decoration: none; transition: all 0.18s;
        display: inline-flex; align-items: center; gap: 6px;
    }
    .aga-tab.active { background: var(--aqua-primary); color: #fff; border-color: var(--aqua-primary); }
    .aga-tab:not(.active) { background: #f0f8ff; color: var(--aqua-primary); border-color: #cce5f5; }
    .aga-tab:not(.active):hover { background: #ddeeff; border-color: var(--aqua-primary); }

    /* ── Accordion an ── */
    .year-accordion { border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden; margin-bottom: 0.75rem; }
    .year-header {
        display: flex; align-items: center; justify-content: space-between;
        padding: 0.9rem 1.25rem;
        background: #f8fafc; cursor: pointer;
        transition: background 0.16s;
        user-select: none;
    }
    .year-header:hover { background: #eef4fb; }
    .year-header.open { background: var(--aqua-primary); color: #fff; }
    .year-header.open .year-badge { background: rgba(255,255,255,0.2); color: #fff; }
    .year-header.open .year-chevron { color: #fff; transform: rotate(180deg); }
    .year-label { font-weight: 800; font-size: 0.95rem; display: flex; align-items: center; gap: 0.6rem; }
    .year-badge {
        font-size: 0.7rem; font-weight: 700;
        background: #e8f4fd; color: var(--aqua-primary);
        padding: 0.2rem 0.6rem; border-radius: 20px;
    }
    .year-chevron { font-size: 0.85rem; color: #94a3b8; transition: transform 0.22s, color 0.18s; }
    .year-body { display: none; border-top: 1px solid #e2e8f0; }
    .year-body.open { display: block; }

    /* ── Doc row ── */
    .doc-item {
        display: flex; align-items: center; gap: 0.85rem;
        padding: 0.75rem 1.25rem;
        text-decoration: none; color: inherit;
        border-bottom: 1px solid #f1f5f9;
        transition: background 0.14s;
    }
    .doc-item:last-child { border-bottom: none; }
    .doc-item:hover { background: #f8fafc; }
    .doc-icon { width: 36px; height: 36px; min-width: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1rem; color: #fff; }
    .doc-title { flex: 1; font-size: 0.855rem; font-weight: 600; color: #1e293b; min-width: 0; }
    .doc-pdf-badge {
        font-size: 0.68rem; font-weight: 700; padding: 0.22rem 0.6rem;
        border-radius: 5px; background: #fff0f0; color: #dc3545;
        flex-shrink: 0; display: inline-flex; align-items: center; gap: 3px;
    }


    /* ── Mobile ── */
    @media (max-width: 991.98px) {
        .sidebar-nav-card { display: none; }
        .aga-tabs { gap: 0.4rem; }
        .aga-tab { padding: 0.5rem 0.9rem; font-size: 0.82rem; }
    }
    @media (max-width: 575.98px) {
        .doc-item { gap: 0.65rem; padding: 0.7rem 1rem; }
        .doc-pdf-badge { display: none; }
        .year-header { padding: 0.8rem 1rem; }
        .year-label { font-size: 0.88rem; }
        .aga-tab .tab-text-lung { display: none; }
        .aga-tab .tab-text-scurt { display: inline; }
        .aga-tabs { width: 100%; }
        .aga-tab { flex: 1; justify-content: center; }
    }
    @media (min-width: 576px) {
        .aga-tab .tab-text-scurt { display: none; }
    }
</style>
@endpush

@section('content')
<section style="padding: 2.5rem 0 4rem;">
    <div class="container">
        <div class="row g-4">

            {{-- ═══════════════ CONȚINUT PRINCIPAL ═══════════════ --}}
            <div class="col-lg-8">

                {{-- Tabs --}}
                <div class="aga-tabs">
                    <a href="#sectiunea-aga" onclick="schimbTab('aga')" id="tab-aga" class="aga-tab active">
                        <i class="bi bi-people-fill"></i>
                        <span class="tab-text-lung">Hotărâri AGA</span>
                        <span class="tab-text-scurt">AGA</span>
                    </a>
                    <a href="#sectiunea-ca" onclick="schimbTab('ca')" id="tab-ca" class="aga-tab">
                        <i class="bi bi-briefcase-fill"></i>
                        <span class="tab-text-lung">Raportări Consiliu Administrație</span>
                        <span class="tab-text-scurt">Consiliu Adm.</span>
                    </a>
                </div>

                {{-- ════ SECȚIUNEA AGA ════ --}}
                <div id="sectiunea-aga">
                    @foreach($ani as $an => $fisiere)
                    <div class="year-accordion">
                        <div class="year-header {{ $loop->first ? 'open' : '' }}"
                             onclick="toggleAn(this)">
                            <div class="year-label">
                                <i class="bi bi-calendar3" style="color:{{ $loop->first ? '#fff' : 'var(--aqua-primary)' }};"></i>
                                {{ $an }}
                                <span class="year-badge">{{ count($fisiere) }} documente</span>
                            </div>
                            <i class="bi bi-chevron-down year-chevron"
                               style="{{ $loop->first ? 'transform:rotate(180deg);color:#fff;' : '' }}"></i>
                        </div>
                        <div class="year-body {{ $loop->first ? 'open' : '' }}">
                            @foreach($fisiere as $fisier)
                            <a href="{{ asset('storage/documente/aga/' . $an . '/' . rawurlencode($fisier)) }}"
                               target="_blank" class="doc-item">
                                <div class="doc-icon" style="background:#dc3545;">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </div>
                                <span class="doc-title">{{ pathinfo($fisier, PATHINFO_FILENAME) }}</span>
                                <span class="doc-pdf-badge"><i class="bi bi-download"></i> PDF</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>{{-- /sectiunea-aga --}}

                {{-- ════ SECȚIUNEA RAPORTĂRI CA ════ --}}
                <div id="sectiunea-ca" style="display:none;">
                    @foreach($aniCa as $an => $fisiere)
                    <div class="year-accordion">
                        <div class="year-header {{ $loop->first ? 'open' : '' }}"
                             onclick="toggleAn(this)">
                            <div class="year-label">
                                <i class="bi bi-calendar3" style="color:{{ $loop->first ? '#fff' : 'var(--aqua-primary)' }};"></i>
                                {{ $an }}
                                <span class="year-badge">{{ count($fisiere) }} documente</span>
                            </div>
                            <i class="bi bi-chevron-down year-chevron"
                               style="{{ $loop->first ? 'transform:rotate(180deg);color:#fff;' : '' }}"></i>
                        </div>
                        <div class="year-body {{ $loop->first ? 'open' : '' }}">
                            @foreach($fisiere as $fisier)
                            <a href="{{ asset('storage/documente/raportari%20ca/' . $an . '/' . rawurlencode($fisier)) }}"
                               target="_blank" class="doc-item">
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
                </div>{{-- /sectiunea-ca --}}

            </div>{{-- /col-lg-8 --}}

            {{-- ═══════════════ SIDEBAR ═══════════════ --}}
            <div class="col-lg-4 d-none d-lg-block">
                @include('components.sidebar-informatii')
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script nonce="@nonce">
function toggleAn(header) {
    const body = header.nextElementSibling;
    const chevron = header.querySelector('.year-chevron');
    const icon = header.querySelector('.bi-calendar3');
    const isOpen = header.classList.contains('open');

    if (isOpen) {
        header.classList.remove('open');
        body.classList.remove('open');
        chevron.style.transform = '';
        chevron.style.color = '';
        icon.style.color = 'var(--aqua-primary)';
    } else {
        header.classList.add('open');
        body.classList.add('open');
        chevron.style.transform = 'rotate(180deg)';
        chevron.style.color = '#fff';
        icon.style.color = '#fff';
    }
}

function schimbTab(tab) {
    document.getElementById('sectiunea-aga').style.display = tab === 'aga' ? 'block' : 'none';
    document.getElementById('sectiunea-ca').style.display  = tab === 'ca'  ? 'block' : 'none';
    document.getElementById('tab-aga').classList.toggle('active', tab === 'aga');
    document.getElementById('tab-ca').classList.toggle('active', tab === 'ca');
    return false;
}
</script>
@endpush
