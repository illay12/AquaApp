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

    </div>
</section>
@endsection
