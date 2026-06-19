@extends('layouts.app')

@section('title', 'Acasă')

@section('content')

    {{-- HERO SECTION --}}
    <section style="background:linear-gradient(135deg, #023e8a 0%, #0077b6 60%, #00b4d8 100%); color:#fff; padding:2rem 0 1.5rem; position:relative; overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.04\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'40\' cy=\'40\' r=\'8\'/%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="badge" style="background:rgba(255,255,255,0.18);color:#fff;font-size:0.78rem;font-weight:700;letter-spacing:0.08em;padding:0.45em 1em;border-radius:20px;margin-bottom:0.6rem;display:inline-block;">
                        <i class="bi bi-shield-check me-1"></i> Operator autorizat A.N.R.S.C.
                    </span>
                    <h1 style="font-family:'Merriweather',serif;font-size:clamp(1.35rem,5vw,2.1rem);font-weight:700;line-height:1.3;margin-bottom:0.8rem;">
                        Împreună pentru apă sigură
                        <span style="color:#90e0ef;display:block;">și pentru mediu curat</span>
                    </h1>
                    <p class="d-none d-md-block" style="font-size:clamp(0.85rem,3vw,1rem);opacity:0.9;max-width:540px;line-height:1.6;margin-bottom:0;">
                        Furnizăm și prestăm servicii de alimentare cu apă potabilă și de canalizare
                        pentru cetățenii și afacerile din județ.
                    </p>

                </div>
                <div class="col-lg-5 d-none d-lg-flex justify-content-center">
                    <div class="hero-droplet-wrap">
                        <div class="hero-droplet-ring hero-droplet-ring--1"></div>
                        <div class="hero-droplet-ring hero-droplet-ring--2"></div>
                        <div class="hero-droplet-ring hero-droplet-ring--3"></div>
                        <div class="hero-droplet-circle">
                            <i class="bi bi-droplet-fill hero-droplet-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- QUICK ACCESS --}}
    <section style="background:#f0f8ff;padding:1.2rem 0;">
        <div class="container">
            <div class="row g-2 justify-content-center">
                <div class="col-4 col-md-3 col-lg-2">
                    <a href="{{ url('https://my.aquaservtulcea.ro/') }}" class="qa-btn">
                        <div class="qa-btn__ripple"></div>
                        <div class="qa-btn__icon"><i class="bi bi-receipt"></i></div>
                        <span class="qa-btn__label">Plătește factura</span>
                    </a>
                </div>
                <div class="col-4 col-md-3 col-lg-2">
                    <a href="{{ url('/client/index-contor') }}" class="qa-btn">
                        <div class="qa-btn__ripple"></div>
                        <div class="qa-btn__icon"><i class="bi bi-speedometer2"></i></div>
                        <span class="qa-btn__label">Trimite Index</span>
                    </a>
                </div>
                <div class="col-4 col-md-3 col-lg-2">
                    <a href="{{ url('/anunturi?q=&categorie=avarie') }}" class="qa-btn">
                        <div class="qa-btn__ripple"></div>
                        <div class="qa-btn__icon"><i class="bi bi-tools"></i></div>
                        <span class="qa-btn__label">Avarii</span>
                    </a>
                </div>
                <div class="col-4 col-md-3 col-lg-2">
                    <a href="{{ url('/informatii/calitatea-apei') }}" class="qa-btn">
                        <div class="qa-btn__ripple"></div>
                        <div class="qa-btn__icon"><i class="bi bi-droplet-half"></i></div>
                        <span class="qa-btn__label">Calitatea apei</span>
                    </a>
                </div>
                <div class="col-4 col-md-3 col-lg-2">
                    <a href="{{ url('/informatii/tarife') }}" class="qa-btn">
                        <div class="qa-btn__ripple"></div>
                        <div class="qa-btn__icon"><i class="bi bi-cash-coin"></i></div>
                        <span class="qa-btn__label">Tarife</span>
                    </a>
                </div>
                <div class="col-4 col-md-3 col-lg-2">
                    <a href="{{ url('/informatii/formulare') }}" class="qa-btn">
                        <div class="qa-btn__ripple"></div>
                        <div class="qa-btn__icon"><i class="bi bi-file-earmark-arrow-down"></i></div>
                        <span class="qa-btn__label">Formulare</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ANUNTURI + INFO --}}
    <section style="padding:3.5rem 0;">
        <div class="container">
            <div class="row g-4">

                {{-- Anunțuri recente --}}
                <div class="col-lg-7">
                    <h2 class="section-title">Ultimele anunțuri</h2>

                    @php
                    $catStyle = [
                        'anunturi' => 'background:#dbeafe;color:#1d4ed8;',
                        'avarie'   => 'background:#fee2e2;color:#b91c1c;',
                        'angajare' => 'background:#dcfce7;color:#15803d;',
                        'calitate' => 'background:#e0f2fe;color:#0369a1;',
                        'diverse'  => 'background:#f3e8ff;color:#7e22ce;',
                    ];
                    $catLabel = [
                        'anunturi' => 'Anunțuri',
                        'avarie'   => 'Avarie',
                        'angajare' => 'Angajare',
                        'calitate' => 'Calitate apă',
                        'diverse'  => 'Diverse',
                    ];
                    @endphp
                    @forelse($anunturi ?? [] as $i => $anunt)
                        <div class="news-item {{ $i >= 3 ? 'd-none d-sm-block' : '' }}">
                            <div class="date">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $anunt->created_at->format('d.m.Y') }}
                                <span class="ms-2"
                                      style="display:inline-block;padding:0.2em 0.65em;border-radius:20px;font-size:0.72rem;font-weight:700;white-space:nowrap;{{ $catStyle[$anunt->categorie] ?? 'background:#f1f5f9;color:#475569;' }}">
                                    {{ $catLabel[$anunt->categorie] ?? ucfirst($anunt->categorie) }}
                                </span>
                            </div>
                            <h6><a href="{{ url('/anunturi/'.$anunt->slug) }}">{{ $anunt->titlu }}</a></h6>
                        </div>
                    @empty
                        {{-- PLACEHOLDER când nu sunt date din DB --}}
                        <div class="news-item">
                            <div class="date"><i class="bi bi-calendar3 me-1"></i> 20.02.2026 <span class="ms-2 badge-aqua">Anunț</span></div>
                            <h6><a href="#">Informare privind întreruperea furnizării apei în zona centrală</a></h6>
                        </div>
                        <div class="news-item">
                            <div class="date"><i class="bi bi-calendar3 me-1"></i> 15.02.2026 <span class="ms-2 badge-aqua">Angajare</span></div>
                            <h6><a href="#">Concurs pentru ocuparea unui post vacant – muncitor calificat</a></h6>
                        </div>
                        <div class="news-item">
                            <div class="date"><i class="bi bi-calendar3 me-1"></i> 10.02.2026 <span class="ms-2 badge-aqua">Calitate apă</span></div>
                            <h6><a href="#">Buletin de analiză apă potabilă – Februarie 2026</a></h6>
                        </div>
                    @endforelse

                    <a href="{{ url('/anunturi') }}" class="btn btn-outline-aqua btn-sm mt-2">
                        Toate anunțurile <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>

                {{-- Sidebar info --}}
                <div class="col-lg-5">
                    {{-- Urgențe / Avarie --}}
                    <div class="card mb-4" style="border-color:#f8d7da;">
                        <div class="card-body" style="background:#fff5f5;border-radius:12px;">
                            <h5 style="font-family:'Merriweather',serif;color:#dc3545;font-size:1rem;">
                                <i class="bi bi-telephone-fill me-2"></i> Dispecerat avarii
                            </h5>
                            <p class="mb-1" style="font-size:2rem;font-weight:800;color:#dc3545;letter-spacing:-1px;">
                                <a href="tel:+40747022009" style="color:inherit;text-decoration:none;">0747 022 009</a>
                            </p>
                            <p class="mb-0 text-muted" style="font-size:0.82rem;">Disponibil 24/7 pentru urgențe</p>
                        </div>
                    </div>

                    {{-- Program casierii --}}
                    <div class="card mb-4" style="border-color:var(--aqua-border);">
                        <div class="card-body p-3 text-center">
                            <div style="width:48px;height:48px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 0.75rem;font-size:1.3rem;color:var(--aqua-primary);">
                                <i class="bi bi-clock"></i>
                            </div>
                            <h6 class="fw-bold mb-1" style="color:var(--aqua-dark);">Program casierii</h6>
                            <p style="font-size:0.82rem;color:#6c757d;margin-bottom:1rem;">
                                Consultați orarul complet al casieriilor și agențiilor din județ.
                            </p>
                            <a href="{{ url('/program-casierii') }}" class="btn btn-aqua btn-sm w-100">
                                <i class="bi bi-arrow-right-circle me-1"></i> Vezi programul complet
                            </a>
                        </div>
                    </div>

                    {{-- Calitatea apei --}}
                    <div class="card" style="border-color:var(--aqua-border);">
                        <div class="card-body bg-aqua-light" style="border-radius:12px;">
                            <h6 class="fw-bold text-aqua"><i class="bi bi-droplet-half me-2"></i> Calitatea apei</h6>
                            <p style="font-size:0.875rem;" class="mb-2">
                                Apa furnizată respectă toți parametrii de calitate impuși de normativele naționale și europene.
                            </p>
                            <a href="{{ url('/informatii/calitatea-apei') }}" class="btn btn-sm btn-aqua">
                                Vezi buletinele de analiză
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- STATISTICS BAND --}}
    <section style="background:linear-gradient(90deg, #023e8a, #0077b6);color:#fff;padding:3rem 0;">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div style="font-size:2.5rem;font-weight:800;color:#90e0ef;">25+</div>
                    <div style="font-size:0.875rem;opacity:0.85;">Localități deservite</div>
                </div>
                <div class="col-6 col-md-3">
                    <div style="font-size:2.5rem;font-weight:800;color:#90e0ef;">25.000+</div>
                    <div style="font-size:0.875rem;opacity:0.85;">Abonați</div>
                </div>
                <div class="col-6 col-md-3">
                    <div style="font-size:2.5rem;font-weight:800;color:#90e0ef;">24/7</div>
                    <div style="font-size:0.875rem;opacity:0.85;">Dispecerat avarii</div>
                </div>
                <div class="col-6 col-md-3">
                    <div style="font-size:2.5rem;font-weight:800;color:#90e0ef;">99.8%</div>
                    <div style="font-size:0.875rem;opacity:0.85;">Conformitate calitate apă</div>
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICII CARDS --}}
    <section style="padding:4rem 0;background:#f0f8ff;">
        <div class="container">
            <h2 class="section-title">Serviciile noastre</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <a href="{{ url('/servicii/alimentare-apa') }}" class="servicii-card-link">
                        <div class="servicii-card servicii-card--albastru">
                            <div class="servicii-card__icon-wrap">
                                <i class="bi bi-droplet-fill servicii-card__icon"></i>
                                <div class="servicii-card__ripple"></div>
                            </div>
                            <h3 class="servicii-card__title">Alimentare cu apă</h3>
                            <div class="servicii-card__line"></div>
                            <p class="servicii-card__desc">Captare, tratare și distribuție apă potabilă de calitate pentru populație și industrie.</p>
                            <span class="servicii-card__cta">Află mai mult <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/servicii/canalizare') }}" class="servicii-card-link">
                        <div class="servicii-card servicii-card--teal">
                            <div class="servicii-card__icon-wrap">
                                <i class="bi bi-filter-circle-fill servicii-card__icon"></i>
                                <div class="servicii-card__ripple"></div>
                            </div>
                            <h3 class="servicii-card__title">Canalizare</h3>
                            <div class="servicii-card__line"></div>
                            <p class="servicii-card__desc">Colectare și transport ape uzate prin rețeaua de canalizare, mentenanță și intervenții.</p>
                            <span class="servicii-card__cta">Află mai mult <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/servicii/epurare') }}" class="servicii-card-link">
                        <div class="servicii-card servicii-card--indigo">
                            <div class="servicii-card__icon-wrap">
                                <i class="bi bi-recycle servicii-card__icon"></i>
                                <div class="servicii-card__ripple"></div>
                            </div>
                            <h3 class="servicii-card__title">Epurare ape uzate</h3>
                            <div class="servicii-card__line"></div>
                            <p class="servicii-card__desc">Tratare și epurare ape uzate în stații moderne, respectând normele de mediu europene.</p>
                            <span class="servicii-card__cta">Află mai mult <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        /* ── HERO DROPLET ── */
        .hero-droplet-wrap {
            position: relative;
            width: 280px;
            height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-droplet-circle {
            width: 280px;
            height: 280px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
            animation: droplet-float 4s ease-in-out infinite;
        }
        .hero-droplet-icon {
            font-size: 8rem;
            color: rgba(255,255,255,0.75);
            animation: droplet-pulse 4s ease-in-out infinite;
        }
        /* Inele de ripple care se expandează continuu */
        .hero-droplet-ring {
            position: absolute;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,0.18);
            animation: droplet-ring 3.6s ease-out infinite;
        }
        .hero-droplet-ring--1 { width: 280px; height: 280px; animation-delay: 0s; }
        .hero-droplet-ring--2 { width: 280px; height: 280px; animation-delay: 1.2s; }
        .hero-droplet-ring--3 { width: 280px; height: 280px; animation-delay: 2.4s; }

        @keyframes droplet-float {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-12px); }
        }
        @keyframes droplet-pulse {
            0%, 100% { opacity: 0.75; transform: scale(1); }
            50%       { opacity: 0.9;  transform: scale(1.06); }
        }
        @keyframes droplet-ring {
            0%   { transform: scale(1);    opacity: 0.5; }
            100% { transform: scale(1.75); opacity: 0; }
        }

        /* ── QUICK ACCESS BUTTONS ── */
        .qa-btn {
            position: relative;
            overflow: hidden;
            display: block;
            text-align: center;
            padding: 1rem 0.5rem;
            border-radius: 14px;
            text-decoration: none;
            color: var(--aqua-text);
            background: #fff;
            border: 1.5px solid var(--aqua-border);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease, color 0.3s ease, background 0.3s ease;
        }
        .qa-btn:hover {
            transform: translateY(-4px);
            background: var(--aqua-primary);
            border-color: var(--aqua-primary);
            color: #fff;
            box-shadow: 0 10px 28px rgba(0,119,182,0.22);
        }
        .qa-btn__ripple {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: rgba(0,119,182,0.07);
            transform: scale(0.4);
            opacity: 0;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }
        .qa-btn:hover .qa-btn__ripple {
            transform: scale(2);
            opacity: 1;
            background: rgba(255,255,255,0.12);
        }
        .qa-btn__icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--aqua-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.8rem;
            color: var(--aqua-primary);
            position: relative;
            z-index: 1;
            transition: transform 0.35s ease, background 0.3s ease, color 0.3s ease;
        }
        .qa-btn:hover .qa-btn__icon {
            transform: scale(1.15) rotate(-8deg);
            background: rgba(255,255,255,0.2);
            color: #fff;
        }
        .qa-btn__label {
            font-size: 0.9rem;
            font-weight: 700;
            text-align: center;
            line-height: 1.25;
            min-height: 2.5em;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .servicii-card-link {
            text-decoration: none;
            display: block;
            height: 100%;
        }
        .servicii-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            padding: 2.5rem 2rem 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            color: #fff;
            cursor: pointer;
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }
        .servicii-card--albastru {
            background: linear-gradient(145deg, #0077b6 0%, #00b4d8 100%);
            box-shadow: 0 8px 24px rgba(0, 119, 182, 0.35);
        }
        .servicii-card--teal {
            background: linear-gradient(145deg, #0096a0 0%, #00cfc1 100%);
            box-shadow: 0 8px 24px rgba(0, 150, 160, 0.35);
        }
        .servicii-card--indigo {
            background: linear-gradient(145deg, #023e8a 0%, #0077b6 100%);
            box-shadow: 0 8px 24px rgba(2, 62, 138, 0.35);
        }
        .servicii-card:hover {
            transform: translateY(-8px) scale(1.02);
        }
        .servicii-card--albastru:hover { box-shadow: 0 20px 48px rgba(0, 119, 182, 0.5); }
        .servicii-card--teal:hover     { box-shadow: 0 20px 48px rgba(0, 150, 160, 0.5); }
        .servicii-card--indigo:hover   { box-shadow: 0 20px 48px rgba(2, 62, 138, 0.5); }

        .servicii-card__icon-wrap {
            position: relative;
            width: 88px;
            height: 88px;
            margin-bottom: 1.4rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .servicii-card__icon {
            font-size: 3rem;
            position: relative;
            z-index: 1;
            transition: transform 0.4s ease;
        }
        .servicii-card:hover .servicii-card__icon {
            transform: scale(1.18) rotate(-6deg);
        }
        .servicii-card__ripple {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            transform: scale(0.8);
            transition: transform 0.4s ease, opacity 0.4s ease;
            opacity: 0;
        }
        .servicii-card:hover .servicii-card__ripple {
            transform: scale(1);
            opacity: 1;
        }
        .servicii-card__line {
            width: 40px;
            height: 3px;
            background: rgba(255,255,255,0.6);
            border-radius: 2px;
            margin: 0.6rem 0 1rem;
            transition: width 0.35s ease;
        }
        .servicii-card:hover .servicii-card__line { width: 70px; }
        .servicii-card__title {
            font-family: 'Merriweather', serif;
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0;
        }
        .servicii-card__desc {
            font-size: 0.9rem;
            opacity: 0.9;
            line-height: 1.6;
            flex: 1;
        }
        .servicii-card__cta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 1.2rem;
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.4);
            border-radius: 50px;
            padding: 0.4rem 1.1rem;
            transition: background 0.3s ease, gap 0.3s ease;
            width: fit-content;
        }
        .servicii-card:hover .servicii-card__cta {
            background: rgba(255,255,255,0.35);
            gap: 10px;
        }
        .servicii-card::after {
            content: '';
            position: absolute;
            bottom: -40px;
            right: -40px;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            transition: transform 0.4s ease;
        }
        .servicii-card:hover::after { transform: scale(1.3); }

        @media (max-width: 767px) {
            .servicii-card {
                flex-direction: row;
                flex-wrap: wrap;
                align-items: flex-start;
                padding: 1.4rem 1.2rem;
                border-radius: 14px;
            }
            .servicii-card__icon-wrap {
                width: 56px;
                height: 56px;
                margin-bottom: 0;
                margin-right: 1rem;
                flex-shrink: 0;
            }
            .servicii-card__icon { font-size: 2rem; }
            .servicii-card__title { font-size: 1.05rem; align-self: center; flex: 1; }
            .servicii-card__line { width: 100%; flex-basis: 100%; margin: 0.6rem 0 0.7rem; }
            .servicii-card__desc { font-size: 0.85rem; flex-basis: 100%; margin-bottom: 0.6rem; }
            .servicii-card__cta { margin-top: 0.4rem; font-size: 0.82rem; padding: 0.35rem 1rem; }
            .servicii-card:hover { transform: translateY(-4px) scale(1.01); }
        }
    </style>
    @endpush

@endsection