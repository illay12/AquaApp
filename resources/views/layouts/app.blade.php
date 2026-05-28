<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Aquaserv')) | Servicii Apă și Canal</title>
    <meta name="description" content="@yield('meta_description', 'Operator regional de servicii de alimentare cu apă și canalizare')">

    {{-- Open Graph --}}
    <meta property="og:type"        content="website">
    <meta property="og:site_name"   content="Aquaserv Tulcea">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:title"       content="@yield('og_title', config('app.name') . ' | Servicii Apă și Canal')">
    <meta property="og:description" content="@yield('og_description', 'Operator regional de servicii de alimentare cu apă și canalizare în județul Tulcea.')">
    <meta property="og:image"       content="@yield('og_image', asset('og-image.png'))">
    <meta name="twitter:card"       content="summary_large_image">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

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
        * { box-sizing: border-box; }l,
        body { font-family: 'Nunito', sans-serif; font-size: 17px; color: var(--aqua-text); background-color: #ffffff; display: flex; flex-direction: column; min-height: 100vh; }
        main { flex: 1; }
        p { font-size: 1.05rem; line-height: 1.75; }
        .topbar { background: var(--aqua-dark); color: rgba(255,255,255,0.85); font-size: 0.8rem; padding: 6px 0; }
        .topbar a { color: rgba(255,255,255,0.85); text-decoration: none; }
        .topbar a:hover { color: #fff; }
        .navbar { background: #ffffff; border-bottom: 3px solid var(--aqua-primary); box-shadow: 0 2px 12px rgba(0,119,182,0.10); padding: 0; z-index: 1030; }
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
        .quick-access-card h6 { font-weight: 700; font-size: 0.9rem; margin: 0; min-height: 2.5em; display: flex; align-items: center; justify-content: center; }
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
        .footer-casierii-link:hover { background: rgba(255,255,255,0.15) !important; color: #fff !important; }
        .btn-aqua { background: var(--aqua-primary); color: #fff !important; border: none; font-weight: 700 !important; font-size: 0.875rem !important; font-family: 'Nunito', sans-serif !important; text-transform: none !important; letter-spacing: normal !important; white-space: nowrap !important; border-radius: 8px; padding: 0.5rem 1.1rem !important; transition: background 0.2s, transform 0.15s; }
        .btn-aqua:hover { background: var(--aqua-dark); color: #fff; transform: translateY(-1px); }
        .btn-outline-aqua { border: 2px solid var(--aqua-primary); color: var(--aqua-primary); font-weight: 700; border-radius: 8px; padding: 0.5rem 1.4rem; background: transparent; transition: all 0.2s; }
        .btn-outline-aqua:hover { background: var(--aqua-primary); color: #fff; }
        .badge-aqua { background: var(--aqua-primary); color: #fff; font-weight: 700; border-radius: 6px; font-size: 0.72rem; padding: 0.3em 0.65em; }
        .alert-band { background: #fff3cd; border-left: 5px solid #ffc107; color: #664d03; padding: 0.7rem 1rem; font-size: 0.875rem; font-weight: 600; }
        .section-title { font-family: 'Merriweather', serif; font-size: 1.4rem; font-weight: 700; color: var(--aqua-dark); border-left: 4px solid var(--aqua-accent); padding-left: 0.75rem; margin-bottom: 1.5rem; }
        .text-aqua { color: var(--aqua-primary) !important; }
        .bg-aqua-light { background-color: var(--aqua-bg) !important; }
        /* Nav padding consistent — toate lățimile desktop */
        @media (min-width: 1200px) {
            .navbar-nav .nav-link { padding: 1.5rem 0.7rem !important; }
        }
        @media (min-width: 1200px) and (max-width: 1399px) {
            .navbar-nav .nav-link { padding: 1.5rem 0.6rem !important; }
            .navbar-brand span { font-size: 1.1rem; }
        }
        @media (min-width: 1200px) and (max-width: 1280px) {
            .navbar-nav .nav-link { font-size: 0.78rem !important; padding: 1.5rem 0.45rem !important; }
            .navbar-brand span { font-size: 1rem; }
            .navbar-brand small { font-size: 0.65rem; }
        }
        @media (max-width: 1199.98px) {
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
        /* Nested submenu */
        .dropdown-submenu { position: relative; }
        .dropdown-submenu .dropdown-menu {
            top: 0; left: 100%; margin-top: -3px;
            display: block !important;
            opacity: 0 !important; visibility: hidden !important;
            transform: translateX(6px);
            pointer-events: none !important;
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
        }
        .dropdown-submenu:hover .dropdown-menu {
            opacity: 1 !important; visibility: visible !important;
            transform: translateX(0);
            pointer-events: auto !important;
        }
        .dropdown-submenu > .dropdown-item::after {
            content: ''; display: inline-block;
            border-top: 4px solid transparent;
            border-bottom: 4px solid transparent;
            border-left: 4px solid currentColor;
            margin-left: auto; float: right; margin-top: 4px;
        }
    </style>

    @stack('styles')

    @if(env('GOOGLE_ANALYTICS_ID'))
    <script nonce="@nonce">
        window._GA_ID = '{{ env('GOOGLE_ANALYTICS_ID') }}';
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        @if(request()->cookie('cookie_consent') === 'accepted')
        (function() {
            var s = document.createElement('script');
            s.async = true;
            s.src = 'https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS_ID') }}';
            document.head.appendChild(s);
        })();
        gtag('config', '{{ env('GOOGLE_ANALYTICS_ID') }}');
        @endif
    </script>
    @endif
</head>
<body>

    {{-- BANNER SITE NOU --}}
    <div id="bannerSiteNou" style="display:none;background:linear-gradient(90deg,#023e8a,#0077b6);color:#fff;position:relative;z-index:1050;">
        <div style="padding:0.6rem 1rem;max-width:1320px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:0.75rem;">
            <div style="display:flex;align-items:center;gap:0.6rem;flex:1;min-width:0;">
                <i class="bi bi-stars" style="font-size:1rem;color:#90e0ef;flex-shrink:0;"></i>
                <span style="font-size:0.82rem;line-height:1.4;">
                    <strong>Acesta este noul site Aquaserv Tulcea.</strong>
                    Pentru informații care nu se regăsesc încă aici, accesați
                    <a href="https://old.aquaservtulcea.ro" target="_blank" rel="noopener"
                       style="color:#90e0ef;font-weight:700;text-decoration:underline;white-space:nowrap;">
                        old.aquaservtulcea.ro <i class="bi bi-box-arrow-up-right" style="font-size:0.7rem;"></i>
                    </a>
                </span>
            </div>
            <button id="btnInchideBanner"
                    style="background:rgba(255,255,255,0.15);border:none;border-radius:6px;padding:0.35rem 0.65rem;color:#fff;font-size:0.8rem;font-weight:700;cursor:pointer;flex-shrink:0;white-space:nowrap;transition:background 0.2s;line-height:1;">
                <span class="d-none d-sm-inline">Am înțeles </span><i class="bi bi-x-lg" style="font-size:0.75rem;"></i>
            </button>
        </div>
    </div>

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
                <a href="https://www.facebook.com/AquaservTulcea/" class="me-2"><i class="bi bi-facebook"></i></a>
                <span class="mx-2">|</span>
                <a href="https://maps.app.goo.gl/jDibWxXwgdk4kuQr5" target="_blank" rel="noopener" style="color:inherit;text-decoration:none;">
                    <i class="bi bi-geo-alt-fill me-1"></i> Județul Tulcea
                </a>
            </div>
        </div>
    </div>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-xl sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ url('/') }}">
                <div style="width:60px;height:60px;background:linear-gradient(135deg,#0077b6,#00b4d8);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-droplet-half text-white" style="font-size:1.85rem;"></i>
                </div>
                <div>
                    <span>Aquaserv Tulcea</span>
                    <small style="color:#00b4d8;font-size:0.7rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;">Servicii apă și canal</small>                 </div>
            </a>

            <button class="navbar-toggler border-0 d-xl-none" type="button" id="btnDeschideMeniu" style="padding:0.4rem 0.6rem;">
                <i class="bi bi-list" style="font-size:1.8rem;color:var(--aqua-primary);"></i>
            </button>

            {{-- DESKTOP menu --}}
            <div class="collapse navbar-collapse d-none d-xl-flex" id="navbarMain">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Acasă</a>
                    </li>

                    {{-- Despre noi — dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('despre*') || request()->is('servicii*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown">Despre noi</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item {{ request()->is('despre') && !request()->is('despre/*') ? 'active' : '' }}" href="{{ url('/despre') }}">
                                    <i class="bi bi-info-circle text-aqua me-2"></i>Despre noi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->is('despre/structura-organizationala*') ? 'active' : '' }}"
                                   href="{{ url('/despre/structura-organizationala') }}">
                                    <i class="bi bi-diagram-3 text-aqua me-2"></i>Structură Organizațională
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->is('despre/centre-operationale*') ? 'active' : '' }}"
                                   href="{{ url('/despre/centre-operationale') }}">
                                    <i class="bi bi-building text-aqua me-2"></i>Centre Operaționale
                                </a>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item {{ request()->is('servicii*') ? 'active' : '' }}" href="#">
                                    <i class="bi bi-droplet text-aqua me-2"></i>Servicii
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item {{ request()->is('servicii/alimentare-apa*') ? 'active' : '' }}" href="{{ url('/servicii/alimentare-apa') }}">
                                            <i class="bi bi-droplet text-aqua me-2"></i>Alimentare cu apă
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->is('servicii/canalizare*') ? 'active' : '' }}" href="{{ url('/servicii/canalizare') }}">
                                            <i class="bi bi-filter-circle text-aqua me-2"></i>Canalizare
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->is('servicii/epurare*') ? 'active' : '' }}" href="{{ url('/servicii/epurare') }}">
                                            <i class="bi bi-recycle text-aqua me-2"></i>Epurare ape uzate
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-graph-up-arrow text-aqua me-2"></i>Dezvoltare
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('despre.pos') }}">
                                            <i class="bi bi-file-earmark-ruled text-aqua me-2"></i>Aquaserv - POS
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="https://poim.aquaservtulcea.ro/" target="_blank" rel="noopener noreferrer">
                                            <i class="bi bi-box-arrow-up-right text-aqua me-2"></i>Aquaserv - POIM
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-file-earmark-text text-aqua me-2"></i>Aquaserv - PDD
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('informatii*') || request()->is('program-casierii*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown">Informații publice</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->is('program-casierii*') ? 'active' : '' }}" href="{{ url('/program-casierii') }}">
                                <i class="bi bi-clock text-aqua me-2"></i>Program casierii</a></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/calitatea-apei*') ? 'active' : '' }}" href="{{ url('/informatii/calitatea-apei') }}">
                                <i class="bi bi-clipboard2-pulse text-aqua me-2"></i>Calitatea apei</a></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/tarife*') ? 'active' : '' }}" href="{{ url('/informatii/tarife') }}">
                                <i class="bi bi-cash-stack text-aqua me-2"></i>Tarife și Taxe</a></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/legislatie*') ? 'active' : '' }}" href="{{ url('/informatii/legislatie') }}">
                                <i class="bi bi-journal-text text-aqua me-2"></i>Legislație</a></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/formulare*') ? 'active' : '' }}" href="{{ url('/informatii/formulare') }}">
                                <i class="bi bi-file-earmark-text text-aqua me-2"></i>Formulare utile</a></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/avize*') ? 'active' : '' }}" href="{{ url('/informatii/avize') }}">
                                <i class="bi bi-patch-check text-aqua me-2"></i>Avize și acorduri</a></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/legea-544-2001*') ? 'active' : '' }}" href="{{ url('/informatii/legea-544-2001') }}">
                                <i class="bi bi-journal-bookmark text-aqua me-2"></i>Legea 544/2001</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item {{ request()->is('informatii/buletin-informativ*') || request()->is('informatii/contracte-achizitii*') || request()->is('informatii/cheltuieli-personal*') || request()->is('informatii/datoriile-societatii*') || request()->is('informatii/detalierea-serviciilor*') ? 'active' : '' }}" href="#">
                                    <i class="bi bi-three-dots text-aqua me-2"></i>Alte informații
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item {{ request()->is('informatii/buletin-informativ*') ? 'active' : '' }}" href="{{ url('/informatii/buletin-informativ') }}">
                                        <i class="bi bi-newspaper text-aqua me-2"></i>Buletin informativ</a></li>
                                    <li><a class="dropdown-item {{ request()->is('informatii/contracte-achizitii*') ? 'active' : '' }}" href="{{ url('/informatii/contracte-achizitii') }}">
                                        <i class="bi bi-file-earmark-check text-aqua me-2"></i>Contracte de achiziții</a></li>
                                    <li><a class="dropdown-item {{ request()->is('informatii/cheltuieli-personal*') ? 'active' : '' }}" href="{{ url('/informatii/cheltuieli-personal') }}">
                                        <i class="bi bi-currency-exchange text-aqua me-2"></i>Cheltuieli personal</a></li>
                                    <li><a class="dropdown-item {{ request()->is('informatii/datoriile-societatii*') ? 'active' : '' }}" href="{{ url('/informatii/datoriile-societatii') }}">
                                        <i class="bi bi-cash-stack text-aqua me-2"></i>Datoriile Societății</a></li>
                                    <li><a class="dropdown-item {{ request()->is('informatii/detalierea-serviciilor*') ? 'active' : '' }}" href="{{ url('/informatii/detalierea-serviciilor') }}">
                                        <i class="bi bi-list-check text-aqua me-2"></i>Detalierea serviciilor</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- Transparență --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('transparenta*') || request()->is('informatii/hotarari-aga*') || request()->is('informatii/surse-buget-bilant*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown">Transparență</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->is('informatii/hotarari-aga*') ? 'active' : '' }}" href="{{ url('/informatii/hotarari-aga') }}">
                                <i class="bi bi-people text-aqua me-2"></i>Hotărâri AGA</a></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item {{ request()->is('transparenta/cod-etica*') || request()->is('transparenta/componenta-ca*') || request()->is('transparenta/guvernanta-corporativa*') || request()->is('transparenta/plan-integritate*') || request()->is('transparenta/contracte-mandat-administratori*') ? 'active' : '' }}" href="#">
                                    <i class="bi bi-building-check text-aqua me-2"></i>Guvernanță
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item {{ request()->is('transparenta/componenta-ca*') ? 'active' : '' }}" href="{{ url('/transparenta/componenta-ca') }}">
                                        <i class="bi bi-people-fill text-aqua me-2"></i>Componența CA</a></li>
                                    <li><a class="dropdown-item {{ request()->is('transparenta/contracte-mandat-administratori*') ? 'active' : '' }}" href="{{ url('/transparenta/contracte-mandat-administratori') }}">
                                        <i class="bi bi-file-earmark-person text-aqua me-2"></i>Contracte mandat adm.</a></li>
                                    <li><a class="dropdown-item {{ request()->is('transparenta/cod-etica*') ? 'active' : '' }}" href="{{ url('/transparenta/cod-etica') }}">
                                        <i class="bi bi-award text-aqua me-2"></i>Cod de etică</a></li>
                                    <li><a class="dropdown-item {{ request()->is('transparenta/guvernanta-corporativa*') ? 'active' : '' }}" href="{{ url('/transparenta/guvernanta-corporativa') }}">
                                        <i class="bi bi-building-check text-aqua me-2"></i>Guvernanță corporativă</a></li>
                                    <li><a class="dropdown-item {{ request()->is('transparenta/plan-integritate*') ? 'active' : '' }}" href="{{ url('/transparenta/plan-integritate') }}">
                                        <i class="bi bi-shield-lock text-aqua me-2"></i>Plan de integritate</a></li>
                                </ul>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item {{ request()->is('informatii/surse-buget-bilant*') ? 'active' : '' }}" href="{{ url('/informatii/surse-buget-bilant') }}">
                                <i class="bi bi-bar-chart-line text-aqua me-2"></i>Surse, Buget, Bilanț</a></li>
                            <li><a class="dropdown-item {{ request()->is('transparenta/buget-investitii*') ? 'active' : '' }}" href="{{ url('/transparenta/buget-investitii') }}">
                                <i class="bi bi-wallet2 text-aqua me-2"></i>Buget investiții</a></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item {{ request()->is('transparenta/rapoarte-evaluare*') || request()->is('transparenta/raport-anual*') || request()->is('transparenta/raport-audit*') || request()->is('transparenta/raporturi-cnr*') ? 'active' : '' }}" href="#">
                                    <i class="bi bi-journal-text text-aqua me-2"></i>Rapoarte
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item {{ request()->is('transparenta/rapoarte-evaluare*') ? 'active' : '' }}" href="{{ url('/transparenta/rapoarte-evaluare') }}">
                                        <i class="bi bi-clipboard-data text-aqua me-2"></i>Rapoarte de evaluare</a></li>
                                    <li><a class="dropdown-item {{ request()->is('transparenta/raport-anual*') ? 'active' : '' }}" href="{{ url('/transparenta/raport-anual') }}">
                                        <i class="bi bi-file-earmark-text text-aqua me-2"></i>Raport anual activitate</a></li>
                                    <li><a class="dropdown-item {{ request()->is('transparenta/raport-audit*') ? 'active' : '' }}" href="{{ url('/transparenta/raport-audit') }}">
                                        <i class="bi bi-search text-aqua me-2"></i>Raport audit extern</a></li>
                                    <li><a class="dropdown-item {{ request()->is('transparenta/raporturi-cnr*') ? 'active' : '' }}" href="{{ url('/transparenta/raporturi-cnr') }}">
                                        <i class="bi bi-file-earmark-bar-graph text-aqua me-2"></i>Rapoarte CNR</a></li>
                                </ul>
                            </li>
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
                    <li class="nav-item d-flex align-items-center ms-1">
                        <button id="btnSearch" aria-label="Caută"
                                style="background:none;border:none;cursor:pointer;padding:0.4rem 0.55rem;border-radius:8px;color:var(--aqua-primary);transition:background .18s;"
                                onmouseover="this.style.background='var(--aqua-bg)'" onmouseout="this.style.background='none'">
                            <i class="bi bi-search" style="font-size:1.15rem;"></i>
                        </button>
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
                <div id="overlayMeniu" style="position:absolute;inset:0;background:rgba(2,62,138,0.5);backdrop-filter:blur(4px);"></div>
                <div id="mobileDrawer" style="position:absolute;top:0;right:0;width:85%;max-width:320px;height:100%;background:#fff;display:flex;flex-direction:column;transform:translateX(100%);transition:transform 0.3s cubic-bezier(0.4,0,0.2,1);box-shadow:-8px 0 40px rgba(0,0,0,0.15);">
                    <div style="padding:1.25rem 1.5rem;background:linear-gradient(135deg,#023e8a,#0077b6);display:flex;align-items:center;justify-content:space-between;">
                        <div style="display:flex;align-items:center;gap:0.75rem;">
                            <div style="width:36px;height:36px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-droplet-half text-white" style="font-size:1.1rem;"></i>
                            </div>
                            <div>
                                <div style="color:#fff;font-weight:800;font-size:0.95rem;line-height:1.1;">Aquaserv S.A.</div>
                                <div style="color:rgba(255,255,255,0.7);font-size:0.68rem;text-transform:uppercase;letter-spacing:0.05em;">Servicii apă și canal</div>
                            </div>
                        </div>
                        <button id="btnInchideMeniu" style="background:rgba(255,255,255,0.15);border:none;border-radius:50%;width:36px;height:36px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#fff;font-size:1.1rem;">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>

                    {{-- Search mobil --}}
                    <div style="padding:0.75rem 1.25rem;background:#fff;border-bottom:1px solid #e2e8f0;">
                        <button id="btnSearchMobil" style="width:100%;display:flex;align-items:center;gap:0.6rem;background:#f0f8ff;border:1.5px solid #caf0f8;border-radius:10px;padding:0.65rem 1rem;cursor:pointer;color:#64748b;font-size:0.875rem;font-weight:600;">
                            <i class="bi bi-search" style="color:#0077b6;font-size:1rem;"></i> Caută pe site...
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
                            <button data-submeniu="subDespre" style="width:100%;display:flex;align-items:center;gap:1rem;padding:0.85rem 1.5rem;background:transparent;border:none;border-left:3px solid {{ request()->is('despre*') || request()->is('servicii*') ? '#0077b6' : 'transparent' }};color:#1a1a2e;font-weight:700;font-size:0.9rem;cursor:pointer;text-align:left;">
                                <i class="bi bi-info-circle" style="color:#0077b6;font-size:1.1rem;width:20px;text-align:center;"></i>
                                <span style="flex:1;">Despre noi</span>
                                <i class="bi bi-chevron-down" id="iconDespre" style="color:#0077b6;font-size:0.8rem;transition:transform 0.2s;"></i>
                            </button>
                            <div id="subDespre" style="display:none;background:#f8fafc;border-left:3px solid #caf0f8;">
                                <a href="{{ url('/despre') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-info-circle text-aqua"></i> Despre noi
                                </a>
                                <a href="{{ url('/despre/structura-organizationala') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-diagram-3 text-aqua"></i> Structură Organizațională
                                </a>
                                <a href="{{ url('/despre/centre-operationale') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-building text-aqua"></i> Centre Operaționale
                                </a>
                                {{-- Servicii sub-expandabil --}}
                                <button data-submeniu="subServiciiDespre" style="width:100%;display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;background:transparent;border:none;color:#374151;font-size:0.85rem;font-weight:600;cursor:pointer;text-align:left;">
                                    <i class="bi bi-droplet text-aqua" style="font-size:1rem;width:20px;text-align:center;"></i>
                                    <span style="flex:1;">Servicii</span>
                                    <i class="bi bi-chevron-down" id="iconServiciiDespre" style="color:#0077b6;font-size:0.75rem;transition:transform 0.2s;"></i>
                                </button>
                                <div id="subServiciiDespre" style="display:none;background:#eef4fb;border-left:3px solid #90e0ef;">
                                    <a href="{{ url('/servicii/alimentare-apa') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-droplet text-aqua"></i> Alimentare cu apă
                                    </a>
                                    <a href="{{ url('/servicii/canalizare') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-filter-circle text-aqua"></i> Canalizare
                                    </a>
                                    <a href="{{ url('/servicii/epurare') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-recycle text-aqua"></i> Epurare ape uzate
                                    </a>
                                </div>
                                {{-- Dezvoltare sub-expandabil --}}
                                <button data-submeniu="subDezvoltare" style="width:100%;display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;background:transparent;border:none;color:#374151;font-size:0.85rem;font-weight:600;cursor:pointer;text-align:left;">
                                    <i class="bi bi-graph-up-arrow text-aqua"></i>
                                    <span style="flex:1;">Dezvoltare</span>
                                    <i class="bi bi-chevron-down" id="iconDezvoltare" style="color:#0077b6;font-size:0.75rem;transition:transform 0.2s;"></i>
                                </button>
                                <div id="subDezvoltare" style="display:none;background:#eef4fb;border-left:3px solid #90e0ef;">
                                    <a href="{{ route('despre.pos') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-file-earmark-ruled text-aqua"></i> Aquaserv - POS
                                    </a>
                                    <a href="https://poim.aquaservtulcea.ro/" target="_blank" rel="noopener noreferrer" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-box-arrow-up-right text-aqua"></i> Aquaserv - POIM
                                    </a>
                                    <a href="#" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-file-earmark-text text-aqua"></i> Aquaserv - PDD
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Informatii expandabil --}}
                        <div>
                            <button data-submeniu="subInfo" style="width:100%;display:flex;align-items:center;gap:1rem;padding:0.85rem 1.5rem;background:transparent;border:none;border-left:3px solid {{ request()->is('informatii*') || request()->is('program-casierii*') ? '#0077b6' : 'transparent' }};color:#1a1a2e;font-weight:700;font-size:0.9rem;cursor:pointer;text-align:left;">
                                <i class="bi bi-newspaper" style="color:#0077b6;font-size:1.1rem;width:20px;text-align:center;"></i>
                                <span style="flex:1;">Informații publice</span>
                                <i class="bi bi-chevron-down" id="iconInfo" style="color:#0077b6;font-size:0.8rem;transition:transform 0.2s;"></i>
                            </button>
                            <div id="subInfo" style="display:none;background:#f8fafc;border-left:3px solid #caf0f8;">
                                <a href="{{ url('/program-casierii') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-clock text-aqua"></i> Program casierii
                                </a>
                                <a href="{{ url('/informatii/calitatea-apei') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-clipboard2-pulse text-aqua"></i> Calitatea apei
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
                                <a href="{{ url('/informatii/avize') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-patch-check text-aqua"></i> Avize și acorduri
                                </a>
                                <a href="{{ url('/informatii/legea-544-2001') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-journal-bookmark text-aqua"></i> Legea 544/2001
                                </a>
                                {{-- Alte informații sub-expandabil --}}
                                <button data-submeniu="subAlteInfo" style="width:100%;display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;background:transparent;border:none;color:#374151;font-size:0.85rem;font-weight:600;cursor:pointer;text-align:left;">
                                    <i class="bi bi-three-dots text-aqua" style="font-size:1rem;width:20px;text-align:center;"></i>
                                    <span style="flex:1;">Alte informații</span>
                                    <i class="bi bi-chevron-down" id="iconAlteInfo" style="color:#0077b6;font-size:0.75rem;transition:transform 0.2s;"></i>
                                </button>
                                <div id="subAlteInfo" style="display:none;background:#eef4fb;border-left:3px solid #90e0ef;">
                                    <a href="{{ url('/informatii/buletin-informativ') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-newspaper text-aqua"></i> Buletin informativ
                                    </a>
                                    <a href="{{ url('/informatii/contracte-achizitii') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-file-earmark-check text-aqua"></i> Contracte de achiziții
                                    </a>
                                    <a href="{{ url('/informatii/cheltuieli-personal') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-currency-exchange text-aqua"></i> Cheltuieli personal
                                    </a>
                                    <a href="{{ url('/informatii/datoriile-societatii') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-cash-stack text-aqua"></i> Datoriile Societății
                                    </a>
                                    <a href="{{ url('/informatii/detalierea-serviciilor') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-list-check text-aqua"></i> Detalierea serviciilor
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Transparență expandabil --}}
                        <div>
                            <button data-submeniu="subTransparenta" style="width:100%;display:flex;align-items:center;gap:1rem;padding:0.85rem 1.5rem;background:transparent;border:none;border-left:3px solid {{ request()->is('transparenta*') || request()->is('informatii/hotarari-aga*') || request()->is('informatii/surse-buget-bilant*') ? '#0077b6' : 'transparent' }};color:#1a1a2e;font-weight:700;font-size:0.9rem;cursor:pointer;text-align:left;">
                                <i class="bi bi-shield-check" style="color:#0077b6;font-size:1.1rem;width:20px;text-align:center;"></i>
                                <span style="flex:1;">Transparență</span>
                                <i class="bi bi-chevron-down" id="iconTransparenta" style="color:#0077b6;font-size:0.8rem;transition:transform 0.2s;"></i>
                            </button>
                            <div id="subTransparenta" style="display:none;background:#f8fafc;border-left:3px solid #caf0f8;">
                                <a href="{{ url('/informatii/hotarari-aga') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-people text-aqua"></i> Hotărâri AGA
                                </a>
                                {{-- Guvernanță sub-expandabil --}}
                                <button data-submeniu="subGuvernanta" style="width:100%;display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;background:transparent;border:none;color:#374151;font-size:0.85rem;font-weight:600;cursor:pointer;text-align:left;">
                                    <i class="bi bi-building-check text-aqua" style="font-size:1rem;width:20px;text-align:center;"></i>
                                    <span style="flex:1;">Guvernanță</span>
                                    <i class="bi bi-chevron-down" id="iconGuvernanta" style="color:#0077b6;font-size:0.75rem;transition:transform 0.2s;"></i>
                                </button>
                                <div id="subGuvernanta" style="display:none;background:#eef4fb;border-left:3px solid #90e0ef;">
                                    <a href="{{ url('/transparenta/componenta-ca') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-people-fill text-aqua"></i> Componența CA
                                    </a>
                                    <a href="{{ url('/transparenta/contracte-mandat-administratori') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-file-earmark-person text-aqua"></i> Contracte mandat adm.
                                    </a>
                                    <a href="{{ url('/transparenta/cod-etica') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-award text-aqua"></i> Cod de etică
                                    </a>
                                    <a href="{{ url('/transparenta/guvernanta-corporativa') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-building-check text-aqua"></i> Guvernanță corporativă
                                    </a>
                                    <a href="{{ url('/transparenta/plan-integritate') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-shield-lock text-aqua"></i> Plan de integritate
                                    </a>
                                </div>
                                <a href="{{ url('/informatii/surse-buget-bilant') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-bar-chart-line text-aqua"></i> Surse, Buget, Bilanț
                                </a>
                                <a href="{{ url('/transparenta/buget-investitii') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;text-decoration:none;color:#374151;font-size:0.85rem;font-weight:600;">
                                    <i class="bi bi-wallet2 text-aqua"></i> Buget investiții
                                </a>
                                {{-- Rapoarte sub-expandabil --}}
                                <button data-submeniu="subRapoarteTransparenta" style="width:100%;display:flex;align-items:center;gap:0.75rem;padding:0.7rem 1.5rem 0.7rem 2.5rem;background:transparent;border:none;color:#374151;font-size:0.85rem;font-weight:600;cursor:pointer;text-align:left;">
                                    <i class="bi bi-journal-text text-aqua" style="font-size:1rem;width:20px;text-align:center;"></i>
                                    <span style="flex:1;">Rapoarte</span>
                                    <i class="bi bi-chevron-down" id="iconRapoarteTransparenta" style="color:#0077b6;font-size:0.75rem;transition:transform 0.2s;"></i>
                                </button>
                                <div id="subRapoarteTransparenta" style="display:none;background:#eef4fb;border-left:3px solid #90e0ef;">
                                    <a href="{{ url('/transparenta/rapoarte-evaluare') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-clipboard-data text-aqua"></i> Rapoarte de evaluare
                                    </a>
                                    <a href="{{ url('/transparenta/raport-anual') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-file-earmark-text text-aqua"></i> Raport anual activitate
                                    </a>
                                    <a href="{{ url('/transparenta/raport-audit') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-search text-aqua"></i> Raport audit extern
                                    </a>
                                    <a href="{{ url('/transparenta/raporturi-cnr') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.65rem 1.5rem 0.65rem 3.2rem;text-decoration:none;color:#374151;font-size:0.82rem;font-weight:600;">
                                        <i class="bi bi-file-earmark-bar-graph text-aqua"></i> Rapoarte CNR
                                    </a>
                                </div>
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
                    <h5>Aquaserv S.A.</h5>
                    <p style="font-size:0.875rem;line-height:1.7;">
                        Operator regional de servicii de alimentare cu apă și canalizare,
                        dedicat calității și siguranței apei pentru comunitate.
                    </p>
                    <ul>
                        <li><a href="#"><i class="bi bi-geo-alt-fill"></i> Str. Rezervorului, nr. 2, Tulcea</a></li>
                        <li><a href="tel:0240524310"><i class="bi bi-telephone-fill"></i> 0240 524 310</a></li>
                        <li><a href="mailto:secretariat@aquaservtulcea.ro"><i class="bi bi-envelope-fill"></i> secretariat@aquaservtulcea.ro</a></li>
                        <li><a href="#"><i class="bi bi-clock-fill"></i> Lun–Vin: 07:30 – 16:00</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Link-uri rapide</h5>
                    <ul>
                        <li><a href="{{ url('/despre') }}">Despre noi</a></li>
                        <li><a href="{{ url('/despre/structura-organizationala') }}">Structură Organizațională</a></li>
                        <li><a href="{{ url('/despre/centre-operationale') }}">Centre Operaționale</a></li>
                        <li><a href="{{ url('/informatii/hotarari-aga') }}">Hotărâri AGA</a></li>
                        <li><a href="{{ url('/servicii') }}">Servicii</a></li>
                        <li><a href="{{ url('/anunturi') }}">Anunțuri</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                        <li><a href="{{ url('/gdpr') }}">GDPR</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Zona clienți</h5>
                    <ul>
                        <li><a href="{{ url('https://my.aquaservtulcea.ro/login') }}"><i class="bi bi-credit-card"></i> Plătește factura</a></li>
                        <li><a href="{{ url('/client/index-contor') }}"><i class="bi bi-speedometer2"></i> Transmite index contor</a></li>
                        <li><a href="{{ url('/contact/') }}"><i class="bi bi-exclamation-triangle"></i> Raportează avarie</a></li>                        <li><a href="{{ url('/informatii/formulare') }}"><i class="bi bi-download"></i> Formulare</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Program casierii</h5>
                    <p style="font-size:0.875rem;margin-bottom:0.6rem;">
                        <strong style="color:#fff;">Tulcea – Sediu central</strong><br>
                        Lun–Vin: 07:30 – 17:00
                    </p>
                    <a href="{{ url('/program-casierii') }}"
                       class="footer-casierii-link"
                       style="display:inline-flex;align-items:center;gap:0.4rem;font-size:0.8rem;color:rgba(255,255,255,0.75);text-decoration:none;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.2);border-radius:6px;padding:0.35rem 0.8rem;margin-bottom:1rem;transition:all 0.2s;">
                        <i class="bi bi-clock" style="color:var(--aqua-light);"></i> Program Casierii Județ
                    </a>
                    <p style="font-size:0.875rem;margin-bottom:0;">
                        <strong style="color:#fff;">Dispecerat Avarii</strong><br>
                        <a href="tel:0747022009" style="font-size:1.1rem;color:var(--aqua-light);text-decoration:none;">
                            <i class="bi bi-telephone-fill"></i> 0747 022 009
                        </a>
                        <br>
                        <br>
                        <strong style="color:#fff;">Telecitire</strong><br>
                        <a href="tel:0340131111" style="font-size:1.1rem;color:var(--aqua-light);text-decoration:none;">
                            <i class="bi bi-telephone-fill"></i> 0340 131 111
                        </a>
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="https://www.facebook.com/AquaservTulcea/" target="_blank" rel="noopener" class="btn btn-sm btn-outline-light"><i class="bi bi-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
                <span>&copy; {{ date('Y') }} Aquaserv S.A. Toate drepturile rezervate.</span>
                <span>
                    <a href="{{ url('/gdpr') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;margin-right:1rem;">Politică confidențialitate</a>
                    <a href="{{ url('/cookies') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;">Cookies</a>
                </span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script nonce="@nonce">
    (function() {
        var banner = document.getElementById('bannerSiteNou');
        var btn    = document.getElementById('btnInchideBanner');
        if (!sessionStorage.getItem('bannerSiteNouInchis')) {
            banner.style.display = 'block';
        }
        btn.addEventListener('click', function() {
            banner.style.transition = 'opacity 0.3s';
            banner.style.opacity = '0';
            setTimeout(function() { banner.style.display = 'none'; }, 300);
            sessionStorage.setItem('bannerSiteNouInchis', '1');
        });
        btn.addEventListener('mouseover', function() { this.style.background = 'rgba(255,255,255,0.25)'; });
        btn.addEventListener('mouseout',  function() { this.style.background = 'rgba(255,255,255,0.15)'; });
    })();
    </script>

    @stack('scripts')

    <script nonce="@nonce">
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
            'subServiciiDespre': 'iconServiciiDespre',
            'subInfo':           'iconInfo',
            'subDespre':         'iconDespre',
            'subDezvoltare':     'iconDezvoltare',
            'subAlteInfo':           'iconAlteInfo',
            'subTransparenta':       'iconTransparenta',
            'subGuvernanta':         'iconGuvernanta',
            'subAlteTransparenta':   'iconAlteTransparenta',
        };
        const sub    = document.getElementById(id);
        const icon   = document.getElementById(iconMap[id]);
        const isOpen = sub.style.display === 'block';
        sub.style.display    = isOpen ? 'none' : 'block';
        icon.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
    }
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btnDeschideMeniu').addEventListener('click', deschideMeniu);
        document.getElementById('btnInchideMeniu').addEventListener('click', inchideMeniu);
        document.getElementById('overlayMeniu').addEventListener('click', inchideMeniu);
        document.querySelectorAll('[data-submeniu]').forEach(function(btn) {
            btn.addEventListener('click', function() { toggleSubmeniu(btn.dataset.submeniu); });
        });
        document.querySelectorAll('.dropdown-submenu > .dropdown-item').forEach(function(el) {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });
        });
    });
    </script>
    @include('components.cookie-banner')

{{-- ══════════════════════════════════════════
     SEARCH OVERLAY
══════════════════════════════════════════ --}}
<div id="searchOverlay" style="display:none;position:fixed;inset:0;z-index:9500;background:rgba(2,62,138,0.55);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);padding:5vh 1rem 1rem;">
    <div style="max-width:680px;margin:0 auto;">

        {{-- Input --}}
        <div style="position:relative;">
            <i class="bi bi-search" style="position:absolute;left:1.1rem;top:50%;transform:translateY(-50%);font-size:1.15rem;color:#0077b6;pointer-events:none;"></i>
            <input id="searchInput" type="text" autocomplete="off" spellcheck="false"
                   placeholder="Caută pagini, anunțuri, buletine..."
                   style="width:100%;padding:1rem 3.2rem 1rem 3rem;font-size:1.05rem;font-family:'Nunito',sans-serif;font-weight:600;border:none;border-radius:14px;box-shadow:0 8px 32px rgba(0,0,0,0.18);outline:none;color:#1a1a2e;background:#fff;">
            <button id="btnCloseSearch" style="position:absolute;right:.75rem;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#94a3b8;font-size:1.2rem;padding:.25rem;" aria-label="Închide">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        {{-- Rezultate --}}
        <div id="searchResults" style="background:#fff;border-radius:14px;margin-top:.6rem;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,0.15);display:none;max-height:65vh;overflow-y:auto;"></div>

        {{-- Hint tastatură --}}
        <div style="text-align:center;margin-top:.75rem;font-size:.75rem;color:rgba(255,255,255,.65);">
            <kbd style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);border-radius:4px;padding:.1rem .4rem;">↑↓</kbd> navighează &nbsp;
            <kbd style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);border-radius:4px;padding:.1rem .4rem;">Enter</kbd> deschide &nbsp;
            <kbd style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);border-radius:4px;padding:.1rem .4rem;">Esc</kbd> închide
        </div>
    </div>
</div>

<script nonce="@nonce">
(function () {
    const overlay   = document.getElementById('searchOverlay');
    const input     = document.getElementById('searchInput');
    const results   = document.getElementById('searchResults');
    const btnOpen   = document.getElementById('btnSearch');
    const btnOpenM  = document.getElementById('btnSearchMobil');
    const btnClose  = document.getElementById('btnCloseSearch');

    const catLabel = { anunturi:'bi-megaphone-fill', pagini:'bi-file-text-fill', buletine:'bi-droplet-fill' };
    const catColor = { anunturi:'#0077b6', pagini:'#059669', buletine:'#0369a1' };
    const catName  = { anunturi:'Anunțuri', pagini:'Pagini', buletine:'Buletine apă' };

    let timer = null;
    let activeIdx = -1;
    let allItems  = [];

    function open() {
        overlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
        setTimeout(() => input.focus(), 60);
    }
    function close() {
        overlay.style.display = 'none';
        document.body.style.overflow = '';
        input.value = '';
        results.style.display = 'none';
        results.innerHTML = '';
        activeIdx = -1;
        allItems  = [];
    }

    if (btnOpen)  btnOpen.addEventListener('click', open);
    if (btnOpenM) btnOpenM.addEventListener('click', function () {
        // Chiude drawer-ul mobil dacă e deschis
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu) mobileMenu.style.display = 'none';
        document.body.style.overflow = '';
        open();
    });
    btnClose.addEventListener('click', close);
    overlay.addEventListener('click', function (e) {
        if (e.target === overlay) close();
    });

    // Scurtătură globală Ctrl+K / /
    document.addEventListener('keydown', function (e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') { e.preventDefault(); open(); }
        if (e.key === 'Escape' && overlay.style.display !== 'none') close();
    });

    // Navigare cu săgeți
    input.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowDown') {
            e.preventDefault();
            activeIdx = Math.min(activeIdx + 1, allItems.length - 1);
            highlight();
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            activeIdx = Math.max(activeIdx - 1, 0);
            highlight();
        } else if (e.key === 'Enter' && activeIdx >= 0 && allItems[activeIdx]) {
            window.location.href = allItems[activeIdx];
            close();
        }
    });

    function highlight() {
        results.querySelectorAll('.sr-item').forEach((el, i) => {
            el.style.background = i === activeIdx ? '#f0f8ff' : '#fff';
        });
        const active = results.querySelectorAll('.sr-item')[activeIdx];
        if (active) active.scrollIntoView({ block: 'nearest' });
    }

    input.addEventListener('input', function () {
        clearTimeout(timer);
        const q = this.value.trim();
        if (q.length < 2) {
            results.style.display = 'none';
            results.innerHTML = '';
            activeIdx = -1; allItems = [];
            return;
        }
        timer = setTimeout(() => fetchResults(q), 280);
    });

    function fetchResults(q) {
        fetch('{{ route('search') }}?q=' + encodeURIComponent(q), {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(data => {
            activeIdx = -1;
            allItems  = [];
            if (data.total === 0) {
                results.innerHTML = '<div style="padding:1.5rem;text-align:center;color:#94a3b8;font-size:.9rem;"><i class="bi bi-search" style="font-size:1.5rem;display:block;margin-bottom:.4rem;opacity:.4;"></i>Niciun rezultat pentru <strong>' + escHtml(q) + '</strong></div>';
                results.style.display = 'block';
                return;
            }

            let html = '';
            ['anunturi', 'pagini', 'buletine'].forEach(cat => {
                if (!data[cat] || !data[cat].length) return;
                html += '<div style="padding:.5rem 1rem .25rem;font-size:.68rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:#94a3b8;background:#f8fafc;border-bottom:1px solid #f1f5f9;">'
                      + '<i class="bi ' + catLabel[cat] + ' me-1" style="color:' + catColor[cat] + ';"></i>' + catName[cat]
                      + '</div>';
                data[cat].forEach((item, i) => {
                    const url   = item.url;
                    const title = item.titlu;
                    const sub   = item.data ? '<span style="font-size:.72rem;color:#94a3b8;margin-left:.4rem;">' + item.data + '</span>' : '';
                    const badge = item.categorie ? '<span style="font-size:.65rem;font-weight:700;background:#dbeafe;color:#1d4ed8;border-radius:4px;padding:.1em .45em;margin-left:.4rem;">' + escHtml(item.categorie) + '</span>' : '';
                    allItems.push(url);
                    html += '<a href="' + escHtml(url) + '" class="sr-item" style="display:flex;align-items:center;gap:.75rem;padding:.7rem 1rem;text-decoration:none;color:#1a1a2e;border-bottom:1px solid #f8fafc;transition:background .15s;">'
                          + '<i class="bi ' + catLabel[cat] + '" style="font-size:.9rem;color:' + catColor[cat] + ';flex-shrink:0;opacity:.7;"></i>'
                          + '<span style="flex:1;font-size:.875rem;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">' + escHtml(title) + badge + sub + '</span>'
                          + '<i class="bi bi-arrow-right" style="font-size:.75rem;color:#cbd5e1;flex-shrink:0;"></i>'
                          + '</a>';
                });
            });

            results.innerHTML = html;
            results.style.display = 'block';

            // Hover cu mouse
            results.querySelectorAll('.sr-item').forEach((el, i) => {
                el.addEventListener('mouseenter', () => { activeIdx = i; highlight(); });
            });
        })
        .catch(() => {});
    }

    function escHtml(s) {
        return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }
})();
</script>
</body>
</html>