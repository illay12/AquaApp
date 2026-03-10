@extends('layouts.app')

@section('title', 'Centre Operaționale')

@section('page_hero')
    <h1><i class="bi bi-building me-2"></i> Centre Operaționale</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/despre') }}">Despre noi</a></li>
            <li class="breadcrumb-item active">Centre Operaționale</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        {{-- INTRO --}}
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <p class="section-title text-center" style="border-left:none;padding-left:0;border-bottom:3px solid var(--aqua-accent);display:inline-block;padding-bottom:0.4rem;">
                    Rețeaua noastră operațională
                </p>
                <p style="color:#6c757d;font-size:0.95rem;margin-top:0.75rem;">
                    AquaServ Tulcea operează prin <strong>5 centre operaționale</strong> care asigură servicii de alimentare cu apă
                    și canalizare pentru comunitățile din județul Tulcea.
                </p>
            </div>
        </div>

        {{-- HARTA RAPIDA - 5 centre ca butoane --}}
        <div class="row g-3 justify-content-center mb-5">
            @php
            $centre = [
                ['id'=>'tulcea',  'icon'=>'bi-building-fill',     'culoare'=>'#0077b6'],
                ['id'=>'macin',   'icon'=>'bi-water',              'culoare'=>'#0096c7'],
                ['id'=>'sulina',  'icon'=>'bi-tsunami',            'culoare'=>'#00b4d8'],
                ['id'=>'isaccea', 'icon'=>'bi-droplet-half',       'culoare'=>'#48cae4'],
                ['id'=>'babadag', 'icon'=>'bi-building',           'culoare'=>'#023e8a'],
            ];
            $numeAfisate = ['tulcea'=>'Tulcea','macin'=>'Mãcin','sulina'=>'Sulina','isaccea'=>'Isaccea','babadag'=>'Babadag'];
            @endphp

            @foreach($centre as $c)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#centru-{{ $c['id'] }}" class="d-block text-decoration-none"
                   style="padding:1.25rem 0.75rem;border-radius:14px;background:#fff;border:2px solid var(--aqua-border);text-align:center;transition:all 0.25s;"
                   onmouseover="this.style.borderColor='{{ $c['culoare'] }}';this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 24px rgba(0,119,182,0.15)'"
                   onmouseout="this.style.borderColor='var(--aqua-border)';this.style.transform='';this.style.boxShadow=''">
                    <div style="width:48px;height:48px;border-radius:50%;background:{{ $c['culoare'] }};display:flex;align-items:center;justify-content:center;margin:0 auto 0.6rem;">
                        <i class="bi {{ $c['icon'] }} text-white" style="font-size:1.2rem;"></i>
                    </div>
                    <div style="font-weight:800;font-size:0.875rem;color:var(--aqua-dark);">{{ $numeAfisate[$c['id']] }}</div>
                    <div style="font-size:0.7rem;color:#94a3b8;margin-top:2px;">Vezi detalii →</div>
                </a>
            </div>
            @endforeach
        </div>

        {{-- ══════════════════════════════════════
             CENTRU TULCEA
        ══════════════════════════════════════ --}}
        <div id="centru-tulcea" class="mb-5" style="scroll-margin-top:90px;">
            <div class="card" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                <div class="card-header py-3 px-4 d-flex align-items-center gap-3" style="background:linear-gradient(90deg,#023e8a,#0077b6);">
                    <div style="width:42px;height:42px;background:rgba(255,255,255,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="bi bi-building-fill text-white" style="font-size:1.2rem;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 text-white fw-bold" style="font-size:1.1rem;">Centrul Operațional Tulcea</h4>
                        <small style="color:rgba(255,255,255,0.7);font-size:0.75rem;">Sediu principal · Municipiul Tulcea</small>
                    </div>
                </div>
                <div class="card-body p-4">

                    {{-- Tabs --}}
                    <ul class="nav nav-pills mb-4" id="tabTulcea" role="tablist" style="gap:0.5rem;">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tulcea-situatie"
                                    style="font-size:0.82rem;font-weight:700;border-radius:8px;">Situația inițială</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tulcea-beneficii"
                                    style="font-size:0.82rem;font-weight:700;border-radius:8px;">Beneficiile proiectului</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tulcea-situatie">
                            <p style="font-size:0.9rem;color:#374151;line-height:1.8;">
                                La nivelul municipiului Tulcea, sistemul de alimentare cu apă și colectare a apelor uzate era depășit moral și fizic. Rețeaua de distribuție, cu o lungime totală de <strong>162,63 km</strong>, genera pierderi mari de apă (<strong>42,16%</strong> din totalul de apă injectată în rețea) și conducea la avarii dese — peste 500 de avarii anual la conductele principale și peste 160 de avarii anual la conductele de branșament.
                            </p>
                            <p style="font-size:0.9rem;color:#374151;line-height:1.8;">
                                Stația de tratare funcționa pe o tehnologie învechită, pierderea de apă tehnologică fiind egală cu <strong>25%</strong> din totalul de apă brută. Lungimea rețelei de canalizare de <strong>87,63 km</strong> asigura serviciul de canalizare pentru doar <strong>70%</strong> din suprafața municipiului.
                            </p>
                            <div class="alert alert-warning d-flex gap-2 align-items-start" style="border-radius:10px;font-size:0.85rem;">
                                <i class="bi bi-exclamation-triangle-fill mt-1 flex-shrink-0"></i>
                                <span>În municipiul Tulcea <strong>nu exista stație de epurare</strong> — apa uzată menajeră era evacuată neepurată direct în fluviul Dunărea.</span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tulcea-beneficii">
                            <div class="row g-3">
                                @php $beneficiiTulcea = [
                                    ['icon'=>'bi-droplet','titlu'=>'Reabilitare surse apă','desc'=>'Reabilitarea forajelor, stației de pompare, dezinfecție cu clor și instalații moderne de control.'],
                                    ['icon'=>'bi-arrow-left-right','titlu'=>'Aducțiune apă brută','desc'=>'Reabilitarea aducțiunii nefuncționale cu diametru de 1000 mm pe o lungime de 6 km.'],
                                    ['icon'=>'bi-gear','titlu'=>'Stație de tratare','desc'=>'Nouă treaptă de siguranță la poluare, preoxidare, coagulare avansată, filtrare și dezinfecție.'],
                                    ['icon'=>'bi-diagram-3','titlu'=>'Rețea distribuție','desc'=>'Înlocuirea a 48 km din rețeaua existentă, extindere 2,87 km și 4.930 contori noi.'],
                                    ['icon'=>'bi-recycle','titlu'=>'Stație de epurare','desc'=>'Stație nouă de epurare pentru 100.000 locuitori echivalenți cu treaptă mecanică, biologică și chimică.'],
                                    ['icon'=>'bi-cpu','titlu'=>'SCADA & GIS','desc'=>'Implementarea sistemului GIS, modelare hidraulică modernă și dotare cu autolaboratoare de detecție pierderi.'],
                                ]; @endphp
                                @foreach($beneficiiTulcea as $b)
                                <div class="col-md-6 col-lg-4">
                                    <div class="d-flex gap-3 p-3" style="background:var(--aqua-bg);border-radius:10px;height:100%;">
                                        <div style="width:36px;height:36px;min-width:36px;background:var(--aqua-primary);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                            <i class="bi {{ $b['icon'] }} text-white" style="font-size:0.9rem;"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:0.82rem;color:var(--aqua-dark);margin-bottom:0.2rem;">{{ $b['titlu'] }}</div>
                                            <div style="font-size:0.78rem;color:#6c757d;line-height:1.5;">{{ $b['desc'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════
             CENTRU MACIN
        ══════════════════════════════════════ --}}
        <div id="centru-macin" class="mb-5" style="scroll-margin-top:90px;">
            <div class="card" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                <div class="card-header py-3 px-4 d-flex align-items-center gap-3" style="background:linear-gradient(90deg,#0077b6,#0096c7);">
                    <div style="width:42px;height:42px;background:rgba(255,255,255,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="bi bi-water text-white" style="font-size:1.2rem;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 text-white fw-bold" style="font-size:1.1rem;">Centrul Operațional Mãcin</h4>
                        <small style="color:rgba(255,255,255,0.7);font-size:0.75rem;">Orașul Mãcin</small>
                    </div>
                </div>
                <div class="card-body p-4">
                    <ul class="nav nav-pills mb-4" role="tablist" style="gap:0.5rem;">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#macin-situatie"
                                    style="font-size:0.82rem;font-weight:700;border-radius:8px;">Situația inițială</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#macin-beneficii"
                                    style="font-size:0.82rem;font-weight:700;border-radius:8px;">Beneficiile proiectului</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="macin-situatie">
                            <p style="font-size:0.9rem;color:#374151;line-height:1.8;">
                                Populația racordată la sistemul de alimentare cu apă al orașului reprezenta înainte de începerea proiectului doar <strong>80%</strong> din totalul locuitorilor. Rețeaua de distribuție, cu o lungime totală de <strong>51,5 km</strong>, genera pierderi mari de apă și avarii dese datorate stadiului avansat de degradare.
                            </p>
                            <p style="font-size:0.9rem;color:#374151;line-height:1.8;">
                                Lungimea totală a rețelei de canalizare era de doar <strong>13 km</strong>, asigurând serviciul pentru doar <strong>32%</strong> din numărul total al consumatorilor branșați.
                            </p>
                            <div class="alert alert-warning d-flex gap-2 align-items-start" style="border-radius:10px;font-size:0.85rem;">
                                <i class="bi bi-exclamation-triangle-fill mt-1 flex-shrink-0"></i>
                                <span>La Mãcin <strong>nu exista stație de epurare</strong> — apa uzată era descărcată neepurată direct în Dunăre.</span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="macin-beneficii">
                            <div class="row g-3">
                                @php $beneficiMacin = [
                                    ['icon'=>'bi-droplet','titlu'=>'Front de captare nou','desc'=>'Realizarea unui nou front de captare pentru asigurarea sursei de apă.'],
                                    ['icon'=>'bi-arrow-left-right','titlu'=>'Rețea apă potabilă','desc'=>'Reabilitarea a 19 km de conductă de apă și extinderea cu 4 km.'],
                                    ['icon'=>'bi-diagram-3','titlu'=>'Rețea canalizare','desc'=>'Înlocuirea a 4 km de conductă de apă uzată și extinderea cu 18 km.'],
                                    ['icon'=>'bi-box','titlu'=>'Rezervor nou','desc'=>'Realizarea unui rezervor nou de înmagazinare a apei potabile.'],
                                    ['icon'=>'bi-gear','titlu'=>'Stații pompare','desc'=>'Realizarea a 2 noi stații de pompare a apei uzate.'],
                                    ['icon'=>'bi-recycle','titlu'=>'Stație de epurare','desc'=>'Realizarea unei stații noi de epurare pentru 10.000 locuitori echivalenți.'],
                                ]; @endphp
                                @foreach($beneficiMacin as $b)
                                <div class="col-md-6 col-lg-4">
                                    <div class="d-flex gap-3 p-3" style="background:var(--aqua-bg);border-radius:10px;height:100%;">
                                        <div style="width:36px;height:36px;min-width:36px;background:#0096c7;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                            <i class="bi {{ $b['icon'] }} text-white" style="font-size:0.9rem;"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:0.82rem;color:var(--aqua-dark);margin-bottom:0.2rem;">{{ $b['titlu'] }}</div>
                                            <div style="font-size:0.78rem;color:#6c757d;line-height:1.5;">{{ $b['desc'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════
             CENTRU SULINA
        ══════════════════════════════════════ --}}
        <div id="centru-sulina" class="mb-5" style="scroll-margin-top:90px;">
            <div class="card" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                <div class="card-header py-3 px-4 d-flex align-items-center gap-3" style="background:linear-gradient(90deg,#0096c7,#00b4d8);">
                    <div style="width:42px;height:42px;background:rgba(255,255,255,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="bi bi-tsunami text-white" style="font-size:1.2rem;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 text-white fw-bold" style="font-size:1.1rem;">Centrul Operațional Sulina</h4>
                        <small style="color:rgba(255,255,255,0.7);font-size:0.75rem;">Orașul Sulina · Delta Dunării</small>
                    </div>
                </div>
                <div class="card-body p-4">
                    <ul class="nav nav-pills mb-4" role="tablist" style="gap:0.5rem;">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#sulina-situatie"
                                    style="font-size:0.82rem;font-weight:700;border-radius:8px;">Situația inițială</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#sulina-beneficii"
                                    style="font-size:0.82rem;font-weight:700;border-radius:8px;">Beneficiile proiectului</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="sulina-situatie">
                            <p style="font-size:0.9rem;color:#374151;line-height:1.8;">
                                Construcția uzinei de apă potabilă a orașului Sulina a început în <strong>anul 1886</strong> și s-a finalizat în 1905. Principalele deficiențe proveneau din tehnologia incompatibilă cu calitatea apei sursei și vechimea utilajelor.
                            </p>
                            <div class="row g-3 mb-3">
                                <div class="col-sm-4">
                                    <div class="text-center p-3" style="background:#fff3cd;border-radius:10px;border:1px solid #fde68a;">
                                        <div style="font-size:1.5rem;font-weight:800;color:#92400e;">50,42%</div>
                                        <div style="font-size:0.75rem;color:#78350f;">pierderi apă în rețea</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center p-3" style="background:#fee2e2;border-radius:10px;border:1px solid #fca5a5;">
                                        <div style="font-size:1.5rem;font-weight:800;color:#991b1b;">85%</div>
                                        <div style="font-size:0.75rem;color:#7f1d1d;">conducte cu vârsta peste 40 ani</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center p-3" style="background:#f0fdf4;border-radius:10px;border:1px solid #86efac;">
                                        <div style="font-size:1.5rem;font-weight:800;color:#15803d;">74%</div>
                                        <div style="font-size:0.75rem;color:#166534;">populație racordată la apă</div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-warning d-flex gap-2 align-items-start" style="border-radius:10px;font-size:0.85rem;">
                                <i class="bi bi-exclamation-triangle-fill mt-1 flex-shrink-0"></i>
                                <span>În Sulina <strong>nu exista rețea propriu-zisă de ape uzate menajere</strong> — rețeaua meteorică era folosită pentru evacuarea apelor uzate neepurate în Dunăre.</span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sulina-beneficii">
                            <div class="row g-3">
                                @php $beneficiiSulina = [
                                    ['icon'=>'bi-droplet','titlu'=>'Surse de captare','desc'=>'Reabilitarea surselor de captare a apei brute.'],
                                    ['icon'=>'bi-gear','titlu'=>'Stație de tratare','desc'=>'Reabilitarea completă a stației de tratare a apei potabile.'],
                                    ['icon'=>'bi-arrow-left-right','titlu'=>'Rețea apă potabilă','desc'=>'Reabilitarea a 19 km de conductă de apă potabilă.'],
                                    ['icon'=>'bi-diagram-3','titlu'=>'Rețea canalizare','desc'=>'Extinderea cu 19 km de conductă de apă uzată, nouă pentru Sulina.'],
                                    ['icon'=>'bi-gear-fill','titlu'=>'Stații pompare','desc'=>'Realizarea a 4 stații noi de pompare a apei uzate.'],
                                ]; @endphp
                                @foreach($beneficiiSulina as $b)
                                <div class="col-md-6">
                                    <div class="d-flex gap-3 p-3" style="background:var(--aqua-bg);border-radius:10px;height:100%;">
                                        <div style="width:36px;height:36px;min-width:36px;background:#00b4d8;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                            <i class="bi {{ $b['icon'] }} text-white" style="font-size:0.9rem;"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:0.82rem;color:var(--aqua-dark);margin-bottom:0.2rem;">{{ $b['titlu'] }}</div>
                                            <div style="font-size:0.78rem;color:#6c757d;line-height:1.5;">{{ $b['desc'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════
             CENTRU ISACCEA
        ══════════════════════════════════════ --}}
        <div id="centru-isaccea" class="mb-5" style="scroll-margin-top:90px;">
            <div class="card" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                <div class="card-header py-3 px-4 d-flex align-items-center gap-3" style="background:linear-gradient(90deg,#00b4d8,#48cae4);">
                    <div style="width:42px;height:42px;background:rgba(255,255,255,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="bi bi-droplet-half text-white" style="font-size:1.2rem;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 text-white fw-bold" style="font-size:1.1rem;">Centrul Operațional Isaccea</h4>
                        <small style="color:rgba(255,255,255,0.7);font-size:0.75rem;">Orașul Isaccea</small>
                    </div>
                </div>
                <div class="card-body p-4">
                    <ul class="nav nav-pills mb-4" role="tablist" style="gap:0.5rem;">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#isaccea-situatie"
                                    style="font-size:0.82rem;font-weight:700;border-radius:8px;">Situația inițială</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#isaccea-beneficii"
                                    style="font-size:0.82rem;font-weight:700;border-radius:8px;">Beneficiile proiectului</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="isaccea-situatie">
                            <p style="font-size:0.9rem;color:#374151;line-height:1.8;">
                                Populația racordată la sistemul de alimentare cu apă al orașului Isaccea reprezenta înainte de proiect doar <strong>64%</strong> din totalul locuitorilor. Rețeaua de distribuție, cu lungime totală de <strong>12,6 km</strong>, genera pierderi mari și avarii frecvente.
                            </p>
                            <p style="font-size:0.9rem;color:#374151;line-height:1.8;">
                                Rețeaua de canalizare de <strong>4,2 km</strong> asigura serviciul pentru doar <strong>28%</strong> din consumatorii branșați. Descărcarea apelor uzate neepurate era făcută într-un afluent al fluviului Dunărea.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="isaccea-beneficii">
                            <div class="row g-3">
                                @php $beneficiiIsaccea = [
                                    ['icon'=>'bi-box','titlu'=>'Rezervoare','desc'=>'Reabilitarea și extinderea rezervoarelor de înmagazinare a apei.'],
                                    ['icon'=>'bi-arrow-left-right','titlu'=>'Rețea apă potabilă','desc'=>'Reabilitarea și extinderea a 19 km de conductă de apă.'],
                                    ['icon'=>'bi-diagram-3','titlu'=>'Rețea canalizare','desc'=>'Înlocuirea și extinderea a 16 km de conductă de apă uzată.'],
                                    ['icon'=>'bi-gear','titlu'=>'Stații pompare','desc'=>'Realizarea a 2 stații noi de pompare a apei uzate.'],
                                    ['icon'=>'bi-recycle','titlu'=>'Stație de epurare','desc'=>'Realizarea unei stații noi de epurare pentru 5.000 locuitori echivalenți.'],
                                ]; @endphp
                                @foreach($beneficiiIsaccea as $b)
                                <div class="col-md-6">
                                    <div class="d-flex gap-3 p-3" style="background:var(--aqua-bg);border-radius:10px;height:100%;">
                                        <div style="width:36px;height:36px;min-width:36px;background:#48cae4;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                            <i class="bi {{ $b['icon'] }} text-white" style="font-size:0.9rem;"></i>
                                        </div>
                                        <div>
                                            <div style="font-weight:700;font-size:0.82rem;color:var(--aqua-dark);margin-bottom:0.2rem;">{{ $b['titlu'] }}</div>
                                            <div style="font-size:0.78rem;color:#6c757d;line-height:1.5;">{{ $b['desc'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════
             CENTRU BABADAG
        ══════════════════════════════════════ --}}
        <div id="centru-babadag" class="mb-5" style="scroll-margin-top:90px;">
            <div class="card" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                <div class="card-header py-3 px-4 d-flex align-items-center gap-3" style="background:linear-gradient(90deg,#023e8a,#0369a1);">
                    <div style="width:42px;height:42px;background:rgba(255,255,255,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="bi bi-building text-white" style="font-size:1.2rem;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 text-white fw-bold" style="font-size:1.1rem;">Centrul Operațional Babadag</h4>
                        <small style="color:rgba(255,255,255,0.7);font-size:0.75rem;">Orașul Babadag</small>
                    </div>
                </div>
                <div class="card-body p-4">
                    <p style="font-size:0.9rem;color:#374151;line-height:1.8;">
                        Serviciul public de alimentare cu apă și canalizare al orașului era efectuat de către SP EDIL PREST Babadag. În prezent, orașul Babadag a intrat în ADI, alături de celelalte 4 aglomerări urbane: Tulcea, Mãcin, Isaccea și Sulina.
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6 col-lg-3">
                            <div class="text-center p-3" style="background:var(--aqua-bg);border-radius:10px;border:1px solid var(--aqua-border);">
                                <div style="font-size:1.4rem;font-weight:800;color:var(--aqua-primary);">66 km</div>
                                <div style="font-size:0.75rem;color:#6c757d;">rețea apă potabilă</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="text-center p-3" style="background:var(--aqua-bg);border-radius:10px;border:1px solid var(--aqua-border);">
                                <div style="font-size:1.4rem;font-weight:800;color:var(--aqua-primary);">6 km</div>
                                <div style="font-size:0.75rem;color:#6c757d;">rețea canalizare</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="text-center p-3" style="background:var(--aqua-bg);border-radius:10px;border:1px solid var(--aqua-border);">
                                <div style="font-size:1.4rem;font-weight:800;color:var(--aqua-primary);">12+4</div>
                                <div style="font-size:0.75rem;color:#6c757d;">foraje subterane</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="text-center p-3" style="background:var(--aqua-bg);border-radius:10px;border:1px solid var(--aqua-border);">
                                <div style="font-size:1.4rem;font-weight:800;color:var(--aqua-primary);">25 l/s</div>
                                <div style="font-size:0.75rem;color:#6c757d;">capacitate stație epurare</div>
                            </div>
                        </div>
                    </div>

                    <div style="background:var(--aqua-bg);border-radius:12px;padding:1rem 1.25rem;border-left:4px solid var(--aqua-primary);">
                        <p style="font-size:0.875rem;color:#374151;line-height:1.7;margin:0;">
                            <strong>Surse de apă:</strong> Frontul subteran Satu Nou — 12 foraje de mare adâncime (110–120 m) și frontul subteran Ghiol — 4 foraje cu adâncime medie (55 m). Apele menajere colectate sunt trimise la stația de epurare a orașului, evacuându-se gravitational prin intermediul conductelor de PREMO și azbociment.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
