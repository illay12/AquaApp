<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PDDTJ') | Aquaserv Tulcea</title>
    <meta name="description" content="@yield('meta_description', 'Proiectul regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea — cofinanțat din FEDR, Programul Dezvoltare Durabilă și Tranziție Justă (PDDTJ).')">

    <link rel="canonical" href="{{ url()->current() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@400;600;700&family=Lato:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --aqua-primary:  #3d8f87;
            --aqua-dark:     #002756;
            --aqua-dark2:    #001630;
            --aqua-light:    #a8d5cd;
            --aqua-accent:   #76b1a8;
            --aqua-cta:      #ff7a5a;
            --aqua-bg:       #eef2f1;
            --aqua-nav-bg:   #eeeeee;
            --aqua-nav-hover:#dddddd;
            --aqua-text:     #333333;
            --aqua-gray:     #6c757d;
            --aqua-border:   #cfe3e0;
        }
        * { box-sizing: border-box; }
        body { font-family: 'Open Sans', sans-serif; font-size: 17px; color: var(--aqua-text); background:#fff; display:flex; flex-direction:column; min-height:100vh; }
        main { flex: 1; }
        p { font-size: 1.02rem; line-height: 1.75; }

        /* Sigle */
        .logos-card { background:#fff; border-radius:16px; box-shadow:0 8px 28px rgba(0,0,0,0.14); padding:1.75rem 2rem; margin:0 auto; }
        .logos-track { display:flex; align-items:center; justify-content:center; gap:5rem; flex-wrap:wrap; }
        .logo-slot { height:90px; display:flex; align-items:center; justify-content:center; }
        .logo-slot img { height:90px; width:auto; max-width:none; object-fit:contain; }
        .logo-placeholder { height:90px; width:220px; border:1.5px dashed var(--aqua-border); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:0.7rem; font-weight:700; color:var(--aqua-gray); text-align:center; padding:0.25rem; text-transform:uppercase; letter-spacing:0.03em; }
        @media (max-width:767.98px) {
            .logos-card { padding:1.1rem 1rem; }
            .logos-track { gap:2rem; }
            .logo-slot, .logo-slot img { height:56px; max-height:56px; }
            .logo-placeholder { height:56px; width:130px; }
        }

        /* Navbar */
        .navbar { background:var(--aqua-nav-bg); box-shadow:0 1px 3px rgba(0,0,0,0.08); padding:1.25rem 0; }
        .navbar-brand span { font-family:'Roboto', sans-serif; font-size:1.15rem; font-weight:700; color:var(--aqua-dark); }
        .navbar-brand small { display:block; font-size:0.72rem; font-weight:600; color:var(--aqua-gray); text-transform:uppercase; letter-spacing:0.04em; }
        .navbar-nav .nav-link { font-family:'Open Sans', sans-serif; font-weight:600; font-size:16px; color:var(--aqua-text) !important; padding:1.1rem 1rem !important; text-transform:uppercase; letter-spacing:0.02em; border-radius:4px; }
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active { background:var(--aqua-nav-hover); color:var(--aqua-dark) !important; }
        .navbar-nav .dropdown-menu { border:none; border-top:3px solid var(--aqua-accent); box-shadow:0 8px 24px rgba(0,0,0,0.12); background:var(--aqua-nav-bg); }
        @media (min-width:992px) {
            .navbar-nav .nav-item.dropdown .dropdown-menu { display:block !important; opacity:0; visibility:hidden; transform:translateY(6px); pointer-events:none; transition:opacity .2s,transform .2s,visibility .2s; }
            .navbar-nav .nav-item.dropdown:hover .dropdown-menu { opacity:1; visibility:visible; transform:translateY(0); pointer-events:auto; }
        }
        .navbar-nav .dropdown-item { font-size:0.875rem; font-weight:600; padding:0.55rem 1.2rem; }
        .navbar-nav .dropdown-item:hover { background:var(--aqua-nav-hover); color:var(--aqua-dark); }

        /* Hero */
        .hero-photo { position:relative; overflow:hidden; background:linear-gradient(135deg, var(--aqua-dark) 0%, var(--aqua-primary) 100%); padding:2.5rem 0; }
        .hero-photo::before { content:''; position:absolute; inset:0; opacity:0.5; background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,40 C300,90 900,0 1200,50 L1200,120 L0,120 Z' fill='%23ffffff' fill-opacity='0.05'/%3E%3Cpath d='M0,70 C400,20 800,100 1200,60 L1200,120 L0,120 Z' fill='%23ffffff' fill-opacity='0.06'/%3E%3C/svg%3E"); background-size:cover; background-position:bottom; }
        .hero-photo .container { position:relative; z-index:1; }
        .page-hero { background:rgba(0,20,40,0.55); border-radius:16px; padding:2rem 2.25rem; margin:1.75rem auto 0; color:#fff; text-align:center; }
        .page-hero h1 { font-family:'Roboto', sans-serif; font-size:36px; line-height:1.4em; font-weight:500; margin-bottom:0.4rem; }
        @media (max-width:767.98px) { .page-hero h1 { font-size:1.5rem; } .page-hero { padding:1.25rem 1.25rem; } }
        .breadcrumb-item a { color: var(--aqua-light); }
        .breadcrumb-item.active { color: rgba(255,255,255,0.75); }
        .breadcrumb-item+.breadcrumb-item::before { color: rgba(255,255,255,0.5); }
        .breadcrumb { justify-content:center; }

        .section-title { font-family:'Roboto', sans-serif; font-size:1.35rem; font-weight:700; color:var(--aqua-dark); border-left:4px solid var(--aqua-accent); padding-left:0.75rem; margin-bottom:1.5rem; }
        .text-aqua { color: var(--aqua-primary) !important; }
        .badge-aqua { background:var(--aqua-primary); color:#fff; font-weight:700; border-radius:6px; font-size:0.72rem; padding:0.3em 0.65em; }
        .btn-aqua { background:var(--aqua-cta); color:#fff !important; border:none; font-weight:700; font-size:0.875rem; border-radius:8px; padding:0.5rem 1.1rem; }
        .btn-aqua:hover { background:#e8613f; color:#fff; }

        /* Footer */
        footer { background: var(--aqua-dark); color: rgba(255,255,255,0.8); padding: 2.5rem 0 0; }
        footer h5 { font-family:'Roboto', sans-serif; font-size:1rem; color:#fff; border-bottom:2px solid var(--aqua-accent); padding-bottom:0.6rem; margin-bottom:1.1rem; }
        footer ul { list-style:none; padding:0; margin:0; }
        footer ul li { margin-bottom:0.45rem; }
        footer ul li a { color:rgba(255,255,255,0.75); text-decoration:none; font-size:0.875rem; }
        footer ul li a:hover { color:var(--aqua-light); }
        footer ul li a i { margin-right:6px; }
        .footer-bottom { background:var(--aqua-dark2); padding:1rem 0; margin-top:2rem; font-size:0.8rem; color:rgba(255,255,255,0.6); }
        .footer-logos .logo-box { background:#fff; border-radius:8px; padding:0.5rem 0.9rem; display:flex; align-items:center; }
        .footer-logos img { max-height:36px; }
        .footer-logos .logo-placeholder { height:44px; max-width:130px; border-color:rgba(255,255,255,0.25); color:rgba(255,255,255,0.55); }
    </style>

    @stack('styles')
</head>
<body>

    <div class="hero-photo">
        <div class="container">
            {{-- SIGLE — vor fi înlocuite cu fișierele oficiale în public/images/pddtj/ --}}
            <div class="logos-card">
                <div class="logos-track">
                    @foreach ([
                        ['file' => 'logo-ue.png',          'alt' => 'Cofinanțat de Uniunea Europeană', 'label' => 'Sigla UE'],
                        ['file' => 'logo-guvernul-ro.png', 'alt' => 'Guvernul României',                'label' => 'Guvernul României'],
                        ['file' => 'logo-pddtj.png',       'alt' => 'Dezvoltare Durabilă și Tranziție Justă', 'label' => 'Sigla PDDTJ'],
                    ] as $logo)
                        <div class="logo-slot">
                            @if(file_exists(public_path('images/pddtj/'.$logo['file'])))
                                <img src="{{ asset('images/pddtj/'.$logo['file']) }}" alt="{{ $logo['alt'] }}">
                            @else
                                <div class="logo-placeholder">{{ $logo['label'] }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            @hasSection('page_hero')
            <div class="page-hero">
                @yield('page_hero')
            </div>
            @endif
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('pddtj.prezentare') }}">
                <img src="{{ asset('images/pddtj/logo-aquaserv.png') }}" alt="Aquaserv Tulcea" style="height:72px;width:auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pddtjNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="pddtjNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('prezentare*') || request()->routeIs('pddtj.prezentare') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">Prezentare</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('pddtj.despre-pddtj') }}"><i class="bi bi-info-circle text-aqua me-2"></i>Despre PDDTJ</a></li>
                            <li><a class="dropdown-item" href="{{ route('pddtj.despre-proiect') }}"><i class="bi bi-file-earmark-text text-aqua me-2"></i>Despre proiect</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('pddtj.contracte') ? 'active' : '' }}" href="{{ route('pddtj.contracte') }}">Contracte</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('pddtj.comunicare') ? 'active' : '' }}" href="{{ route('pddtj.comunicare') }}">Comunicare</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('pddtj.galerie') ? 'active' : '' }}" href="{{ route('pddtj.galerie') }}">Galerie</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('pddtj.contact') ? 'active' : '' }}" href="{{ route('pddtj.contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5>CONTACT</h5>
                    <ul>
                        <li><i class="bi bi-geo-alt"></i>Adresa: Str. Rezervorului, nr. 2 (avize și autorizații, reclamații)</li>
                        <li><i class="bi bi-telephone"></i>Telefon/Fax: 0240.524.310</li>
                        <li><i class="bi bi-headset"></i>Telefon dispecerat: 0747.022.009</li>
                        <li><i class="bi bi-envelope"></i>E-mail: secretariat@aquaservtulcea.ro</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>LINK-URI UTILE</h5>
                    <ul>
                        <li><a href="https://www.aquaservtulcea.ro/" target="_blank" rel="noopener"><i class="bi bi-box-arrow-up-right"></i>Website Aquaserv Tulcea</a></li>
                    </ul>
                    <p style="font-size:0.82rem;color:rgba(255,255,255,0.7);line-height:1.7;margin-top:0.75rem;">
                        Pentru informații detaliate despre celelalte programe cofinanțate de Uniunea Europeană, vă invităm să vizitați
                        <a href="https://mfe.gov.ro/" target="_blank" rel="noopener" style="color:var(--aqua-light);">mfe.gov.ro</a>.
                    </p>
                </div>
                <div class="col-md-4">
                    <h5 style="border-bottom:none;padding-bottom:0;">Operatorul care furnizează și prestează servicii de alimentare cu apă și canalizare în județul Tulcea</h5>
                    <p style="font-size:0.78rem;color:rgba(255,255,255,0.6);line-height:1.6;margin:0;">
                        Conținutul acestui material nu reprezintă în mod obligatoriu poziția oficială a Uniunii Europene sau a Guvernului României.
                    </p>
                </div>
            </div>

            <div class="row mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.12);">
                <div class="col-12">
                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start footer-logos">
                        @foreach (['logo-ue.png' => 'Cofinanțat de Uniunea Europeană', 'logo-guvernul-ro.png' => 'Guvernul României', 'logo-pddtj.png' => 'Dezvoltare Durabilă și Tranziție Justă'] as $file => $alt)
                            @if(file_exists(public_path('images/pddtj/'.$file)))
                                <div class="logo-box"><img src="{{ asset('images/pddtj/'.$file) }}" alt="{{ $alt }}"></div>
                            @else
                                <div class="logo-placeholder">{{ $alt }}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom text-center mt-4">
            <div class="container">
                &copy; {{ date('Y') }} S.C. Aquaserv S.A. Tulcea
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
