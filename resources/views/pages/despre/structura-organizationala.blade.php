@extends('layouts.app')

@section('title', 'Structură Organizațională')

@section('page_hero')
    <h1><i class="bi bi-diagram-3 me-2"></i> Structură Organizațională</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/despre') }}">Despre noi</a></li>
            <li class="breadcrumb-item active">Structură Organizațională</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    /* ── Conducere cards ── */
    .conducere-card {
        background: #fff;
        border: 1px solid var(--aqua-border);
        border-radius: 16px;
        padding: 2rem 1.25rem 1.5rem;
        text-align: center;
        height: 100%;
        position: relative;
        overflow: hidden;
        transition: transform 0.22s, box-shadow 0.22s;
    }
    .conducere-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: var(--card-accent, var(--aqua-primary));
        border-radius: 16px 16px 0 0;
    }
    .conducere-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0,119,182,0.13);
    }
    .conducere-avatar {
        width: 72px; height: 72px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.65rem;
        color: #fff;
        position: relative;
    }
    .conducere-avatar::after {
        content: '';
        position: absolute; inset: -4px;
        border-radius: 50%;
        border: 2px solid;
        border-color: inherit;
        opacity: 0.18;
    }
    .conducere-functie {
        font-size: 0.68rem;
        text-transform: uppercase;
        letter-spacing: 0.09em;
        color: #94a3b8;
        font-weight: 700;
        margin-bottom: 0.4rem;
    }
    .conducere-nume {
        font-weight: 800;
        font-size: 1rem;
        color: var(--aqua-dark);
        line-height: 1.25;
    }

    /* ── Organigrama cards ── */
    .org-card-primary {
        background: linear-gradient(135deg, #023e8a 0%, #0077b6 100%);
        border-radius: 14px;
        padding: 1.4rem 1.5rem;
        display: flex; align-items: center; gap: 1.25rem;
    }
    .org-card-secondary {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 1.2rem 1.5rem;
        display: flex; align-items: center; gap: 1.25rem;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .org-card-secondary:hover {
        border-color: #b0c8dd;
        box-shadow: 0 4px 14px rgba(0,60,120,0.07);
    }
    .org-icon-box {
        width: 48px; height: 48px; min-width: 48px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
    }
    .org-btn-primary {
        background: #fff;
        color: #023e8a;
        font-weight: 700;
        font-size: 0.8rem;
        padding: 0.55rem 1.1rem;
        border-radius: 8px;
        text-decoration: none;
        white-space: nowrap;
        flex-shrink: 0;
        transition: background 0.18s;
        display: inline-flex; align-items: center; gap: 5px;
    }
    .org-btn-primary:hover { background: #ddeeff; color: #012f70; }
    .org-btn-secondary {
        background: transparent;
        color: #64748b;
        font-weight: 700;
        font-size: 0.8rem;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        border: 1.5px solid #e2e8f0;
        text-decoration: none;
        white-space: nowrap;
        flex-shrink: 0;
        transition: all 0.18s;
        display: inline-flex; align-items: center; gap: 5px;
    }
    .org-btn-secondary:hover { border-color: #94a3b8; color: #374151; background: #f1f5f9; }

    /* ── Documente ── */
    .doc-row {
        display: flex; align-items: center; gap: 1rem;
        padding: 1rem 1.25rem;
        background: #fff;
        border: 1px solid var(--aqua-border);
        border-radius: 12px;
        text-decoration: none;
        transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
    }
    .doc-row:hover {
        box-shadow: 0 6px 20px rgba(0,119,182,0.1);
        transform: translateX(4px);
    }
    .doc-icon-box {
        width: 44px; height: 44px; min-width: 44px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem; color: #fff;
    }
    .doc-badge {
        font-size: 0.7rem; font-weight: 700;
        padding: 0.3rem 0.7rem;
        border-radius: 6px;
        white-space: nowrap;
        flex-shrink: 0;
        display: inline-flex; align-items: center; gap: 4px;
    }

    /* ── Sidebar ── */
    .sidebar-nav-card {
        background: #fff;
        border: 1px solid var(--aqua-border);
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 1.25rem;
    }
    .sidebar-nav-header {
        background: linear-gradient(90deg, #023e8a, #0077b6);
        padding: 0.9rem 1.2rem;
        font-weight: 800;
        color: #fff;
        font-size: 0.85rem;
        display: flex; align-items: center; gap: 8px;
    }
    .sidebar-nav-link {
        display: flex; align-items: center; gap: 10px;
        padding: 0.72rem 1.2rem;
        text-decoration: none;
        color: #374151;
        font-size: 0.855rem;
        font-weight: 600;
        border-left: 3px solid transparent;
        transition: all 0.15s;
    }
    .sidebar-nav-link:hover {
        background: var(--aqua-bg);
        border-left-color: var(--aqua-primary);
        color: var(--aqua-primary);
    }
    .sidebar-nav-link.active {
        background: var(--aqua-bg);
        border-left-color: var(--aqua-primary);
        color: var(--aqua-primary);
        font-weight: 700;
    }
    .sidebar-nav-link i { color: var(--aqua-primary); width: 16px; text-align: center; font-size: 0.9rem; }

    .sidebar-contact-card {
        background: linear-gradient(145deg, #012f70, #0077b6);
        border-radius: 14px;
        padding: 1.35rem;
        overflow: hidden;
        position: relative;
    }
    .sidebar-contact-card::before {
        content: '';
        position: absolute;
        top: -30px; right: -30px;
        width: 110px; height: 110px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
    }
    .sidebar-contact-title {
        font-weight: 800; color: #fff; font-size: 0.85rem;
        margin-bottom: 1rem;
        display: flex; align-items: center; gap: 7px;
    }
    .sidebar-contact-item {
        display: flex; align-items: center; gap: 10px;
        color: rgba(255,255,255,0.88);
        text-decoration: none;
        font-size: 0.835rem;
        margin-bottom: 0.75rem;
        transition: color 0.17s;
    }
    .sidebar-contact-item:last-child { margin-bottom: 0; }
    .sidebar-contact-item:hover { color: #fff; }
    .sidebar-contact-icon {
        width: 32px; height: 32px; min-width: 32px;
        background: rgba(255,255,255,0.13);
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.85rem; color: #fff;
    }
    .sidebar-contact-label {
        font-size: 0.65rem; color: rgba(255,255,255,0.55);
        text-transform: uppercase; letter-spacing: 0.06em;
        display: block; margin-bottom: 1px;
    }
    .sidebar-contact-value { font-weight: 700; font-size: 0.835rem; }

    /* Divider între secțiuni */
    .section-gap { margin-bottom: 2.5rem; }

    /* ── MOBILE ── */
    @media (max-width: 991.98px) {
        .col-lg-4 { order: 2; }
        .col-lg-8 { order: 1; }
        .sidebar-nav-card { display: none; }
        .sidebar-contact-card { padding: 1.1rem; border-radius: 12px; }
        .sidebar-contact-title { margin-bottom: 0.75rem; }
        .sidebar-contact-item { margin-bottom: 0.6rem; font-size: 0.82rem; }
        .section-gap { margin-bottom: 2rem; }

        /* Conducere: 3 coloane egale forțate pe orice ecran */
        .conducere-row > .col-md-4 {
            flex: 0 0 33.333% !important;
            max-width: 33.333% !important;
        }
        .conducere-card {
            padding: 1.1rem 0.6rem 1rem;
            border-radius: 12px;
        }
        .conducere-avatar {
            width: 48px; height: 48px;
            font-size: 1.15rem;
            margin-bottom: 0.6rem;
        }
        .conducere-functie { font-size: 0.58rem; letter-spacing: 0.06em; }
        .conducere-nume { font-size: 0.82rem; }
    }

    @media (max-width: 575.98px) {
        /* Organigrama: buton full-width pe xs */
        .org-card-primary, .org-card-secondary { flex-wrap: wrap; gap: 0.85rem; padding: 1rem; }
        .org-btn-primary, .org-btn-secondary { width: 100%; justify-content: center; }
        .org-icon-box { width: 40px; height: 40px; min-width: 40px; }

        /* Documente */
        .doc-row { flex-wrap: wrap; gap: 0.6rem; padding: 0.85rem 1rem; }
        .doc-badge { margin-left: auto; }

        /* Contact sidebar: lista simpla */
        .sidebar-contact-items-grid { display: flex; flex-direction: column; gap: 0; }
        .sidebar-contact-item { margin-bottom: 0.65rem; }
        .sidebar-contact-value { font-size: 0.82rem !important; word-break: break-all; }
    }
</style>
@endpush

@section('content')
<section style="padding: 2.5rem 0 4rem;">
    <div class="container">
        <div class="row g-4">

            {{-- ═══════════════════════════════
                 COLOANA PRINCIPALĂ (col-lg-8)
            ════════════════════════════════ --}}
            <div class="col-lg-8">

                {{-- ── CONDUCERE ── --}}
                <div class="section-gap">
                    <h2 class="section-title">Conducere</h2>
                    <div class="row g-3 conducere-row">
                        @php
                        $conducere = [
                            [
                                'functie' => 'Director General',
                                'nume'    => 'Valentin C. Ifrim',
                                'icon'    => 'bi-person-badge-fill',
                                'bg'      => 'linear-gradient(135deg,#023e8a,#0055a0)',
                                'accent'  => '#023e8a',
                                'cv'      => '/fisiere/cv-valentin-ifrim.pdf',
                            ],
                            [
                                'functie' => 'Director Economic',
                                'nume'    => 'Selda Georgiana Matei',
                                'icon'    => 'bi-graph-up-arrow',
                                'bg'      => 'linear-gradient(135deg,#0077b6,#0096c7)',
                                'accent'  => '#0077b6',
                                'cv'      => '/fisiere/cv-selda-matei.pdf',
                            ],
                            [
                                'functie' => 'Inginer Șef',
                                'nume'    => 'George Ilie',
                                'icon'    => 'bi-wrench-adjustable-circle',
                                'bg'      => 'linear-gradient(135deg,#0096c7,#00b4d8)',
                                'accent'  => '#0096c7',
                                'cv'      => '/fisiere/cv-george-ilie.pdf',
                            ],
                        ];
                        @endphp

                        @foreach($conducere as $p)
                        <div class="col-md-4">
                            <a href="{{ $p['cv'] }}" target="_blank" rel="noopener"
                               style="text-decoration:none;display:block;height:100%;">
                                <div class="conducere-card" style="--card-accent: {{ $p['accent'] }}; cursor:pointer;">
                                    <div class="conducere-avatar" style="background: {{ $p['bg'] }}; border-color: {{ $p['accent'] }};">
                                        <i class="bi {{ $p['icon'] }}"></i>
                                    </div>
                                    <div class="conducere-functie">{{ $p['functie'] }}</div>
                                    <div class="conducere-nume">{{ $p['nume'] }}</div>
                                    <div style="margin-top:0.75rem;font-size:0.72rem;color:var(--aqua-primary);font-weight:700;">
                                        <i class="bi bi-file-earmark-pdf me-1"></i>Vezi CV
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- ── ORGANIGRAMA ── --}}
                <div class="section-gap">
                    <h2 class="section-title">Organigrama</h2>
                    <p style="font-size:0.875rem;color:#64748b;margin-bottom:1.25rem;line-height:1.65;">
                        Ultima variantă a organigramei S.C. AQUASERV S.A. Puteți studia în acest document schema structurilor funcționale ale companiei.
                    </p>

                    {{-- Curentă --}}
                    <div class="org-card-primary mb-3">
                        <div class="org-icon-box" style="background:rgba(255,255,255,0.15);">
                            <i class="bi bi-file-earmark-pdf-fill text-white" style="font-size:1.4rem;"></i>
                        </div>
                        <div style="flex:1; min-width:0;">
                            <div style="font-size:0.65rem;color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:0.07em;font-weight:700;margin-bottom:0.25rem;">
                                Document curent
                            </div>
                            <div style="font-weight:800;color:#fff;font-size:0.9rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                ORGANIGRAMA nr.566 / 23.09.2025
                            </div>
                        </div>
                            <a href="asset('storage/documente/structura_organizationala/ORGANIGRAMA-nr.566_23.09.2025.pdf)"
                           target="_blank" class="org-btn-primary">
                            <i class="bi bi-download"></i> Descarcă
                        </a>
                    </div>

                    {{-- Anterioară --}}
                    <div class="org-card-secondary">
                        <div class="org-icon-box" style="background:#e2e8f0;">
                            <i class="bi bi-file-earmark-pdf" style="font-size:1.2rem;color:#94a3b8;"></i>
                        </div>
                        <div style="flex:1; min-width:0;">
                            <div style="font-size:0.65rem;color:#94a3b8;text-transform:uppercase;letter-spacing:0.07em;font-weight:700;margin-bottom:0.25rem;">
                                Versiune anterioară
                            </div>
                            <div style="font-weight:700;color:#64748b;font-size:0.875rem;">
                                Organigrama nr.429 / 14.07.2025
                            </div>
                        </div>
                        <a href="asset('storage/documente/structura_organizationala/Organigrama-nr.429-14.07.2025.pdf)"
                           target="_blank" class="org-btn-secondary">
                            <i class="bi bi-download"></i> Descarcă
                        </a>
                    </div>
                </div>

                {{-- ── DOCUMENTE STRATEGICE ── --}}
                <div>
                    <h2 class="section-title">Documente</h2>
                    <div class="d-flex flex-column gap-3">
                        @php
                        $documente = [
                            [
                                'titlu'   => 'Regulamentul serviciului de apă și canalizare',
                                'desc'    => 'Regulamentul complet al serviciilor de apă și canalizare',
                                'icon'    => 'bi-journal-text',
                                'culoare' => '#0077b6',
                                'hover'   => '#0077b6',
                                'url'     => asset('storage/documente/structura_organizationala/Regulamentul-serviciului-de-apa-si-canalizare-bun.pdf'),
                            ],
                            [
                                'titlu'   => 'Plan Management 2020–2024',
                                'desc'    => 'Planul de management al companiei pentru perioada 2020–2024',
                                'icon'    => 'bi-clipboard2-check',
                                'culoare' => '#0096c7',
                                'hover'   => '#0096c7',
                                'url'     => asset('storage/documente/structura_organizationala/PLAN-MANAGEMENT-2020-2024.pdf'),
                            ],
                            [
                                'titlu'   => 'Plan Administrare AQUASERV 2020–2024',
                                'desc'    => 'Planul de administrare al S.C. AQUASERV S.A. pentru perioada 2020–2024',
                                'icon'    => 'bi-building-gear',
                                'culoare' => '#00b4d8',
                                'hover'   => '#00b4d8',
                                'url'     => asset('storage/documente/structura_organizationala/PLAN-ADMINISTRARE-AQUASERV-2020-2024.pdf'),
                            ],
                        ];
                        @endphp

                        @foreach($documente as $doc)
                        <a href="{{ $doc['url'] }}" target="_blank"
                           class="doc-row"
                           style="--doc-color: {{ $doc['culoare'] }};"
                           onmouseover="this.style.borderColor='{{ $doc['hover'] }}40'"
                           onmouseout="this.style.borderColor=''">
                            <div class="doc-icon-box" style="background:{{ $doc['culoare'] }};">
                                <i class="bi {{ $doc['icon'] }}"></i>
                            </div>
                            <div style="flex:1; min-width:0;">
                                <div style="font-weight:700;font-size:0.875rem;color:var(--aqua-dark);margin-bottom:2px;">
                                    {{ $doc['titlu'] }}
                                </div>
                                <div style="font-size:0.75rem;color:#94a3b8;">{{ $doc['desc'] }}</div>
                            </div>
                            <span class="doc-badge" style="background:{{ $doc['culoare'] }}18;color:{{ $doc['culoare'] }};border:1px solid {{ $doc['culoare'] }}30;">
                                <i class="bi bi-file-earmark-pdf"></i> PDF
                            </span>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>{{-- /col-lg-8 --}}

            {{-- ═══════════════════════════════
                 SIDEBAR (col-lg-4)
            ════════════════════════════════ --}}
            <div class="col-lg-4">

                {{-- Navigare Despre noi --}}
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
                        <a href="{{ url('/despre/structura-organizationala') }}" class="sidebar-nav-link active">
                            <i class="bi bi-diagram-3"></i> Structură Organizațională
                        </a>
                    </div>
                </div>

                {{-- Contact rapid --}}
                <div class="sidebar-contact-card">
                    <div class="sidebar-contact-title">
                        <i class="bi bi-headset"></i> Contact rapid
                    </div>

                    <div class="sidebar-contact-items-grid">
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

            </div>{{-- /col-lg-4 --}}

        </div>{{-- /row --}}
    </div>{{-- /container --}}
</section>
@endsection