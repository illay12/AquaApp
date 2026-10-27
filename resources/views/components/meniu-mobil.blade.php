{{-- Meniu mobil (sub 1200px): panou pe tot ecranul, o singură treaptă de acordeon --}}
@php
    // [eticheta, url, activ, extern]
    $mmSectiuni = [
        [
            'titlu'   => 'Despre noi',
            'grupuri' => [
                '' => [
                    ['Despre Aquaserv', url('/despre'), request()->is('despre')],
                    ['Structură organizațională', url('/despre/structura-organizationala'), request()->is('despre/structura-organizationala*')],
                    ['Centre operaționale', url('/despre/centre-operationale'), request()->is('despre/centre-operationale*')],
                ],
                'Servicii' => [
                    ['Alimentare cu apă', url('/servicii/alimentare-apa'), request()->is('servicii/alimentare-apa*')],
                    ['Canalizare', url('/servicii/canalizare'), request()->is('servicii/canalizare*')],
                    ['Epurare ape uzate', url('/servicii/epurare'), request()->is('servicii/epurare*')],
                ],
                'Dezvoltare' => [
                    ['Aquaserv – POS', route('despre.pos'), request()->routeIs('despre.pos')],
                    ['Aquaserv – POIM', 'https://poim.aquaservtulcea.ro/', false, true],
                    ['Aquaserv – PDDTJ', 'https://'.config('app.pddtj_domain').'/', false, true],
                ],
            ],
        ],
        [
            'titlu'   => 'Informații publice',
            'grupuri' => [
                '' => [
                    ['Program casierii', url('/program-casierii'), request()->is('program-casierii*')],
                    ['Calitatea apei', url('/informatii/calitatea-apei'), request()->is('informatii/calitatea-apei*')],
                    ['Tarife și taxe', url('/informatii/tarife'), request()->is('informatii/tarife*')],
                    ['Formulare utile', url('/informatii/formulare'), request()->is('informatii/formulare*')],
                    ['Legislație', url('/informatii/legislatie'), request()->is('informatii/legislatie*')],
                    ['Avize și acorduri', url('/informatii/avize'), request()->is('informatii/avize*')],
                    ['Legea 544/2001', url('/informatii/legea-544-2001'), request()->is('informatii/legea-544-2001*')],
                ],
                'Alte informații' => [
                    ['Buletin informativ', url('/informatii/buletin-informativ'), request()->is('informatii/buletin-informativ*')],
                    ['Contracte de achiziții', url('/informatii/contracte-achizitii'), request()->is('informatii/contracte-achizitii*')],
                    ['Cheltuieli de personal', url('/informatii/cheltuieli-personal'), request()->is('informatii/cheltuieli-personal*')],
                    ['Datoriile societății', url('/informatii/datoriile-societatii'), request()->is('informatii/datoriile-societatii*')],
                    ['Detalierea serviciilor', url('/informatii/detalierea-serviciilor'), request()->is('informatii/detalierea-serviciilor*')],
                ],
            ],
        ],
        [
            'titlu'   => 'Transparență',
            'grupuri' => [
                '' => [
                    ['Hotărâri AGA', url('/informatii/hotarari-aga'), request()->is('informatii/hotarari-aga*')],
                    ['Declarații de avere', 'https://declaratii.integritate.eu/', false, true],
                    ['Surse, buget, bilanț', url('/informatii/surse-buget-bilant'), request()->is('informatii/surse-buget-bilant*')],
                    ['Buget investiții', url('/transparenta/buget-investitii'), request()->is('transparenta/buget-investitii*')],
                ],
                'Guvernanță' => [
                    ['Componența CA', url('/transparenta/componenta-ca'), request()->is('transparenta/componenta-ca*')],
                    ['Contracte mandat administratori', url('/transparenta/contracte-mandat-administratori'), request()->is('transparenta/contracte-mandat-administratori*')],
                    ['Cod de etică', url('/transparenta/cod-etica'), request()->is('transparenta/cod-etica*')],
                    ['Guvernanță corporativă', url('/transparenta/guvernanta-corporativa'), request()->is('transparenta/guvernanta-corporativa*')],
                    ['Plan de integritate', url('/transparenta/plan-integritate'), request()->is('transparenta/plan-integritate*')],
                ],
                'Rapoarte' => [
                    ['Rapoarte de evaluare', url('/transparenta/rapoarte-evaluare'), request()->is('transparenta/rapoarte-evaluare*')],
                    ['Raport anual de activitate', url('/transparenta/raport-anual'), request()->is('transparenta/raport-anual*')],
                    ['Raport audit extern', url('/transparenta/raport-audit'), request()->is('transparenta/raport-audit*')],
                    ['Rapoarte CNR', url('/transparenta/raporturi-cnr'), request()->is('transparenta/raporturi-cnr*')],
                    ['Raport Comitet de Audit', url('/transparenta/raport-comitet-audit'), request()->is('transparenta/raport-comitet-audit*')],
                    ['Raport Comitet de Risc', url('/transparenta/raport-comitet-risc'), request()->is('transparenta/raport-comitet-risc*')],
                ],
            ],
        ],
    ];
    $mmSimple = [
        ['Anunțuri', url('/anunturi'), request()->is('anunturi*')],
        ['Contact', url('/contact'), request()->is('contact*')],
        ['GDPR', url('/gdpr'), request()->is('gdpr*')],
    ];
