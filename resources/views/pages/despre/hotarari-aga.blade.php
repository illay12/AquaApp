@extends('layouts.app')

@section('title', 'Hotărâri AGA — AquaServ Tulcea')

@section('page_hero')
    <h1><i class="bi bi-people me-2"></i> Hotărâri AGA</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/despre') }}">Despre noi</a></li>
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

    /* ── Sidebar ── */
    .sidebar-nav-card { background: #fff; border: 1px solid var(--aqua-border); border-radius: 14px; overflow: hidden; margin-bottom: 1.25rem; }
    .sidebar-nav-header { background: linear-gradient(90deg, #023e8a, #0077b6); padding: 0.9rem 1.2rem; font-weight: 800; color: #fff; font-size: 0.85rem; display: flex; align-items: center; gap: 8px; }
    .sidebar-nav-link { display: flex; align-items: center; gap: 10px; padding: 0.72rem 1.2rem; text-decoration: none; color: #374151; font-size: 0.855rem; font-weight: 600; border-left: 3px solid transparent; transition: all 0.15s; }
    .sidebar-nav-link:hover { background: var(--aqua-bg); border-left-color: var(--aqua-primary); color: var(--aqua-primary); }
    .sidebar-nav-link.active { background: var(--aqua-bg); border-left-color: var(--aqua-primary); color: var(--aqua-primary); font-weight: 700; }
    .sidebar-nav-link i { color: var(--aqua-primary); width: 16px; text-align: center; font-size: 0.9rem; }

    .sidebar-contact-card { background: linear-gradient(145deg, #012f70, #0077b6); border-radius: 14px; padding: 1.35rem; overflow: hidden; position: relative; }
    .sidebar-contact-card::before { content: ''; position: absolute; top: -30px; right: -30px; width: 110px; height: 110px; border-radius: 50%; background: rgba(255,255,255,0.05); }
    .sidebar-contact-title { font-weight: 800; color: #fff; font-size: 0.85rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 7px; }
    .sidebar-contact-item { display: flex; align-items: center; gap: 10px; color: rgba(255,255,255,0.88); text-decoration: none; font-size: 0.835rem; margin-bottom: 0.75rem; transition: color 0.17s; }
    .sidebar-contact-item:last-child { margin-bottom: 0; }
    .sidebar-contact-item:hover { color: #fff; }
    .sidebar-contact-icon { width: 32px; height: 32px; min-width: 32px; background: rgba(255,255,255,0.13); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; color: #fff; }
    .sidebar-contact-label { font-size: 0.65rem; color: rgba(255,255,255,0.55); text-transform: uppercase; letter-spacing: 0.06em; display: block; margin-bottom: 1px; }
    .sidebar-contact-value { font-weight: 700; font-size: 0.835rem; }

    /* ── Mobile ── */
    @media (max-width: 991.98px) {
        .sidebar-nav-card { display: none; }
        .aga-tabs { gap: 0.4rem; }
        .aga-tab { padding: 0.5rem 1rem; font-size: 0.82rem; }
    }
    @media (max-width: 575.98px) {
        .doc-item { gap: 0.65rem; padding: 0.7rem 1rem; }
        .doc-pdf-badge { display: none; }
        .year-header { padding: 0.8rem 1rem; }
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
                        <i class="bi bi-people-fill"></i> Hotărâri AGA
                    </a>
                    <a href="#sectiunea-ca" onclick="schimbTab('ca')" id="tab-ca" class="aga-tab">
                        <i class="bi bi-briefcase-fill"></i> Raportări Consiliu Administrație
                    </a>
                </div>

                {{-- ════ SECȚIUNEA AGA ════ --}}
                <div id="sectiunea-aga">
                    @php
                    $aga = [
                        '2025' => [
                            ['Hotarari-AGA-08.12.2025.pdf',          'Hotărâri AGA din 08.12.2025'],
                            ['Hotarare-AGA-nr.11-din-23.10.2025.pdf','Hotărârea AGA nr.11 din 23.10.2025'],
                            ['Hotararea-nr.10-05.09.2025.pdf',       'Hotărârea AGA nr.10 din 05.09.2025'],
                            ['Hotararea-nr.9-14.08.2025-1.pdf',      'Hotărârea AGA nr.9 din 14.08.2025'],
                            ['hotarare-aga-nr-8-din-04.06.2025.pdf', 'Hotărârea AGA nr.8 din 04.06.2025'],
                            ['hotarare-aga-nr.5-din-21.03.2025.pdf', 'Hotărârea AGA nr.5 din 21.03.2025'],
                            ['Hotarare-AGA-28.02.2025.pdf',          'Hotărâre AGA din 28.02.2025'],
                            ['hotarari-aga-11.02.2025.pdf',          'Hotărâri AGA din 11.02.2025'],
                            ['HOT.-AGA-APROBARE-SIT.-FINANCIARE-2024.pdf', 'Hotărâre AGA – Aprobare situații financiare 2024'],
                        ],
                        '2024' => [
                            ['HOTARARI-AGA-30.12.2024.pdf',                       'Hotărâri AGA din 30.12.2024'],
                            ['Hotarari-AGA-16.12.2024.pdf',                       'Hotărâri AGA din 16.12.2024'],
                            ['Hotararea-AGA-nr.-10-14.08.2024.pdf',               'Hotărârea AGA nr.10 din 14.08.2024'],
                            ['Hotarare-AGA-02.08.2024.pdf',                       'Hotărâre AGA din 02.08.2024'],
                            ['Hotararea-AGA-nr.-6-10.06.2024.pdf',                'Hotărârea AGA nr.6 din 10.06.2024'],
                            ['hotarare-AGA-15-04-2024.pdf',                       'Hotărâre AGA din 15.04.2024'],
                            ['AGA-01-MAR-2024.pdf',                               'Hotărâri AGA din 01.03.2024'],
                            ['aga-01.02.2024.pdf',                                'Hotărâri AGA din 01.02.2024'],
                            ['HOTARARE-AGA-APROBARE-RAPOARTE-2024.pdf',           'Hotărâre AGA – Aprobare rapoarte 2024'],
                            ['HOTARARE-AGA-APROBARE-SITUATII-FINANCIARE-2024.pdf','Hotărâre AGA – Aprobare situații financiare 2024'],
                        ],
                        '2023' => [
                            ['SKM_28723122720220.pdf',                         'Hotărâri AGA din 27.12.2023'],
                            ['Hotarare-AGA-ADI-116-08.12.2023.pdf',            'Hotărâre AGA – ADI nr.116 din 08.12.2023'],
                            ['hotarari-sedinta-aga-09-10-2023.pdf',            'Hotărâri AGA – Ședință 09.10.2023'],
                            ['HAGA-14-1501102023.pdf',                         'Hotărârea AGA nr.14 din 15.10.2023'],
                            ['Hotarari-AGA-sedinta-17-08-2023.pdf',            'Hotărâri AGA – Ședință 17.08.2023'],
                            ['aga-26-mai-2023.pdf',                            'Hotărâri AGA din 26.05.2023'],
                            ['AGA-3-2023.pdf',                                 'Hotărârea AGA nr.3/2023'],
                            ['AGA-2-2023.pdf',                                 'Hotărârea AGA nr.2/2023'],
                            ['AGA-1-2023.pdf',                                 'Hotărârea AGA nr.1/2023'],
                            ['HOTARARE-AGA-APROBARE-RAPOARTE-2023.pdf',        'Hotărâre AGA – Aprobare rapoarte 2023'],
                            ['HOTARARE-AGA-APROBARE-SITUATII-FINANCIARE-2023.pdf','Hotărâre AGA – Aprobare situații financiare 2023'],
                        ],
                        '2022' => [
                            ['Hotararea-AGA-nr-6-2022.pdf',          'Hotărârea AGA nr.6/2022'],
                            ['Hotararea-AGA-nr-5-2022.pdf',          'Hotărârea AGA nr.5/2022'],
                            ['1725605578741_AGA-numire-ropas-.pdf',  'Hotărâre AGA – Numire ROPAS'],
                        ],
                        '2021' => [
                            ['HOTARARE-AGA-12.10.2021.pdf',          'Hotărâre AGA din 12.10.2021'],
                            ['AGA-12-08-2021.pdf',                   'Hotărâri AGA din 12.08.2021'],
                            ['Hotararea-AGA-nr-9-din-26.05.2021.pdf','Hotărârea AGA nr.9 din 26.05.2021'],
                            ['Hotararea-AGA-nr-8-din-26.05.2021.pdf','Hotărârea AGA nr.8 din 26.05.2021'],
                            ['hotararea-7.pdf', 'Hotărârea AGA nr.7'],
                            ['hotararea-6.pdf', 'Hotărârea AGA nr.6'],
                            ['hotararea-5.pdf', 'Hotărârea AGA nr.5'],
                            ['hotararea-4.pdf', 'Hotărârea AGA nr.4'],
                            ['hotararea-3.pdf', 'Hotărârea AGA nr.3'],
                            ['hotararea-2.pdf', 'Hotărârea AGA nr.2'],
                            ['hotararea-1.pdf', 'Hotărârea AGA nr.1'],
                        ],
                        '2020' => [
                            ['HOTARARE-A.G.A.-22.09.2020.pdf',         'Hotărâre AGA din 22.09.2020'],
                            ['Hotararea-A.G.A.-nr-9-din-29.06.2020.pdf','Hotărârea AGA nr.9 din 29.06.2020'],
                            ['HOTARAREA-AGA-20.04.2020.pdf',            'Hotărârea AGA din 20.04.2020'],
                            ['Xerox-Scan_05032020145603.pdf',            'Hotărâre AGA din 05.03.2020'],
                            ['HCL-39-aprobare-BVC-2020.pdf',            'HCL nr.39 – Aprobare BVC 2020'],
                            ['BVC-2020.pdf',                            'Buget de Venituri și Cheltuieli 2020'],
                        ],
                        '2019' => [
                            ['Hotararea-adunarii-generale-a-actionarilor-din-29.03.2019.pdf','Hotărârea AGA din 29.03.2019'],
                            ['Hotarari-AGA-2019.pdf',                   'Hotărâri AGA 2019'],
                        ],
                        '2018' => [
                            ['Hot-AGA-2018.pdf', 'Hotărâri AGA 2018'],
                        ],
                        '2017' => [
                            ['Hot-AGA-2017.pdf', 'Hotărâri AGA 2017'],
                        ],
                    ];
                    @endphp

                    @foreach($aga as $an => $fisiere)
                    <div class="year-accordion">
                        <div class="year-header {{ $loop->first ? 'open' : '' }}"
                             onclick="toggleAn(this)">
                            <div class="year-label">
                                <i class="bi bi-calendar3" style="color:{{ $loop->first ? '#fff' : 'var(--aqua-primary)' }};"></i>
                                {{ $an }}
                                <span class="year-badge">{{ count($fisiere) }} documente</span>
                            </div>
                            <i class="bi bi-chevron-down year-chevron {{ $loop->first ? '' : '' }}"
                               style="{{ $loop->first ? 'transform:rotate(180deg);color:#fff;' : '' }}"></i>
                        </div>
                        <div class="year-body {{ $loop->first ? 'open' : '' }}">
                            @foreach($fisiere as [$fisier, $titlu])
                            <a href="{{ asset('storage/documente/aga/' . $an . '/' . $fisier) }}"
                               target="_blank" class="doc-item">
                                <div class="doc-icon" style="background:#dc3545;">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </div>
                                <span class="doc-title">{{ $titlu }}</span>
                                <span class="doc-pdf-badge"><i class="bi bi-download"></i> PDF</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>{{-- /sectiunea-aga --}}

                {{-- ════ SECȚIUNEA RAPORTĂRI CA ════ --}}
                <div id="sectiunea-ca" style="display:none;">
                    @php
                    $ca = [
                        '2024' => [
                            ['RAPORT-DE-GESTIUNE-AL-CONSILIULUI-DE-ADMINISTRATIE-AN-2024.pdf', 'Raport de gestiune al CA pentru anul 2024'],
                            ['RAPORTUL-AUDITORULUI-INDEPENDENT-AN-2024.pdf',                  'Raportul auditorului independent 2024'],
                            ['RAPORT-DE-ACTIVITATE-AL-COMITETULUI-DE-AUDIT-PENTRU-ANUL-2024.pdf','Raport de activitate al Comitetului de Audit 2024'],
                            ['RAPORT-CNR-AN-2024.pdf',                                        'Raport CNR 2024'],
                            ['RAPORT-EVALUARE-CA-2024.pdf',                                   'Raport evaluare CA 2024'],
                            ['RAPORT-EVALUARE-DIRECTORI-2024.pdf',                            'Raport evaluare directori 2024'],
                        ],
                        '2023' => [
                            ['RAPORT-GESTIUNE-CONSILIU-ADMINISTRATIE-2023.pdf','Raport gestiune Consiliu Administrație 2023'],
                            ['RAPORT-AUDITOR-INDEPENDENT-2023.pdf',            'Raport auditor independent 2023'],
                            ['RAPORT-COMITET-AUDIT-2023.pdf',                  'Raport Comitet Audit 2023'],
                            ['RAPORT-CNR-2023.pdf',                            'Raport CNR 2023'],
                        ],
                        '2022' => [
                            ['RAPORTUL-CNR-AN-2022.pdf', 'Raportul CNR pentru anul 2022'],
                        ],
                        '2021' => [
                            ['Raportul-CNR-pentru-anul-2021-.pdf',         'Raportul CNR pentru anul 2021'],
                            ['Raportul-Comitetului-de-Audit-la-31.12.2021.pdf','Raportul Comitetului de Audit la 31.12.2021'],
                        ],
                        '2020' => [
                            ['RAPORT-AL-CONSILIULUI-DE-ADMINISTRATIE-LA-31.12.2020.pdf',                       'Raport al CA la 31.12.2020'],
                            ['RAPORT-DE-ACTIVITATE-AL-COMITETULUI-DE-AUDIT-LA-31.12.2020.pdf',                 'Raport de activitate al Comitetului de Audit la 31.12.2020'],
                            ['RAPORTUL-ANUAL-2020-AL-COMITETULUI-DE-NOMINALIZARE-SI-REMUNERARE.pdf',           'Raportul anual 2020 al CNR'],
                            ['RAPORTUL-AUDITORULUI-STATUTAR-ASUPRA-SITUATIILOR-FINANCIARE-LA-31.12.2020.pdf',  'Raportul auditorului statutar la 31.12.2020'],
                        ],
                        '2019' => [
                            ['Raportul-de-activitate-al-Consiliului-de-Administratie-pentru-perioada-ian.2019-iun.2020.pdf','Raport activitate CA ian.2019 – iun.2020'],
                            ['Raportul-de-gestiune-al-Consiliului-de-Administratie-pe-anul-2019.pdf',                        'Raport de gestiune al CA pe anul 2019'],
                        ],
                        '2018' => [
                            ['Raport-de-gestiune-al-consiliului-de-administratie-2018.pdf','Raport de gestiune al CA 2018'],
                            ['Raport-activitate-CA.pdf',                                   'Raport activitate CA 2018'],
                            ['Raport-anual-2018.pdf',                                      'Raport anual 2018'],
                        ],
                        '2017' => [
                            ['Rapoarte-C.ACNOM-2017.pdf', 'Rapoarte C.A / C.NOM 2017'],
                        ],
                        '2016' => [
                            ['Rapoarte-C.ACNOM-2016.pdf', 'Rapoarte C.A / C.NOM 2016'],
                        ],
                    ];
                    @endphp

                    @foreach($ca as $an => $fisiere)
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
                            @foreach($fisiere as [$fisier, $titlu])
                            <a href="{{ asset('storage/documente/raportari ca/' . $an . '/' . $fisier) }}"
                               target="_blank" class="doc-item">
                                <div class="doc-icon" style="background:#0077b6;">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </div>
                                <span class="doc-title">{{ $titlu }}</span>
                                <span class="doc-pdf-badge"><i class="bi bi-download"></i> PDF</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>{{-- /sectiunea-ca --}}

            </div>{{-- /col-lg-8 --}}

            {{-- ═══════════════ SIDEBAR ═══════════════ --}}
            <div class="col-lg-4">
                <div class="sidebar-nav-card">
                    <div class="sidebar-nav-header">
                        <i class="bi bi-info-circle"></i> Despre noi
                    </div>
                    <div style="padding: 0.4rem 0;">
                        <a href="{{ url('/despre') }}" class="sidebar-nav-link">
                            <i class="bi bi-info-circle"></i> Despre noi
                        </a>
                        <a href="{{ url('/despre/centre-operationale') }}" class="sidebar-nav-link">
                            <i class="bi bi-building"></i> Centre Operaționale
                        </a>
                        <a href="{{ url('/despre/structura-organizationala') }}" class="sidebar-nav-link">
                            <i class="bi bi-diagram-3"></i> Structură Organizațională
                        </a>
                        <a href="{{ url('/despre/hotarari-aga') }}" class="sidebar-nav-link active">
                            <i class="bi bi-people"></i> Hotărâri AGA
                        </a>
                    </div>
                </div>

                <div class="sidebar-contact-card">
                    <div class="sidebar-contact-title">
                        <i class="bi bi-headset"></i> Contact rapid
                    </div>
                    <a href="tel:0240524310" class="sidebar-contact-item">
                        <div class="sidebar-contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div>
                            <span class="sidebar-contact-label">Secretariat</span>
                            <span class="sidebar-contact-value">0240 524 310</span>
                        </div>
                    </a>
                    <a href="tel:0747022009" class="sidebar-contact-item">
                        <div class="sidebar-contact-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
                        <div>
                            <span class="sidebar-contact-label">Dispecerat avarii</span>
                            <span class="sidebar-contact-value">0747 022 009</span>
                        </div>
                    </a>
                    <a href="mailto:secretariat@aquaservtulcea.ro" class="sidebar-contact-item">
                        <div class="sidebar-contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <span class="sidebar-contact-label">Email</span>
                            <span class="sidebar-contact-value" style="font-size:0.75rem;">secretariat@aquaservtulcea.ro</span>
                        </div>
                    </a>
                    <div class="sidebar-contact-item">
                        <div class="sidebar-contact-icon"><i class="bi bi-clock-fill"></i></div>
                        <div>
                            <span class="sidebar-contact-label">Program</span>
                            <span class="sidebar-contact-value">Lun–Vin: 08:00–16:30</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
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
