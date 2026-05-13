@extends('layouts.app')

@section('title', 'Aquaserv - POS Mediu')

@section('page_hero')
    <h1><i class="bi bi-file-earmark-ruled me-2"></i> Aquaserv - POS</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/despre') }}">Despre noi</a></li>
            <li class="breadcrumb-item active">POS Mediu</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        {{-- INTRO + STATS BANNER --}}
        <div class="row g-4 align-items-stretch mb-5">
            <div class="col-lg-7">
                <div class="h-100 d-flex flex-column justify-content-center" style="background:#fff;border-radius:16px;padding:2rem;box-shadow:0 4px 24px rgba(0,119,182,0.08);border-left:5px solid var(--aqua-primary);">
                    <p style="color:#374151;font-size:0.95rem;line-height:1.9;margin:0;">
                        După aderarea României la UE au crescut oportunitățile de finanțare a proiectelor de investiții pentru
                        îmbunătățirea accesului la utilitățile publice de apă și protecția și reabilitarea surselor de apă din România,
                        conform cerințelor europene. Acestea vor contribui la realizarea angajamentelor de aderare asumate în sectorul
                        de apă și apă uzată până în 2018 cel târziu, respectiv în 2015, așa cum a fost stabilit prin Tratatul de Aderare.
                    </p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="h-100 d-flex flex-column justify-content-center" style="background:linear-gradient(135deg,#023e8a,#0077b6,#00b4d8);border-radius:16px;padding:2rem;">
                    <div class="row g-3 text-center">
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.12);border-radius:12px;padding:1rem 0.5rem;">
                                <div style="font-size:1.6rem;font-weight:800;color:#fff;line-height:1;">92.874</div>
                                <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:4px;">locuitori beneficiari</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.12);border-radius:12px;padding:1rem 0.5rem;">
                                <div style="font-size:1.6rem;font-weight:800;color:#fff;line-height:1;">419 M lei</div>
                                <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:4px;">valoare eligibilă totală</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.12);border-radius:12px;padding:1rem 0.5rem;">
                                <div style="font-size:1.6rem;font-weight:800;color:#fff;line-height:1;">4</div>
                                <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:4px;">aglomerări urbane</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.12);border-radius:12px;padding:1rem 0.5rem;">
                                <div style="font-size:1.6rem;font-weight:800;color:#fff;line-height:1;">92,5%</div>
                                <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:4px;">finanțat din Fondul de Coeziune UE</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CE ESTE POS MEDIU --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Ce este POS Mediu?</h2>
            <div class="row g-4">
                <div class="col-lg-7">
                    <p style="color:#374151;font-size:0.95rem;line-height:1.9;">
                        <strong>POS Mediu</strong> (Programul Operațional Sectorial „Mediu") reprezintă unul din cele 7 programe
                        operaționale în derulare în România, finanțat de Uniunea Europeană în perioada 2007–2013.
                    </p>
                    <p style="color:#374151;font-size:0.95rem;line-height:1.9;">
                        POS Mediu este cel mai important program de asistență financiară în domeniul protecției mediului.
                        POS Mediu reprezintă documentul de programare a Fondurilor Structurale și de Coeziune, care stabilește
                        strategia de alocare a fondurilor europene în vederea dezvoltării sectorului de mediu în România,
                        în perioada 2007–2013.
                    </p>
                    <div style="background:var(--aqua-bg);border-left:4px solid var(--aqua-primary);border-radius:0 10px 10px 0;padding:1rem 1.25rem;">
                        <p style="color:#374151;font-size:0.875rem;line-height:1.8;margin:0;">
                            Pentru axa prioritară 1, contribuția financiară a Uniunii Europene poate ajunge până la <strong>85%</strong>
                            din deficitul de finanțare calculat la nivelul proiectului, cofinanțarea fiind asigurată din bugetul
                            național și local.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div style="background:#fff;border-radius:16px;padding:1.5rem;box-shadow:0 4px 24px rgba(0,119,182,0.08);height:100%;">
                        <p style="font-size:0.78rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:1rem;">Domenii finanțate</p>
                        @php $domenii = [
                            ['icon'=>'bi-droplet-fill',      'text'=>'Alimentarea cu apă'],
                            ['icon'=>'bi-diagram-3',         'text'=>'Sisteme de canalizare'],
                            ['icon'=>'bi-trash3',            'text'=>'Managementul deșeurilor'],
                            ['icon'=>'bi-house-x',           'text'=>'Reabilitarea terenurilor poluate'],
                            ['icon'=>'bi-thermometer-snow',  'text'=>'Sisteme de termoficare'],
                            ['icon'=>'bi-tree',              'text'=>'Conservarea naturii'],
                            ['icon'=>'bi-water',             'text'=>'Protecția împotriva inundațiilor'],
                            ['icon'=>'bi-tsunami',           'text'=>'Protecția eroziunii costiere'],
                        ]; @endphp
                        <ul style="list-style:none;padding:0;margin:0;">
                            @foreach($domenii as $d)
                            <li class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi {{ $d['icon'] }}" style="color:var(--aqua-primary);font-size:0.9rem;width:18px;flex-shrink:0;"></i>
                                <span style="font-size:0.83rem;color:#374151;">{{ $d['text'] }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- ACTIVITATI PRINCIPALE --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Principalele activități ale proiectului</h2>
            <div class="row g-3">
                @php $activitati = [
                    ['icon'=>'bi-arrow-left-right', 'titlu'=>'Reabilitare aducțiuni', 'desc'=>'Reabilitarea conductelor de aducțiune de la sursele de apă de suprafață și subterană și a stațiilor de tratare a apei'],
                    ['icon'=>'bi-droplet-fill',      'titlu'=>'Extindere rețele apă',  'desc'=>'Reabilitarea și extinderea rezervoarelor de apă, a stațiilor de pompare, de hidrofor, contorizare și a rețelelor de alimentare cu apă potabilă'],
                    ['icon'=>'bi-recycle',           'titlu'=>'Sisteme de epurare',    'desc'=>'Reabilitarea și extinderea sistemelor de colectare și epurare a apelor uzate'],
                ]; @endphp
                @foreach($activitati as $act)
                <div class="col-md-4">
                    <div class="h-100 text-center p-4" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(0,119,182,0.08);border-top:4px solid var(--aqua-primary);">
                        <div style="width:52px;height:52px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                            <i class="bi {{ $act['icon'] }}" style="font-size:1.3rem;color:var(--aqua-primary);"></i>
                        </div>
                        <h6 style="font-weight:800;color:var(--aqua-dark);margin-bottom:0.5rem;">{{ $act['titlu'] }}</h6>
                        <p style="font-size:0.82rem;color:#6c757d;line-height:1.6;margin:0;">{{ $act['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- REZULTATE --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Rezultatele proiectului</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="h-100 p-4" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(0,119,182,0.08);">
                        <div style="width:44px;height:44px;background:var(--aqua-primary);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;">
                            <i class="bi bi-people-fill text-white" style="font-size:1.1rem;"></i>
                        </div>
                        <h6 style="font-weight:800;color:var(--aqua-dark);margin-bottom:0.5rem;">Acoperire teritorială</h6>
                        <p style="font-size:0.85rem;color:#374151;line-height:1.7;margin:0;">
                            Proiectul este prima etapă din Master Planul județului Tulcea. Lucrările sunt localizate în aglomerările
                            urbane Tulcea, Sulina, Isaccea și Mãcin, cu o populație de aproximativ <strong>106.000 locuitori</strong>.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-4" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(0,119,182,0.08);">
                        <div style="width:44px;height:44px;background:#0096c7;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;">
                            <i class="bi bi-graph-up-arrow text-white" style="font-size:1.1rem;"></i>
                        </div>
                        <h6 style="font-weight:800;color:var(--aqua-dark);margin-bottom:0.5rem;">Calitatea vieții</h6>
                        <p style="font-size:0.85rem;color:#374151;line-height:1.7;margin:0;">
                            Infrastructura modernă va furniza servicii de interes general de calitate pentru toți cetățenii, la prețuri
                            acceptabile, îmbunătățind calitatea vieții și atractivitatea socio-economică a zonei.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-4" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(0,119,182,0.08);">
                        <div style="width:44px;height:44px;background:#00b4d8;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;">
                            <i class="bi bi-briefcase-fill text-white" style="font-size:1.1rem;"></i>
                        </div>
                        <h6 style="font-weight:800;color:var(--aqua-dark);margin-bottom:0.5rem;">Creștere economică</h6>
                        <p style="font-size:0.85rem;color:#374151;line-height:1.7;margin:0;">
                            Investițiile în infrastructura de mediu sunt puternic conectate cu creșterea economică durabilă și cu crearea
                            de noi locuri de muncă, contribuind la convergența și competitivitatea regiunii.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- PROIECT MAJOR --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">„Reabilitarea și extinderea sistemelor de apă și apă uzată în județul Tulcea"</h2>
            <div style="background:#fff;border-radius:16px;padding:2rem;box-shadow:0 4px 24px rgba(0,119,182,0.08);">
                <div class="row g-4 align-items-start">
                    <div class="col-md-8">
                        <p style="color:#374151;font-size:0.95rem;line-height:1.9;margin-bottom:1rem;">
                            În anul <strong>2008</strong>, a fost aprobat de către Comisia Europeană (CE), spre finanțare, proiectul major
                            <em>„Reabilitarea și extinderea sistemelor de apă și apă uzată în județul Tulcea"</em> – proiect
                            co-finanțat din Fondul de Coeziune, în conformitate cu Axa Prioritară „Extinderea și modernizarea
                            sistemelor de apă și apă uzată" a POS Mediu 2007–2013.
                        </p>
                        <p style="color:#374151;font-size:0.95rem;line-height:1.9;margin:0;">
                            Proiectul presupune investiții pentru îmbunătățirea proceselor de captare, tratare și distribuție a apei
                            potabile și pentru colectarea și epurarea apelor uzate în zonele acoperite de operatorul regional
                            SC Aquaserv SA Tulcea, în conformitate cu Directivele UE în sectorul de apă și apă uzată.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div style="background:var(--aqua-bg);border-radius:12px;padding:1.25rem;text-align:center;">
                            <div style="width:56px;height:56px;background:var(--aqua-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 0.75rem;">
                                <i class="bi bi-award-fill text-white" style="font-size:1.4rem;"></i>
                            </div>
                            <div style="font-size:0.75rem;color:#6c757d;text-transform:uppercase;letter-spacing:0.5px;font-weight:700;">Aprobat de</div>
                            <div style="font-weight:800;color:var(--aqua-dark);font-size:0.95rem;margin-top:0.2rem;">Comisia Europeană</div>
                            <div style="font-size:0.82rem;color:var(--aqua-primary);font-weight:700;margin-top:0.2rem;">Fondul de Coeziune · 2008</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- OBIECTIVE + COMPONENTE --}}
        <div class="row g-4 mb-5">
            <div class="col-lg-5">
                <div class="h-100" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                    <div class="px-4 py-3" style="background:linear-gradient(90deg,#023e8a,#0077b6);">
                        <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                            <i class="bi bi-bullseye me-2"></i>Obiectivele proiectului
                        </h5>
                    </div>
                    <div class="p-4">
                        <ul style="list-style:none;padding:0;margin:0;">
                            @php $obiective = [
                                'Conformarea serviciilor de apă potabilă și canalizare cu directivele UE',
                                'Transformarea în servicii eficiente și durabile din punct de vedere economic',
                                'Furnizarea continuă de apă potabilă de înaltă calitate pentru o populație de 92.874 locuitori',
                            ]; @endphp
                            @foreach($obiective as $i => $ob)
                            <li class="d-flex gap-3 {{ $i < count($obiective)-1 ? 'mb-3' : '' }}">
                                <div style="width:28px;height:28px;min-width:28px;background:var(--aqua-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                    <i class="bi bi-check text-white" style="font-size:0.85rem;"></i>
                                </div>
                                <span style="font-size:0.875rem;color:#374151;line-height:1.6;">{{ $ob }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="h-100" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                    <div class="px-4 py-3" style="background:linear-gradient(90deg,#0077b6,#00b4d8);">
                        <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                            <i class="bi bi-grid me-2"></i>Componentele proiectului
                        </h5>
                    </div>
                    <div class="p-4">
                        <ul style="list-style:none;padding:0;margin:0;">
                            @php $componente = [
                                ['loc'=>'Aglomerarea Tulcea',  'icon'=>'bi-geo-alt-fill', 'desc'=>'Extinderea și reabilitarea sistemelor de alimentare cu apă și canalizare, a stației de tratare și construcția unei stații de epurare pentru 100.000 l.e.'],
                                ['loc'=>'Aglomerarea Sulina',  'icon'=>'bi-geo-alt-fill', 'desc'=>'Extinderea și reabilitarea sistemelor de alimentare cu apă și canalizare.'],
                                ['loc'=>'Aglomerarea Isaccea', 'icon'=>'bi-geo-alt-fill', 'desc'=>'Extinderea și reabilitarea sistemelor de alimentare cu apă și canalizare și construcția unei stații de epurare pentru 5.000 l.e.'],
                                ['loc'=>'Aglomerarea Mãcin',   'icon'=>'bi-geo-alt-fill', 'desc'=>'Extinderea și reabilitarea sistemelor de alimentare cu apă și canalizare și construcția unei stații de epurare pentru 10.000 l.e.'],
                                ['loc'=>'Asistență tehnică',   'icon'=>'bi-person-gear',  'desc'=>'Management de proiect și supervizarea lucrărilor pentru durabilitatea investițiilor propuse.'],
                            ]; @endphp
                            @foreach($componente as $i => $c)
                            <li class="d-flex gap-3 {{ $i < count($componente)-1 ? 'mb-3' : '' }}">
                                <div style="width:28px;height:28px;min-width:28px;background:{{ $i===4 ? '#6c757d' : 'var(--aqua-accent)' }};border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                    <i class="bi {{ $c['icon'] }} text-white" style="font-size:0.75rem;"></i>
                                </div>
                                <div>
                                    <div style="font-weight:700;font-size:0.82rem;color:var(--aqua-dark);">{{ $c['loc'] }}</div>
                                    <div style="font-size:0.78rem;color:#6c757d;line-height:1.5;">{{ $c['desc'] }}</div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- TABELE FINANTARE -- tabs --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Surse de finanțare</h2>
            <ul class="nav nav-pills mb-3" id="tabFinantare" role="tablist" style="gap:0.5rem;">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-estimate"
                            style="font-size:0.85rem;font-weight:700;border-radius:10px;">
                        <i class="bi bi-calculator me-1"></i>Valori estimate
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-utilizate"
                            style="font-size:0.85rem;font-weight:700;border-radius:10px;">
                        <i class="bi bi-check2-circle me-1"></i>Etapa I utilizată
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                {{-- ESTIMATE --}}
                <div class="tab-pane fade show active" id="tab-estimate">
                    <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" style="font-size:0.875rem;">
                                <thead>
                                    <tr>
                                        <th class="text-white fw-bold py-3 px-4" style="width:60%;background:linear-gradient(90deg,#023e8a,#0077b6);">Sursă de finanțare</th>
                                        <th class="text-white fw-bold py-3 px-4 text-end" style="background:#0077b6;">Valoare (lei)</th>
                                        <th class="text-white fw-bold py-3 px-4 text-center" style="white-space:nowrap;background:#0077b6;">Pondere</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="background:#f0f8ff;">
                                        <td class="px-4 py-2 fw-bold" colspan="3" style="color:var(--aqua-dark);font-size:0.82rem;">Valori totale ale proiectului</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2">1) Valoarea totală eligibilă a proiectului, fără TVA</td>
                                        <td class="px-4 py-2 text-end fw-bold">419.371.852</td>
                                        <td class="px-4 py-2 text-center fw-bold">100%</td>
                                    </tr>
                                    <tr style="background:#f8fafc;">
                                        <td class="px-4 py-2">2) Valoarea totală aferentă cheltuielilor eligibile, fără TVA</td>
                                        <td class="px-4 py-2 text-end">419.371.852</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2">3) Valoarea eligibilă conform POS Mediu</td>
                                        <td class="px-4 py-2 text-end fw-bold">395.909.845</td>
                                        <td class="px-4 py-2 text-center fw-bold">94,4%</td>
                                    </tr>
                                    <tr style="background:#e0f2fe;">
                                        <td class="px-4 py-2 ps-5">4) Finanțare nerambursabilă din Fondul de Coeziune</td>
                                        <td class="px-4 py-2 text-end fw-bold" style="color:#0369a1;">336.523.368</td>
                                        <td class="px-4 py-2 text-center fw-bold" style="color:#0369a1;">92,5%</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 ps-5">5) Finanțare nerambursabilă din bugetul de stat</td>
                                        <td class="px-4 py-2 text-end">51.468.280</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr style="background:#f8fafc;">
                                        <td class="px-4 py-2 ps-5">6) Finanțare nerambursabilă din bugetul local</td>
                                        <td class="px-4 py-2 text-end">7.918.197</td>
                                        <td class="px-4 py-2 text-center">1,9%</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2">7) Valoarea proiectului, alta decât cea eligibilă conform POS Mediu</td>
                                        <td class="px-4 py-2 text-end">23.462.007</td>
                                        <td class="px-4 py-2 text-center">5,6%</td>
                                    </tr>
                                    <tr style="background:#f8fafc;">
                                        <td class="px-4 py-2">8) Idem, care cuprinde cheltuieli eligibile</td>
                                        <td class="px-4 py-2 text-end">23.462.007</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2">9) Valoare aferentă cheltuielilor altele decât cele eligibile, total</td>
                                        <td class="px-4 py-2 text-end">0</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr style="background:#f8fafc;">
                                        <td class="px-4 py-2">10) Buget local</td>
                                        <td class="px-4 py-2 text-end">0</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2">11) Surse proprii / împrumut</td>
                                        <td class="px-4 py-2 text-end">0</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr style="background:#fff3cd;">
                                        <td class="px-4 py-2 fw-bold">12) TVA total</td>
                                        <td class="px-4 py-2 text-end fw-bold">79.917.343</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 ps-5">Valoarea TVA aferentă altei valori decât cea eligibilă conform POS Mediu</td>
                                        <td class="px-4 py-2 text-end">4.457.781</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- UTILIZATE ETAPA I --}}
                <div class="tab-pane fade" id="tab-utilizate">
                    <p style="color:#374151;font-size:0.875rem;margin-bottom:1rem;">
                        Valoarea totală a etapei I a proiectului, defalcată pe surse de finanțare:
                    </p>
                    <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" style="font-size:0.875rem;">
                                <thead>
                                    <tr>
                                        <th class="text-white fw-bold py-3 px-4" style="width:60%;background:linear-gradient(90deg,#0077b6,#00b4d8);">Sursă de finanțare – Etapa I</th>
                                        <th class="text-white fw-bold py-3 px-4 text-end" style="background:#00b4d8;">Valoare (lei)</th>
                                        <th class="text-white fw-bold py-3 px-4 text-center" style="white-space:nowrap;background:#00b4d8;">Pondere</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="background:#f0f8ff;">
                                        <td class="px-4 py-2 fw-bold">1) Valoarea totală a etapei I, fără TVA</td>
                                        <td class="px-4 py-2 text-end fw-bold">333.494.303</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 fw-bold">2) Valoarea eligibilă a etapei I, conform POS Mediu</td>
                                        <td class="px-4 py-2 text-end fw-bold">333.494.303</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr style="background:#e0f2fe;">
                                        <td class="px-4 py-2 ps-5">2.1) Valoare eligibilă nerambursabilă din Fondul de Coeziune</td>
                                        <td class="px-4 py-2 text-end fw-bold" style="color:#0369a1;">283.470.157</td>
                                        <td class="px-4 py-2 text-center fw-bold" style="color:#0369a1;">98%</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 ps-5">2.2) Valoare eligibilă nerambursabilă din bugetul de stat</td>
                                        <td class="px-4 py-2 text-end">43.354.259</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr style="background:#f8fafc;">
                                        <td class="px-4 py-2 ps-5">2.3) Contribuția beneficiarului din bugetul local</td>
                                        <td class="px-4 py-2 text-end">6.669.887</td>
                                        <td class="px-4 py-2 text-center">2%</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2">3) Valoarea etapei I, alta decât cea eligibilă conform POS Mediu, fără TVA</td>
                                        <td class="px-4 py-2 text-end">0</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr style="background:#fff3cd;">
                                        <td class="px-4 py-2 fw-bold">4) TVA</td>
                                        <td class="px-4 py-2 text-end fw-bold">78.507.411</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 ps-5">4.1) TVA aferentă valorii eligibile a etapei I, conform POS Mediu</td>
                                        <td class="px-4 py-2 text-end">78.507.411</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                    <tr style="background:#f8fafc;">
                                        <td class="px-4 py-2 ps-5">4.2) TVA aferentă altei valori decât cea eligibilă, etapa I POS Mediu</td>
                                        <td class="px-4 py-2 text-end">0</td>
                                        <td class="px-4 py-2 text-center">—</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTIUNE DETALIATA PROIECT --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Despre proiectul „Reabilitarea și extinderea sistemelor de apă și apă uzată în județul Tulcea"</h2>

            {{-- Descriere generala --}}
            <div style="background:#fff;border-radius:16px;padding:2rem;box-shadow:0 4px 24px rgba(0,119,182,0.08);border-left:5px solid var(--aqua-primary);margin-bottom:1.5rem;">
                <p style="color:#374151;font-size:0.925rem;line-height:1.9;margin-bottom:1rem;">
                    În vederea conformării serviciilor de apă potabilă și de canalizare cu Directivele UE și cu legislația în vigoare, S.C. Aquaserv a implementat
                    Proiectul <strong>„Reabilitarea și extinderea sistemelor de apă și apă uzată în județul Tulcea"</strong> — Cod SMIS 1340, finanțat în cadrul
                    Programului Operațional Sectorial „Mediu" 2007–2013 (POS Mediu) – Axa Prioritară 1, din Fondurile Europene de Coeziune <strong>85%</strong>,
                    Bugetul de Stat <strong>13%</strong> și Bugetul Local <strong>2%</strong>.
                </p>
                <p style="color:#374151;font-size:0.925rem;line-height:1.9;margin-bottom:1rem;">
                    Conform aprobării Comisiei Europene din 27.05.2008 și a Ordinului Ministerului Mediului din 25.08.2008, s-a încheiat
                    <strong>Contractul de Finanțare nr. 91802/09.10.2008</strong>, finalizat la 30.06.2016. Beneficiarul contractului este
                    AQUASERV SA Tulcea – Operator Regional pentru aglomerările: Tulcea, Mãcin, Isaccea, Sulina.
                </p>
                <p style="color:#374151;font-size:0.925rem;line-height:1.9;margin:0;">
                    Proiectul include investiții pentru îmbunătățirea procesului de captare, tratare și distribuție a apei potabile și pentru colectarea și
                    epurarea apelor uzate. Scopul proiectului este reabilitarea sistemelor de apă potabilă și a celor de canalizare-epurare din aglomerările
                    menționate, în scopul conformării cu obligațiile asumate prin Tratatul de Aderare, precum și cu obiectivele POS Mediu.
                </p>
            </div>

            {{-- Valori financiare --}}
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="text-center p-3 h-100" style="background:linear-gradient(135deg,#023e8a,#0077b6);border-radius:14px;">
                        <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.5px;font-weight:700;margin-bottom:0.4rem;">Valoarea Totală a Proiectului</div>
                        <div style="font-size:1.2rem;font-weight:800;color:#fff;line-height:1.2;">113.786.589 Euro</div>
                        <div style="font-size:0.85rem;color:rgba(255,255,255,0.9);font-weight:600;">419.371.852 Lei, fără TVA</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-3 h-100" style="background:linear-gradient(135deg,#0077b6,#00b4d8);border-radius:14px;">
                        <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.5px;font-weight:700;margin-bottom:0.4rem;">Valoarea Totală Eligibilă Etapa I</div>
                        <div style="font-size:1.2rem;font-weight:800;color:#fff;line-height:1.2;">333.494.303 lei</div>
                        <div style="font-size:0.85rem;color:rgba(255,255,255,0.9);font-weight:600;">fără TVA</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-3 h-100" style="background:linear-gradient(135deg,#00b4d8,#0096c7);border-radius:14px;">
                        <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.5px;font-weight:700;margin-bottom:0.4rem;">Valoare Plătită cu Actualizări</div>
                        <div style="font-size:1.2rem;font-weight:800;color:#fff;line-height:1.2;">325.990.211,72 lei</div>
                        <div style="font-size:0.85rem;color:rgba(255,255,255,0.9);font-weight:600;">fără TVA</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- INDICATORI DE MONITORIZARE --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Indicatori de monitorizare</h2>
            <p style="color:#374151;font-size:0.875rem;line-height:1.7;margin-bottom:1.25rem;">
                Indicatorii stabiliți prin Decizia CE nr. C(2008) 2318 din 27.05.2008, pentru aprobarea proiectului nr. CCI 2007 RO161 PR004:
            </p>

            {{-- Furnizare apa --}}
            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);margin-bottom:1.5rem;">
                <div class="px-4 py-3" style="background:linear-gradient(90deg,#023e8a,#0077b6);">
                    <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                        <i class="bi bi-droplet-fill me-2"></i>Indicatori – furnizare apă
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" style="font-size:0.82rem;">
                        <thead>
                            <tr style="background:#e0f2fe;">
                                <th class="px-3 py-2" style="color:var(--aqua-dark);">Indicator</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">U.M.</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Total</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Tulcea</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Isaccea</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Sulina</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Mãcin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $indApа = [
                                ['Reabilitare captare de suprafață', 'unități', '1', '1', '0', '0', '0'],
                                ['Reabilitare fronturi de puțuri', 'unități', '2', '1', '0', '0', '1'],
                                ['Reabilitare conducte de aducțiune', 'km', '25', '20', '0', '0', '5'],
                                ['Reabilitare rețele de distribuție', 'km', '94', '53', '9', '13', '19'],
                                ['Extindere rețele de distribuție', 'km', '22,50', '2,50', '10', '6', '4'],
                                ['Stații de tratare noi și reabilitate', 'unități', '2', '1', '0', '1', '0'],
                                ['Rezervoare de apă noi și reabilitate', 'sistem', '4', '1', '1', '1', '1'],
                                ['Instalare contoare de apă', 'unități', '7190', '4930', '785', '500', '975'],
                                ['Sisteme SCADA', 'unități', '4', '1', '1', '1', '1'],
                            ]; @endphp
                            @foreach($indApа as $i => $row)
                            <tr style="{{ $i % 2 === 0 ? 'background:#f8fafc;' : '' }}">
                                <td class="px-3 py-2">{{ $row[0] }}</td>
                                <td class="px-3 py-2 text-center text-muted">{{ $row[1] }}</td>
                                <td class="px-3 py-2 text-center fw-bold" style="color:var(--aqua-primary);">{{ $row[2] }}</td>
                                <td class="px-3 py-2 text-center">{{ $row[3] }}</td>
                                <td class="px-3 py-2 text-center">{{ $row[4] }}</td>
                                <td class="px-3 py-2 text-center">{{ $row[5] }}</td>
                                <td class="px-3 py-2 text-center">{{ $row[6] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Epurare ape uzate --}}
            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,119,182,0.10);">
                <div class="px-4 py-3" style="background:linear-gradient(90deg,#0077b6,#00b4d8);">
                    <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                        <i class="bi bi-recycle me-2"></i>Indicatori – epurarea apei uzate
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" style="font-size:0.82rem;">
                        <thead>
                            <tr style="background:#e0f2fe;">
                                <th class="px-3 py-2" style="color:var(--aqua-dark);">Indicator</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">U.M.</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Total</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Tulcea</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Isaccea</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Sulina</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);">Mãcin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $indApaUzata = [
                                ['Reabilitare rețele de canalizare', 'km', '32', '28', '2', '0', '2'],
                                ['Extindere rețele de canalizare', 'km', '80', '32', '14', '19', '15'],
                                ['Stații noi de pompare a apei uzate', 'unități', '12', '4', '2', '4', '2'],
                                ['Stații noi de epurare (100.000, 10.000 și 5.000 p.e.)', 'unități', '3', '1', '1', '0', '1'],
                            ]; @endphp
                            @foreach($indApaUzata as $i => $row)
                            <tr style="{{ $i % 2 === 0 ? 'background:#f8fafc;' : '' }}">
                                <td class="px-3 py-2">{{ $row[0] }}</td>
                                <td class="px-3 py-2 text-center text-muted">{{ $row[1] }}</td>
                                <td class="px-3 py-2 text-center fw-bold" style="color:var(--aqua-primary);">{{ $row[2] }}</td>
                                <td class="px-3 py-2 text-center">{{ $row[3] }}</td>
                                <td class="px-3 py-2 text-center">{{ $row[4] }}</td>
                                <td class="px-3 py-2 text-center">{{ $row[5] }}</td>
                                <td class="px-3 py-2 text-center">{{ $row[6] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- CONTRACTE DE LUCRARI --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Contracte de lucrări</h2>
            <p style="color:#374151;font-size:0.875rem;line-height:1.7;margin-bottom:1.5rem;">
                Investiția constă din <strong>10 contracte de lucrări</strong> și <strong>4 contracte de servicii</strong>.
            </p>

            <div class="accordion" id="accordionCL">

                {{-- CL1 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl1"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL1</span>
                            Extindere și reabilitare stație tratare apă subterană — Aglomerarea Tulcea
                        </button>
                    </h2>
                    <div id="cl1" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">39.790.050 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">39.746.236,59 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">43.026.019,14 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Antreprenor:</strong> Asocierea SC DELTACONS SA Tulcea / SC SEKISUI SPR Romania SRL / SC GAZ CONTROL SRL Tulcea</p>
                            <p><strong>Obiectiv:</strong> Proiectarea și execuția/reabilitarea frontului de captare Bogza, a conductelor de aducțiune apă brută și apă tratată.</p>
                            <p class="mb-2"><strong>Obiecte realizate:</strong></p>
                            <ul style="margin:0;padding-left:1.25rem;">
                                <li>Ob.1 – Front captare Bogza</li>
                                <li>Ob.2 – Reabilitare complex înmagazinare cota +70</li>
                                <li>Ob.3 – Aducțiune apă brută Mila 42+500 până la STAP Tulcea, Dn 1000 mm, L=6000 m</li>
                                <li>Ob.4 – Reabilitare/înlocuire conductă Dn 450 mm Bogza – Cota +70</li>
                                <li>Ob.5 – Reabilitare/înlocuire conductă Dn 500 mm STAP – ALUM</li>
                                <li>Ob.6 – Aducțiune apă tratată între STAP Tulcea și Cota+70</li>
                                <li>Ob.7 – Reabilitare/înlocuire conductă de aducțiune Dn 400 mm</li>
                                <li>Ob.8 – Conductă Cota +70 - Cota +110 Dn 500 (630)</li>
                                <li>Ob.9 – Aducțiune apă tratată între STAP Tulcea și Aker</li>
                                <li>Ob.10 – Aducțiune apă tratată între Timișoarei cu Independenței și sensul giratoriu Prislav</li>
                                <li>Ob.11 – Aducțiune apă tratată între Bucovinei cu Babadag și STAP Tulcea, Dn 600 mm, L=2416 m</li>
                            </ul>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat</strong> — PVRT nr. 12043/1/21.12.2015 și PVRF nr. 2/14.06.2018
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CL2 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl2"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL2</span>
                            Extindere și reabilitare stație de tratare apă de suprafață — Tulcea
                        </button>
                    </h2>
                    <div id="cl2" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">53.978.162,58 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">54.183.884,58 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">58.434.307,26 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Antreprenor:</strong> Asocierea SC CORAL S.R.L. Tulcea (Leader) / GINZLER Stahl-und Anlagenbau GmbH Austria</p>
                            <p><strong>Obiectiv:</strong> Retehnologizarea proceselor existente și implementarea de noi procese la STAP Tulcea: pre-oxidare cu dioxid de clor, ozonare, adsorbție pe cărbune activ granular.</p>
                            <p class="mb-2"><strong>Obiecte realizate (selecție):</strong></p>
                            <ul style="margin:0;padding-left:1.25rem;">
                                <li>Predecantor, bazine preoxidare, bazine coagulare-floculare, decantoare cu lamele</li>
                                <li>Stații de pompare intermediare SP1 și SP2</li>
                                <li>Stație filtre rapide cu nisip (10 cuve + 8 cuve), stație ozonare, filtre cu cărbune activ</li>
                                <li>Rezervoare 1500 mc, 500 mc, 2×250 mc; stație clorinare</li>
                                <li>Stație deshidratare nămol, laborator și dispecer, centru termic, grup electrogen</li>
                                <li>Sistem SCADA</li>
                            </ul>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat</strong> — PVRT nr. 1/12354/28.12.2015 și PVRF nr. 1/1149/25.01.2017
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CL3 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl3"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL3</span>
                            Extinderea și reabilitarea capacităților de tratare — Sulina, Mãcin și Isaccea
                        </button>
                    </h2>
                    <div id="cl3" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">15.704.149 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">15.626.113,00 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">15.329.191,81 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Antreprenor:</strong> Asocierea SC DELTACONS S.A. Tulcea (Leader) / SC GAZ CONTROL S.R.L. / SC ERGTERMROM SA</p>
                            <p><strong>Notă:</strong> Contract fazat — CL3 Sulina a fost fazat și recepționat în Faza II (POIM 2014–2020).</p>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Mãcin</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Front captare puțuri existente</li>
                                        <li>Stație captare apă brută + stație clorinare</li>
                                        <li>Conducte de aducțiune</li>
                                        <li>Rezervoare vechi (1×300 mc + 1×500 mc) și nou (2×1000 mc)</li>
                                        <li>Clădire clorinare rezervoare</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Isaccea</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Rezervoare vechi 2×300 m³ și noi 2×250 m³</li>
                                        <li>Stații clorinare rezervoare vechi și noi</li>
                                        <li>Conductă aducțiune la rezervorul nou</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat (Mãcin și Isaccea)</strong> — PVRT nr. 8734/1/11.09.2017 și PVRF nr. 5556/1/24.05.2019
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CL4 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl4"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL4</span>
                            Stație nouă de epurare — Aglomerarea Tulcea
                        </button>
                    </h2>
                    <div id="cl4" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">46.201.000 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">45.698.462,77 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">52.212.434,27 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Antreprenor:</strong> Asocierea Coral SRL Tulcea (Lider) / Ginzler Stahl-und Anlagenbau GmbH / Machowetz & Partner Consulting Ziviltechniker GmbH Austria</p>
                            <p><strong>Obiectiv:</strong> Construcția unei noi stații de epurare ape menajere pentru aglomerarea Tulcea (100.000 p.e.), inclusiv proiectare completă pe toate disciplinele.</p>
                            <p class="mb-2"><strong>Obiecte realizate (selecție):</strong></p>
                            <ul style="margin:0;padding-left:1.25rem;">
                                <li>Conductă conectare, stație pompare apă uzată și clădire grătare</li>
                                <li>Deznisipator, separator grăsimi, cameră distribuție</li>
                                <li>Decantor primar, bazine nămol activat, stație pompare apă epurată</li>
                                <li>Clădire deshidratare nămol, bazine fermentare (digestoare), gazoletru, arzător</li>
                                <li>Clădire administrativă, rețele interne, stație transformator, biofiltru, peisagistică</li>
                                <li>Sistem SCADA pentru sistemul de apă uzată</li>
                            </ul>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat</strong> — PVRT nr. 3766/02.04.2014 și PVRF nr. 7180/14.08.2015
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CL5 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl5"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL5</span>
                            Stații de epurare — Aglomerările Mãcin și Isaccea
                        </button>
                    </h2>
                    <div id="cl5" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">8.013.931,78 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">8.032.012,75 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">8.958.950,54 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Antreprenor:</strong> SC CORAL S.R.L. Tulcea (Lider), SC ADISS S.R.L. Baia Mare, SC ESCALIA Baia Mare</p>
                            <p><strong>Obiectiv:</strong> Construcția a două noi stații de epurare ape menajere în formă compactă, plus linie de prelucrare a nămolului, pentru Mãcin și Isaccea.</p>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Mãcin</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Stație pompare apă brută</li>
                                        <li>Stație epurare: 2 linii × 6 module + 2 decantoare primare/linie (inox)</li>
                                        <li>Sisteme deshidratare nămol, clădire administrativă</li>
                                        <li>Sistem automatizare și control SCADA</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Isaccea</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Stație pompare apă brută</li>
                                        <li>Stație epurare: 2 linii × 6 module + 2 decantoare primare/linie (inox)</li>
                                        <li>Sisteme deshidratare nămol, clădire administrativă</li>
                                        <li>Instalație automatizare și control SCADA</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat</strong> — PVRT nr. 1/6453/29.03.2012, PVRT nr. 3/16271a/11.10.2012 PIF și PVRF nr. 1/11354/28.10.2014
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CL6 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl6"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL6</span>
                            Reabilitarea și extinderea rețelelor de distribuție și canalizare — Tulcea Lot 1
                        </button>
                    </h2>
                    <div id="cl6" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">36.265.632,00 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">37.369.296,00 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">41.298.281,51 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Antreprenor:</strong> SC OCIDE CONSTRUCCION S.A. Spania</p>
                            <p><strong>Obiectiv:</strong> Înlocuiri și extinderi de distribuție apă (~24,5 km), rețele canalizare (~23,5 km) și construcția a 4 stații de pompare ape uzate în Tulcea.</p>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Indicatori apă</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Reabilitare rețele distribuție: 26,2 km</li>
                                        <li>Extindere rețele distribuție: 1,5 km</li>
                                        <li>Instalare contoare: 387 buc.</li>
                                        <li>Sisteme SCADA: 1</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Indicatori ape uzate</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Reabilitare rețele canalizare: 4,9 km</li>
                                        <li>Extindere rețele canalizare: 17,1 km</li>
                                        <li>Stații pompare noi: 4 buc.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat</strong> — PVRT nr. 7667/17.07.2014 și PVRF nr. 8562/23.09.2015
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CL7 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl7"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL7</span>
                            Reabilitarea si extinderea retelelor de distributie si a sistemului de canalizare inclusiv statii de pompare in aglomerarea Tulcea
                        </button>
                    </h2>
                    <div id="cl7" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">24.781.842,13 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">24.839.011,27 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">31.547.891,07 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Antreprenor:</strong> Asociere S.C. TERMOPRO EDIL S.R.L Oradea (Lider) și S.C. EUROPAN PROD S.A. Pitești (Asociat)</p>
                            <p><strong>Obiectiv:</strong> Reabilitarea și extinderea rețelelor de distribuție și a sistemului de canalizare inclusiv stații de pompare în aglomerarea Tulcea.</p>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat</strong>
                            </div>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Indicatori apă</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Reabilitare rețele distribuție: 14,8 km</li>
                                        <li>Extindere rețele distribuție: 1,0 km</li>
                                        <li>Instalare contoare: 23 buc.</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Indicatori ape uzate</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Reabilitare rețele canalizare: 4,1 km</li>
                                        <li>Extindere rețele canalizare: 10,0 km</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CL8 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl8"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL8</span>
                            Reabilitarea și extinderea rețelelor de distribuție și canalizare — Tulcea Lot 3
                        </button>
                    </h2>
                    <div id="cl8" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">18.476.291,99 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">19.741.637,06 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">22.111.107,77 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Antreprenor:</strong> LUDWIG PFEIFFER HOCH und TIEFBAU GmbH & Co. KG Germania</p>
                            <p><strong>Obiectiv:</strong> Înlocuire rețele distribuție apă (~7 km Dn 100–300) și canalizări (~13 km Dn 250–1000), livrare echipament întreținere canalizare (curățitor jet, modul CCTV, vidanje 2 buc.).</p>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Indicatori apă</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Reabilitare rețele distribuție: 6,9 km</li>
                                        <li>Extindere rețele distribuție: 0,5 km</li>
                                        <li>Instalare contoare: 374 buc.</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Indicatori ape uzate</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Reabilitare rețele canalizare: 13,4 km</li>
                                        <li>Extindere rețele canalizare: 0,4 km</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat</strong> — PVRT nr. 18346/26.11.2012 și PVRF nr. 4495/25.05.2015
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CL9 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl9"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL9</span>
                            Reabilitarea și extinderea rețelelor de distribuție și canalizare — Sulina
                        </button>
                    </h2>
                    <div id="cl9" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">27.605.330,00 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">25.747.988,20 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">28.658.626,64 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Antreprenor:</strong> SC DELTACONS S.A. Tulcea (Lider) / SC FIL CONSTRUCT Sarichioi</p>
                            <p><strong>Obiectiv:</strong> Înlocuiri și extinderi rețele distribuție apă (~20 km) și canalizare (~21 km) și construcția a 4 stații de pompare ape uzate în Sulina.</p>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Indicatori apă</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Reabilitare rețele distribuție: 9,9 km</li>
                                        <li>Extindere rețele distribuție: 7,4 km</li>
                                        <li>Instalare contoare: 1.293 buc.</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-bold mb-1" style="color:var(--aqua-dark);">Indicatori ape uzate</p>
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        <li>Extindere rețele canalizare: 20 km</li>
                                        <li>Stații pompare noi: 4 buc.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat</strong> — PVRT nr. 8632/15.05.2012 și PVRF nr. 7046/21.06.2013
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CL10 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cl10"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CL10</span>
                            Reabilitarea și extinderea rețelelor de distribuție și canalizare — Mãcin și Isaccea
                        </button>
                    </h2>
                    <div id="cl10" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <p><strong>Antreprenor:</strong> Asocierea: S.C. Ramali Construct S.R.L Constanța, S.C. Gaz Control S.R.L Tulcea, S.C. Elsaco Electronic S.R.L Botoșani</p>

                            {{-- Lot 1 Macin --}}
                            <div class="mt-3 mb-1 fw-bold" style="color:var(--aqua-dark);font-size:0.9rem;">Lot 1 — Măcin</div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">29.394.772,46 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">33.059.670,27 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">39.407.462,95 lei fără TVA</div></div></div>
                            </div>

                            {{-- Lot 2 Isaccea --}}
                            <div class="mt-3 mb-1 fw-bold" style="color:var(--aqua-dark);font-size:0.9rem;">Lot 2 — Isaccea</div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">12.994.562,34 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare după acte adiționale</div><div style="font-weight:700;color:var(--aqua-dark);">11.479.530,32 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">13.679.001,57 lei fără TVA</div></div></div>
                            </div>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Finalizat</strong>
                            </div>
                        </div>
                    </div>
                </div>

            </div>{{-- end accordion CL --}}
        </div>

        {{-- CONTRACTE DE SERVICII --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Contracte de servicii</h2>

            <div class="accordion" id="accordionCS">

                {{-- CS1 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cs1"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:#0096c7;color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CS1</span>
                            Asistență Tehnică pentru Managementul Proiectului
                        </button>
                    </h2>
                    <div id="cs1" class="accordion-collapse collapse" data-bs-parent="#accordionCS">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">7.072.360 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare finală</div><div style="font-weight:700;color:var(--aqua-dark);">6.575.103,75 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">6.989.485,91 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Prestator:</strong> TAHAL CONSULTING ENGINEERS LTD Israel</p>
                            <p class="mb-2"><strong>Activități realizate:</strong></p>
                            <ul style="margin:0;padding-left:1.25rem;">
                                <li>Activitatea 1 – Suport în managementul proiectului</li>
                                <li>Activitatea 2 – Implementare GIS</li>
                                <li>Activitatea 3 – Dezvoltarea unui sistem modern de modelare hidraulică</li>
                                <li>Activitatea 4 – Dezvoltarea unui management eficient de detectare a pierderilor</li>
                                <li>Activitatea 5 – Managementul apelor uzate industriale</li>
                                <li>Activitatea 6 – Managementul nămolurilor și al reziduurilor</li>
                                <li>Activitatea 7 – Campanie de publicitate și promovare a proiectului</li>
                                <li>Activitatea 8 – Actualizare Master Plan</li>
                            </ul>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Contract finalizat</strong>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CS2 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cs2"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:#0096c7;color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CS2</span>
                            Supervizarea Lucrărilor
                        </button>
                    </h2>
                    <div id="cs2" class="accordion-collapse collapse" data-bs-parent="#accordionCS">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">9.721.922,98 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare finală</div><div style="font-weight:700;color:var(--aqua-dark);">9.488.470,38 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">10.453.402,43 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Prestator:</strong> Asociația HILL International S.A. Luxembourg – HILL International (Bucharest) S.R.L.</p>
                            <p><strong>Obiect:</strong> Supervizarea celor 10 contracte de lucrări referitoare la sistemul de alimentare cu apă și canalizare din județul Tulcea, inclusiv servicii de diriginție de șantier.</p>
                            <p>Prelungirea termenelor de execuție a impus continuarea supervizării de către Beneficiar prin constituirea unui Serviciu Supervizare Proiecte propriu.</p>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Contract finalizat</strong>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CS3 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cs3"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:#0096c7;color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CS3</span>
                            Auditul Financiar al Proiectului
                        </button>
                    </h2>
                    <div id="cs3" class="accordion-collapse collapse" data-bs-parent="#accordionCS">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">87.997,80 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare finală</div><div style="font-weight:700;color:var(--aqua-dark);">87.997,80 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">91.373,98 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Prestator:</strong> Agenția de audit financiar – AFIL S.R.L. Botoșani</p>
                            <p class="mb-2"><strong>Activități realizate:</strong></p>
                            <ul style="margin:0;padding-left:1.25rem;">
                                <li>Rapoarte trimestriale privind Constatările Factuale</li>
                                <li>Rapoarte anuale privind Constatările Factuale</li>
                                <li>Raportul final inclusiv ultima cerere de rambursare</li>
                            </ul>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Contract finalizat</strong>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CS4 --}}
                <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(0,119,182,0.09);">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#cs4"
                                style="background:#f0f8ff;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                            <span style="background:#0096c7;color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;">CS4</span>
                            Asistență Tehnică a Proiectantului
                        </button>
                    </h2>
                    <div id="cs4" class="accordion-collapse collapse" data-bs-parent="#accordionCS">
                        <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#374151;line-height:1.8;">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare la atribuire</div><div style="font-weight:700;color:var(--aqua-dark);">63.739 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#f0f8ff;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare finală</div><div style="font-weight:700;color:var(--aqua-dark);">58.812,73 lei fără TVA</div></div></div>
                                <div class="col-md-4"><div style="background:#e0f2fe;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare plătită cu actualizare</div><div style="font-weight:700;color:var(--aqua-primary);">52.617,56 lei fără TVA</div></div></div>
                            </div>
                            <p><strong>Prestator:</strong> Universitatea Tehnică de Construcții București</p>
                            <p><strong>Obiect:</strong> Asistență tehnică din partea proiectantului în perioada de execuție a lucrărilor pentru contractele CL6, CL7, CL8, CL9, CL10 (tip FIDIC Roșu — fără proiectare) și coordonarea generală a componentelor proiectului.</p>
                            <p>Activitățile au inclus: dispoziții de șantier, detalii tehnice de execuție, detalii pentru subtraversări/supratraversări, proiecte de sprijiniri de maluri, racorduri electrice pentru stații de pompare.</p>
                            <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                <i class="bi bi-check-circle-fill me-1"></i> <strong>Contract finalizat</strong>
                            </div>
                        </div>
                    </div>
                </div>

            </div>{{-- end accordion CS --}}
        </div>

        {{-- ALTE COMPONENTE --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Alte componente ale proiectului</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-4 h-100" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(0,119,182,0.08);border-top:4px solid var(--aqua-primary);">
                        <h6 style="font-weight:800;color:var(--aqua-dark);margin-bottom:1rem;">
                            <i class="bi bi-person-badge me-2" style="color:var(--aqua-primary);"></i>Salarii — Cheltuieli de personal UIP
                        </h6>
                        <ul style="list-style:none;padding:0;margin:0;font-size:0.875rem;color:#374151;">
                            <li class="d-flex justify-content-between py-1 border-bottom"><span>Valoare în Contractul de Finanțare</span><strong>1.608.038,00 lei</strong></li>
                            <li class="d-flex justify-content-between py-1 border-bottom"><span>Valoare după acte adiționale la CF</span><strong>1.518.075,00 lei</strong></li>
                            <li class="d-flex justify-content-between py-1"><span>Valoarea la finalizare</span><strong style="color:var(--aqua-primary);">1.517.150,98 lei</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 h-100" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(0,119,182,0.08);border-top:4px solid var(--aqua-accent);">
                        <h6 style="font-weight:800;color:var(--aqua-dark);margin-bottom:1rem;">
                            <i class="bi bi-receipt me-2" style="color:var(--aqua-accent);"></i>Taxe, avize și cote legale
                        </h6>
                        <ul style="list-style:none;padding:0;margin:0;font-size:0.875rem;color:#374151;">
                            <li class="d-flex justify-content-between py-1 border-bottom"><span>Valoare în Contractul de Finanțare</span><strong>4.718.339,00 lei</strong></li>
                            <li class="d-flex justify-content-between py-1 border-bottom"><span>Valoare după acte adiționale la CF</span><strong>4.043.096,00 lei</strong></li>
                            <li class="d-flex justify-content-between py-1"><span>Valoarea la finalizare</span><strong style="color:var(--aqua-primary);">1.766.088,64 lei</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