@endphp

<div id="mobileMenu" class="mm" aria-hidden="true">
    <div id="overlayMeniu" class="mm__overlay"></div>

    <aside id="mobileDrawer" class="mm__panel" role="dialog" aria-modal="true" aria-label="Meniu" tabindex="-1">
        <div class="mm__head">
            <a href="{{ url('/') }}" class="mm__brand">
                <span class="mm__brand-icon"><i class="bi bi-droplet-half"></i></span>
                <span>Aquaserv Tulcea<small>Servicii apă și canal</small></span>
            </a>
            <button type="button" id="btnInchideMeniu" class="mm__close" aria-label="Închide meniul">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="mm__body">
            <button type="button" id="btnSearchMobil" class="mm__search">
                <i class="bi bi-search"></i> Caută pe site
            </button>

            <nav aria-label="Meniu principal">
                @foreach($mmSectiuni as $i => $sec)
                    @php $areActiv = collect($sec['grupuri'])->flatten(1)->contains(fn ($l) => $l[2]); @endphp
                    <div class="mm-sec {{ $areActiv ? 'is-open is-current' : '' }}">
                        <button type="button" class="mm-sec__btn" aria-expanded="{{ $areActiv ? 'true' : 'false' }}" aria-controls="mmSec{{ $i }}">
                            <span>{{ $sec['titlu'] }}</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="mm-sec__panel" id="mmSec{{ $i }}">
                            <div class="mm-sec__inner">
                                @foreach($sec['grupuri'] as $grup => $linkuri)
                                    @if($grup !== '')
                                        <div class="mm-grp">{{ $grup }}</div>
                                    @endif
                                    @foreach($linkuri as $l)
                                        <a href="{{ $l[1] }}" class="mm-link {{ $l[2] ? 'is-active' : '' }}"
                                           @if($l[2]) aria-current="page" @endif
                                           @if($l[3] ?? false) target="_blank" rel="noopener noreferrer" @endif>
                                            {{ $l[0] }}
                                            @if($l[3] ?? false)<i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>@endif
                                        </a>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach($mmSimple as $l)
                    <a href="{{ $l[1] }}" class="mm-top {{ $l[2] ? 'is-active' : '' }}" @if($l[2]) aria-current="page" @endif>
                        {{ $l[0] }} <i class="bi bi-chevron-right"></i>
                    </a>
                @endforeach
            </nav>
        </div>

        <div class="mm__foot">
            <div class="mm__quick">
                <a href="{{ url('/client/index-contor') }}"><i class="bi bi-speedometer2"></i> Transmite indexul</a>
                <a href="https://my.aquaservtulcea.ro/" class="is-dark"><i class="bi bi-person-circle"></i> Contul meu</a>
            </div>
            <a href="tel:0747022009" class="mm__call">
                <span class="mm__call-icon"><i class="bi bi-telephone-fill"></i></span>
                <span><small>Avarii 24/7</small><strong>0747 022 009</strong></span>
            </a>
        </div>
    </aside>
</div>

