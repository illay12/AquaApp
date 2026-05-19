<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagină negăsită (404) – Aquaserv Tulcea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --p:  #0077b6;
            --dk: #023e8a;
            --ac: #00b4d8;
            --bg: #f0f8ff;
            --bd: #caf0f8;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body { height: 100%; height: 100dvh; overflow: hidden; }
        body {
            font-family: 'Nunito', sans-serif;
            color: #1a1a2e;
            background: linear-gradient(150deg, #f0f8ff 0%, #dff0fc 55%, #f0f8ff 100%);
            display: flex; flex-direction: column;
        }

        /* ── TOP BAR ── */
        .top-bar {
            height: 56px; flex-shrink: 0;
            background: var(--dk);
            padding: 0 1.4rem;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 2px 10px rgba(2,62,138,.3);
            z-index: 10;
        }
        .brand {
            display: flex; align-items: center; gap: .55rem;
            text-decoration: none; color: #fff;
        }
        .brand-icon {
            width: 34px; height: 34px; border-radius: 9px;
            background: rgba(255,255,255,.15);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.05rem; color: #90e0ef; flex-shrink: 0;
        }
        .brand-text strong {
            font-family: 'Merriweather', serif;
            font-size: .88rem; display: block; line-height: 1.2;
        }
        .brand-text small {
            font-size: .62rem; opacity: .65;
            text-transform: uppercase; letter-spacing: .05em;
        }
        .btn-nav {
            display: inline-flex; align-items: center; gap: .35rem;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.2);
            color: rgba(255,255,255,.9); font-weight: 700; font-size: .78rem;
            padding: .32rem .85rem; border-radius: 7px;
            text-decoration: none; transition: background .2s; white-space: nowrap;
        }
        .btn-nav:hover { background: rgba(255,255,255,.22); color: #fff; }

        /* ── MAIN ── */
        main {
            flex: 1; min-height: 0;
            display: flex; align-items: center;
            position: relative; overflow: hidden;
            padding: 1.5rem 0;
        }

        /* Cercuri decorative de fundal */
        main::before {
            content: ''; position: absolute;
            width: 500px; height: 500px; top: -160px; right: -120px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,180,216,.11) 0%, transparent 68%);
            pointer-events: none;
        }
        main::after {
            content: ''; position: absolute;
            width: 360px; height: 360px; bottom: -100px; left: -80px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,119,182,.09) 0%, transparent 68%);
            pointer-events: none;
        }

        /* ── ILUSTRAȚIE ── */
        .illus { text-align: center; position: relative; z-index: 1; }

        .drop-icon {
            font-size: 5rem; color: var(--p); display: block; line-height: 1;
            animation: bob 3s ease-in-out infinite;
            filter: drop-shadow(0 10px 20px rgba(0,119,182,.28));
            margin-bottom: .4rem;
        }
        .wave-svg {
            width: 150px; margin: 0 auto .6rem; display: block;
            color: var(--p); opacity: .28;
            animation: drift 3.5s ease-in-out infinite alternate;
        }
        .error-code {
            font-family: 'Merriweather', serif;
            font-size: clamp(5.5rem, 11vw, 8.5rem);
            font-weight: 700; line-height: 1; letter-spacing: -.04em;
            background: linear-gradient(135deg, #023e8a 0%, #0077b6 55%, #00b4d8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            user-select: none;
        }
        .status-pill {
            display: inline-flex; align-items: center; gap: .35rem;
            background: rgba(0,119,182,.08);
            border: 1px solid rgba(0,119,182,.2);
            border-radius: 20px; padding: .25rem .85rem;
            font-size: .68rem; font-weight: 700; color: var(--p);
            letter-spacing: .06em; text-transform: uppercase;
            margin-top: .6rem;
        }

        /* ── CONȚINUT ── */
        .content { position: relative; z-index: 1; }

        .error-title {
            font-family: 'Merriweather', serif;
            font-size: clamp(1.2rem, 2.5vw, 1.6rem);
            font-weight: 700; color: var(--dk);
            line-height: 1.35; margin-bottom: .6rem;
        }
        .error-desc {
            color: #475569; font-size: .9rem; line-height: 1.7;
            max-width: 420px; margin-bottom: 1.5rem;
        }
        .btn-home {
            display: inline-flex; align-items: center; gap: .45rem;
            background: var(--p); color: #fff !important;
            font-weight: 800; font-size: .92rem;
            padding: .65rem 1.75rem; border-radius: 9px;
            text-decoration: none;
            box-shadow: 0 4px 14px rgba(0,119,182,.3);
            transition: background .2s, transform .15s, box-shadow .2s;
            margin-bottom: 1.4rem;
        }
        .btn-home:hover {
            background: var(--dk); transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(2,62,138,.28);
        }
        .or-line {
            display: flex; align-items: center; gap: .55rem;
            color: #94a3b8; font-size: .72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .07em;
            margin-bottom: .85rem; max-width: 380px;
        }
        .or-line::before, .or-line::after { content: ''; flex: 1; height: 1px; background: #dde3ea; }
        .links-grid {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: .55rem; max-width: 380px;
        }
        .link-card {
            display: flex; align-items: center; gap: .6rem;
            background: #fff; border: 1.5px solid var(--bd); border-radius: 11px;
            padding: .65rem .9rem; text-decoration: none; color: #1a1a2e;
            font-weight: 700; font-size: .82rem;
            transition: all .2s; box-shadow: 0 1px 4px rgba(0,119,182,.05);
            position: relative;
        }
        .link-card::after {
            content: '\F285'; font-family: 'bootstrap-icons';
            position: absolute; right: .65rem; font-size: .68rem;
            color: #cbd5e1; transition: color .18s, transform .18s;
        }
        .link-card:hover {
            border-color: var(--p); color: var(--p);
            transform: translateY(-2px);
            box-shadow: 0 5px 14px rgba(0,119,182,.14);
        }
        .link-card:hover::after { color: var(--p); transform: translateX(2px); }
        .lc-icon {
            width: 32px; height: 32px; border-radius: 8px;
            background: var(--bg); display: flex; align-items: center; justify-content: center;
            font-size: .9rem; color: var(--p); flex-shrink: 0; transition: all .2s;
        }
        .link-card:hover .lc-icon { background: var(--p); color: #fff; }

        /* ── FOOTER ── */
        footer {
            height: 38px; flex-shrink: 0;
            background: var(--dk); color: rgba(255,255,255,.45);
            display: flex; align-items: center; justify-content: center;
            font-size: .72rem; gap: .55rem;
        }
        footer a { color: rgba(255,255,255,.6); text-decoration: none; transition: color .15s; }
        footer a:hover { color: #fff; }
        footer span { opacity: .4; }

        /* ── ANIMAȚII ── */
        @@keyframes bob {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-13px); }
        }
        @@keyframes drift {
            from { transform: scaleX(.88); opacity: .22; }
            to   { transform: scaleX(1.12); opacity: .36; }
        }

        /* ══════════════════════════════════════
           MOBIL — totul compact, fără scroll
        ══════════════════════════════════════ */
        @media (max-width: 991px) {
            main {
                flex-direction: column;
                justify-content: space-evenly;
                align-items: center;
                padding: 1rem .75rem;
                gap: 0;
            }
            main::before { width: 280px; height: 280px; top: -80px; right: -60px; }
            main::after  { width: 200px; height: 200px; bottom: -50px; left: -40px; }

            /* Ilustrație → bandă orizontală compactă */
            .illus {
                display: flex; align-items: center;
                justify-content: center; gap: 1.25rem;
                width: 100%;
            }
            .drop-icon   { font-size: 3rem; margin-bottom: 0; animation: none; }
            .wave-svg    { display: none; }
            .error-code  { font-size: 4.5rem; }
            .status-pill { margin-top: .4rem; font-size: .6rem; padding: .2rem .65rem; }

            /* Centraj Bootstrap row */
            .row { justify-content: center; }

            /* Conținut → centrat */
            .content { text-align: center; width: 100%; }
            .error-title { font-size: 1.1rem; margin-bottom: .35rem; }
            .error-desc  {
                font-size: .82rem; line-height: 1.55;
                width: 100%; max-width: 100%; margin: 0 auto 1rem;
                text-align: center;
            }
            .btn-home    {
                font-size: .85rem; padding: .55rem 1.4rem;
                margin-bottom: 1rem; box-shadow: none;
                width: 100%; justify-content: center;
            }
            .or-line {
                width: 100%; max-width: 100%;
                font-size: .66rem; margin-bottom: .65rem;
            }
            .links-grid  { width: 100%; max-width: 100%; gap: .4rem; }
            .link-card   { font-size: .78rem; padding: .5rem .65rem; }
            .link-card::after { display: none; }
            .lc-icon     { width: 27px; height: 27px; font-size: .8rem; }
        }

        /* Telefoane înguste */
        @media (max-width: 400px) {
            .top-bar { padding: 0 .9rem; }
            .brand-text small { display: none; }
            .drop-icon  { font-size: 2.4rem; }
            .error-code { font-size: 3.8rem; }
            .error-title { font-size: 1rem; }
            .link-card  { font-size: .73rem; }
        }

        /* Desktop mediu */
        @media (min-width: 992px) and (max-width: 1199px) {
            .drop-icon { font-size: 4.2rem; }
            .content { padding-left: 2rem; }
        }

        /* Desktop mare */
        @media (min-width: 1200px) {
            .drop-icon  { font-size: 5.5rem; }
            .content    { padding-left: 3rem; }
        }
    </style>
</head>
<body>

    {{-- TOP BAR --}}
    <div class="top-bar">
        <a href="/" class="brand">
            <div class="brand-icon"><i class="bi bi-droplet-half"></i></div>
            <div class="brand-text">
                <strong>Aquaserv Tulcea</strong>
                <small>Servicii Apă și Canal</small>
            </div>
        </a>
        <a href="/" class="btn-nav">
            <i class="bi bi-arrow-left"></i>
            <span class="d-none d-sm-inline">Pagina principală</span>
            <span class="d-sm-none">Acasă</span>
        </a>
    </div>

    {{-- MAIN --}}
    <main>
        <div class="container h-100 d-flex align-items-center">
            <div class="row align-items-center w-100 g-4">

                {{-- Ilustrație --}}
                <div class="col-lg-5">
                    <div class="illus">
                        <div>
                            <i class="bi bi-droplet-half drop-icon"></i>
                            <svg class="wave-svg" viewBox="0 0 150 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 9 Q18 0 37 9 Q56 18 75 9 Q94 0 113 9 Q131 18 150 9"
                                      stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
                            </svg>
                            <div class="error-code">404</div>
                            <div class="status-pill">
                                <i class="bi bi-exclamation-circle"></i> Pagină negăsită
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Conținut --}}
                <div class="col-lg-7">
                    <div class="content">
                        <p class="error-title">Această pagină nu există.</p>
                        <p class="error-desc">
                            Pagina solicitată nu a putut fi găsită. Este posibil ca linkul să fie incorect sau pagina să fi fost mutată permanent.
                        </p>
                        <a href="/" class="btn-home">
                            <i class="bi bi-house-fill"></i> Înapoi la pagina principală
                        </a>
                        <div class="or-line">sau navigați direct la</div>
                        <div class="links-grid">
                            <a href="/anunturi" class="link-card">
                                <span class="lc-icon"><i class="bi bi-megaphone"></i></span> Anunțuri
                            </a>
                            <a href="/contact" class="link-card">
                                <span class="lc-icon"><i class="bi bi-envelope"></i></span> Contact
                            </a>
                            <a href="/servicii" class="link-card">
                                <span class="lc-icon"><i class="bi bi-droplet"></i></span> Servicii
                            </a>
                            <a href="https://my.aquaservtulcea.ro/" class="link-card">
                                <span class="lc-icon"><i class="bi bi-person-circle"></i></span> Cont MyApa
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer>
        &copy; {{ date('Y') }} Aquaserv S.A. Tulcea
        <span>·</span><a href="/gdpr">GDPR</a>
        <span>·</span><a href="/contact">Contact</a>
    </footer>

</body>
</html>


