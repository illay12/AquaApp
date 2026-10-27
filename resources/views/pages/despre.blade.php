@extends('layouts.app')

@section('title', 'Despre noi')

@section('page_hero')
    <h1>Despre noi</h1>
    <p class="dn-hero-lead">Operatorul regional de apă și canalizare al județului Tulcea.</p>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Despre noi</li>
        </ol>
    </nav>
@endsection

@section('content')
@php
    $linkuri = [
        ['Structură organizațională', 'ADI, AGA și conducerea societății', url('/despre/structura-organizationala'), 'bi-diagram-3'],
        ['Centre operaționale', 'Unde ne găsești în județ', url('/despre/centre-operationale'), 'bi-geo-alt'],
        ['Servicii', 'Apă potabilă, canalizare, epurare', url('/servicii'), 'bi-droplet'],
        ['Proiecte de dezvoltare', 'Investiții cu fonduri europene', route('despre.pos'), 'bi-graph-up-arrow'],
    ];

    // [an, titlu, rezumat (mereu vizibil), detalii (HTML, opțional – în „Citește mai mult”)]
    $etape = [
        ['1897', 'Primul proiect',
            'Inginerul șef <strong>Scarlat Varnav</strong> întocmește proiectul alimentării cu apă a orașului, cu apă luată din Dunăre.',
            'Apa, după tratare în decantoare și filtre, se distribuia în rețea prin refulare. O uzină cu motoare cu aburi furniza forța necesară pompelor de aspirație a apei din Dunăre și celor de refulare. Deși proiectul a fost aprobat, nu s-a pus în execuție până la 1906, din lipsă de fonduri.'],
        ['1906', 'Reluarea proiectului',
            'Proiectul ajunge din nou la Consiliul Tehnic Superior, care își menține avizul.',
            'Consiliul recomandă înlocuirea motoarelor cu aburi cu motoare cu țiței sistem Diesel, mai economice și care puteau fi folosite și pentru dinamurile electrice, în cazul înființării iluminatului electric al orașului.'],
        ['1907–1908', 'Regulamentul de distribuție',
            'Se aprobă regulamentul pentru distribuirea apei potabile în oraș și proiectul de extindere a rețelei.',
            null],
        ['1910–1912', 'Uzina de apă Tulcea',
            'În <strong>1911</strong> se înființează Uzina de apă Tulcea, iar în 1912, pe același amplasament, și uzina electrică.',
            'În aprilie 1910, locuitorii orașului sărbătoreau obținerea unui împrumut pentru rezolvarea alimentării cu apă. Cele două uzine au funcționat împreună.'],
        ['1927–1953', 'Extinderea rețelei',
            'Rețeaua crește constant, iar în 1953 depășește <strong>52 km</strong>.',
            'Lucrările de extindere din 1927 continuă până în 1934. După Primul Război Mondial se folosesc conducte de fier cu diametrul de 52–57 mm, iar din 1929 se trece la tuburi de fontă de 60 mm. În 1953, rețeaua era alcătuită dintr-o arteră cu două ramificații.'],
        ['1998', 'S.C. ACET S.A.',
            'Se înființează „Apă, Canal, Energie Termică” Tulcea, cu acționar unic Consiliul Local al Municipiului Tulcea.',
            'Societatea rezultă din reorganizarea Regiei Autonome de Prestări Servicii Publice Tulcea și exploatează sistemele de energie termică, precum și pe cele de captare, tratare, transport și distribuție a apei potabile și de canalizare din municipiu.'],
        ['2004', 'Se înființează AQUASERV S.A.',
            'AQUASERV S.A. Tulcea preia captarea, tratarea și distribuția apei potabile, colectarea și transportul apelor uzate.',
            'În 2003, S.C. ACET S.A. își încetează activitatea. Apa și canalizarea trec în gestiunea directă a Direcției Apă-Canal, serviciu public al Consiliului Local Tulcea, de la care AQUASERV S.A. preia activitățile în 2004.'],
        ['2006–2012', 'Operator regional',
            'AQUASERV devine operatorul regional al serviciilor de apă și canalizare pentru localitățile asociate.',
            '<ol class="dn-ol">
                <li>2006 – se înființează Asociația de Dezvoltare Intercomunitară „Dezvoltarea durabilă a serviciilor de apă și de canalizare din județul Tulcea”.</li>
                <li>AQUASERV S.A. Tulcea devine operator regional.</li>
                <li>2007 – se încheie contractul de delegare a gestiunii serviciilor de apă și apă uzată către operatorul regional.</li>
                <li>2012 – asociația se completează cu orașul Babadag și localitatea Mineri.</li>
            </ol>'],
        ['2015', '105 ani de apă în Tulcea',
            'Tulcenii sărbătoresc 105 ani de la punerea pietrei de temelie a alimentării cu apă.',
            'Cu această ocazie au fost amplasate mai multe plăci comemorative. Tot în 2015, mai multe localități din județ își exprimă intenția de a adera la asociație, pentru accesarea fondurilor europene 2014–2020.'],
    ];

    $certificari = [
        ['A.N.R.S.C.', 'Licență de operator pentru serviciile comunitare de utilități publice', 'bi-award'],
        ['Membru A.R.A.', 'Asociația Română a Apei', 'bi-people'],
        ['ISO 9001', 'Managementul calității', 'bi-patch-check'],
        ['ISO 14001', 'Managementul de mediu', 'bi-tree'],
        ['ISO 45001', 'Sănătate și securitate ocupațională', 'bi-heart-pulse'],
        ['ISO 22000', 'Siguranța alimentară', 'bi-droplet-half'],
        ['ISO 27001', 'Securitatea informației', 'bi-shield-lock'],
    ];
@endphp

{{-- ═════════ INTRO ═════════ --}}
<section class="dn-section">
    <div class="container">
        <div class="dn-intro">
            <div>
                <span class="dn-eyebrow">Despre Aquaserv</span>
                <h2 class="dn-h2">Apă potabilă pentru Tulcea, din 1911.</h2>
                <p class="dn-lead">
                    S.C. AQUASERV S.A. Tulcea asigură captarea, tratarea și distribuția apei potabile,
                    precum și colectarea și epurarea apelor uzate, ca operator regional pentru localitățile
                    din județul Tulcea.
                </p>
            </div>
            <dl class="dn-facts">
                <div><dt>1911</dt><dd>Uzina de apă Tulcea</dd></div>
                <div><dt>2004</dt><dd>Se înființează AQUASERV</dd></div>
                <div><dt>2007</dt><dd>Operator regional</dd></div>
                <div><dt>24/7</dt><dd>Dispecerat avarii</dd></div>
            </dl>
        </div>

        <nav class="dn-links" aria-label="Despre noi – pagini">
            @foreach($linkuri as [$titlu, $desc, $href, $icon])
                <a href="{{ $href }}" class="dn-link">
                    <span class="dn-link__icon"><i class="bi {{ $icon }}"></i></span>
                    <span class="dn-link__text"><strong>{{ $titlu }}</strong><small>{{ $desc }}</small></span>
                    <i class="bi bi-arrow-right dn-link__arrow"></i>
                </a>
            @endforeach
        </nav>
    </div>
</section>

{{-- ═════════ ISTORIC ═════════ --}}
<section class="dn-section dn-section--soft">
    <div class="container">
        <div class="dn-history">
            <header class="dn-history__head">
                <span class="dn-eyebrow">Istoric</span>
                <h2 class="dn-h2">De la săcagii la operator regional.</h2>
                <p>Până la apariția Uzinei de apă, tulcenii își luau apa direct din Dunăre sau o cumpărau de la săcagii.</p>
            </header>

            <ol class="dn-timeline">
                @foreach($etape as [$an, $titlu, $rezumat, $detalii])
                    <li class="dn-step">
                        <span class="dn-step__year">{{ $an }}</span>
                        <h3 class="dn-step__title">{{ $titlu }}</h3>
                        <p class="dn-step__text">{!! $rezumat !!}</p>
                        @if($detalii)
                            <details class="dn-step__more">
                                <summary>Citește mai mult <i class="bi bi-chevron-down"></i></summary>
                                <div>{!! $detalii !!}</div>
                            </details>
                        @endif
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>

{{-- ═════════ CERTIFICĂRI ═════════ --}}
<section class="dn-section">
    <div class="container">
        <span class="dn-eyebrow">Calitate</span>
        <h2 class="dn-h2">Certificări și afilieri</h2>
        <div class="dn-certs">
            @foreach($certificari as [$titlu, $desc, $icon])
                <div class="dn-cert">
                    <i class="bi {{ $icon }}"></i>
                    <strong>{{ $titlu }}</strong>
                    <span>{{ $desc }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═════════ DATE DE IDENTIFICARE ═════════ --}}
