<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'AquaServ')) | Servicii Apă și Canal</title>
    <meta name="description" content="@yield('meta_description', 'Operator regional de servicii de alimentare cu apă și canalizare')">

    {{-- Bootstrap 5 CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Google Fonts --}}
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

        body {
            font-family: 'Nunito', sans-serif;
            color: var(--aqua-text);
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main { flex: 1; }

        /* ── TOP BAR ── */
        .topbar {
            background: var(--aqua-dark);
            color: rgba(255,255,255,0.85);
            font-size: 0.8rem;
            padding: 6px 0;
        }
        .topbar a { color: rgba(255,255,255,0.85); text-decoration: none; }
        .topbar a:hover { color: #fff; }

        /* ── NAVBAR ── */
        .navbar {
            background: #ffffff;
            border-bottom: 3px solid var(--aqua-primary);
            box-shadow: 0 2px 12px rgba(0,119,182,0.10);
            padding: 0;
        }
        .navbar-brand img { height: 52px; }
        .navbar-brand span {
            font-family: 'Merriweather', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--aqua-dark);
            line-height: 1.2;
        }
        .navbar-brand small {
            font-family: 'Nunito', sans-serif;
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--aqua-gray);
            display: block;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }
        .navbar-nav .nav-link {
            font-weight: 700;
            font-size: 0.88rem;
            color: var(--aqua-text) !important;
            padding: 1.2rem 0.9rem !important;
            letter-spacing: 0.02em;
            transition: color 0.2s, border-bottom 0.2s;
            border-bottom: 3px solid transparent;
            text-transform: uppercase;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--aqua-primary) !important;
            border-bottom-color: var(--aqua-primary);
        }
        .navbar-nav .dropdown-menu {
            border: none;
            border-top: 3px solid var(--aqua-primary);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            border-radius: 0 0 8px 8px;
        }
        .navbar-nav .dropdown-item {
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.55rem 1.2rem;
            color: var(--aqua-text);
        }
        .navbar-nav .dropdown-item:hover {
            background-color: var(--aqua-bg);
            color: var(--aqua-primary);
        }

        /* ── PAGE HERO ── */
        .page-hero {
            background: linear-gradient(135deg, var(--aqua-dark) 0%, var(--aqua-primary) 100%);
            color: #fff;
            padding: 3rem 0 2.5rem;
            position: relative;
            overflow: hidden;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 1;
        }
        .page-hero h1 {
            font-family: 'Merriweather', serif;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.4rem;
        }
        .breadcrumb-item a { color: var(--aqua-light); }
        .breadcrumb-item.active { color: rgba(255,255,255,0.75); }
        .breadcrumb-item+.breadcrumb-item::before { color: rgba(255,255,255,0.5); }

        /* ── CARDS ── */
        .card {
            border: 1px solid var(--aqua-border);
            border-radius: 12px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,119,182,0.12); }
        .card-header {
            background: linear-gradient(90deg, var(--aqua-dark), var(--aqua-primary));
            color: #fff;
            border-radius: 11px 11px 0 0 !important;
            font-weight: 700;
        }

        /* ── QUICK ACCESS ICONS ── */
        .quick-access-card {
            text-align: center;
            padding: 1.8rem 1rem;
            border-radius: 14px;
            background: #fff;
            border: 1.5px solid var(--aqua-border);
            transition: all 0.25s;
            text-decoration: none;
            color: var(--aqua-text);
            display: block;
        }
        .quick-access-card:hover {
            background: var(--aqua-primary);
            border-color: var(--aqua-primary);
            color: #fff;
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(0,119,182,0.2);
        }
        .quick-access-card .icon-wrap {
            width: 64px; height: 64px;
            border-radius: 50%;
            background: var(--aqua-bg);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.8rem;
            color: var(--aqua-primary);
            transition: all 0.25s;
        }
        .quick-access-card:hover .icon-wrap {
            background: rgba(255,255,255,0.2);
            color: #fff;
        }
        .quick-access-card h6 { font-weight: 700; font-size: 0.9rem; margin: 0; }

        /* ── ANUNTURI / NEWS ── */
        .news-item {
            border-left: 4px solid var(--aqua-primary);
            padding: 0.9rem 1rem;
            margin-bottom: 1rem;
            background: var(--aqua-bg);
            border-radius: 0 8px 8px 0;
            transition: border-color 0.2s;
        }
        .news-item:hover { border-left-color: var(--aqua-accent); }
        .news-item .date {
            font-size: 0.75rem;
            color: var(--aqua-gray);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .news-item h6 { font-weight: 700; margin: 0.2rem 0 0; font-size: 0.9rem; }
        .news-item h6 a { color: var(--aqua-text); text-decoration: none; }
        .news-item h6 a:hover { color: var(--aqua-primary); }

        /* ── FOOTER ── */
        footer {
            background: var(--aqua-dark);
            color: rgba(255,255,255,0.8);
            padding-top: 3rem;
        }
        footer h5 {
            font-family: 'Merriweather', serif;
            font-size: 1rem;
            color: #fff;
            border-bottom: 2px solid var(--aqua-accent);
            padding-bottom: 0.6rem;
            margin-bottom: 1.2rem;
        }
        footer ul { list-style: none; padding: 0; margin: 0; }
        footer ul li { margin-bottom: 0.45rem; }
        footer ul li a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }
        footer ul li a:hover { color: var(--aqua-light); }
        footer ul li a i { margin-right: 6px; }
        .footer-bottom {
            background: rgba(0,0,0,0.25);
            padding: 1rem 0;
            margin-top: 2.5rem;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.55);
        }

        /* ── BUTTONS ── */
        .btn-aqua {
            background: var(--aqua-primary);
            color: #fff;
            border: none;
            font-weight: 700;
            border-radius: 8px;
            padding: 0.55rem 1.4rem;
            transition: background 0.2s, transform 0.15s;
        }
        .btn-aqua:hover { background: var(--aqua-dark); color: #fff; transform: translateY(-1px); }
        .btn-outline-aqua {
            border: 2px solid var(--aqua-primary);
            color: var(--aqua-primary);
            font-weight: 700;
            border-radius: 8px;
            padding: 0.5rem 1.4rem;
            background: transparent;
            transition: all 0.2s;
        }
        .btn-outline-aqua:hover { background: var(--aqua-primary); color: #fff; }

        /* ── BADGE ── */
        .badge-aqua {
            background: var(--aqua-primary);
            color: #fff;
            font-weight: 700;
            border-radius: 6px;
            font-size: 0.72rem;
            padding: 0.3em 0.65em;
        }

        /* ── ALERT BAND ── */
        .alert-band {
            background: #fff3cd;
            border-left: 5px solid #ffc107;
            color: #664d03;
            padding: 0.7rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
        }

        /* ── UTILITIES ── */
        .section-title {
            font-family: 'Merriweather', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--aqua-dark);
            border-left: 4px solid var(--aqua-accent);
            padding-left: 0.75rem;
            margin-bottom: 1.5rem;
        }
        .text-aqua { color: var(--aqua-primary) !important; }
        .bg-aqua-light { background-color: var(--aqua-bg) !important; }

        @media (max-width: 991.98px) {
            .navbar-nav .nav-link { border-bottom: none; padding: 0.6rem 1rem !important; }
            .page-hero h1 { font-size: 1.5rem; }
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
                <a href="tel:0240511111">0240 511 111</a>
                <span class="mx-2">|</span>
                <i class="bi bi-envelope-fill me-1"></i>
                <a href="mailto:office@aquaserv.ro">office@aquaserv.ro</a>
                <span class="mx-2">|</span>
                <i class="bi bi-clock-fill me-1"></i> Lun–Vin: 08:00 – 16:30
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
                {{-- Înlocuiește cu logo-ul tău: <img src="{{ asset('images/logo.png') }}" alt="Logo"> --}}
                <div style="width:48px;height:48px;background:linear-gradient(135deg,#0077b6,#00b4d8);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-droplet-half text-white" style="font-size:1.5rem;"></i>
                </div>
                <div>
                    <span>AquaServ S.A.</span>
                    <small>Servicii apă și canal</small>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <i class="bi bi-list" style="font-size:1.8rem;color:var(--aqua-primary);"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Acasă</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('despre*') ? 'active' : '' }}" href="{{ url('/despre') }}">Despre noi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('servicii*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown">Servicii</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/servicii/alimentare-apa') }}">
                                <i class="bi bi-droplet text-aqua me-2"></i>Alimentare cu apă</a></li>
                            <li><a class="dropdown-item" href="{{ url('/servicii/canalizare') }}">
                                <i class="bi bi-filter-circle text-aqua me-2"></i>Canalizare</a></li>
                            <li><a class="dropdown-item" href="{{ url('/servicii/epurare') }}">
                                <i class="bi bi-recycle text-aqua me-2"></i>Epurare ape uzate</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/servicii/avize') }}">
                                <i class="bi bi-file-earmark-check text-aqua me-2"></i>Avize și autorizații</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('informatii*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown">Informații publice</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/informatii/anunturi') }}">Anunțuri</a></li>
                            <li><a class="dropdown-item" href="{{ url('/informatii/calitatea-apei') }}">Calitatea apei</a></li>
                            <li><a class="dropdown-item" href="{{ url('/informatii/tarife') }}">Tarife și Taxe</a></li>
                            <li><a class="dropdown-item" href="{{ url('/informatii/legislatie') }}">Legislație</a></li>
                            <li><a class="dropdown-item" href="{{ url('/informatii/formulare') }}">Formulare utile</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('anunturi*') ? 'active' : '' }}" href="{{ url('/anunturi') }}">Anunțuri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-2 d-flex align-items-center">
                        <a href="{{ url('/client/login') }}" class="btn btn-aqua btn-sm">
                            <i class="bi bi-person-circle me-1"></i> Cont client
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ALERT BAND (opțional – anunțuri urgente) --}}
    @hasSection('alert_band')
        <div class="alert-band">
            <div class="container">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                @yield('alert_band')
            </div>
        </div>
    @endif

    {{-- PAGE HERO (opțional pe pagini interioare) --}}
    @hasSection('page_hero')
        <section class="page-hero">
            <div class="container position-relative">
                @yield('page_hero')
            </div>
        </section>
    @endif

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
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
                        <li><a href="#"><i class="bi bi-geo-alt-fill"></i> Str. Exemple nr. 1, Tulcea</a></li>
                        <li><a href="tel:0240511111"><i class="bi bi-telephone-fill"></i> 0240 511 111</a></li>
                        <li><a href="mailto:office@aquaserv.ro"><i class="bi bi-envelope-fill"></i> office@aquaserv.ro</a></li>
                        <li><a href="#"><i class="bi bi-clock-fill"></i> Lun–Vin: 08:00 – 16:30</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Link-uri rapide</h5>
                    <ul>
                        <li><a href="{{ url('/despre') }}">Despre noi</a></li>
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
                    <p style="font-size:0.875rem;">
                        <strong style="color:#fff;">Tulcea – Sediu central</strong><br>
                        Lun–Vin: 08:00 – 14:30
                    </p>
                    <p style="font-size:0.875rem;">
                        <strong style="color:#fff;">Telecitire avarie</strong><br>
                        <span style="font-size:1.1rem;color:var(--aqua-light);">
                            <i class="bi bi-telephone-fill"></i> 0340 131 111
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

    {{-- Bootstrap 5 JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>