<style>
    .mm { position: fixed; inset: 0; z-index: 10000; visibility: hidden; pointer-events: none; transition: visibility 0s linear .32s; }
    .mm.is-open { visibility: visible; pointer-events: auto; transition-delay: 0s; }
    .mm__overlay { position: absolute; inset: 0; background: rgba(6,57,95,.45); opacity: 0; transition: opacity .3s ease; }
    .mm.is-open .mm__overlay { opacity: 1; }
    .mm__panel {
        position: absolute; top: 0; right: 0; bottom: 0; width: 100%; max-width: 440px;
        display: flex; flex-direction: column; background: #fff;
        transform: translateX(100%); transition: transform .32s cubic-bezier(.4,0,.2,1);
        box-shadow: -16px 0 48px -12px rgba(13,34,54,.3);
    }
    .mm.is-open .mm__panel { transform: none; }
    .mm__panel:focus { outline: none; }
    .mm button:focus:not(:focus-visible) { outline: none; }
    .mm :focus-visible { outline: 2px solid var(--aqua-primary); outline-offset: 2px; }

    .mm__head { display: flex; align-items: center; justify-content: space-between; gap: 1rem; min-height: 68px; padding: .6rem .75rem .6rem 1.25rem; border-bottom: 1px solid var(--site-line); }
    .mm__brand { display: flex; align-items: center; gap: .75rem; text-decoration: none; color: var(--site-ink); font-family: 'Merriweather', serif; font-weight: 700; font-size: 1.05rem; line-height: 1.15; }
    .mm__brand small { display: block; font-family: 'Nunito', sans-serif; font-size: .68rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: var(--aqua-primary); }
    .mm__brand-icon { width: 42px; height: 42px; flex-shrink: 0; display: grid; place-items: center; border-radius: 13px; color: #fff; font-size: 1.2rem; background: linear-gradient(140deg, #0a6aa8, var(--site-deep)); }
    .mm__close { width: 44px; height: 44px; flex-shrink: 0; display: grid; place-items: center; border: 0; border-radius: 50%; background: #f1f5f9; color: var(--site-ink); font-size: 1.1rem; }

    .mm__body { flex: 1; overflow-y: auto; overscroll-behavior: contain; -webkit-overflow-scrolling: touch; padding: 1rem 1.25rem 1.5rem; }
    .mm__search { width: 100%; display: flex; align-items: center; gap: .65rem; min-height: 48px; padding: 0 1.1rem; margin-bottom: .5rem; border: 1px solid var(--site-line); border-radius: 999px; background: #f5f9fc; color: #5f7184; font-family: 'Nunito', sans-serif; font-size: 1rem; font-weight: 600; text-align: left; }
    .mm__search i { color: var(--aqua-primary); }

    .mm-sec, .mm-top { border-bottom: 1px solid var(--site-line); }
    .mm-sec__btn, .mm-top {
        width: 100%; display: flex; align-items: center; justify-content: space-between; gap: 1rem;
        min-height: 60px; padding: 0; border: 0; background: none; text-align: left; text-decoration: none;
        color: var(--site-ink); font-family: 'Nunito', sans-serif; font-size: 1.125rem; font-weight: 800;
    }
    .mm-sec__btn i, .mm-top i { font-size: .95rem; color: #8796a5; transition: transform .25s ease; }
    .mm-sec.is-open .mm-sec__btn i { transform: rotate(180deg); }
    .mm-sec.is-current .mm-sec__btn span::after { content: ""; display: inline-block; width: 7px; height: 7px; margin-left: .55rem; border-radius: 50%; background: var(--aqua-primary); vertical-align: middle; }
    .mm-top.is-active { color: var(--aqua-primary); }

    .mm-sec__panel { display: grid; grid-template-rows: 0fr; transition: grid-template-rows .28s ease; }
    .mm-sec.is-open .mm-sec__panel { grid-template-rows: 1fr; }
    .mm-sec__inner { overflow: hidden; visibility: hidden; transition: visibility 0s linear .28s; }
    .mm-sec.is-open .mm-sec__inner { visibility: visible; transition-delay: 0s; padding-bottom: .85rem; }

    .mm-grp { padding: 1rem 0 .3rem; font-size: .72rem; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; color: #7b8a9a; }
    .mm-link {
        display: flex; align-items: center; gap: .5rem; min-height: 48px; padding: .35rem .85rem; margin: 0 -.85rem;
        border-radius: 12px; color: #33475b; font-size: 1rem; font-weight: 600; line-height: 1.3; text-decoration: none;
    }
    .mm-link i { font-size: .78rem; color: #9aa8b6; }
    .mm-link:active { background: #f1f6fa; }
    .mm-link.is-active { color: var(--aqua-primary); background: #eef6fb; font-weight: 800; }

    .mm__foot { display: grid; gap: .6rem; padding: .75rem 1.25rem calc(.75rem + env(safe-area-inset-bottom)); border-top: 1px solid var(--site-line); background: #fff; }
    .mm__quick { display: grid; grid-template-columns: 1fr 1fr; gap: .6rem; }
    .mm__quick a {
        display: flex; align-items: center; justify-content: center; gap: .4rem; min-height: 46px; padding: .3rem .6rem;
        border: 1px solid var(--site-line); border-radius: 999px; color: var(--site-ink); text-decoration: none; text-align: center;
        font-size: .9rem; font-weight: 800; line-height: 1.15;
    }
    .mm__quick a i { color: var(--aqua-primary); font-size: 1.05rem; }
    .mm__quick a.is-dark { background: var(--site-ink); border-color: var(--site-ink); color: #fff; }
    .mm__quick a.is-dark i { color: #fff; }
    .mm__call { display: flex; align-items: center; gap: .85rem; min-height: 58px; padding: .5rem 1rem; border-radius: 16px; background: #fdf1f1; text-decoration: none; }
    .mm__call-icon { width: 40px; height: 40px; flex-shrink: 0; display: grid; place-items: center; border-radius: 50%; background: #d64545; color: #fff; }
    .mm__call small { display: block; font-size: .7rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: #c53030; }
    .mm__call strong { display: block; font-size: 1.15rem; font-weight: 800; color: var(--site-ink); }

    @media (hover: hover) {
        .mm-link:hover { background: #f1f6fa; }
        .mm__close:hover { background: #e5edf3; }
    }
    @media (max-width: 389.98px) {
        .mm__quick a { padding: .3rem .4rem; font-size: .86rem; }
        .mm__quick a i { display: none; }
    }
    @media (prefers-reduced-motion: reduce) {
        .mm, .mm *, .mm__panel, .mm__overlay { transition: none !important; }
    }
</style>
