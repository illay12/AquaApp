@extends('layouts.pddtj')

@section('title', 'Despre PDDTJ')

@section('page_hero')
    <h1><i class="bi bi-info-circle me-2"></i>Despre PDDTJ</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('pddtj.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Despre PDDTJ</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        <div class="pdd-contract-body" style="font-size:1rem;color:#3f3f3f;line-height:1.85;">

            <p>
                Prin prezentul „Proiect regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea, în perioada 2021-2027”, se propune a se continua conformarea sectorului de apă-apă uzată în cadrul Programului Dezvoltare Durabilă și Tranziție Justă, <strong>RSO2.5_Promovarea accesului la apă și a gestionării durabile a apelor</strong>.
            </p>

            <p>
                Prioritățile de Dezvoltare Durabilă și Tranziție Justă 2021-2027 (<strong>PDDTJ</strong>) este un program multifond, cofinanțat atât din FEDR cât și din FC, fiind aprobat de Comisia Europeană prin <strong>Decizia nr. C(2022) 8703/24.11.2022</strong> și implementat de Ministerul Investițiilor și Proiectelor Europene prin Autoritatea de Management pentru Programul Dezvoltare Durabilă și Tranziție Justă.
            </p>

            <p>Investițiile propuse trebuie să se încadreze, după cum urmează, în obiectivul de politică, obiectivul specific și domeniul de aplicare a fondurilor:</p>

            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);margin:1.5rem 0 2rem;">
                <div class="px-4 py-3" style="background:linear-gradient(90deg,#002756,#3d8f87);">
                    <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                        Prioritatea 1. Dezvoltarea infrastructurii de apă și apă uzată și tranziția la o economie circulară
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-stack-sm mb-0" style="font-size:0.875rem;">
                        <tbody>
                            <tr>
                                <td class="px-4 py-3 fw-bold" style="width:220px;color:var(--aqua-dark);background:#eef2f1;">Obiectivul de politică</td>
                                <td class="px-4 py-3">
                                    <strong style="color:var(--aqua-primary);">OP 2</strong> - O Europa mai verde, rezilientă, cu emisii reduse de dioxid de carbon, care trece la o economie cu zero emisii de dioxid de carbon, prin promovarea tranziției către o energie curată și echitabilă, a investițiilor verzi și albastre, a economiei circulare, a atenuării schimbărilor climatice și a adaptării la acestea, a prevenirii și gestionării riscurilor, precum și a unei mobilități urbane sustenabile
                                </td>
                            </tr>
                            <tr style="background:#f8fafc;">
                                <td class="px-4 py-3 fw-bold" style="color:var(--aqua-dark);background:#eef2f1;">Obiectivul specific</td>
                                <td class="px-4 py-3"><strong style="color:var(--aqua-primary);">RSO2.5</strong>_Promovarea accesului la apă și a gestionării durabile a apelor</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 fw-bold" style="color:var(--aqua-dark);background:#eef2f1;">Fondurile asociate</td>
                                <td class="px-4 py-3">Fondul European de Dezvoltare Regională (FEDR) și Fondul de Coeziune (FC)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <p>Investițiile cuprinse în acest proiect au ca obiectiv principal continuarea conformării cu:</p>

            <ul class="pdd-lista-contract">
                <li><i class="bi bi-check-circle-fill"></i><span><strong>Directiva (UE) 98/83/CE</strong> privind calitatea apei destinate consumului uman (DAP)</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span><strong>Directiva (UE) 2184/2020</strong> privind calitatea apei destinate consumului uman (reformare) (DAP)</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span><strong>Directiva (UE) 91/271/CEE</strong> privind tratarea apelor urbane reziduale (DEAUU)</span></li>
            </ul>

            <p class="mt-3">
                De asemenea, se are în vedere inclusiv conservarea resurselor de apă prin îmbunătățirea soluțiilor de tratare, reducerea pierderilor tehnologice legate de procesul de tratare și reducerea pierderilor de pe rețelele de transport și distribuție prin optimizarea acestora, conectarea populației la sisteme de alimentare cu apă conforme, precum și asigurarea de sisteme de colectare și epurare a apelor uzate din aglomerările cu mai mult de <strong>2.000 l.e.</strong>, prioritizarea aglomerărilor cu populație echivalentă mai mare de <strong>10.000 l.e.</strong>
            </p>

            <h3 style="font-family:'Roboto',sans-serif;font-size:1.05rem;font-weight:700;color:var(--aqua-dark);border-left:3px solid var(--aqua-accent);padding-left:0.75rem;margin:2rem 0 1rem;">Activitățile principale ale proiectului</h3>

            <p>Operațiunile dezvoltate în cadrul Proiectului se referă la următoarele activități principale:</p>

            <ul class="pdd-lista-contract">
                <li><i class="bi bi-check-circle-fill"></i><span>Extinderea/reabilitarea surselor de apă în vederea potabilizării</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span>Extinderea/reabilitarea stațiilor de tratare a apei potabile</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span>Extinderea/reabilitarea rezervoarelor de apă</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span>Extinderea/reabilitarea rețelelor de distribuție a apei potabile și a sistemelor de canalizare</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span>Realizarea managementului adecvat de tratare/eliminare a nămolului rezultat din stațiile de tratare/epurare a apei</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span>Contorizare, echipamente/vehicule necesare exploatării sistemelor de apă-apă uzată etc.</span></li>
                <li><i class="bi bi-check-circle-fill"></i><span>Servicii de asistență tehnică pentru managementul proiectului și publicitate, asistență tehnică pentru supervizarea execuției lucrărilor, servicii pentru auditul anual al proiectului</span></li>
            </ul>

            <div class="mt-4 p-3" style="background:#d1fae5;border-radius:10px;font-size:0.88rem;color:#065f46;border-left:4px solid #10b981;">
                <i class="bi bi-check-circle-fill me-1"></i>
                <strong>Contractul de lucrări CL-5</strong> este semnat, în derulare.
                <a href="{{ route('pddtj.contract-detaliu', 'cl-5') }}" style="color:#065f46;text-decoration:underline;font-weight:700;">Detalii contract</a>
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
    .pdd-contract-body strong { color:var(--aqua-dark); font-weight:700; }
    @media (max-width: 575.98px) {
        .table-stack-sm thead { display: none; }
        .table-stack-sm, .table-stack-sm tbody, .table-stack-sm tr, .table-stack-sm td {
            display: block;
            width: 100%;
        }
        .table-stack-sm tr {
            margin-bottom: 0.6rem;
            border: 1px solid var(--aqua-border);
            border-radius: 10px;
            overflow: hidden;
        }
        .table-stack-sm tr:last-child { margin-bottom: 0; }
        .table-stack-sm td {
            border: none !important;
            border-bottom: 1px solid #f1f5f9 !important;
        }
        .table-stack-sm td:last-child { border-bottom: none !important; }
    }
</style>
@endpush
@endsection