<section class="dn-section dn-section--last">
    <div class="container">
        <div class="dn-id">
            <div class="dn-id__head">
                <span class="dn-eyebrow">Date de identificare</span>
                <h2 class="dn-h2">S.C. AQUASERV S.A.</h2>
            </div>
            <dl class="dn-id__list">
                <div><dt>Sediu</dt><dd>Tulcea, str. Rezervorului nr. 2</dd></div>
                <div><dt>Telefon</dt><dd><a href="tel:0240524310">0240 524 310</a></dd></div>
                <div><dt>Email</dt><dd><a href="mailto:secretariat@aquaservtulcea.ro">secretariat@aquaservtulcea.ro</a></dd></div>
                <div>
                    <dt>CUI</dt>
                    <dd class="dn-copy-row">
                        <span>RO 16775941</span>
                        <button type="button" class="dn-copy" data-copy="RO16775941" aria-label="Copiază CUI"><i class="bi bi-copy"></i></button>
                    </dd>
                </div>
                <div><dt>Reg. Comerțului</dt><dd>J2004000348364</dd></div>
                <div>
                    <dt>Cont RON · BCR Tulcea</dt>
                    <dd class="dn-copy-row">
                        <span class="dn-iban">RO46 RNCB 4600 0001 7856 0001</span>
                        <button type="button" class="dn-copy" data-copy="RO46RNCB4600000178560001" aria-label="Copiază IBAN"><i class="bi bi-copy"></i></button>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* ═════════ DESPRE NOI – „Delta” ═════════ */
    .page-hero .dn-hero-lead { margin: -.25rem 0 1rem; font-size: 1.1rem; color: rgba(255,255,255,.82); max-width: 46ch; }

    .dn-section { padding: 4.5rem 0; }
    .dn-section--soft { background: #f5f9fc; }
    .dn-section--last { padding-bottom: 5rem; }
    .dn-eyebrow { display: block; margin-bottom: .6rem; font-size: .75rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; color: var(--aqua-primary); }
    .dn-h2 { font-family: 'Merriweather', serif; font-weight: 700; font-size: clamp(1.5rem, 2.6vw, 2.15rem); line-height: 1.25; letter-spacing: -.01em; color: var(--site-ink); margin: 0 0 1rem; text-wrap: balance; }
    .dn-lead { font-size: 1.1rem; line-height: 1.7; color: #3d5266; margin: 0; max-width: 58ch; }

    /* Intro */
    .dn-intro { display: grid; grid-template-columns: minmax(0, 1.2fr) minmax(0, 1fr); gap: 3rem; align-items: center; }
    .dn-facts { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .75rem; margin: 0; }
    .dn-facts > div { padding: 1.25rem 1.25rem 1.1rem; border-radius: 18px; background: #f5f9fc; }
    .dn-facts dt { font-family: 'Merriweather', serif; font-size: 1.75rem; font-weight: 700; line-height: 1.1; color: var(--site-deep); }
    .dn-facts dd { margin: .35rem 0 0; font-size: .92rem; font-weight: 700; color: #5f7184; line-height: 1.35; }

    /* Linkuri către subpagini */
    .dn-links { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; margin-top: 3rem; }
    .dn-link { display: flex; align-items: center; gap: .9rem; padding: 1.1rem 1.15rem; border: 1px solid var(--site-line); border-radius: 18px; background: #fff; color: var(--site-ink); text-decoration: none; transition: border-color .2s, box-shadow .2s, transform .2s; }
    .dn-link__icon { width: 44px; height: 44px; flex-shrink: 0; display: grid; place-items: center; border-radius: 14px; background: #eef6fb; color: var(--aqua-primary); font-size: 1.2rem; }
    .dn-link__text { flex: 1; min-width: 0; }
    .dn-link__text strong { display: block; font-size: .98rem; font-weight: 800; line-height: 1.3; }
    .dn-link__text small { display: block; margin-top: .15rem; font-size: .82rem; color: var(--aqua-gray); line-height: 1.35; }
    .dn-link__arrow { color: #9aa8b6; transition: transform .2s, color .2s; }
    @media (hover: hover) {
        .dn-link:hover { border-color: #cfe3f0; box-shadow: 0 16px 32px -22px rgba(13,34,54,.35); transform: translateY(-2px); color: var(--site-ink); }
        .dn-link:hover .dn-link__arrow { transform: translateX(3px); color: var(--aqua-primary); }
    }

    /* Istoric */
    .dn-history { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.6fr); gap: 4rem; align-items: start; }
    .dn-history__head { position: sticky; top: 110px; }
    .dn-history__head p { font-size: 1.05rem; line-height: 1.7; color: #3d5266; margin: 0; }
    .dn-timeline { list-style: none; margin: 0; padding: 0; position: relative; }
    .dn-timeline::before { content: ""; position: absolute; left: 7px; top: 10px; bottom: 10px; width: 2px; background: linear-gradient(#bcdcef, #e5edf3); }
    .dn-step { position: relative; padding: 0 0 2.25rem 2.5rem; }
    .dn-step:last-child { padding-bottom: 0; }
    .dn-step::before { content: ""; position: absolute; left: 0; top: 4px; width: 16px; height: 16px; border-radius: 50%; background: #fff; border: 3px solid var(--aqua-primary); }
    .dn-step__year { display: inline-block; font-size: .82rem; font-weight: 800; letter-spacing: .04em; color: var(--aqua-primary); }
    .dn-step__title { font-family: 'Merriweather', serif; font-size: 1.15rem; font-weight: 700; color: var(--site-ink); margin: .2rem 0 .45rem; }
    .dn-step__text { font-size: 1rem; line-height: 1.65; color: #3d5266; margin: 0; }
    .dn-step__more { margin-top: .5rem; }
    .dn-step__more summary { display: inline-flex; align-items: center; gap: .35rem; min-height: 40px; cursor: pointer; list-style: none; font-size: .92rem; font-weight: 800; color: var(--aqua-primary); }
    .dn-step__more summary::-webkit-details-marker { display: none; }
    .dn-step__more summary i { font-size: .8rem; transition: transform .2s; }
    .dn-step__more[open] summary i { transform: rotate(180deg); }
    .dn-step__more > div { font-size: .95rem; line-height: 1.7; color: #4a5d70; padding: .15rem 0 .25rem; }
    .dn-ol { margin: 0; padding-left: 1.2rem; }
    .dn-ol li + li { margin-top: .4rem; }

    /* Certificări */
    .dn-certs { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 1rem; margin-top: 1.5rem; }
    .dn-cert { display: flex; flex-direction: column; gap: .3rem; padding: 1.25rem; border: 1px solid var(--site-line); border-radius: 18px; background: #fff; }
    .dn-cert i { font-size: 1.4rem; color: var(--aqua-primary); margin-bottom: .35rem; }
    .dn-cert strong { font-size: 1rem; font-weight: 800; color: var(--site-ink); }
    .dn-cert span { font-size: .88rem; color: var(--aqua-gray); line-height: 1.4; }

    /* Date de identificare */
    .dn-id { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.6fr); gap: 3rem; padding: 2.25rem; border-radius: 24px; background: #f5f9fc; }
    .dn-id__list { margin: 0; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1.25rem 2rem; }
    .dn-id__list dt { font-size: .75rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: #7b8a9a; margin-bottom: .2rem; }
    .dn-id__list dd { margin: 0; font-size: 1rem; font-weight: 700; color: var(--site-ink); overflow-wrap: anywhere; }
    .dn-id__list a { color: var(--site-ink); text-decoration: none; border-bottom: 1px solid #c9d8e3; }
    .dn-id__list a:hover { color: var(--aqua-primary); border-color: currentColor; }
    .dn-copy-row { display: flex; align-items: center; gap: .5rem; }
    .dn-iban { font-variant-numeric: tabular-nums; letter-spacing: .02em; }
    .dn-copy { width: 40px; height: 40px; flex-shrink: 0; display: grid; place-items: center; border: 1px solid var(--site-line); border-radius: 50%; background: #fff; color: var(--aqua-primary); transition: background .2s; }
    .dn-copy:hover { background: #eef6fb; }
    .dn-copy.is-done { color: #15936b; border-color: #bfe6d5; }

    /* ── Tabletă ── */
    @media (max-width: 991.98px) {
        .dn-intro, .dn-history, .dn-id { grid-template-columns: minmax(0, 1fr); gap: 2rem; }
        .dn-history__head { position: static; }
        .dn-certs { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }

    /* ── Mobil ── */
    @media (max-width: 767.98px) {
        .page-hero .dn-hero-lead { font-size: 1rem; margin-bottom: .85rem; }
        .dn-section { padding: 3rem 0; }
        .dn-section:first-of-type { padding-top: 1.5rem; }
        .dn-section--last { padding-bottom: 3.5rem; }
        .dn-lead { font-size: 1.02rem; }
        .dn-facts > div { padding: 1rem; border-radius: 16px; }
        .dn-facts dt { font-size: 1.45rem; }
        .dn-facts dd { font-size: .86rem; }

        /* Linkuri: listă compactă, nu carduri */
        .dn-links { grid-template-columns: minmax(0, 1fr); gap: 0; margin-top: 2rem; border: 1px solid var(--site-line); border-radius: 18px; overflow: hidden; }
        .dn-link { border: 0; border-radius: 0; padding: .95rem 1rem; }
        .dn-link + .dn-link { border-top: 1px solid var(--site-line); }
        .dn-link:active { background: #f5f9fc; }

        .dn-step { padding-bottom: 1.75rem; }
        .dn-step__title { font-size: 1.08rem; }
        .dn-step__text { font-size: .98rem; }

        .dn-certs { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .65rem; }
        .dn-cert { padding: 1rem; border-radius: 16px; }
        .dn-cert span { font-size: .82rem; }

        .dn-id { padding: 1.4rem 1.25rem; border-radius: 20px; gap: 1.25rem; }
        .dn-id__list { grid-template-columns: minmax(0, 1fr); gap: 1rem; }
        .dn-iban { font-size: .9rem; letter-spacing: 0; }
    }
</style>
@endpush

@push('scripts')
<script nonce="@nonce">
    document.querySelectorAll('.dn-copy').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (!navigator.clipboard) return;
            navigator.clipboard.writeText(btn.dataset.copy).then(function () {
                var icon = btn.querySelector('i');
                btn.classList.add('is-done');
                icon.className = 'bi bi-check2';
                setTimeout(function () { btn.classList.remove('is-done'); icon.className = 'bi bi-copy'; }, 1800);
            });
        });
    });
</script>
@endpush
