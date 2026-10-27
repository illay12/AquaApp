@extends('layouts.app')

@section('title', 'Acasă')

@section('content')

    @php
        $catLabel = [
            'anunturi' => 'Anunț',
            'avarie'   => 'Avarie',
            'angajare' => 'Cariere',
            'calitate' => 'Calitatea apei',
            'diverse'  => 'Diverse',
        ];
        $catColor = [
            'anunturi' => '#0077b6',
            'avarie'   => '#d64545',
            'angajare' => '#15936b',
            'calitate' => '#0aa2c0',
            'diverse'  => '#7c5cd6',
        ];
        $avarii    = $avariiRecente ?? collect();
        $areAvarii = $avarii->isNotEmpty();

        // Fotografii: întâi cele locale din public/images/home/ (nume.jpg + variantele nume-{lățime}.jpg
        // și, opțional, nume-mobil.jpg = decupaj pentru telefon), altfel cele de pe Unsplash
        $foto = function (string $nume, string $unsplash, array $latimi) {
            $local = public_path("images/home/{$nume}.jpg");
            if (file_exists($local)) {
                $srcset = collect(glob(public_path("images/home/{$nume}-[0-9]*.jpg")))
                    ->push($local)
                    ->map(fn ($f) => asset('images/home/'.basename($f)).' '.getimagesize($f)[0].'w')
                    ->implode(', ');
                $mobil = file_exists(public_path("images/home/{$nume}-mobil.jpg")) ? asset("images/home/{$nume}-mobil.jpg") : null;
                return ['src' => asset("images/home/{$nume}.jpg"), 'srcset' => $srcset, 'mobil' => $mobil];
            }
            $baza = 'https://images.unsplash.com/'.$unsplash.'?auto=format&fit=crop&q=75';
            return [
                'src'    => $baza.'&w='.$latimi[1],
                'srcset' => collect($latimi)->map(fn ($w) => $baza.'&w='.$w.' '.$w.'w')->implode(', '),
                'mobil'  => null,
            ];
        };
        $imgHero = $foto('hero', 'photo-1518837695005-2083093ee35b', [800, 1600, 2400]);
        $imgApa  = $foto('calitate', 'photo-1548839140-29a749e1cf4d', [700, 1100, 1600]);
    @endphp

    {{-- ═════════ HERO FOTO ═════════ --}}
    <section class="dl-hero">
        <picture>
            @if($imgHero['mobil'])
                <source media="(max-width: 767.98px)" srcset="{{ $imgHero['mobil'] }}">
            @endif
            <img class="dl-hero__img {{ $imgHero['mobil'] ? 'dl-hero__img--decupat' : '' }}"
                 src="{{ $imgHero['src'] }}" srcset="{{ $imgHero['srcset'] }}" sizes="100vw"
                 alt="Suprafața apei la apus" fetchpriority="high">
        </picture>
        <div class="dl-hero__shade"></div>

        @if($areAvarii)
            <div class="container dl-hero__top">
                <a href="#retea" class="dl-alert-pill">
                    <span class="dl-alert-pill__dot"></span>
                    {{ $avarii->count() > 1 ? $avarii->count().' avarii în curs' : 'Avarie în curs' }}
                </a>
            </div>
        @endif

        <div class="container dl-hero__content">
            <h1 class="dl-hero__title">Împreună pentru <em>apă</em> sigură <br>și un mediu curat</h1>
            <p class="dl-hero__sub"><i class="bi bi-shield-check me-1"></i> Operator autorizat A.N.R.S.C.</p>
        </div>
    </section>

    {{-- ═════════ TASK BAR ═════════ --}}
    <div class="container">
        <nav class="dl-tasks" aria-label="Servicii online">
            <a href="{{ url('https://my.aquaservtulcea.ro/') }}" class="dl-task">
                <i class="bi bi-credit-card"></i>
                <span>Plătește factura</span>
            </a>
            <a href="{{ url('/client/index-contor') }}" class="dl-task">
                <i class="bi bi-speedometer2"></i>
                <span>Transmite indexul</span>
            </a>
            <a href="tel:+40747022009" class="dl-task dl-task--alert">
                <i class="bi bi-exclamation-octagon"></i>
                <span>Raportează o avarie</span>
            </a>
            <a href="{{ url('/informatii/formulare') }}" class="dl-task">
                <i class="bi bi-file-earmark-text"></i>
                <span>Formulare utile</span>
            </a>
        </nav>
    </div>

    {{-- ═════════ STARE REȚEA ═════════ --}}
    <section class="dl-section dl-section--first">
        <div class="container">
            <div class="dl-status {{ $areAvarii ? 'is-alert' : '' }}" id="retea">
                <div class="dl-status__state">
                    <span class="dl-status__dot"></span>
                    <div>
                        <span class="dl-eyebrow">Rețeaua acum</span>
                        <strong>{{ $areAvarii ? 'Lucrări în desfășurare' : 'Totul funcționează normal' }}</strong>
                    </div>
                </div>

                @if($areAvarii)
                    <ul class="dl-status__list">
                        @foreach($avarii->take(3) as $av)
                            <li><a href="{{ url('/anunturi/'.$av->slug) }}">{{ $av->titlu }}</a></li>
                        @endforeach
                    </ul>
                @endif

                <a href="{{ url('/anunturi?q=&categorie=avarie') }}" class="dl-arrow-link">
                    Avarii și lucrări <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ═════════ NOUTĂȚI ═════════ --}}
    <section class="dl-section dl-section--news">
        <div class="container">
            <div class="dl-head">
                <h2 class="dl-h2">Noutăți</h2>
                <a href="{{ url('/anunturi') }}" class="dl-arrow-link">Toate anunțurile <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="dl-news">
                @forelse(($anunturi ?? collect())->take(3) as $anunt)
                    <a href="{{ url('/anunturi/'.$anunt->slug) }}" class="dl-news__card" style="--cat:{{ $catColor[$anunt->categorie] ?? '#64748b' }};">
                        <span class="dl-news__cat">{{ $catLabel[$anunt->categorie] ?? ucfirst($anunt->categorie) }}</span>
                        <span class="dl-news__title">{{ $anunt->titlu }}</span>
                        <time datetime="{{ $anunt->created_at->toDateString() }}">{{ $anunt->created_at->locale('ro')->translatedFormat('j F Y') }}</time>
                    </a>
                @empty
                    <p class="dl-muted">Niciun anunț momentan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ═════════ APA NOASTRĂ (split) ═════════ --}}
    <section class="dl-section">
        <div class="container">
            <div class="dl-split">
                <div class="dl-split__media">
                    <img src="{{ $imgApa['src'] }}"
                         @if($imgApa['srcset']) srcset="{{ $imgApa['srcset'] }}" sizes="(min-width: 992px) 50vw, 100vw" @endif
                         alt="Pahar în care se toarnă apă" loading="lazy">
                </div>
                <div class="dl-split__body">
                    <span class="dl-eyebrow">Calitatea apei</span>
                    <h2 class="dl-h2">Verificată zilnic.<br>Sigură de băut.</h2>
                    <ul class="dl-checks">
                        <li><i class="bi bi-check2"></i> Analize în laborator acreditat</li>
                        <li><i class="bi bi-check2"></i> Conformă normelor UE</li>
                        <li><i class="bi bi-check2"></i> Rezultate publice, lunar</li>
                    </ul>
                    <a href="{{ url('/informatii/calitatea-apei') }}" class="dl-btn">Vezi buletinele de analiză</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ═════════ CIFRE (val) ═════════ --}}
    <section class="dl-stats">
        <svg class="dl-stats__wave dl-stats__wave--top" viewBox="0 0 1440 60" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,40 C360,0 1080,80 1440,30 L1440,0 L0,0 Z" fill="#ffffff"/>
        </svg>
        <div class="container">
            <div class="dl-stats__grid">
                <div><strong>25+</strong><span>localități deservite</span></div>
                <div><strong>25.000+</strong><span>abonați</span></div>
                <div><strong>99,8%</strong><span>conformitate calitate</span></div>
                <div><strong>24/7</strong><span>dispecerat avarii</span></div>
            </div>
        </div>
        <svg class="dl-stats__wave dl-stats__wave--bottom" viewBox="0 0 1440 60" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,20 C360,70 1080,-10 1440,30 L1440,60 L0,60 Z" fill="#ffffff"/>
        </svg>
    </section>

    {{-- ═════════ CONTUL ONLINE ═════════ --}}
    <section class="dl-section">
        <div class="container">
            <div class="dl-account">
                <div class="dl-account__body">
                    <span class="dl-eyebrow dl-eyebrow--light">Contul meu Aquaserv</span>
                    <h2 class="dl-h2 dl-h2--light">Totul online,<br>fără drumuri la casierie.</h2>
                    <ul class="dl-checks dl-checks--light">
                        <li><i class="bi bi-check2"></i> Plătești facturile cu cardul</li>
                        <li><i class="bi bi-check2"></i> Vezi istoricul consumului</li>
                        <li><i class="bi bi-check2"></i> Primești factura pe email</li>
                    </ul>
                    <a href="{{ url('https://my.aquaservtulcea.ro/') }}" class="dl-btn dl-btn--light">Intră în cont</a>
                </div>
                <div class="dl-account__art" aria-hidden="true">
                    <div class="dl-phone">
                        <div class="dl-phone__bar"></div>
                        <div class="dl-phone__card">
                            <small>De plată</small>
                            <strong>0,00 lei</strong>
                            <span><i class="bi bi-check-circle-fill"></i> Achitat</span>
                        </div>
                        <div class="dl-phone__row"></div>
                        <div class="dl-phone__row dl-phone__row--short"></div>
                        <div class="dl-phone__chart">
                            <i style="height:40%"></i><i style="height:65%"></i><i style="height:50%"></i><i style="height:80%"></i><i style="height:60%"></i><i style="height:70%"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═════════ LINKURI UTILE ═════════ --}}
    <section class="dl-section dl-section--last">
        <div class="container">
            <div class="dl-links">
                <a href="{{ url('/informatii/tarife') }}"><span>Tarife</span><i class="bi bi-arrow-up-right"></i></a>
                <a href="{{ url('/contact') }}"><span>Contact</span><i class="bi bi-arrow-up-right"></i></a>
                <a href="{{ url('/program-casierii') }}"><span>Program casierii</span><i class="bi bi-arrow-up-right"></i></a>
                <a href="{{ url('/servicii') }}"><span>Servicii</span><i class="bi bi-arrow-up-right"></i></a>
                <a href="{{ route('poim.prezentare') }}"><span>Proiect POIM</span><i class="bi bi-arrow-up-right"></i></a>
                <a href="{{ route('pddtj.prezentare') }}"><span>Proiect PDDTJ</span><i class="bi bi-arrow-up-right"></i></a>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        /* ═════════ HOME – „Delta” ═════════ */
        :root {
            --dl-ink: #0d2236;
            --dl-muted: #5f7184;
            --dl-line: #e5edf3;
            --dl-sand: #f7f5f0;
            --dl-deep: #06395f;
        }

        .dl-eyebrow { display: block; font-size: .75rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; color: var(--aqua-primary); margin-bottom: .5rem; }
        .dl-eyebrow--light { color: #90e0ef; }
        .dl-h2 { font-family: 'Merriweather', serif; font-weight: 700; font-size: clamp(1.6rem, 3vw, 2.4rem); line-height: 1.2; color: var(--dl-ink); margin: 0 0 1.25rem; letter-spacing: -.01em; }
        .dl-h2--light { color: #fff; }
        .dl-muted { color: var(--dl-muted); }

        .dl-btn {
            display: inline-flex; align-items: center; min-height: 50px; padding: 0 1.6rem;
            border-radius: 999px; background: var(--dl-ink); color: #fff;
            font-weight: 800; text-decoration: none; transition: background .2s ease, transform .2s ease;
        }
        .dl-btn:hover { background: var(--aqua-primary); color: #fff; }
        .dl-btn:active { transform: scale(.97); }
        .dl-btn--light { background: #fff; color: var(--dl-deep); }
        .dl-btn--light:hover { background: #90e0ef; color: var(--dl-deep); }

        .dl-arrow-link { display: inline-flex; align-items: center; gap: .45rem; font-weight: 800; color: var(--dl-ink); text-decoration: none; white-space: nowrap; }
        .dl-arrow-link i { transition: transform .2s ease; }
        .dl-arrow-link:hover { color: var(--aqua-primary); }
        .dl-arrow-link:hover i { transform: translateX(4px); }

        .dl-checks { list-style: none; padding: 0; margin: 0 0 1.75rem; }
        .dl-checks li { display: flex; align-items: center; gap: .65rem; padding: .45rem 0; font-size: 1.05rem; font-weight: 600; color: var(--dl-ink); }
        .dl-checks i { width: 26px; height: 26px; border-radius: 50%; background: #e3f3fa; color: var(--aqua-primary); display: inline-flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
        .dl-checks--light li { color: #fff; }
        .dl-checks--light i { background: rgba(255,255,255,.15); color: #90e0ef; }

        .dl-section { padding: 5rem 0 0; }
        .dl-section--first { padding-top: 3rem; }
        .dl-section--news { padding-top: 3.5rem; }
        .dl-section--last { padding-bottom: 5rem; }
        .dl-head { display: flex; align-items: baseline; justify-content: space-between; gap: 1rem; margin-bottom: 1.5rem; }
        .dl-head .dl-h2 { margin: 0; }

        /* HERO */
        .dl-hero { position: relative; height: min(78vh, 680px); min-height: 440px; overflow: hidden; background: var(--dl-deep); }
        .dl-hero__img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 60%; }
        .dl-hero__shade { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(6,57,95,.05) 30%, rgba(6,57,95,.75) 100%), linear-gradient(90deg, rgba(6,57,95,.45) 0%, transparent 60%); }
        .dl-hero__content { position: relative; height: 100%; display: flex; flex-direction: column; justify-content: flex-end; padding-bottom: 7.5rem; color: #fff; }
        .dl-hero__title { font-family: 'Merriweather', serif; font-weight: 700; font-size: clamp(2rem, 3.6vw, 3rem); line-height: 1.15; text-wrap: balance; letter-spacing: -.02em; margin: 0; text-shadow: 0 2px 24px rgba(0,0,0,.25); }
        .dl-hero__title em { font-style: normal; color: #8fd8f2; }
        .dl-hero__sub { margin: 1rem 0 0; font-size: 1.15rem; font-weight: 600; opacity: .9; }

        /* TASK BAR */
        .dl-tasks {
            position: relative; z-index: 2; margin-top: -4.25rem;
            display: grid; grid-template-columns: repeat(4, 1fr);
            background: #fff; border-radius: 20px; overflow: hidden;
            box-shadow: 0 24px 50px -24px rgba(6,57,95,.45);
        }
        .dl-task {
            display: flex; align-items: center; gap: .9rem; padding: 1.6rem 1.5rem;
            color: var(--dl-ink); text-decoration: none; font-weight: 800; font-size: 1.02rem; line-height: 1.25;
            transition: background .2s ease, color .2s ease;
            -webkit-tap-highlight-color: transparent;
        }
        .dl-task + .dl-task { border-left: 1px solid var(--dl-line); }
        .dl-task i { font-size: 1.6rem; color: var(--aqua-primary); transition: transform .25s ease; }
        .dl-task--alert i { color: #d64545; }
        .dl-task:hover { background: #f3f9fd; color: var(--dl-ink); }
        .dl-task:hover i { transform: scale(1.12); }
        .dl-task:active { background: #e8f3fa; }

        /* STARE */
        .dl-status {
            display: flex; align-items: center; gap: 2rem; flex-wrap: wrap;
            padding: 1.4rem 1.75rem; border-radius: 18px; background: #f1faf5;
        }
        .dl-status.is-alert { background: #fdf3f3; }
        .dl-status__state { display: flex; align-items: center; gap: 1rem; }
        .dl-status__state strong { font-size: 1.15rem; color: var(--dl-ink); }
        .dl-status__state .dl-eyebrow { margin-bottom: .1rem; color: #15936b; }
        .dl-status.is-alert .dl-status__state .dl-eyebrow { color: #c53030; }
        .dl-status__dot { width: 14px; height: 14px; border-radius: 50%; background: #22c55e; box-shadow: 0 0 0 6px rgba(34,197,94,.18); flex-shrink: 0; }
        .dl-status.is-alert .dl-status__dot { background: #ef4444; animation: dlPulse 1.8s infinite; }
        .dl-status__list { list-style: none; margin: 0; padding: 0; flex: 1; min-width: 220px; }
        .dl-status__list li + li { margin-top: .25rem; }
        .dl-status__list a { color: var(--dl-ink); font-weight: 600; text-decoration: none; overflow-wrap: anywhere; }
        .dl-status__list a:hover { text-decoration: underline; }
        .dl-status > .dl-arrow-link { margin-left: auto; }
        @keyframes dlPulse { 0% { box-shadow: 0 0 0 0 rgba(239,68,68,.5); } 100% { box-shadow: 0 0 0 12px rgba(239,68,68,0); } }
        .dl-status { scroll-margin-top: 96px; } /* sub headerul fix */

        /* Etichetă avarie în colțul pozei → duce la „Rețeaua acum” */
        .dl-hero__top { position: absolute; top: 1.5rem; left: 0; right: 0; z-index: 2; }
        .dl-alert-pill {
            display: inline-flex; align-items: center; gap: .55rem; min-height: 40px; padding: .4rem 1rem .4rem .85rem;
            border-radius: 999px; background: rgba(255,255,255,.94); color: var(--dl-ink); text-decoration: none;
            font-size: .88rem; font-weight: 800; box-shadow: 0 8px 24px -10px rgba(13,34,54,.45);
        }
        .dl-alert-pill:hover { color: #c53030; }
        .dl-alert-pill__dot { width: 10px; height: 10px; border-radius: 50%; background: #ef4444; flex-shrink: 0; animation: dlPulse 1.8s infinite; }
        @media (prefers-reduced-motion: no-preference) { html { scroll-behavior: smooth; } }
        @media (prefers-reduced-motion: reduce) { .dl-alert-pill__dot { animation: none; } }

        /* SPLIT */
        .dl-split { display: grid; grid-template-columns: 1.1fr 1fr; gap: 4rem; align-items: center; }
        .dl-split__media { border-radius: 24px; overflow: hidden; aspect-ratio: 4 / 3; background: #dceaf2; }
        .dl-split__media img { width: 100%; height: 100%; object-fit: cover; }

        /* CIFRE */
        .dl-stats { position: relative; margin-top: 5rem; padding: 6rem 0; background: var(--dl-deep); color: #fff; }
        .dl-stats__wave { position: absolute; left: 0; width: 100%; height: 60px; }
        .dl-stats__wave--top { top: -1px; }
        .dl-stats__wave--bottom { bottom: -1px; }
        .dl-stats__grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 2rem; text-align: center; }
        .dl-stats__grid strong { display: block; font-family: 'Merriweather', serif; font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 700; letter-spacing: -.02em; line-height: 1.1; }
        .dl-stats__grid span { display: block; margin-top: .4rem; font-size: .95rem; color: #9fd3ea; font-weight: 600; }
        .dl-stats + .dl-section { padding-top: 4rem; }

        /* NOUTĂȚI */
        .dl-news { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; }
        .dl-news__card {
            position: relative; display: flex; flex-direction: column; gap: .8rem; min-height: 190px;
            padding: 1.6rem 1.5rem 1.4rem; border-radius: 18px; background: var(--dl-sand);
            color: var(--dl-ink); text-decoration: none; overflow: hidden;
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .dl-news__card::before { content: ""; position: absolute; left: 0; top: 0; right: 0; height: 4px; background: var(--cat); }
        .dl-news__cat { font-size: .75rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: var(--cat); }
        .dl-news__title { font-size: 1.12rem; font-weight: 800; line-height: 1.4; overflow-wrap: anywhere; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .dl-news__card time { margin-top: auto; font-size: .85rem; color: var(--dl-muted); font-weight: 600; }
        .dl-news__card:hover { transform: translateY(-4px); box-shadow: 0 20px 40px -24px rgba(13,34,54,.35); color: var(--dl-ink); }

        /* CONT ONLINE */
        .dl-account {
            position: relative; overflow: hidden;
            display: grid; grid-template-columns: 1.2fr 1fr; align-items: center; gap: 2rem;
            padding: 3.5rem 4rem; border-radius: 28px;
            background: radial-gradient(120% 140% at 100% 0%, #0a6aa8 0%, var(--dl-deep) 55%);
        }
        .dl-account__art { display: flex; justify-content: center; }
        .dl-phone {
            width: 230px; padding: 1.1rem; border-radius: 34px; background: #fff;
            box-shadow: 0 40px 70px -30px rgba(0,0,0,.55); transform: rotate(4deg);
        }
        .dl-phone__bar { width: 60px; height: 6px; border-radius: 6px; background: #e5edf3; margin: 0 auto 1rem; }
        .dl-phone__card { padding: 1rem; border-radius: 18px; background: #f1f8fc; margin-bottom: .9rem; }
        .dl-phone__card small { display: block; font-size: .72rem; font-weight: 700; color: var(--dl-muted); }
        .dl-phone__card strong { display: block; font-size: 1.5rem; font-weight: 800; color: var(--dl-ink); }
        .dl-phone__card span { font-size: .75rem; font-weight: 800; color: #15936b; }
        .dl-phone__row { height: 10px; border-radius: 6px; background: #eef3f7; margin-bottom: .5rem; }
        .dl-phone__row--short { width: 60%; }
        .dl-phone__chart { display: flex; align-items: flex-end; gap: 6px; height: 70px; margin-top: 1rem; }
        .dl-phone__chart i { flex: 1; border-radius: 4px; background: linear-gradient(180deg, #48cae4, #0077b6); }

        /* LINKURI */
        .dl-links { display: grid; grid-template-columns: repeat(3, 1fr); border-top: 1px solid var(--dl-line); }
        .dl-links a {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.4rem .25rem; border-bottom: 1px solid var(--dl-line);
            font-family: 'Merriweather', serif; font-size: 1.15rem; font-weight: 700;
            color: var(--dl-ink); text-decoration: none; transition: color .2s ease, padding .2s ease;
        }
        .dl-links a:nth-child(3n+2), .dl-links a:nth-child(3n+3) { padding-left: 1.5rem; }
        .dl-links a i { color: var(--aqua-primary); transition: transform .2s ease; }
        .dl-links a:hover { color: var(--aqua-primary); }
        .dl-links a:hover i { transform: translate(3px, -3px); }

        @media (prefers-reduced-motion: reduce) { .dl-status__dot { animation: none !important; } }

        /* ── TABLETĂ ── */
        @media (max-width: 991.98px) {
            .dl-tasks { grid-template-columns: repeat(2, 1fr); }
            .dl-task:nth-child(3) { border-left: none; }
            .dl-task:nth-child(n+3) { border-top: 1px solid var(--dl-line); }
            .dl-split { grid-template-columns: 1fr; gap: 2rem; }
            .dl-account { grid-template-columns: 1fr; padding: 3rem 2.5rem; }
            .dl-account__art { display: none; }
            .dl-news { grid-template-columns: 1fr 1fr; }
            .dl-news__card:nth-child(3) { display: none; }
        }

        /* ── MOBIL ── */
        @media (max-width: 767.98px) {
            .dl-section { padding-top: 3.25rem; }
            .dl-section--first { padding-top: 2rem; }
            .dl-section--news { padding-top: 2.5rem; }
            .dl-section--last { padding-bottom: 3.5rem; }

            .dl-hero { height: 62vh; min-height: 380px; max-height: 520px; }
            /* poza e lată: pe mobil o mărim și o ancorăm jos, ca să taie din cer */
            .dl-hero__img { top: auto; bottom: 0; height: 135%; object-position: center bottom; }
            /* cu decupajul local pentru mobil, cerul e deja tăiat */
            .dl-hero__img--decupat { top: 0; height: 100%; }
            .dl-hero__content { padding-bottom: 5.5rem; }
            .dl-hero__top { top: 1rem; }
            .dl-hero__title { font-size: 1.85rem; }
            .dl-hero__title br { display: none; }
            .dl-hero__sub { display: none; }

            .dl-tasks { margin-top: -3.25rem; border-radius: 18px; }
            .dl-task { flex-direction: column; align-items: flex-start; gap: .6rem; padding: 1.15rem 1.1rem; font-size: .92rem; }
            .dl-task i { font-size: 1.45rem; }

            .dl-status { gap: 1rem; padding: 1.15rem 1.25rem; border-radius: 16px; }
            .dl-status__state strong { font-size: 1rem; }
            /* Lista și linkul se aliniază cu textul, nu cu punctul de stare (14px punct + 1rem spațiu) */
            .dl-status { gap: .75rem; }
            .dl-status__list { flex: 0 0 calc(100% - 14px - 1rem); min-width: 0; margin-left: calc(14px + 1rem); font-size: .92rem; }
            .dl-status > .dl-arrow-link { margin-left: calc(14px + 1rem); font-size: .92rem; color: var(--aqua-primary); }

            /* poza mai scundă și lipită de titlu, ca să citească drept o singură secțiune */
            .dl-split { gap: 1.25rem; }
            .dl-split__media { border-radius: 20px; aspect-ratio: 16 / 9; }
            .dl-split__media img { object-position: center 35%; }
            .dl-checks li { font-size: .98rem; }
            .dl-btn { width: 100%; justify-content: center; }

            .dl-stats { margin-top: 3.25rem; padding: 4.5rem 0; }
            .dl-stats__wave { height: 32px; }
            .dl-stats__grid { grid-template-columns: 1fr 1fr; row-gap: 2rem; }
            .dl-stats + .dl-section { padding-top: 3rem; }

            .dl-head { margin-bottom: 1rem; }
            .dl-head .dl-arrow-link { font-size: .9rem; }
            .dl-news { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; gap: .85rem; margin-right: calc(var(--bs-gutter-x) * -.5); padding-right: calc(var(--bs-gutter-x) * .5); scrollbar-width: none; }
            .dl-news::-webkit-scrollbar { display: none; }
            .dl-news__card { flex: 0 0 80%; scroll-snap-align: start; min-height: 170px; }
            .dl-news__card:nth-child(3) { display: flex; }

            .dl-account { padding: 2.25rem 1.5rem; border-radius: 22px; }

            .dl-links { grid-template-columns: 1fr 1fr; }
            .dl-links a { font-size: 1rem; padding: 1.15rem .1rem; }
            .dl-links a:nth-child(3n+2), .dl-links a:nth-child(3n+3) { padding-left: .1rem; }
            .dl-links a:nth-child(even) { padding-left: 1rem; }
        }
    </style>
    @endpush

@endsection
