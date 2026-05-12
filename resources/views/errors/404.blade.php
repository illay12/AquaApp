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
            --aqua-primary: #0077b6;
            --aqua-dark:    #023e8a;
            --aqua-accent:  #00b4d8;
            --aqua-bg:      #f0f8ff;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(150deg, #f0f8ff 0%, #e0f2fe 60%, #f0f8ff 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAV simplu */
        .top-bar {
            background: var(--aqua-dark);
            padding: 0.9rem 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .top-bar .brand {
            color: #fff;
            text-decoration: none;
            font-family: 'Merriweather', serif;
            font-weight: 700;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }
        .top-bar .brand small {
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            font-size: 0.72rem;
            opacity: 0.7;
            display: block;
            line-height: 1;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .top-bar .logo-wrap {
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.15);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem; color: #90e0ef;
        }

        /* HERO */
        .error-hero {
            flex: 1;
            display: flex;
            align-items: center;
            padding: 4rem 1.5rem;
            position: relative;
            overflow: hidden;
        }
        .error-hero::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            top: -150px; right: -120px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,180,216,0.12) 0%, transparent 70%);
            pointer-events: none;
        }
        .error-hero::after {
            content: '';
            position: absolute;
            width: 350px; height: 350px;
            bottom: -100px; left: -80px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,119,182,0.10) 0%, transparent 70%);
            pointer-events: none;
        }

        /* 404 număr */
        .error-code {
            font-family: 'Merriweather', serif;
            font-size: clamp(5rem, 16vw, 10rem);
            font-weight: 700;
            line-height: 1;
            letter-spacing: -0.04em;
            background: linear-gradient(135deg, #023e8a 0%, #0077b6 55%, #00b4d8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            user-select: none;
        }

        /* Pictogramă animată */
        .drop-icon {
            font-size: 4.5rem;
            color: var(--aqua-primary);
            display: block;
            animation: bob 3s ease-in-out infinite;
            filter: drop-shadow(0 8px 16px rgba(0,119,182,0.3));
            margin-bottom: 0.5rem;
        }
        .wave-line {
            width: 180px;
            margin: 0 auto 1.5rem;
            opacity: 0.3;
            animation: wave 3s ease-in-out infinite alternate;
        }

        .error-title {
            font-family: 'Merriweather', serif;
            font-size: clamp(1.15rem, 3vw, 1.5rem);
            font-weight: 700;
            color: var(--aqua-dark);
            margin-bottom: 0.75rem;
        }
        .error-desc {
            color: #475569;
            font-size: 0.975rem;
            line-height: 1.7;
            max-width: 400px;
        }

        /* Butoane acțiune */
        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--aqua-primary);
            color: #fff;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 0.7rem 1.8rem;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.2s, transform 0.15s;
            border: none;
        }
        .btn-home:hover {
            background: var(--aqua-dark);
            color: #fff;
            transform: translateY(-1px);
        }

        /* Carduri sugestii */
        .link-card {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            background: #fff;
            border: 1.5px solid #caf0f8;
            border-radius: 12px;
            padding: 0.85rem 1rem;
            text-decoration: none;
            color: #1a1a2e;
            font-weight: 700;
            font-size: 0.875rem;
            transition: all 0.2s;
            box-shadow: 0 2px 6px rgba(0,119,182,0.06);
        }
        .link-card:hover {
            border-color: var(--aqua-primary);
            color: var(--aqua-primary);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0,119,182,0.14);
        }
        .link-card .lc-icon {
            width: 36px; height: 36px;
            background: var(--aqua-bg);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; color: var(--aqua-primary);
            flex-shrink: 0;
            transition: all 0.2s;
        }
        .link-card:hover .lc-icon {
            background: var(--aqua-primary);
            color: #fff;
        }

        .divider-text {
            display: flex; align-items: center; gap: 0.75rem;
            color: #94a3b8; font-size: 0.78rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.07em;
            margin: 1.5rem 0;
        }
        .divider-text::before,
        .divider-text::after {
            content: ''; flex: 1; height: 1px; background: #e2e8f0;
        }

        /* Footer */
        .error-footer {
            background: var(--aqua-dark);
            color: rgba(255,255,255,0.55);
            font-size: 0.8rem;
            text-align: center;
            padding: 0.9rem 1rem;
        }
        .error-footer a { color: rgba(255,255,255,0.7); text-decoration: none; }
        .error-footer a:hover { color: #fff; }

        /* Animații */
        @@keyframes bob {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-12px); }
        }
        @@keyframes wave {
            from { transform: scaleX(0.9); }
            to   { transform: scaleX(1.1); }
        }

        @media (max-width: 575px) {
            .error-hero { padding: 3rem 1rem; }
            .error-code { font-size: 5rem; }
        }
    </style>
</head>
<body>

    {{-- NAV --}}
    <div class="top-bar">
        <a href="/" class="brand">
            <div class="logo-wrap"><i class="bi bi-droplet-half"></i></div>
            <div>
                Aquaserv Tulcea
                <small>Servicii Apă și Canal</small>
            </div>
        </a>
    </div>

    {{-- CONȚINUT --}}
    <section class="error-hero">
        <div class="container position-relative" style="z-index:1;">
            <div class="row align-items-center g-5">

                {{-- Ilustrație --}}
                <div class="col-lg-5 text-center order-lg-1 order-2">
                    <i class="bi bi-droplet-half drop-icon"></i>
                    <svg class="wave-line" viewBox="0 0 180 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 12 Q22 0 45 12 Q67 24 90 12 Q112 0 135 12 Q157 24 180 12"
                              stroke="#0077b6" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                    <div class="error-code">404</div>
                </div>

                {{-- Text + acțiuni --}}
                <div class="col-lg-7 order-lg-2 order-1 text-center text-lg-start">

                    <p class="error-title">Pagina nu a fost găsită</p>

                    <p class="error-desc mx-auto mx-lg-0 mb-4">
                        Ne pare rău, pagina pe care o căutați nu există sau a fost mutată.
                        Verificați adresa URL sau navigați la una dintre secțiunile de mai jos.
                    </p>

                    <a href="/" class="btn-home mb-4">
                        <i class="bi bi-house-fill"></i> Înapoi la pagina principală
                    </a>

                    <div class="divider-text">sau mergeți direct la</div>

                    <div class="row g-2">
                        <div class="col-6 col-sm-6">
                            <a href="/anunturi" class="link-card">
                                <span class="lc-icon"><i class="bi bi-megaphone"></i></span>
                                Anunțuri
                            </a>
                        </div>
                        <div class="col-6 col-sm-6">
                            <a href="/contact" class="link-card">
                                <span class="lc-icon"><i class="bi bi-envelope"></i></span>
                                Contact
                            </a>
                        </div>
                        <div class="col-6 col-sm-6">
                            <a href="/servicii" class="link-card">
                                <span class="lc-icon"><i class="bi bi-droplet"></i></span>
                                Servicii
                            </a>
                        </div>
                        <div class="col-6 col-sm-6">
                            <a href="/client/login" class="link-card">
                                <span class="lc-icon"><i class="bi bi-person-circle"></i></span>
                                Cont MyApa
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="error-footer">
        &copy; {{ date('Y') }} Aquaserv S.A. Tulcea &nbsp;·&nbsp;
        <a href="/gdpr">GDPR</a> &nbsp;·&nbsp;
        <a href="/contact">Contact</a>
    </footer>

</body>
</html>
