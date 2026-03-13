<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'AquaServ')) | Servicii Apă și Canal</title>
    <meta name="description" content="@yield('meta_description', 'Operator regional de servicii de alimentare cu apă și canalizare')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --aqua-primary:   #0077b6;
            --aqua-dark:      #023e8a;
            --aqua-light:     #90e0ef;
            --aqua-accent:    #00b4d8;
            --aqua-bg:        #f0f8ff;
            --aqua-text:      #1a1a2e;
            --aqua-gray:      #6c757d;
            --aqua-border:    #caf0f8;
        }
        * { box-sizing: border-box; }
        body { font-family: 'Nunito', sans-serif; color: var(--aqua-text); background-color: #ffffff; display: flex; flex-direction: column; min-height: 100vh; }
        main { flex: 1; }
        .topbar { background: var(--aqua-dark); color: rgba(255,255,255,0.85); font-size: 0.8rem; padding: 6px 0; }
        .topbar a { color: rgba(255,255,255,0.85); text-decoration: none; }
        .topbar a:hover { color: #fff; }
        .navbar { background: #ffffff; border-bottom: 3px solid var(--aqua-primary); box-shadow: 0 2px 12px rgba(0,119,182,0.10); padding: 0; }
        .navbar-brand img { height: 64px; }
        .navbar-brand span { font-family: 'Merriweather', serif; font-size: 1.3rem; font-weight: 700; color: var(--aqua-dark); line-height: 1.2; }
        .navbar-brand small { font-family: 'Nunito', sans-serif; font-size: 0.78rem; font-weight: 600; color: var(--aqua-gray); display: block; letter-spacing: 0.04em; text-transform: uppercase; }
        .navbar-nav .nav-link { font-weight: 700; font-size: 0.92rem; color: var(--aqua-text) !important; padding: 1.5rem 1.05rem !important; letter-spacing: 0.02em; transition: color 0.2s, border-bottom 0.2s; border-bottom: 3px solid transparent; text-transform: uppercase; }
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active { color: var(--aqua-primary) !important; border-bottom-color: var(--aqua-primary); }
        .navbar-nav .dropdown-menu { border: none; border-top: 3px solid var(--aqua-primary); box-shadow: 0 8px 24px rgba(0,0,0,0.12); border-radius: 0 0 8px 8px; margin-top: 0; }
        @media (min-width: 992px) {
            .navbar-nav .nav-item.dropdown .dropdown-menu {
                display: block !important;
                opacity: 0;
                visibility: hidden;
                transform: translateY(6px);
                pointer-events: none;
                transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
            }
            .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
                pointer-events: auto;
            }
        }
        .navbar-nav .dropdown-item { font-size: 0.875rem; font-weight: 600; padding: 0.55rem 1.2rem; color: var(--aqua-text); }
        .navbar-nav .dropdown-item:hover { background-color: var(--aqua-bg) !important; color: var(--aqua-primary) !important; }
        .page-hero { background: linear-gradient(135deg, var(--aqua-dark) 0%, var(--aqua-primary) 100%); color: #fff; padding: 3rem 0 2.5rem; position: relative; overflow: hidden; }
        .page-hero::before { content: ''; position: absolute; inset: 0; background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); opacity: 1; }
        .page-hero h1 { font-family: 'Merriweather', serif; font-size: 2rem; font-weight: 700; margin-bottom: 0.4rem; }
        .breadcrumb-item a { color: var(--aqua-light); }
        .breadcrumb-item.active { color: rgba(255,255,255,0.75); }
        .breadcrumb-item+.breadcrumb-item::before { color: rgba(255,255,255,0.5); }
        .card { border: 1px solid var(--aqua-border); border-radius: 12px; transition: transform 0.2s, box-shadow 0.2s; }
        .card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,119,182,0.12); }
        .card-header { background: linear-gradient(90deg, var(--aqua-dark), var(--aqua-primary)); color: #fff; border-radius: 11px 11px 0 0 !important; font-weight: 700; }
        .quick-access-card { text-align: center; padding: 1.8rem 1rem; border-radius: 14px; background: #fff; border: 1.5px solid var(--aqua-border); transition: all 0.25s; text-decoration: none; color: var(--aqua-text); display: block; }
        .quick-access-card:hover { background: var(--aqua-primary); border-color: var(--aqua-primary); color: #fff; transform: translateY(-4px); box-shadow: 0 10px 28px rgba(0,119,182,0.2); }
        .quick-access-card .icon-wrap { width: 64px; height: 64px; border-radius: 50%; background: var(--aqua-bg); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.8rem; color: var(--aqua-primary); transition: all 0.25s; }
        .quick-access-card:hover .icon-wrap { background: rgba(255,255,255,0.2); color: #fff; }
        .quick-access-card h6 { font-weight: 700; font-size: 0.9rem; margin: 0; }
        .news-item { border-left: 4px solid var(--aqua-primary); padding: 0.9rem 1rem; margin-bottom: 1rem; background: var(--aqua-bg); border-radius: 0 8px 8px 0; transition: border-color 0.2s; }
        .news-item:hover { border-left-color: var(--aqua-accent); }
        .news-item .date { font-size: 0.75rem; color: var(--aqua-gray); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; }
        .news-item h6 { font-weight: 700; margin: 0.2rem 0 0; font-size: 0.9rem; }
        .news-item h6 a { color: var(--aqua-text); text-decoration: none; }
        .news-item h6 a:hover { color: var(--aqua-primary); }
        footer { background: var(--aqua-dark); color: rgba(255,255,255,0.8); padding-top: 3rem; }
        footer h5 { font-family: 'Merriweather', serif; font-size: 1rem; color: #fff; border-bottom: 2px solid var(--aqua-accent); padding-bottom: 0.6rem; margin-bottom: 1.2rem; }
        footer ul { list-style: none; padding: 0; margin: 0; }
        footer ul li { margin-bottom: 0.45rem; }
        footer ul li a { color: rgba(255,255,255,0.75); text-decoration: none; font-size: 0.875rem; transition: color 0.2s; }
        footer ul li a:hover { color: var(--aqua-light); }
        footer ul li a i { margin-right: 6px; }
        .footer-bottom { background: rgba(0,0,0,0.25); padding: 1rem 0; margin-top: 2.5rem; font-size: 0.8rem; color: rgba(255,255,255,0.55); }
        .btn-aqua { background: var(--aqua-primary); color: #fff; border: none; font-weight: 700; border-radius: 8px; padding: 0.55rem 1.4rem; transition: background 0.2s, transform 0.15s; }
        .btn-aqua:hover { background: var(--aqua-dark); color: #fff; transform: translateY(-1px); }
        .btn-outline-aqua { border: 2px solid var(--aqua-primary); color: var(--aqua-primary); font-weight: 700; border-radius: 8px; padding: 0.5rem 1.4rem; background: transparent; transition: all 0.2s; }
        .btn-outline-aqua:hover { background: var(--aqua-primary); color: #fff; }
        .badge-aqua { background: var(--aqua-primary); color: #fff; font-weight: 700; border-radius: 6px; font-size: 0.72rem; padding: 0.3em 0.65em; }
        .alert-band { background: #fff3cd; border-left: 5px solid #ffc107; color: #664d03; padding: 0.7rem 1rem; font-size: 0.875rem; font-weight: 600; }
        .section-title { font-family: 'Merriweather', serif; font-size: 1.4rem; font-weight: 700; color: var(--aqua-dark); border-left: 4px solid var(--aqua-accent); padding-left: 0.75rem; margin-bottom: 1.5rem; }
        .text-aqua { color: var(--aqua-primary) !important; }
        .bg-aqua-light { background-color: var(--aqua-bg) !important; }
        @media (max-width: 991.98px) {
            .navbar-nav .nav-link { border-bottom: none; padding: 0.6rem 1rem !important; }
            .page-hero h1 { font-size: 1.5rem; }
        }
        /* Dropdown active — override Bootstrap, must be last */
        a.dropdown-item.active, a.dropdown-item:active,
        .dropdown-item.active, .dropdown-item:active {
            background-color: var(--aqua-bg) !important;
            color: var(--aqua-primary) !important;
            font-weight: 700 !important;
            border-left: 3px solid var(--aqua-primary) !important;
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- TOP BAR --}}
    <div class="topbar d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <i class="bi bi-telephone-fill me-1"></i>
                <a href="tel:0240524310">0240 524 310</a>
                <span class="mx-2">|</span>
                <i class="bi bi-envelope-fill me-1"></i>
                <a href="mailto:secretariat@aquaservtulcea.ro">secretariat@aquaservtulcea.ro</a>
                <span class="mx-2">|</span>
                <i class="bi bi-clock-fill me-1"></i> Lun–Vin: 07:30 – 16:00
            </div>
            <div>
                <a href="#" class="me-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="me-2"><i class="bi bi-youtube"></i></a>
                <span class="mx-2">|</span>
                <i class="bi bi-geo-alt-fill me-1"></i> Județul Tulcea
            </div>
        </div>
    </div>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ url('/') }}">
                <div style="width:60px;height:60px;background:linear-gradient(135deg,#0077b6,#00b4d8);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-droplet-half text-white" style="font-size:1.85rem;"></i>
                </div>
                <div>
                    <span>AquaServ Tulcea</span>
                    <small style="color:#00b4d8;font-size:0.7rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;">Servicii apă și canal</small>                 </div>
            </a>

            <button class="navbar-toggler border-0 d-lg-none" type="button" onclick="deschideMeniu()" style="padding:0.4rem 0.6rem;">
                <i class="bi bi-list" style="font-size:1.8rem;color:var(--aqua-primary);"></i>
            </button>

            {{-- DESKTOP menu --}}
            <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarMain">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Acasă</a>
                    </li>

                    {{-- Despre noi — dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('despre*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown">Despre noi</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item {{ request()->is('despre') && !request()->is('despre/*') ? 'active' : '' }}" href="{{ url('/despre') }}">
                                    <i class="bi bi-info-circle text-aqua me-2"></i>Despre noi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->is('despre/centre-operationale*') ? 'active' : '' }}"
                                   href="{{ url('/despre/centre-operationale') }}">
                                    <i class="bi bi-building text-aqua me-2"></i>Centre Operaționale
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->is('despre/structura-organizationala*') ? 'active' : '' }}"
                                   href="{{ url('/despre/structura-organizationala') }}">
                                    <i class="bi bi-diagram-3 text-aqua me-2"></i>Structură Organizațională
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('servicii*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown">Servicii</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->is('servicii/alimentare-apa*') ? 'active' : '' }}" href="{{ url('/servicii/alimentare-apa') }}">
                                <i class="bi bi-droplet text-aqua me-2"></i>Alimentare cu apă</a></li>
                            <li><a class="dropdown-item {{ request()->is('servicii/canalizare*') ? 'active' : '' }}" href="{{ url('/servicii/canalizare') }}">
                                <i class="bi bi-filter-circle text-aqua me-2"></i>Canalizare</a></li>
                            <li><a class="dropdown-item {{ request()->is('servicii/epurare*') ? 'active' : '' }}" href="{{ url('/servicii/epurare') }}">
                                <i class="bi bi-recycle text-aqua me-2"></i>Epurare ape uzate</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item {{ request()->is('servicii/avize*') ? 'active' : '' }}" href="{{ url('/servicii/avize') }}">
                                <i class="bi bi-file-earmark-check text-aqua me-2"></i>Avize și autorizații</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('informatii*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown">Informații publice</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->is('informatii/calitatea-apei*') ? 'active' : '' }}" href="{{ url('/informatii/calitatea-apei') }}">
                                <i class="bi bi-clipboard2-pulse text-aqua me-2"></i>Calitatea apei</a></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/tarife*') ? 'active' : '' }}" href="{{ url('/informatii/tarife') }}">
                                <i class="bi bi-cash-stack text-aqua me-2"></i>Tarife și Taxe</a></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/legislatie*') ? 'active' : '' }}" href="{{ url('/informatii/legislatie') }}">
                                <i class="bi bi-journal-text text-aqua me-2"></i>Legislație</a></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/formulare*') ? 'active' : '' }}" href="{{ url('/informatii/formulare') }}">
                                <i class="bi bi-file-earmark-text text-aqua me-2"></i>Formulare utile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item {{ request()->is('program-casierii*') ? 'active' : '' }}" href="{{ url('/program-casierii') }}">
                                <i class="bi bi-clock text-aqua me-2"></i>Program casierii</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('anunturi*') ? 'active' : '' }}" href="{{ url('/anunturi') }}">Anunțuri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gdpr*') ? 'active' : '' }}" href="{{ url('/gdpr') }}">GDPR</a>
                    </li>
                    <li class="nav-item ms-lg-2 d-flex align-items-center">
                        <a href="{{ url('https://my.aquaservtulcea.ro/') }}" class="btn btn-aqua btn-sm">
                            <i class="bi bi-person-circle me-1"></i> Cont MyApa
                        </a>
                    </li>
                </ul>
            </div>

            {{-- MOBIL: overlay drawer --}}
            <div id="mobileMenu" style="display:none;position:fixed;inset:0;z-index:2000;">
                <div onclick="inchideMeniu()" style="position:absolute;inset:0;background:rgba(2,62,138,0.5);backdrop-filter:blur(4px);"></div>
                <div id="mobileDrawer" style="position:absolute;top:0;right:0;width:85%;max-width:320px;height:100%;background:#fff;display:flex;flex-direction:column;transform:translateX(100%);transition:transform 0.3s cubic-bezier(0.4,0,0.2,1);box-shadow:-8px 0 40px rgba(0,0,0,0.15);">
                    <div style="padding:1.25rem 1.5rem;background:linear-gradient(135deg,#023e8a,#0077b6);display:flex;align-items:center;justify-content:space-between;">
                        <div style="display:flex;align-items:center;gap:0.75rem;">
                            <div style="width:36px;height:36px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-droplet-half text-white" style="font-size:1.1rem;"></i>
                            </div>
                            <div>
                                <div style="color:#fff;font-weight:800;font-size:0.95rem;line-height:1.1;">AquaServ S.A.</div>
                                <div style="color:rgba(255,255,255,0.7);font-size:0.68rem;text-transform:uppercase;letter-spacing:0.05em;">Servicii apă și canal</div>
                            </div>
                        </div>
                        <button onclick="inchideMeniu()" style="background:rgba(255,255,255,0.15);border:none;border-radius:50%;width:36px;height:36px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#fff;font-size:1.1rem;">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>

                    <div style="padding:1rem 1.25rem;background:#f0f8ff;border-bottom:1px solid #e2e8f0;display:flex;gap:0.75rem;">
                        <a href="{{ url('/client/index-contor') }}" style="flex:1;background:#0077b6;color:#fff;border-radius:10px;padding:0.8rem 0.5rem;text-decoration:none;text-align:center;font-size:0.8rem;font-weight:700;">
                            <i class="bi bi-speedometer2 d-block" style="font-size:1.3rem;margin-bottom:4px;"></i>Trimite Index
                        </a>
                        <a href="{{ url('https://my.aquaservtulcea.ro/') }}" style="flex:1;background:#023e8a;color:#fff;border-radius:10px;padding:0.8rem 0.5rem;text-decoration:none;text-align:center;font-size:0.8rem;font-weight:700;">
                            <i class="bi bi-person-circle d-block" style="font-size:1.3rem;margin-bottom:4px;"></i>Cont Myapa
                        </a>
                    </div>

                    <nav style="flex:1;overflow-y:auto;padding:0.75rem 0;">
                        <a href="{{ url('/') }}" style="display:flex;align-items:center;gap:1rem;padding:0.85rem 1.5rem;text-decoration:none;color:#1a1a2e;font-weight:700;font-size:0.9rem;border-left:3px solid {{ request()->is('/') ? '#0077b6' : 'transparent' }};background:{{ request()->is('/') ? '#f0f8ff' : 'transparent' }};">
                            <i class="bi bi-house" style="color:#0077b6;font-size:1.1rem;width:20px;text-align:center;"></i> Acasă
                        </a>

                        {{-- Despre noi expandabil --}}
                        <div>
                            <button onclick="toggleSubmeniu('subDespre')" style="width:100%;display:flex;align-items:center;gap:1rem;padding:0.85rem 1.5rem;background:transparent;border:none;border-left:3px solid {{ request()->is('despre*') ? '#0077b6' : 'transparent' }};color:#1a1a2e;font-weight:700;font-size:0.9rem;cursor:pointer;text-align:left;">
                                <i class="bi bi-info-circle" style="color:#0077b6;font-size:1.1rem;width:20px;text-align:center;"></i>
                                <span style="flex:1;">Despre noi</span>
                                <i class="bi bi-chevron-down" id="iconDespre" style="color:#0077b6;font-size:0.8rem;transition:transform 0.2s;"></i>
                            </button>
                            <div id="subDespre" style="display:none;background:#f8fafc;border-left:3px solid #caf0f8;">
                                <a href="{{ url('/despre') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-info-circle text-aqua"></i> Despre noi
                                </a>
                                <a href="{{ url('/despre/centre-operationale') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-building text-aqua"></i> Centre Operaționale
                                </a>
                                <a href="{{ url('/despre/structura-organizationala') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-diagram-3 text-aqua"></i> Structură Organizațională
                                </a>
                            </div>
                        </div>

                        {{-- Servicii expandabil --}}
                        <div>
                            <button onclick="toggleSubmeniu('subServicii')" style="width:100%;display:flex;align-items:center;gap:1rem;padding:0.85rem 1.5rem;background:transparent;border:none;border-left:3px solid {{ request()->is('servicii*') ? '#0077b6' : 'transparent' }};color:#1a1a2e;font-weight:700;font-size:0.9rem;cursor:pointer;text-align:left;">
                                <i class="bi bi-droplet" style="color:#0077b6;font-size:1.1rem;width:20px;text-align:center;"></i>
                                <span style="flex:1;">Servicii</span>
                                <i class="bi bi-chevron-down" id="iconServicii" style="color:#0077b6;font-size:0.8rem;transition:transform 0.2s;"></i>
                            </button>
                            <div id="subServicii" style="display:none;background:#f8fafc;border-left:3px solid #caf0f8;">
                                <a href="{{ url('/servicii/alimentare-apa') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-droplet text-aqua"></i> Alimentare cu apă
                                </a>
                                <a href="{{ url('/servicii/canalizare') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-filter-circle text-aqua"></i> Canalizare
                                </a>
                                <a href="{{ url('/servicii/epurare') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-recycle text-aqua"></i> Epurare ape uzate
                                </a>
                                <a href="{{ url('/servicii/avize') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-file-earmark-check text-aqua"></i> Avize și autorizații
                                </a>
                            </div>
                        </div>

                        {{-- Informatii expandabil --}}
                        <div>
                            <button onclick="toggleSubmeniu('subInfo')" style="width:100%;display:flex;align-items:center;gap:1rem;padding:0.85rem 1.5rem;background:transparent;border:none;border-left:3px solid {{ request()->is('informatii*') ? '#0077b6' : 'transparent' }};color:#1a1a2e;font-weight:700;font-size:0.9rem;cursor:pointer;text-align:left;">
                                <i class="bi bi-newspaper" style="color:#0077b6;font-size:1.1rem;width:20px;text-align:center;"></i>
                                <span style="flex:1;">Informații publice</span>
                                <i class="bi bi-chevron-down" id="iconInfo" style="color:#0077b6;font-size:0.8rem;transition:transform 0.2s;"></i>
                            </button>
                            <div id="subInfo" style="display:none;background:#f8fafc;border-left:3px solid #caf0f8;">
                                <a href="{{ url('/informatii/calitatea-apei') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-droplet-half text-aqua"></i> Calitatea apei
                                </a>
                                <a href="{{ url('/informatii/tarife') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-cash-coin text-aqua"></i> Tarife și Taxe
                                </a>
                                <a href="{{ url('/informatii/legislatie') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-journal-text text-aqua"></i> Legislație
                                </a>
                                <a href="{{ url('/informatii/formulare') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-file-earmark-arrow-down text-aqua"></i> Formulare utile
                                </a>
                                <a href="{{ url('/program-casierii') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-clock text-aqua"></i> Program casierii
                                </a>
                            </div>
                        </div>

                        <a href="{{ url('/anunturi') }}" style="display:flex;align-items:center;gap:1rem;padding:0.85rem 1.5rem;text-decoration:none;color:#1a1a2e;font-weight:700;font-size:0.9rem;border-left:3px solid {{ request()->is('anunturi*') ? '#0077b6' : 'transparent' }};background:{{ request()->is('anunturi*') ? '#f0f8ff' : 'transparent' }};">
                            <i class="bi bi-megaphone" style="color:#0077b6;font-size:1.1rem;width:20px;text-align:center;"></i> Anunțuri
                        </a>
                        <a href="{{ url('/contact') }}" style="display:flex;align-items:center;gap:1rem;padding:0.85rem 1.5rem;text-decoration:none;color:#1a1a2e;font-weight:700;font-size:0.9rem;border-left:3px solid {{ request()->is('contact*') ? '#0077b6' : 'transparent' }};background:{{ request()->is('contact*') ? '#f0f8ff' : 'transparent' }};">
                            <i class="bi bi-envelope" style="color:#0077b6;font-size:1.1rem;width:20px;text-align:center;"></i> Contact
                        </a>
                    </nav>

                    <div style="padding:1rem 1.5rem;border-top:1px solid #e2e8f0;background:#f8fafc;">
                        <div style="font-size:0.75rem;color:#6c757d;margin-bottom:0.3rem;">
                            <i class="bi bi-telephone-fill me-1" style="color:#0077b6;"></i> 0747022009
                            <span class="mx-2">·</span>
                            <i class="bi bi-alarm me-1" style="color:#0077b6;"></i> Avarii: 0747 022 009
                        </div>
                        <div style="font-size:0.72rem;color:#9ca3af;">Lun–Vin: 07:30–16:00</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @hasSection('alert_band')
        <div class="alert-band">
            <div class="container">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                @yield('alert_band')
            </div>
        </div>
    @endif

    @hasSection('page_hero')
        <section class="page-hero">
            <div class="container position-relative">
                @yield('page_hero')
            </div>
        </section>
    @endif

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h5>AquaServ S.A.</h5>
                    <p style="font-size:0.875rem;line-height:1.7;">
                        Operator regional de servicii de alimentare cu apă și canalizare,
                        dedicat calității și siguranței apei pentru comunitate.
                    </p>
                    <ul>
                        <li><a href="#"><i class="bi bi-geo-alt-fill"></i> Str. Rezervorului, nr. 2, Tulcea</a></li>
                        <li><a href="tel:0240511111"><i class="bi bi-telephone-fill"></i> 0240 524 310</a></li>
                        <li><a href="mailto:secretariat@aquaservtulcea.ro"><i class="bi bi-envelope-fill"></i> secretariat@aquaservtulcea.ro</a></li>
                        <li><a href="#"><i class="bi bi-clock-fill"></i> Lun–Vin: 07:30 – 16:00</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Link-uri rapide</h5>
                    <ul>
                        <li><a href="{{ url('/despre') }}">Despre noi</a></li>
                        <li><a href="{{ url('/despre/centre-operationale') }}">Centre Operaționale</a></li>
                        <li><a href="{{ url('/despre/structura-organizationala') }}">Structură Organizațională</a></li>
                        <li><a href="{{ url('/servicii') }}">Servicii</a></li>
                        <li><a href="{{ url('/anunturi') }}">Anunțuri</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                        <li><a href="{{ url('/gdpr') }}">GDPR</a></li>
                        <li><a href="{{ url('/sitemap') }}">Hartă site</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Zona clienți</h5>
                    <ul>
                        <li><a href="{{ url('/client/factura') }}"><i class="bi bi-credit-card"></i> Plătește factura</a></li>
                        <li><a href="{{ url('/client/index-contor') }}"><i class="bi bi-speedometer2"></i> Transmite index contor</a></li>
                        <li><a href="{{ url('/client/avarie') }}"><i class="bi bi-exclamation-triangle"></i> Raportează avarie</a></li>
                        <li><a href="{{ url('/client/contract') }}"><i class="bi bi-file-text"></i> Contract nou</a></li>
                        <li><a href="{{ url('/informatii/formulare') }}"><i class="bi bi-download"></i> Formulare</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Program casierii</h5>
                    <p style="font-size:0.875rem;margin-bottom:0.6rem;">
                        <strong style="color:#fff;">Tulcea – Sediu central</strong><br>
                        Lun–Vin: 07:30 – 17:00
                    </p>
                    <a href="{{ url('/program-casierii') }}"
                       style="display:inline-flex;align-items:center;gap:0.4rem;font-size:0.8rem;color:rgba(255,255,255,0.75);text-decoration:none;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.2);border-radius:6px;padding:0.35rem 0.8rem;margin-bottom:1rem;transition:all 0.2s;"
                       onmouseover="this.style.background='rgba(255,255,255,0.15)';this.style.color='#fff'"
                       onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='rgba(255,255,255,0.75)'">
                        <i class="bi bi-clock" style="color:var(--aqua-light);"></i> Program Casierii Județ
                    </a>
                    <p style="font-size:0.875rem;margin-bottom:0;">
                        <strong style="color:#fff;">Telecitire</strong><br>
                        <span style="font-size:1.1rem;color:var(--aqua-light);">
                            <i class="bi bi-telephone-fill"></i> 0747 022 009
                        </span>
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="btn btn-sm btn-outline-light"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-light"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-light"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
                <span>&copy; {{ date('Y') }} AquaServ S.A. Toate drepturile rezervate.</span>
                <span>
                    <a href="{{ url('/gdpr') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;margin-right:1rem;">Politică confidențialitate</a>
                    <a href="{{ url('/cookies') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;">Cookies</a>
                </span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    <script>
    function deschideMeniu() {
        const menu = document.getElementById('mobileMenu');
        const drawer = document.getElementById('mobileDrawer');
        menu.style.display = 'block';
        document.body.style.overflow = 'hidden';
        setTimeout(() => { drawer.style.transform = 'translateX(0)'; }, 10);
    }
    function inchideMeniu() {
        const menu = document.getElementById('mobileMenu');
        const drawer = document.getElementById('mobileDrawer');
        drawer.style.transform = 'translateX(100%)';
        document.body.style.overflow = '';
        setTimeout(() => { menu.style.display = 'none'; }, 300);
    }
    function toggleSubmeniu(id) {
        const iconMap = {
            'subServicii': 'iconServicii',
            'subInfo':     'iconInfo',
            'subDespre':   'iconDespre',
        };
        const sub    = document.getElementById(id);
        const icon   = document.getElementById(iconMap[id]);
        const isOpen = sub.style.display === 'block';
        sub.style.display    = isOpen ? 'none' : 'block';
        icon.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
    }
    </script>
    @include('components.cookie-banner')
</body>
</html>