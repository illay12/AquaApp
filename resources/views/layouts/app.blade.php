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
            --aqua-dark:      #06395f;
            --aqua-light:     #90e0ef;
            --aqua-accent:    #00b4d8;
            --aqua-bg:        #f4f8fb;
            --aqua-text:      #0d2236;
            --aqua-gray:      #6b7a8c;
            --aqua-border:    #e3ecf3;
            --site-ink:       #0d2236;
            --site-deep:      #06395f;
            --site-line:      #e5edf3;
        }
        * { box-sizing: border-box; }l,
        /* meniul mobil e ascuns din <head> – nu poate apărea nestilizat nici o fracțiune de secundă */
        .mm:not(.is-open) { visibility: hidden; }
        body { font-family: 'Nunito', sans-serif; font-size: 17px; color: var(--aqua-text); background-color: #ffffff; display: flex; flex-direction: column; min-height: 100vh; overflow-wrap: break-word; }
        /* cuvintele foarte lungi (ex. titluri fără spații, linkuri) nu mai lățesc pagina pe mobil */
        h1, h2, h3, h4, h5, h6 { overflow-wrap: anywhere; }
        main { flex: 1; }
        p { font-size: 1.05rem; line-height: 1.75; }
        /* ── HEADER („Delta”) ── */
        .topbar { background: var(--site-deep); color: rgba(255,255,255,0.78); font-size: 0.8rem; font-weight: 600; padding: 7px 0; }
        .topbar a { color: rgba(255,255,255,0.78); text-decoration: none; transition: color .2s; }
        .topbar a:hover { color: #fff; }
        .topbar-sep { display: inline-block; width: 1px; height: 12px; background: rgba(255,255,255,0.2); margin: 0 .9rem; vertical-align: middle; }
        .topbar-avarii { color: #fff !important; font-weight: 800; }
        .topbar-avarii i { color: #ff8a8a; }
        .navbar { background: rgba(255,255,255,0.97); backdrop-filter: saturate(1.4) blur(10px); -webkit-backdrop-filter: saturate(1.4) blur(10px); border-bottom: 1px solid var(--site-line); padding: 0; z-index: 1030; transition: box-shadow .25s ease; }
        .navbar.is-scrolled { box-shadow: 0 10px 30px -18px rgba(6,57,95,0.35); }
        .navbar-brand img { height: 64px; }
        .navbar-brand-logo { width: auto; }
        .navbar-brand span { font-family: 'Merriweather', serif; font-size: 1.3rem; font-weight: 700; color: var(--site-ink); line-height: 1.2; letter-spacing: -.01em; }
        .navbar-brand small { font-family: 'Nunito', sans-serif; font-size: 0.78rem; font-weight: 600; color: var(--aqua-gray); display: block; letter-spacing: 0.04em; text-transform: uppercase; }
        .navbar-brand-text small { color: var(--aqua-primary) !important; }
        .navbar-nav .nav-link { position: relative; font-weight: 700; font-size: 0.95rem; color: var(--site-ink) !important; padding: 1.5rem 1rem !important; transition: color 0.2s; }
        .navbar-nav .nav-link::before { content: ""; position: absolute; left: 1rem; right: 1rem; bottom: 1.05rem; height: 2px; border-radius: 2px; background: var(--aqua-primary); transform: scaleX(0); transform-origin: left; transition: transform .25s ease; }
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active { color: var(--aqua-primary) !important; }
        .navbar-nav .nav-link:hover::before, .navbar-nav .nav-link.active::before { transform: scaleX(1); }
        .navbar-nav .dropdown-toggle::after { opacity: .45; margin-left: .35em; vertical-align: .15em; }
        .navbar-nav .dropdown-menu { border: 1px solid var(--site-line); box-shadow: 0 24px 50px -20px rgba(6,57,95,0.35); border-radius: 16px; margin-top: 0; padding: .5rem; }
        .nav-search { background: none; border: none; cursor: pointer; width: 42px; height: 42px; border-radius: 50%; color: var(--site-ink); display: inline-flex; align-items: center; justify-content: center; transition: background .2s, color .2s; }
        .nav-search:hover { background: #eef5fa; color: var(--aqua-primary); }
        .nav-cta { display: inline-flex; align-items: center; gap: .45rem; height: 42px; padding: 0 1.15rem; border-radius: 999px; background: var(--site-ink); color: #fff !important; font-weight: 800; font-size: .9rem; text-decoration: none; white-space: nowrap; transition: background .2s, transform .2s; }
        .nav-cta:hover { background: var(--aqua-primary); }
        .nav-cta:active { transform: scale(.97); }
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
        .navbar-nav .dropdown-item { font-size: 0.9rem; font-weight: 600; padding: 0.6rem 1rem; color: var(--site-ink); border-radius: 10px; }
        .navbar-nav .dropdown-item:hover { background-color: #f1f7fb !important; color: var(--aqua-primary) !important; }
        .navbar-nav .dropdown-divider { border-color: var(--site-line); margin: .4rem .5rem; }
        /* ── PAGE HERO („Delta”): navy, val alb jos ── */
        .page-hero {
            position: relative; overflow: hidden; color: #fff;
            background: radial-gradient(120% 160% at 100% 0%, #0a6aa8 0%, var(--site-deep) 55%);
            padding: 3rem 0 4.25rem;
        }
        .page-hero::before { content: ''; position: absolute; width: 520px; height: 520px; right: -160px; top: -260px; border-radius: 50%; background: rgba(144,224,239,0.10); pointer-events: none; }
        .page-hero::after {
            /* depășește marginile cu 2px: altfel, la zoom / lățimi fracționare, anti-aliasing-ul SVG lasă o linie fină */
            content: ''; position: absolute; left: -2px; right: -2px; bottom: -2px; height: 46px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 60' preserveAspectRatio='none'%3E%3Cpath d='M0,30 C360,70 1080,-10 1440,30 L1440,60 L0,60 Z' fill='%23ffffff'/%3E%3C/svg%3E") no-repeat bottom / 100% 100%;
        }
        .page-hero h1 { font-family: 'Merriweather', serif; font-size: clamp(1.5rem, 3.4vw, 2.4rem); font-weight: 700; line-height: 1.2; letter-spacing: -.01em; margin-bottom: .6rem; text-wrap: balance; }
        .page-hero h1 > i.bi { display: none; }
        .page-hero p { color: rgba(255,255,255,.82); }
        .page-hero .breadcrumb { font-size: .85rem; font-weight: 700; margin-bottom: 0; }
        .breadcrumb-item a { color: #9fd3ea; text-decoration: none; }
        .breadcrumb-item a:hover { color: #fff; }
        .breadcrumb-item.active { color: rgba(255,255,255,0.7); }
        .breadcrumb-item+.breadcrumb-item::before { color: rgba(255,255,255,0.4); }

        /* ── CARDURI ── */
        .card { --bs-card-border-radius: 18px; --bs-card-inner-border-radius: 17px; border: 1px solid var(--site-line); border-radius: 18px; transition: box-shadow 0.25s, transform 0.25s; }
        .card > .list-group:last-child { overflow: hidden; }
        a.card:hover, .card.card-link:hover { transform: translateY(-3px); box-shadow: 0 20px 40px -24px rgba(13,34,54,.35); }
        .card-header { background: transparent; color: var(--site-ink); border-bottom: 1px solid var(--site-line); border-radius: 18px 18px 0 0 !important; font-weight: 800; padding: 1rem 1.2rem; }
        .card-header > i.bi { color: var(--aqua-primary); }
        .card .list-group-item { border-color: var(--site-line); padding: .8rem 1.2rem; font-weight: 600; color: var(--site-ink); }
        .card .list-group-item i.bi { color: var(--aqua-primary); }
        .card .list-group-item-action:hover { background: #f3f9fd; color: var(--aqua-primary); }
        .card .list-group-item.active, .card .list-group-item.active:hover { background: #eaf4fb !important; border-color: var(--site-line) !important; color: var(--aqua-primary) !important; box-shadow: inset 3px 0 0 var(--aqua-primary); }
        .card .list-group-item.active i.bi { color: var(--aqua-primary); }

        /* Card „sună dispeceratul” (sidebar-uri, pagini) */
        .side-call { display: flex; align-items: center; gap: .9rem; padding: 1rem 1.1rem; border-radius: 18px; background: #fdf3f3; color: var(--site-ink); text-decoration: none; transition: background .2s; }
        .side-call:hover { background: #fbe6e6; color: var(--site-ink); }
        .side-call__icon { width: 46px; height: 46px; border-radius: 50%; background: #d64545; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.15rem; flex-shrink: 0; }
        .side-call small { display: block; font-size: .72rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: #c53030; }
        .side-call strong { display: block; font-size: 1.35rem; font-weight: 800; line-height: 1.2; }

        /* ── FORMULARE ── */
        .form-control, .form-select { border-radius: 12px; border-color: #d7e3ec; padding: .6rem .9rem; }
        .form-control-sm, .form-select-sm { border-radius: 10px; }
        .form-control:focus, .form-select:focus { border-color: var(--aqua-primary); box-shadow: 0 0 0 4px rgba(0,119,182,.12); }
        .form-label { font-weight: 700; color: var(--site-ink); }

        /* ── TABELE ── */
        .table { --bs-table-border-color: var(--site-line); }
        .table > thead th { font-size: .78rem; font-weight: 800; letter-spacing: .06em; text-transform: uppercase; color: #5f7184; background: #f5f9fc; border-bottom-width: 1px; }
        .table-responsive { border-radius: 14px; -webkit-overflow-scrolling: touch; }

        /* ── PAGINARE ── */
        .pagination .page-link { min-width: 42px; height: 42px; display: inline-flex; align-items: center; justify-content: center; border-radius: 999px !important; font-weight: 700; color: var(--site-ink); border-color: var(--site-line); }
        .pagination .page-link:hover { background: #f1f8fc; color: var(--aqua-primary); }
        .pagination .page-item.disabled .page-link { color: #a8b5c2; background: #fff; }
        .pagination .page-item.active .page-link { background: var(--site-ink) !important; border-color: var(--site-ink) !important; }

        /* ── TAB-URI PASTILĂ ── */
        .nav-pills .nav-link { border-radius: 999px !important; background: #f1f6fa; color: var(--site-ink); font-weight: 700; padding: .55rem 1.1rem; white-space: nowrap; }
        .nav-pills .nav-link:hover { background: #e6f0f7; color: var(--site-ink); }
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link { background: var(--site-ink) !important; color: #fff !important; }

        /* ── ACCORDION ── */
        .accordion-item { border-color: var(--site-line); }
        .accordion-item:first-of-type, .accordion-item:first-of-type .accordion-button { border-top-left-radius: 16px; border-top-right-radius: 16px; }
        .accordion-item:last-of-type, .accordion-item:last-of-type .accordion-button.collapsed { border-bottom-left-radius: 16px; border-bottom-right-radius: 16px; }
        .accordion-button { font-weight: 700; color: var(--site-ink); }
        .accordion-button:not(.collapsed) { background: #f1f8fc; color: var(--aqua-primary); box-shadow: none; }
        .accordion-button:focus { box-shadow: 0 0 0 4px rgba(0,119,182,.12); }

        /* Prima secțiune de sub page-hero: multe pagini au padding:3.5rem inline — prea mult sub val */
        .page-hero + main > section:first-child { padding-top: 2.25rem !important; }

        /* ── MOBIL: baza pentru toate paginile (95% din vizite) ── */
        @media (max-width: 767.98px) {
            .page-hero + main > section:first-child { padding-top: 1.1rem !important; }
            main > section:last-child { padding-bottom: 3rem !important; }
            body { font-size: 16px; }
            p { font-size: 1rem; line-height: 1.7; }
            .container, .container-fluid { --bs-gutter-x: 2rem; }
            /* g-5 (3rem) depășește padding-ul containerului pe telefon */
            .row.g-5, .row.gx-5 { --bs-gutter-x: 2rem; }
            .page-hero { padding: 1.6rem 0 2.9rem; }
            .page-hero::after { height: 26px; }
            .page-hero h1 { font-size: 1.5rem; margin-bottom: .4rem; }
            /* pe mobil: fără subtitlu sub titlul paginii – ocupă prea mult din primul ecran */
            .page-hero p { display: none; }

            /* .table-stack: pe mobil fiecare rând devine un card (prima celulă = titlu, restul = etichetă + valoare).
               Etichetele (data-label) se completează automat din antetul tabelului. */
            .table-stack, .table-stack tbody { display: block; width: 100%; border: 0 !important; }
            .table-stack thead { display: none; }
            .table-stack tr {
                display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .65rem 1rem;
                padding: .95rem 1rem; margin-bottom: .7rem; border: 1px solid var(--site-line) !important; border-radius: 16px; background: #fff !important;
            }
            .table-stack td {
                display: block; padding: 0 !important; border: 0 !important; background: none !important; box-shadow: none !important;
                text-align: left !important; font-size: .95rem; color: var(--site-ink); overflow-wrap: anywhere;
            }
            .table-stack td::before { content: attr(data-label); display: block; margin-bottom: .1rem; font-size: .72rem; font-weight: 800; letter-spacing: .06em; text-transform: uppercase; color: #7b8a9a; }
            .table-stack td:first-child { grid-column: 1 / -1; font-size: 1rem; font-weight: 800; }
            .table-stack td:first-child::before { content: none; }
            /* rând-titlu de grup (o singură celulă cu colspan) → etichetă de secțiune, nu card */
            .table-stack tr:has(> td[colspan]) { display: block; margin: 1rem 0 .5rem; padding: 0; border: 0 !important; background: none !important; }
            .table-stack td[colspan] { font-size: .78rem !important; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: var(--aqua-primary) !important; }
            .table-responsive:has(> .table-stack) { overflow: visible; }
            .page-hero .breadcrumb { font-size: .78rem; flex-wrap: nowrap; overflow-x: auto; white-space: nowrap; scrollbar-width: none; }
            .page-hero .breadcrumb::-webkit-scrollbar { display: none; }
            /* iOS face zoom pe input-uri cu font < 16px */
            input.form-control, select.form-select, textarea.form-control, .form-control-sm, .form-select-sm { font-size: 16px !important; min-height: 44px; }
            .card { border-radius: 16px; }
            .card-header { border-radius: 16px 16px 0 0 !important; padding: .9rem 1rem; }
            .card .list-group-item { padding: .85rem 1rem; }
            .btn { min-height: 44px; display: inline-flex; align-items: center; justify-content: center; }
            .btn-sm { min-height: 38px; }
            .table { font-size: .9rem; }
            .section-title { font-size: 1.25rem; }
        }
        .quick-access-card { text-align: center; padding: 1.8rem 1rem; border-radius: 14px; background: #fff; border: 1.5px solid var(--aqua-border); transition: all 0.25s; text-decoration: none; color: var(--aqua-text); display: block; }
        .quick-access-card:hover { background: var(--aqua-primary); border-color: var(--aqua-primary); color: #fff; transform: translateY(-4px); box-shadow: 0 10px 28px rgba(0,119,182,0.2); }
        .quick-access-card .icon-wrap { width: 64px; height: 64px; border-radius: 50%; background: var(--aqua-bg); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.8rem; color: var(--aqua-primary); transition: all 0.25s; }
        .quick-access-card:hover .icon-wrap { background: rgba(255,255,255,0.2); color: #fff; }
        .quick-access-card h6 { font-weight: 700; font-size: 0.9rem; margin: 0; min-height: 2.5em; display: flex; align-items: center; justify-content: center; }
        .news-item { border-left: 3px solid var(--aqua-primary); padding: 0.9rem 1.1rem; margin-bottom: .75rem; background: #f6fafd; border-radius: 0 14px 14px 0; transition: border-color 0.2s; }
        .news-item:hover { border-left-color: var(--aqua-accent); }
        .news-item .date { font-size: 0.75rem; color: var(--aqua-gray); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; }
        .news-item h6 { font-weight: 700; margin: 0.2rem 0 0; font-size: 0.9rem; }
        .news-item h6 a { color: var(--aqua-text); text-decoration: none; }
        .news-item h6 a:hover { color: var(--aqua-primary); }
        /* ── FOOTER („Delta”) ── */
        footer { position: relative; background: var(--site-deep); color: rgba(255,255,255,0.72); margin-top: 60px; padding-top: 3.5rem; }
        .footer-wave { position: absolute; left: 0; top: -59px; width: 100%; height: 60px; display: block; }
        .footer-cta { display: flex; align-items: center; justify-content: space-between; gap: 1.5rem; flex-wrap: wrap; padding-bottom: 2.5rem; margin-bottom: 2.75rem; border-bottom: 1px solid rgba(255,255,255,0.12); }
        .footer-cta__title { font-family: 'Merriweather', serif; font-weight: 700; font-size: clamp(1.4rem, 2.6vw, 2rem); line-height: 1.2; color: #fff; margin: 0; }
        .footer-cta__phones { display: flex; gap: .75rem; flex-wrap: wrap; }
        .footer-phone { display: inline-flex; align-items: center; gap: .75rem; padding: .7rem 1.2rem .7rem .7rem; border-radius: 999px; background: rgba(255,255,255,0.08); color: #fff; text-decoration: none; transition: background .2s; }
        .footer-phone:hover { background: rgba(255,255,255,0.16); color: #fff; }
        .footer-phone__icon { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #fff; color: var(--site-deep); flex-shrink: 0; }
        .footer-phone--alert .footer-phone__icon { background: #ff6b6b; color: #fff; }
        .footer-phone small { display: block; font-size: .7rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: #9fd3ea; }
        .footer-phone strong { display: block; font-size: 1.05rem; font-weight: 800; line-height: 1.2; }
        .footer-brand { display: flex; align-items: center; gap: .75rem; margin-bottom: 1rem; }
        .footer-brand__icon { width: 44px; height: 44px; border-radius: 14px; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #90e0ef; font-size: 1.3rem; }
        .footer-brand strong { display: block; font-family: 'Merriweather', serif; color: #fff; font-size: 1.15rem; line-height: 1.2; }
        .footer-brand small { display: block; font-size: .68rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: #90e0ef; }
        footer h5 { font-family: 'Nunito', sans-serif; font-size: .75rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; color: #90e0ef; margin-bottom: 1.1rem; }
        footer p { font-size: .9rem; line-height: 1.7; }
        footer ul { list-style: none; padding: 0; margin: 0; }
        footer ul li { margin-bottom: 0.55rem; }
        footer ul li a { color: rgba(255,255,255,0.78); text-decoration: none; font-size: 0.92rem; font-weight: 600; transition: color 0.2s; }
        footer ul li a:hover { color: #fff; }
        footer ul li a i { margin-right: 8px; color: #90e0ef; }
        .footer-social { display: inline-flex; width: 40px; height: 40px; border-radius: 50%; align-items: center; justify-content: center; background: rgba(255,255,255,0.08); color: #fff; text-decoration: none; transition: background .2s; }
        .footer-social:hover { background: rgba(255,255,255,0.18); color: #fff; }
        .footer-bottom { padding: 1.4rem 0; margin-top: 3rem; border-top: 1px solid rgba(255,255,255,0.12); font-size: 0.82rem; color: rgba(255,255,255,0.5); }
        .footer-bottom a { color: rgba(255,255,255,0.6); text-decoration: none; margin-left: 1.25rem; }
        .footer-bottom a:hover { color: #fff; }
        .footer-credit { display: block; margin-top: .25rem; font-size: .75rem; color: rgba(255,255,255,0.38); }
        .footer-bottom .footer-credit a { margin-left: 0; color: rgba(255,255,255,0.5); }
        /* Footer accordion — doar mobil, ca să nu mai fie un scroll lung de linkuri */
        .footer-col-icon { display: none; }
        @media (max-width: 767.98px) {
            footer { margin-top: 32px; padding-top: 2.25rem; }
            .footer-wave { top: -31px; height: 32px; }
            .footer-cta { padding-bottom: 1.75rem; margin-bottom: 1.5rem; }
            .footer-cta__phones { width: 100%; flex-direction: column; }
            .footer-phone { width: 100%; }
            .footer-col-toggle { cursor: pointer; display: flex; justify-content: space-between; align-items: center; margin-bottom: 0; font-size: .82rem; }
            .footer-col-icon { display: inline-block; font-size: 0.85rem; transition: transform 0.25s; }
            .footer-col-toggle.active .footer-col-icon { transform: rotate(180deg); }
            .footer-col-body { display: none; overflow: hidden; padding-top: 1rem; }
            .footer-col-body.show { display: block; }
            .footer-col { padding-bottom: 0.95rem; margin-bottom: 0.95rem; border-bottom: 1px solid rgba(255,255,255,0.12); }
            .footer-col:last-child { border-bottom: none; margin-bottom: 0; }
            .footer-bottom { margin-top: 1.5rem; }
            .footer-bottom a { margin-left: 0; margin-right: 1.25rem; }
        }
        .btn-aqua { background: var(--site-ink); color: #fff !important; border: none; font-weight: 800 !important; font-size: 0.9rem !important; font-family: 'Nunito', sans-serif !important; text-transform: none !important; letter-spacing: normal !important; white-space: nowrap !important; border-radius: 999px; padding: 0.6rem 1.35rem !important; transition: background 0.2s, transform 0.15s; }
        .btn-aqua:hover { background: var(--aqua-primary); color: #fff; }
        .btn-aqua:active { transform: scale(.97); }
        .btn-outline-aqua { border: 1.5px solid #cfdde8; color: var(--site-ink); font-weight: 800; border-radius: 999px; padding: 0.55rem 1.35rem; background: #fff; transition: all 0.2s; }
        .btn-outline-aqua:hover { border-color: var(--aqua-primary); background: var(--aqua-primary); color: #fff; }
        .badge-aqua { background: #e6f2fa; color: var(--aqua-primary); font-weight: 800; border-radius: 999px; font-size: 0.72rem; padding: 0.35em 0.8em; }
        .alert-band { background: #fff8e6; border-bottom: 1px solid #f6e3b0; color: #6b4e00; padding: 0.75rem 1rem; font-size: 0.9rem; font-weight: 700; }
        .section-title { font-family: 'Merriweather', serif; font-size: 1.5rem; font-weight: 700; color: var(--site-ink); letter-spacing: -.01em; margin-bottom: 1.25rem; }
        .text-aqua { color: var(--aqua-primary) !important; }
        .bg-aqua-light { background-color: var(--aqua-bg) !important; }
        /* Nav padding consistent — toate lățimile desktop */
        @media (min-width: 1200px) {
            .navbar-nav .nav-link { padding: 1.5rem 0.7rem !important; }
            .navbar-nav .nav-link::before { left: .7rem; right: .7rem; }
        }
        @media (min-width: 1200px) and (max-width: 1399px) {
            .navbar-nav .nav-link { padding: 1.5rem 0.6rem !important; font-size: .9rem; }
            .navbar-nav .nav-link::before { left: .6rem; right: .6rem; }
            .navbar-brand span { font-size: 1.1rem; }
        }
        @media (min-width: 1200px) and (max-width: 1280px) {
            .navbar-nav .nav-link { font-size: 0.82rem !important; padding: 1.5rem 0.45rem !important; }
            .navbar-nav .nav-link::before { left: .45rem; right: .45rem; }
            .navbar-brand span { font-size: 1rem; }
            .navbar-brand small { font-size: 0.65rem; }
        }
        @media (max-width: 1199.98px) {
            .navbar-nav .nav-link { border-bottom: none; padding: 0.6rem 1rem !important; }
            /* Logo-ul nu mai dă wrap pe rândul de sub el — butonul de meniu rămâne pe același rând */
            .navbar > .container { flex-wrap: nowrap; }
            .navbar-toggler { flex-shrink: 0; }
        }
        .navbar-brand { min-width: 0; }
        .navbar-brand-logo { flex-shrink: 0; }
        .navbar-brand-text { min-width: 0; overflow: hidden; }
        .navbar-brand-text span, .navbar-brand-text small {
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block;
        }
        /* Header compact pe mobil (~64px) — sticky, deci ocupă cât mai puțin ecran */
        @media (max-width: 767.98px) {
            .navbar { padding: 0.55rem 0; }
            .navbar-brand { gap: 0.85rem !important; padding: 0; margin-right: 0.5rem; }
            .navbar-brand .navbar-brand-logo { height: 44px; }
            .navbar-brand span { font-size: 1.22rem; }
            .navbar-brand small { font-size: 0.72rem !important; }
            .navbar-toggler i { font-size: 1.6rem !important; }
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

    @if(config('services.google_analytics.id'))
    <script nonce="@nonce">
        window._GA_ID = '{{ config('services.google_analytics.id') }}';
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        @if(request()->cookie('cookie_consent') === 'accepted')
        (function() {
            var s = document.createElement('script');
            s.async = true;
            s.src = 'https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}';
            document.head.appendChild(s);
        })();
        gtag('config', '{{ config('services.google_analytics.id') }}');
        setTimeout(function() { gtag('event', 'user_engagement', {engagement_time_msec: 10000}); }, 10000);
        @endif
    </script>
    @endif
</head>
<body>

    {{-- TOP BAR --}}
    <div class="topbar d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <a href="tel:0240524310"><i class="bi bi-telephone me-1"></i> 0240 524 310</a>
                <span class="topbar-sep"></span>
                <a href="mailto:secretariat@aquaservtulcea.ro"><i class="bi bi-envelope me-1"></i> secretariat@aquaservtulcea.ro</a>
                <span class="topbar-sep"></span>
                <span><i class="bi bi-clock me-1"></i> Lun–Vin: 07:30 – 16:00</span>
            </div>
            <div>
                <a href="tel:0747022009" class="topbar-avarii"><i class="bi bi-telephone-fill me-1"></i> Avarii 24/7: 0747 022 009</a>
                <span class="topbar-sep"></span>
                <a href="https://www.facebook.com/AquaservTulcea/" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            </div>
        </div>
    </div>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-xl sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ url('/') }}">
                <img src="{{ asset('images/logo/picatura.png') }}" class="navbar-brand-logo" width="108" height="168" alt="">

                <div class="navbar-brand-text">
                    <span>Aquaserv Tulcea</span>
                    <small style="color:#00b4d8;font-size:0.7rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;">Servicii apă și canal</small>                 </div>
            </a>

            <button class="navbar-toggler border-0 d-xl-none" type="button" id="btnDeschideMeniu" aria-label="Deschide meniul" aria-controls="mobileMenu" aria-expanded="false" style="padding:0.4rem 0.6rem;">
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
                                        <a class="dropdown-item" href="https://{{ config('app.pddtj_domain') }}/" target="_blank" rel="noopener noreferrer">
                                            <i class="bi bi-box-arrow-up-right text-aqua me-2"></i>Aquaserv - PDDTJ
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
                            <li><a class="dropdown-item" href="https://declaratii.integritate.eu/" target="_blank" rel="noopener">
                                <i class="bi bi-cash-coin text-aqua me-2"></i>Declarații de avere</a></li>
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
                                <a class="dropdown-item {{ request()->is('transparenta/rapoarte-evaluare*') || request()->is('transparenta/raport-anual*') || request()->is('transparenta/raport-audit*') || request()->is('transparenta/raporturi-cnr*') || request()->is('transparenta/raport-comitet-audit*') || request()->is('transparenta/raport-comitet-risc*') ? 'active' : '' }}" href="#">
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
                                    <li><a class="dropdown-item {{ request()->is('transparenta/raport-comitet-audit*') ? 'active' : '' }}" href="{{ url('/transparenta/raport-comitet-audit') }}">
                                        <i class="bi bi-clipboard2-check text-aqua me-2"></i>Raport Comitet Audit</a></li>
                                    <li><a class="dropdown-item {{ request()->is('transparenta/raport-comitet-risc*') ? 'active' : '' }}" href="{{ url('/transparenta/raport-comitet-risc') }}">
                                        <i class="bi bi-exclamation-triangle text-aqua me-2"></i>Raport Comitet Risc</a></li>
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
                        <button id="btnSearch" class="nav-search" aria-label="Caută">
                            <i class="bi bi-search" style="font-size:1.05rem;"></i>
                        </button>
                    </li>
                    <li class="nav-item ms-lg-2 d-flex align-items-center">
                        <a href="{{ url('https://my.aquaservtulcea.ro/') }}" class="nav-cta">
                            <i class="bi bi-person-circle"></i> Contul meu
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @include('components.meniu-mobil')

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
        <svg class="footer-wave" viewBox="0 0 1440 60" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,40 C360,0 1080,80 1440,20 L1440,60 L0,60 Z" fill="#06395f"/>
        </svg>
        <div class="container">
            <div class="footer-cta">
                <p class="footer-cta__title">Suntem aici pentru tine,<br>zi și noapte.</p>
                <div class="footer-cta__phones">
                    <a href="tel:0747022009" class="footer-phone footer-phone--alert">
                        <span class="footer-phone__icon"><i class="bi bi-telephone-fill"></i></span>
                        <span><small>Dispecerat avarii 24/7</small><strong>0747 022 009</strong></span>
                    </a>
                    <a href="tel:0240524310" class="footer-phone">
                        <span class="footer-phone__icon"><i class="bi bi-headset"></i></span>
                        <span><small>Relații clienți</small><strong>0240 524 310</strong></span>
                    </a>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6 footer-col">
                    <div class="footer-brand d-none d-md-flex">
                        <span class="footer-brand__icon"><i class="bi bi-droplet-half"></i></span>
                        <span><strong>Aquaserv Tulcea</strong><small>Servicii apă și canal</small></span>
                    </div>
                    <h5 class="footer-col-toggle d-md-none" data-target="footerColInfo">
                        Aquaserv S.A. <i class="bi bi-chevron-down footer-col-icon"></i>
                    </h5>
                    <div class="footer-col-body" id="footerColInfo">
                        <ul>
                            <li><a href="https://maps.app.goo.gl/jDibWxXwgdk4kuQr5" target="_blank" rel="noopener"><i class="bi bi-geo-alt"></i> Str. Rezervorului, nr. 2, Tulcea</a></li>
                            <li><a href="mailto:secretariat@aquaservtulcea.ro"><i class="bi bi-envelope"></i> secretariat@aquaservtulcea.ro</a></li>
                            <li><a href="{{ url('/program-casierii') }}"><i class="bi bi-clock"></i> Lun–Vin: 07:30 – 16:00</a></li>
                        </ul>
                        <div class="d-flex gap-2 mt-3">
                            <a href="https://www.facebook.com/AquaservTulcea/" target="_blank" rel="noopener" class="footer-social" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 footer-col">
                    <h5 class="footer-col-toggle" data-target="footerColLinkuri">
                        Link-uri rapide <i class="bi bi-chevron-down footer-col-icon"></i>
                    </h5>
                    <div class="footer-col-body" id="footerColLinkuri">
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
                </div>
                <div class="col-lg-3 col-md-6 footer-col">
                    <h5 class="footer-col-toggle" data-target="footerColClienti">
                        Zona clienți <i class="bi bi-chevron-down footer-col-icon"></i>
                    </h5>
                    <div class="footer-col-body" id="footerColClienti">
                        <ul>
                            <li><a href="{{ url('https://my.aquaservtulcea.ro/login') }}"><i class="bi bi-credit-card"></i> Plătește factura</a></li>
                            <li><a href="{{ url('/client/index-contor') }}"><i class="bi bi-speedometer2"></i> Transmite index contor</a></li>
                            <li><a href="{{ url('/contact/') }}"><i class="bi bi-exclamation-triangle"></i> Raportează avarie</a></li>
                            <li><a href="{{ url('/informatii/formulare') }}"><i class="bi bi-download"></i> Formulare</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-col">
                    <h5 class="footer-col-toggle" data-target="footerColProgram">
                        Program casierii <i class="bi bi-chevron-down footer-col-icon"></i>
                    </h5>
                    <div class="footer-col-body" id="footerColProgram">
                        <p class="mb-2">
                            <strong style="color:#fff;">Tulcea – Sediu central</strong><br>
                            Lun–Vin: 07:30 – 17:00
                        </p>
                        <ul>
                            <li><a href="{{ url('/program-casierii') }}"><i class="bi bi-arrow-right"></i> Casierii în județ</a></li>
                            <li><a href="tel:0340131111"><i class="bi bi-broadcast"></i> Telecitire: 0340 131 111</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <span>
                        &copy; {{ date('Y') }} Aquaserv S.A. Toate drepturile rezervate.
                        @if(request()->is('/'))
                            <span class="footer-credit">Fotografii: <a href="https://unsplash.com/@matthardy" target="_blank" rel="noopener">Matt Hardy</a>, <a href="https://unsplash.com/@kobuagency" target="_blank" rel="noopener">KOBU Agency</a> / Unsplash</span>
                        @endif
                    </span>
                    <span>
                        <a href="{{ url('/gdpr') }}">Politică confidențialitate</a>
                        <a href="{{ url('/cookies') }}">Cookies</a>
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    @stack('scripts')

    <script nonce="@nonce">
    function deschideMeniu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.add('is-open');
        menu.setAttribute('aria-hidden', 'false');
        document.getElementById('btnDeschideMeniu').setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
        document.getElementById('mobileDrawer').focus({ preventScroll: true });
    }
    function inchideMeniu() {
        const menu = document.getElementById('mobileMenu');
        if (!menu.classList.contains('is-open')) return;
        menu.classList.remove('is-open');
        menu.setAttribute('aria-hidden', 'true');
        document.getElementById('btnDeschideMeniu').setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }
    document.addEventListener('DOMContentLoaded', function() {
        // Etichete pentru tabelele .table-stack (afișate pe mobil deasupra fiecărei valori)
        document.querySelectorAll('table.table-stack').forEach(function (t) {
            var cap = Array.from(t.querySelectorAll('thead th')).map(function (th) { return th.textContent.trim(); });
            t.querySelectorAll('tbody tr').forEach(function (tr) {
                Array.from(tr.children).forEach(function (td, i) { if (!td.hasAttribute('data-label')) td.setAttribute('data-label', cap[i] || ''); });
            });
        });
        document.getElementById('btnDeschideMeniu').addEventListener('click', deschideMeniu);
        document.getElementById('btnInchideMeniu').addEventListener('click', inchideMeniu);
        document.getElementById('overlayMeniu').addEventListener('click', inchideMeniu);
        document.addEventListener('keydown', function(e) { if (e.key === 'Escape') inchideMeniu(); });
        // Acordeon: o singură secțiune deschisă odată
        document.querySelectorAll('.mm-sec__btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var sec = btn.parentElement;
                var deschide = !sec.classList.contains('is-open');
                document.querySelectorAll('.mm-sec.is-open').forEach(function(s) {
                    s.classList.remove('is-open');
                    s.querySelector('.mm-sec__btn').setAttribute('aria-expanded', 'false');
                });
                if (deschide) {
                    sec.classList.add('is-open');
                    btn.setAttribute('aria-expanded', 'true');
                    setTimeout(function() { btn.scrollIntoView({ block: 'nearest', behavior: 'smooth' }); }, 300);
                }
            });
        });
        document.querySelectorAll('.dropdown-submenu > .dropdown-item').forEach(function(el) {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });
        });
        var navbar = document.querySelector('.navbar');
        var onScroll = function() { navbar.classList.toggle('is-scrolled', window.scrollY > 8); };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
        document.querySelectorAll('.footer-col-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                if (window.innerWidth > 767.98) return;
                var body = document.getElementById(toggle.dataset.target);
                toggle.classList.toggle('active');
                body.classList.toggle('show');
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
        // Închide meniul mobil înainte de căutare
        inchideMeniu();
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
