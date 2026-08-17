@extends('layouts.poim')

@section('title', 'Despre proiect')

@section('page_hero')
    <h1><i class="bi bi-file-earmark-text me-2"></i> Despre proiect</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('poim.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Despre proiect</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        {{-- VALOARE TOTALA + ETAPIZARE --}}
        <div class="mb-5">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-4 pdd-valoare-totala" style="background:linear-gradient(135deg,#002756,#3d8f87,#76b1a8);border-radius:16px;padding:2rem;">
                <div>
                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.5px;font-weight:700;margin-bottom:0.4rem;">Valoarea Contractului de Finanțare</div>
                    <div style="font-size:2rem;font-weight:800;color:#fff;line-height:1.15;">289.901.037,91 lei</div>
                </div>
                <div class="d-flex flex-wrap gap-2 pdd-valoare-procente">
                    <div class="text-center" style="background:rgba(255,255,255,0.12);border-radius:12px;padding:0.75rem 1.25rem;">
                        <div style="font-size:1.15rem;font-weight:800;color:#fff;line-height:1.2;">92,12%</div>
                        <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:2px;white-space:nowrap;">Finanțare AM POIM</div>
                    </div>
                    <div class="text-center" style="background:rgba(255,255,255,0.12);border-radius:12px;padding:0.75rem 1.25rem;">
                        <div style="font-size:1.15rem;font-weight:800;color:#fff;line-height:1.2;">79 luni</div>
                        <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:2px;white-space:nowrap;">Durată implementare</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ETAPIZARE --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Etapizarea proiectului</h2>
            <p style="color:#4a4a4a;font-size:0.95rem;line-height:1.85;">
                Proiectul a fost etapizat conform Notei MIPE nr. 76152/11.07.2022, privind completarea și evaluarea proiectelor
                majore și nemajore etapizate din cadrul O.S. 3.2, în vederea continuării finanțării în cadrul Programului
                Operațional Dezvoltare Durabilă. Valoarea totală a proiectului este de <strong>204.847.249 euro</strong> (fără
                TVA), realizat în două etape:
            </p>
            <div class="row g-4 mt-1">
                <div class="col-md-6">
                    <div class="h-100 p-4" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);border-top:4px solid var(--aqua-primary);">
                        <div style="font-size:0.75rem;font-weight:700;color:var(--aqua-primary);text-transform:uppercase;letter-spacing:0.5px;">Etapa I — finanțare POIM</div>
                        <div style="font-size:1.4rem;font-weight:800;color:var(--aqua-dark);margin:0.35rem 0;">49.352.138 euro</div>
                        <div style="font-size:0.82rem;color:#6c757d;">fără TVA · 49,53% din valoarea totală eligibilă a proiectului</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-4" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);border-top:4px solid var(--aqua-accent);">
                        <div style="font-size:0.75rem;font-weight:700;color:var(--aqua-accent);text-transform:uppercase;letter-spacing:0.5px;">Etapa a II-a — finanțare PODD</div>
                        <div style="font-size:1.4rem;font-weight:800;color:var(--aqua-dark);margin:0.35rem 0;">155.495.111 euro</div>
                        <div style="font-size:0.82rem;color:#6c757d;">fără TVA</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- OBIECTIVUL GENERAL --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Obiectivul general al proiectului</h2>
            <div class="pdd-card-lg" style="background:#fff;border-radius:16px;padding:2rem;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);border-left:5px solid var(--aqua-primary);">
                <p style="color:#4a4a4a;font-size:0.925rem;line-height:1.9;margin:0 0 1rem;">
                    Proiectul Regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea reprezintă o nouă
                    etapă semnificativă în cadrul extinderii și modernizării infrastructurii de alimentare cu apă și de colectare
                    și evacuare a apelor uzate din aria de operare a Operatorului Regional Aquaserv S.A. Tulcea, continuând
                    procesul investițional derulat în perioada 2007-2013 prin POS Mediu.
                </p>
                <p style="color:#4a4a4a;font-size:0.925rem;line-height:1.9;margin:0;">
                    Obiectivul general al Proiectului constă în creșterea nivelului de colectare și epurare a apelor uzate urbane
                    și a gradului de asigurare a alimentării cu apă potabilă a populației deservite de Operatorul Regional
                    S.C. Aquaserv S.A. Tulcea în aria de Proiect prin înființarea unor sisteme de alimentare cu apă și canalizare,
                    îmbunătățirea calității serviciilor existente, reducerea impactului negativ al descărcărilor de apă uzată și
                    protejarea mediului.
                </p>
            </div>
        </div>

        {{-- INDICATORI FIZICI --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Indicatorii fizici din cererea de finanțare</h2>
            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);">
                <div class="px-4 py-3" style="background:linear-gradient(90deg,#002756,#3d8f87);">
                    <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                        <i class="bi bi-bar-chart-fill me-2"></i>Indicatori care vor fi realizați prin Proiect
                    </h5>
                </div>
                <div class="p-4">
                    <div class="row g-3">
                        @php $indicatoriFizici = [
                            ['Populație suplimentară — alimentare cu apă îmbunătățită', '38.564 persoane'],
                            ['Populație suplimentară — tratare îmbunătățită a apelor uzate', '60.144 loc. echiv.'],
                            ['Rețea de distribuție apă potabilă nouă și reabilitată', '210,79 km'],
                            ['Aducțiune nouă și reabilitată', '62,50 km'],
                            ['Rețea de canalizare nouă și reabilitată', '127,28 km'],
                            ['Stații de epurare ape uzate', '9 buc'],
                            ['Stații de tratare apă', '13 buc'],
                        ]; @endphp
                        @foreach($indicatoriFizici as $ind)
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center py-2 px-3" style="background:var(--aqua-bg);border-radius:8px;">
                                <span style="font-size:0.82rem;color:#4a4a4a;">{{ $ind[0] }}</span>
                                <strong style="font-size:0.85rem;color:var(--aqua-primary);white-space:nowrap;margin-left:0.75rem;">{{ $ind[1] }}</strong>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- CONTRIBUTIE POIM / PODD --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Contribuția proiectului la obiectivele POIM și PODD</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="h-100 d-flex align-items-center gap-3 p-4" style="background:var(--aqua-bg);border-radius:16px;">
                        <div style="width:48px;height:48px;background:var(--aqua-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="bi bi-droplet-fill text-white" style="font-size:1.2rem;"></i>
                        </div>
                        <div>
                            <div style="font-weight:800;color:var(--aqua-dark);font-size:1.1rem;">35.261 locuitori</div>
                            <div style="font-size:0.82rem;color:#6c757d;">populație suplimentară care va beneficia de o mai bună alimentare cu apă</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 d-flex align-items-center gap-3 p-4" style="background:var(--aqua-bg);border-radius:16px;">
                        <div style="width:48px;height:48px;background:var(--aqua-accent);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="bi bi-recycle text-white" style="font-size:1.2rem;"></i>
                        </div>
                        <div>
                            <div style="font-weight:800;color:var(--aqua-dark);font-size:1.1rem;">52.972 locuitori</div>
                            <div style="font-size:0.82rem;color:#6c757d;">populație suplimentară care va beneficia de o mai bună epurare a apelor uzate</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- LOCALITATI + ACHIZITII --}}
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);height:100%;">
                    <div class="px-4 py-3" style="background:linear-gradient(90deg,#002756,#3d8f87);">
                        <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                            <i class="bi bi-geo-alt-fill me-2"></i>Unități administrativ-teritoriale vizate
                        </h5>
                    </div>
                    <div class="p-4">
                        <p style="font-size:0.85rem;color:#4a4a4a;line-height:1.9;margin:0;">
                            Tulcea, Babadag, Isaccea, Măcin, Sulina, Carcaliu, C.A. Rosetti, Chilia Veche, Ceatalchioi, Crișan,
                            Maliuc, Mahmudia, Pardina, Văcăreni.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);height:100%;">
                    <div class="px-4 py-3" style="background:linear-gradient(90deg,#3d8f87,#76b1a8);">
                        <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                            <i class="bi bi-gear-fill me-2"></i>Achiziții de echipamente de operare
                        </h5>
                    </div>
                    <div class="p-4">
                        <ul style="margin:0;padding-left:1.1rem;">
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Extindere sistem SCADA regional</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Utilaje de curățare a sistemelor de canalizare</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Utilaje de transport și echipamente de intervenție</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Echipamente pentru detecție pierderi de apă și inspecții video</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Mașini și barje transport nămol de la stațiile de epurare</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- BENEFICIILE PROIECTULUI --}}
        <div class="mb-4">
            <h2 class="section-title mb-4">Beneficiile proiectului</h2>
            <div class="pdd-card-lg" style="background:#fff;border-radius:16px;padding:2rem;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);">
                <ul class="pdd-lista-contract">
                    @php $beneficii = [
                        'Îmbunătățirea calității vieții populației din județul Tulcea prin asigurarea accesului în condiții de siguranță la serviciile de tratare și furnizare a apei potabile',
                        'Creșterea ratei de conectare la serviciile de furnizare a apei și de colectare a apelor uzate',
                        'Dezvoltarea socio-economică a zonei prin asigurarea accesului la sistemul de apă și canalizare',
                        'Îmbunătățirea calității apelor de suprafață și implicit reducerea și prevenirea poluării solului și a corpurilor de apă din zona de proiect',
                        'Îmbunătățirea echipamentelor folosite în stațiile de tratare a apei în vederea creșterii calității apei potabile la standarde naționale',
                        'Îmbunătățirea funcțională a sistemelor existente de canalizare prin reducerea efectelor negative asupra mediului',
                        'Îmbunătățirea rețelelor de distribuție a apei prin înlocuirea conductelor vechi în vederea reducerii pierderilor și întreruperilor în serviciul de furnizare a apei',
                        'Crearea de locuri de muncă permanente în cadrul beneficiarului și operatorului sistemului de alimentare cu apă și canalizare, și locuri de muncă temporare pe durata implementării proiectului',
                        'Economii de costuri de resurse pentru clienți, care nu mai trebuie să se bazeze pe fântâni, pompe și puțuri private, fose septice și nu mai trebuie să cumpere apă îmbuteliată',
                        'Înființarea de noi stații de tratare a apei și dotarea cu rețele de transport și distribuție pentru comunitățile care nu beneficiază de apă potabilă',
                        'Reabilitarea stațiilor existente de tratare a apei în vederea creșterii calității apei potabile furnizate',
                    ]; @endphp
                    @foreach($beneficii as $b)
                        <li><i class="bi bi-check-circle-fill"></i><span>{{ $b }}</span></li>
                    @endforeach
                </ul>
                <div class="mt-3 p-3" style="background:var(--aqua-bg);border-radius:10px;">
                    <span style="font-size:0.85rem;color:var(--aqua-dark);font-weight:700;">
                        Investițiile Proiectului Major sunt grupate în 18 contracte de lucrări, 2 contracte de furnizare și 2 contracte de servicii.
                    </span>
                    <a href="{{ route('poim.contracte') }}" class="btn btn-aqua btn-sm ms-2">Vezi toate contractele</a>
                </div>
            </div>
        </div>

    </div>
</section>

@push('styles')
<style>
    .pdd-lista-contract { list-style:none; margin:0 0 0.5rem; padding:0; }
    .pdd-lista-contract li { display:flex; align-items:flex-start; gap:0.65rem; margin-bottom:0.65rem; }
    .pdd-lista-contract li i { color:var(--aqua-primary); font-size:0.95rem; margin-top:0.3rem; flex-shrink:0; }
    .pdd-lista-contract li span { flex:1; }
    @media (max-width: 575.98px) {
        .pdd-card-lg { padding: 1.25rem !important; }
        .section-title { font-size: 1.2rem; margin-bottom: 1rem !important; }
        .mb-5 { margin-bottom: 2rem !important; }
        .pdd-valoare-totala { padding: 1.5rem !important; }
        .pdd-valoare-procente { width: 100%; }
        .pdd-valoare-procente > div { flex: 1 1 calc(50% - 0.5rem); padding: 0.6rem 0.5rem !important; }
    }
</style>
@endpush
@endsection
