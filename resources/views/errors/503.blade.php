<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site în mentenanță – Aquaserv Tulcea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <style>
        :root { --p:#0077b6; --dk:#023e8a; --ac:#00b4d8; --bg:#f0f8ff; --bd:#caf0f8; }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; overflow: hidden; }
        body {
            font-family: 'Nunito', sans-serif; color: #1a1a2e;
            background: linear-gradient(150deg, #f0f8ff 0%, #dff0fc 55%, #f0f8ff 100%);
            display: flex; flex-direction: column;
        }
        .top-bar {
            height: 56px; flex-shrink: 0; background: var(--dk);
            padding: 0 1.4rem; display: flex; align-items: center;
            box-shadow: 0 2px 10px rgba(2,62,138,.3);
        }
        .brand { display: flex; align-items: center; gap: .55rem; text-decoration: none; color: #fff; }
        .brand-icon {
            width: 34px; height: 34px; border-radius: 9px;
            background: rgba(255,255,255,.15);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.05rem; color: #90e0ef;
        }
        .brand-text strong { font-family: 'Merriweather', serif; font-size: .88rem; display: block; line-height: 1.2; }
        .brand-text small  { font-size: .62rem; opacity: .65; text-transform: uppercase; letter-spacing: .05em; }

        main {
            flex: 1; display: flex; align-items: center; justify-content: center;
            position: relative; overflow: hidden; padding: 2rem 1rem;
        }
        main::before {
            content: ''; position: absolute;
            width: 500px; height: 500px; top: -160px; right: -120px; border-radius: 50%;
            background: radial-gradient(circle, rgba(0,180,216,.11) 0%, transparent 68%);
        }
        main::after {
            content: ''; position: absolute;
            width: 360px; height: 360px; bottom: -100px; left: -80px; border-radius: 50%;
            background: radial-gradient(circle, rgba(0,119,182,.09) 0%, transparent 68%);
        }
        .card-maintenance {
            background: #fff; border-radius: 20px;
            border: 1.5px solid var(--bd);
            box-shadow: 0 8px 40px rgba(0,119,182,.12);
            padding: 3rem 2.5rem; max-width: 520px; width: 100%;
            text-align: center; position: relative; z-index: 1;
            animation: fadeUp .4s ease both;
        }
        @@keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .icon-wrap {
            width: 80px; height: 80px; border-radius: 50%;
            background: linear-gradient(135deg, #023e8a, #0077b6);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.5rem; font-size: 2rem; color: #fff;
            animation: spin-slow 6s linear infinite;
        }
        @@keyframes spin-slow {
            0%   { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .code {
            font-family: 'Merriweather', serif;
            font-size: 4rem; font-weight: 700; line-height: 1;
            background: linear-gradient(135deg, #023e8a 0%, #0077b6 55%, #00b4d8 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
            margin-bottom: .5rem;
        }
        h1 { font-family: 'Merriweather', serif; font-size: 1.4rem; color: var(--dk); margin-bottom: .75rem; }
        p  { color: #475569; font-size: .92rem; line-height: 1.7; margin-bottom: 1.5rem; }
        .info-box {
            background: var(--bg); border: 1px solid var(--bd); border-radius: 12px;
            padding: 1rem 1.25rem; margin-bottom: 1.5rem; text-align: left;
        }
        .info-box p { margin: 0; font-size: .85rem; }
        .info-box strong { color: var(--dk); }
        .btn-contact {
            display: inline-flex; align-items: center; gap: .45rem;
            background: var(--p); color: #fff; font-weight: 800; font-size: .9rem;
            padding: .65rem 1.75rem; border-radius: 9px; text-decoration: none;
            box-shadow: 0 4px 14px rgba(0,119,182,.3);
            transition: background .2s, transform .15s;
        }
        .btn-contact:hover { background: var(--dk); color: #fff; transform: translateY(-2px); }

        footer {
            height: 38px; flex-shrink: 0; background: var(--dk);
            color: rgba(255,255,255,.45); display: flex; align-items: center;
            justify-content: center; font-size: .72rem; gap: .55rem;
        }
        footer a { color: rgba(255,255,255,.6); text-decoration: none; }
        footer a:hover { color: #fff; }
        footer span { opacity: .4; }

        @media (max-width: 600px) {
            .card-maintenance { padding: 2rem 1.25rem; }
            .code { font-size: 3rem; }
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <a href="/" class="brand">
            <div class="brand-icon"><i class="bi bi-droplet-half"></i></div>
            <div class="brand-text">
                <strong>Aquaserv Tulcea</strong>
                <small>Servicii Apă și Canal</small>
            </div>
        </a>
    </div>

    <main>
        <div class="card-maintenance">
            <div class="icon-wrap"><i class="bi bi-gear-fill"></i></div>
            <div class="code">503</div>
            <h1>Site în mentenanță</h1>
            <p>
                Efectuăm lucrări de îmbunătățire a site-ului. Reveniți în câteva minute.<br>
                Ne cerem scuze pentru inconveniențe.
            </p>
            <div class="info-box">
                <p><strong><i class="bi bi-telephone-fill me-1" style="color:#0077b6;"></i>Urgențe avarii:</strong><br>
                <a href="tel:0747022009" style="color:#0077b6;font-weight:700;text-decoration:none;">0747 022 009</a> — disponibil 24/7</p>
            </div>
            <a href="mailto:secretariat@aquaservtulcea.ro" class="btn-contact">
                <i class="bi bi-envelope-fill"></i> Contactați-ne
            </a>
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Aquaserv S.A. Tulcea
        <span>·</span><a href="mailto:secretariat@aquaservtulcea.ro">secretariat@aquaservtulcea.ro</a>
    </footer>
</body>
</html>
