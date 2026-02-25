@extends('layouts.app')

@section('title', 'Despre noi')

@section('page_hero')
    <h1><i class="bi bi-building me-2"></i> Despre noi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Despre noi</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row">

            {{-- CONTINUT PRINCIPAL --}}
            <div class="col-12">

                <h2 class="section-title">Scurt istoric</h2>

                <p style="font-size:0.95rem;line-height:1.85;">
                    În municipiul Tulcea, nevoia alimentării cu apă potabilă trebuie să se fi resimțit de mult timp
                    înainte, dar abia în anul 1897, s-a întocmit un proiect în acest scop de către inginerul șef
                    <strong>Scarlat Varnav</strong>. Acest proiect prevedea alimentarea cu apă luată din Dunăre.
                    Apa, după tratare în decantoare și filtre, se distribuia în rețeaua de distribuție prin refulare.
                    O uzină cu motoare cu aburi furniza forța necesară pompelor de aspirația apei din Dunăre și a
                    celor de refulare. Deși proiectul a fost aprobat, nu s-a pus în execuție până la 1906, desigur
                    din lipsă de fonduri. Până la apariția Uzinei de apă locuitorii orașului Tulcea se aprovizionau
                    cu apă direct din Dunăre, pe care, fie și-o luau singuri, fie o cumpărau de la săcagii.
                </p>

                {{-- TIMELINE --}}
                <div class="mt-5" style="position:relative;">

                    {{-- Linie verticala --}}
                    <div class="d-none d-md-block" style="position:absolute;left:72px;top:0;bottom:0;width:3px;background:linear-gradient(to bottom,var(--aqua-primary),var(--aqua-light));border-radius:3px;"></div>

                    @php
                    $etape = [
                        [
                            '1906',
                            'Reluarea proiectului',
                            'În <strong>anul 1906</strong> problema apei a fost reluată și proiectul a fost din nou prezentat Consiliului Tehnic Superior, care și-a menținut avizul, cu observația că motoarele cu aburi pot fi înlocuiți cu folos prin motoare cu titei sistem Diesel, ca fiind mai economici și putând fi întrebuințați și pentru dinamurile electrice care s-ar instala în cazul când s-ar înființa iluminatul electric al orașului.'
                        ],
                        [
                            '1907–1908',
                            'Regulamentul de distribuție',
                            'În perioada <strong>1907 – 1908</strong> Consiliul Tehnic Superior a examinat și aprobat regulamentul pentru distribuirea apei potabile în oraș și proiectul privitor la sporirea rețelei de distribuție.'
                        ],
                        [
                            '1910–1912',
                            'Înființarea Uzinei de apă',
                            'În <strong>aprilie 1910</strong>, locuitorii orașului Tulcea sărbătoreau reușita obținerii unui împrumut în scopul rezolvării situației alimentării cu apă din oraș.<br><br>
                            <strong>Uzina de apă Tulcea</strong> s-a înființat în <strong>anul 1911</strong>. Pe același amplasament s-a realizat un an mai târziu, în 1912, și uzina electrică, amândouă funcționând împreună.'
                        ],
                        [
                            '1927–1953',
                            'Extinderea rețelei',
                            '<strong>În 1927</strong> s-au executat lucrări de sporire a rețelei care s-au continuat până la 1934. După Primul Război Mondial, s-au folosit și conducte de fier cu diametrul 52 – 57 mm.<br>
                            <strong>În 1929</strong> se renunță la țevile de fier și încep lucrările cu tuburi de fontă de 60 mm.<br>
                            <strong>În 1953</strong> rețeaua de distribuție era alcătuită dintr-o arteră cu două ramificații și avea lungimea totală de peste 52 km.'
                        ],
                        [
                            '1998',
                            'Înființarea S.C. ACET S.A.',
                            'Prin reorganizarea Regiei Autonome de Prestări Servicii Publice Tulcea, se înființează Societatea Comercială <strong>"APA, CANAL, ENERGIE TERMICĂ" Tulcea (S.C. ACET S.A.)</strong> având acționar unic Consiliul Local al Municipiului Tulcea.<br><br>
                            Obiectul principal de activitate al societății – exploatarea sistemelor de producere și distribuție a energiei termice, a celor de captare, tratare, transport și distribuție a apei potabile și de canalizare, în municipiul Tulcea.'
                        ],
                        [
                            '2003–2014',
                            'Înființarea AQUASERV S.A. și regionalizarea',
                            '<strong>2003</strong> – S.C. ACET S.A. Tulcea își încetează activitatea, operarea sistemului public de alimentare cu apă și de canalizare pe de-o parte și furnizarea energiei termice pe de altă parte fiind preluate de două direcții separate în subordinea Consiliului Local Tulcea. Administrarea și gestionarea serviciilor publice de alimentare cu apă și canalizare sunt preluate în gestiune directă de Direcția Apă-Canal, ca serviciu public cu personalitate juridică în subordinea Consiliului Local Tulcea.<br><br>
                            <strong>2004</strong> – se înființează societatea comercială <strong>S.C. AQUASERV S.A. TULCEA</strong> care preia activitățile de captare, tratare, distribuție apă potabilă, colectarea și transportul apelor uzate menajere de la Consiliul Local Tulcea – Direcția Apă-Canal.<br><br>
                            <strong>2006</strong> începe procesul de regionalizare a serviciilor de apă și apă uzată:
                            <ol style="margin-top:0.5rem;line-height:2;">
                                <li>primul pas – se înființează Asociația Intercomunitară (ADI) <strong>„Dezvoltarea durabilă a serviciilor de apă și de canalizare din județul Tulcea"</strong></li>
                                <li>al doilea pas – SC AQUASERV S.A. Tulcea devine operator regional</li>
                                <li>al treilea pas – (2007) încheierea contractului de delegare a gestiunii prin care municipalitățile membre ADI deleagă gestiunea serviciilor de apă și apă uzată operatorului regional AQUASERV S.A. Tulcea</li>
                            </ol>
                            <strong>2012</strong> – completarea Asociației Intercomunitare (ADI) cu orașul Babadag, localitatea Mineri.'
                        ],
                        [
                            '2015',
                            '105 ani de alimentare cu apă',
                            '<strong>În 2015</strong>, noi, tulcenii, am sărbătorit 105 ani de punerea pietrei de temelie a începerii alimentării cu apă în orașul Tulcea, ocazie cu care au fost amplasate mai multe plăci comemorative.<br><br>
                            <strong>2015</strong> – pentru accesarea de fonduri pentru aplicația 2014-2020 și-au exprimat intenția de a adera la Asociației Intercomunitare (ADI) mai multe localități din județul Tulcea.'
                        ],
                    ];
                    @endphp

                    @foreach($etape as [$an, $titlu, $continut])
                    <div class="d-flex gap-4 mb-5" style="position:relative;">
                        {{-- Bulina an --}}
                        <div class="flex-shrink-0 text-center" style="width:145px;">
                            <div style="
                                display:inline-flex;
                                align-items:center;
                                justify-content:center;
                                background:var(--aqua-primary);
                                color:#fff;
                                font-weight:800;
                                font-size:0.85rem;
                                border-radius:30px;
                                padding:0.4rem 0.9rem;
                                white-space:nowrap;
                                box-shadow:0 4px 12px rgba(0,119,182,0.3);
                                position:relative;
                                z-index:1;
                            ">{{ $an }}</div>
                        </div>
                        {{-- Continut --}}
                        <div class="flex-grow-1 pb-2" style="border-bottom:1px dashed var(--aqua-border);">
                            <h5 style="font-family:'Merriweather',serif;font-size:1rem;color:var(--aqua-dark);margin-bottom:0.75rem;">
                                {{ $titlu }}
                            </h5>
                            <div style="font-size:0.9rem;line-height:1.85;color:#333;">
                                {!! $continut !!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                {{-- CERTIFICARI --}}
                <div class="mt-5">
                    <h2 class="section-title">Certificări</h2>
                    <p style="font-size:0.9rem;" class="mb-4">
                        S.C. AQUASERV S.A. Tulcea deține multiple certificări naționale și internaționale care atestă
                        calitatea serviciilor și conformitatea cu standardele în vigoare.
                    </p>

                    <div class="row g-3">
                        @foreach([
                            ['A.N.R.S.C.', 'Licență emisă de Autoritatea Națională de Reglementare pentru Serviciile Comunitare de Utilități Publice', 'bi-award'],
                            ['Membru A.R.A.', 'Asociația Română a Apei – membri activi în rețeaua națională a operatorilor de apă', 'bi-people'],
                            ['ISO 27001', 'Sistem de Management al Securității Informației', 'bi-shield-lock'],
                            ['ISO 9001', 'Sistem de Management al Calității', 'bi-patch-check'],
                            ['ISO 14001', 'Sistem de Management de Mediu', 'bi-leaf'],
                            ['ISO 18001', 'Sistem de Management al Sănătății și Securității Ocupaționale', 'bi-heart-pulse'],
                            ['ISO 22000', 'Sistem de Management al Siguranței Alimentare', 'bi-droplet-half'],
                            ['SR EN ISO', 'Alte standarde române și europene aplicabile', 'bi-file-earmark-check'],
                        ] as [$titlu, $desc, $icon])
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card h-100 text-center p-3" style="border-color:var(--aqua-border);">
                                <div style="width:52px;height:52px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 0.75rem;font-size:1.4rem;color:var(--aqua-primary);border:2px solid var(--aqua-border);">
                                    <i class="bi {{ $icon }}"></i>
                                </div>
                                <div class="fw-bold" style="font-size:0.9rem;color:var(--aqua-dark);">{{ $titlu }}</div>
                                <div class="text-muted mt-1" style="font-size:0.75rem;line-height:1.4;">{{ $desc }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection