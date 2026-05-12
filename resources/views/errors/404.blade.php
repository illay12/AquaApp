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
        :root { --p:#0077b6; --dk:#023e8a; --ac:#00b4d8; --bg:#f0f8ff; }
        *, *::before, *::after { box-sizing: border-box; margin:0; padding:0; }

        html, body {
            height: 100%;
            height: 100dvh;
            overflow: hidden;
        }
        body {
            font-family: 'Nunito', sans-serif;
            background: #f0f8ff;
            display: flex;
            flex-direction: column;
        }

        /* ── TOP BAR ── */
        .top-bar {
            height: 54px;
            flex-shrink: 0;
            background: var(--dk);
            padding: 0 1.1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(2,62,138,.35);
            z-index: 10;
        }
        .brand {
            display: flex; align-items: center; gap: .5rem;
            text-decoration: none; color: #fff;
        }
        .brand-icon {
            width: 32px; height: 32px;
            background: rgba(255,255,255,.15);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; color: #90e0ef; flex-shrink: 0;
        }
        .brand-text strong { font-family:'Merriweather',serif; font-size:.88rem; display:block; line-height:1.2; }
        .brand-text small  { font-size:.62rem; opacity:.6; text-transform:uppercase; letter-spacing:.05em; }
        .btn-topbar {
            display: inline-flex; align-items: center; gap: .35rem;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.2);
            color: rgba(255,255,255,.9);
            font-size: .78rem; font-weight: 700;
            padding: .32rem .8rem; border-radius: 7px;
            text-decoration: none; transition: background .2s; white-space: nowrap;
        }
        .btn-topbar:hover { background: rgba(255,255,255,.22); color:#fff; }

        /* ── CANVAS (flex, umple restul) ── */
        .canvas {
            flex: 1;
            display: flex;
            min-height: 0;          /* permite flex children să se comprime */
        }

        /* ── STÂNGA – albastru ── */
        .side-blue {
            width: 42%;
            background: linear-gradient(155deg, var(--dk) 0%, var(--p) 100%);
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            padding: 2rem 1.5rem;
            position: relative; overflow: hidden; flex-shrink: 0;
        }
        .side-blue::before {
            content:''; position:absolute;
            width:260px; height:260px; top:-70px; left:-70px;
            border-radius:50%; background:rgba(255,255,255,.06); pointer-events:none;
        }
        .side-blue::after {
            content:''; position:absolute;
            width:160px; height:160px; bottom:-40px; right:-30px;
            border-radius:50%; background:rgba(0,180,216,.18); pointer-events:none;
        }
        .drop-icon {
            font-size: 4.2rem; color:rgba(255,255,255,.9); display:block;
            animation: bob 3s ease-in-out infinite;
            filter: drop-shadow(0 8px 18px rgba(0,0,0,.22));
            line-height:1; position:relative; z-index:1;
        }
        .wave-svg {
            width:130px; display:block; margin:.5rem auto;
            opacity:.4; animation: drift 3.5s ease-in-out infinite alternate;
            position:relative; z-index:1;
        }
        .error-code {
            font-family:'Merriweather',serif;
            font-size: clamp(4.5rem, 9vw, 8rem);
            font-weight:700; line-height:1; letter-spacing:-.04em;
            color:#fff; text-shadow:0 4px 20px rgba(0,0,0,.2);
            user-select:none; position:relative; z-index:1;
        }
        .status-pill {
            display:inline-flex; align-items:center; gap:.35rem;
            background:rgba(255,255,255,.14); border:1px solid rgba(255,255,255,.22);
            border-radius:20px; padding:.22rem .75rem;
            font-size:.65rem; font-weight:700; color:rgba(255,255,255,.8);
            letter-spacing:.06em; text-transform:uppercase;
            margin-top:.6rem; position:relative; z-index:1;
        }

        /* ── DREAPTA – conținut ── */
        .side-white {
            flex: 1;
            display: flex; flex-direction: column;
            align-items: flex-start; justify-content: center;
            padding: 2.5rem 3rem 2.5rem 3.5rem;
            min-width: 0;
        }
        .error-title {
            font-family:'Merriweather',serif;
            font-size: clamp(1.2rem, 2.2vw, 1.6rem);
            font-weight:700; color:var(--dk); line-height:1.3; margin-bottom:.6rem;
        }
        .error-desc {
            color:#475569; font-size:.9rem; line-height:1.65;
            max-width:400px; margin-bottom:1.5rem;
        }
        .btn-home {
            display:inline-flex; align-items:center; gap:.45rem;
            background:var(--p); color:#fff !important;
            font-weight:800; font-size:.92rem;
            padding:.65rem 1.75rem; border-radius:9px;
            text-decoration:none;
            transition:background .2s, transform .15s, box-shadow .2s;
            box-shadow:0 4px 14px rgba(0,119,182,.3);
            margin-bottom:1.4rem;
        }
        .btn-home:hover { background:var(--dk); transform:translateY(-2px); box-shadow:0 8px 20px rgba(2,62,138,.28); }
        .or-line {
            display:flex; align-items:center; gap:.55rem;
            color:#94a3b8; font-size:.72rem; font-weight:700;
            text-transform:uppercase; letter-spacing:.07em;
            margin-bottom:.85rem; width:100%; max-width:360px;
        }
        .or-line::before, .or-line::after { content:''; flex:1; height:1px; background:#dde3ea; }
        .links-grid {
            display:grid; grid-template-columns:1fr 1fr;
            gap:.5rem; max-width:360px; width:100%;
        }
        .link-card {
            display:flex; align-items:center; gap:.6rem;
            background:#fff; border:1.5px solid #d4eaf5; border-radius:11px;
            padding:.65rem .85rem; text-decoration:none; color:#1a1a2e;
            font-weight:700; font-size:.82rem;
            transition:all .2s; box-shadow:0 1px 4px rgba(0,119,182,.05);
            position:relative;
        }
        .link-card::after {
            content:'\F285'; font-family:'bootstrap-icons';
            position:absolute; right:.65rem; font-size:.7rem;
            color:#cbd5e1; transition:color .2s, transform .2s;
        }
        .link-card:hover { border-color:var(--p); color:var(--p); transform:translateY(-2px); box-shadow:0 5px 14px rgba(0,119,182,.14); }
        .link-card:hover::after { color:var(--p); transform:translateX(2px); }
        .lc-icon {
            width:30px; height:30px; background:var(--bg); border-radius:8px;
            display:flex; align-items:center; justify-content:center;
            font-size:.85rem; color:var(--p); flex-shrink:0; transition:all .2s;
        }
        .link-card:hover .lc-icon { background:var(--p); color:#fff; }

        /* ── FOOTER ── */
        .error-footer {
            height: 36px; flex-shrink:0;
            background:var(--dk); color:rgba(255,255,255,.45);
            font-size:.73rem; display:flex; align-items:center; justify-content:center; gap:.6rem;
        }
        .error-footer a { color:rgba(255,255,255,.6); text-decoration:none; transition:color .15s; }
        .error-footer a:hover { color:#fff; }
        .error-footer span { opacity:.35; }

        /* ── ANIMAȚII ── */
        @@keyframes bob {
            0%,100% { transform:translateY(0); }
            50%      { transform:translateY(-11px); }
        }
        @@keyframes drift {
            from { transform:scaleX(.88); opacity:.3; }
            to   { transform:scaleX(1.12); opacity:.5; }
        }

        /* ── MOBIL ── */
        @media (max-width: 767px) {
            html, body { overflow: hidden; height:100%; height:100dvh; }

            .canvas { flex-direction: column; }

            /* Banner albastru compact – orizontal */
            .side-blue {
                width: 100%; flex-shrink: 0;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                gap: 1.25rem;
                padding: 1rem 1.5rem;
            }
            .side-blue::before { width:140px; height:140px; top:-40px; left:-30px; }
            .side-blue::after  { width:100px; height:100px; bottom:-25px; right:-15px; }

            .drop-icon  { font-size: 2.6rem; }
            .wave-svg   { width: 80px; margin: .3rem auto; }
            .error-code { font-size: 3.8rem; }
            .status-pill { font-size:.58rem; padding:.18rem .6rem; margin-top:.4rem; }

            /* Conținut dreapta → centrat jos */
            .side-white {
                flex: 1; min-height: 0;
                align-items: center; text-align: center;
                padding: 1.25rem 1.1rem 1rem;
                justify-content: space-evenly;
            }
            .error-title { font-size:1.1rem; margin-bottom:.35rem; }
            .error-desc  { font-size:.82rem; line-height:1.55; max-width:100%; margin-bottom:0; }
            .btn-home    { font-size:.85rem; padding:.55rem 1.4rem; margin-bottom:0; box-shadow:none; }
            .or-line     { font-size:.66rem; margin-bottom:.5rem; max-width:100%; }
            .links-grid  { max-width:100%; gap:.4rem; }
            .link-card   { font-size:.78rem; padding:.5rem .65rem; gap:.45rem; border-radius:9px; }
            .link-card::after { display:none; }
            .lc-icon     { width:26px; height:26px; font-size:.78rem; border-radius:7px; }
        }

        /* Telefoane foarte înguste */
        @media (max-width: 360px) {
            .error-code { font-size:3.2rem; }
            .drop-icon  { font-size:2.2rem; }
            .side-blue  { gap:.9rem; padding:.85rem 1rem; }
            .error-title { font-size:1rem; }
            .link-card  { font-size:.74rem; }
        }

        /* Desktop mare */
        @media (min-width: 1200px) {
            .side-white { padding: 3rem 4rem 3rem 4.5rem; }
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
        <a href="/" class="btn-topbar">
            <i class="bi bi-arrow-left"></i>
            <span class="d-none d-sm-inline">Pagina principală</span>
            <span class="d-sm-none">Acasă</span>
        </a>
    </div>

    {{-- CANVAS --}}
    <div class="canvas">

        {{-- Stânga (albastru) --}}
        <div class="side-blue">
            <div style="position:relative;z-index:1;text-align:center;">
                <i class="bi bi-droplet-half drop-icon"></i>
                <svg class="wave-svg" viewBox="0 0 130 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 9 Q16 0 32 9 Q49 18 65 9 Q81 0 98 9 Q114 18 130 9"
                          stroke="#fff" stroke-width="2.2" stroke-linecap="round"/>
                </svg>
                <div class="error-code">404</div>
                <div class="status-pill">
                    <i class="bi bi-exclamation-circle"></i> Pagină negăsită
                </div>
            </div>
        </div>

        {{-- Dreapta (alb) --}}
        <div class="side-white">
            <p class="error-title">Hm, pagina asta nu există.</p>
            <p class="error-desc">
                Adresa accesată nu a fost găsită. Poate a fost mutată sau ați tastat un link greșit.
            </p>
            <a href="/" class="btn-home">
                <i class="bi bi-house-fill"></i> Înapoi la pagina principală
            </a>
            <div class="or-line">sau navigați la</div>
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
                <a href="/client/login" class="link-card">
                    <span class="lc-icon"><i class="bi bi-person-circle"></i></span> Cont MyApa
                </a>
            </div>
        </div>

    </div>

    {{-- FOOTER --}}
    <footer class="error-footer">
        &copy; {{ date('Y') }} Aquaserv S.A. Tulcea
        <span>·</span> <a href="/gdpr">GDPR</a>
        <span>·</span> <a href="/contact">Contact</a>
    </footer>

</body>
</html>
