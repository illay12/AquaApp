@extends('layouts.pddtj')

@section('title', 'Contracte')

@section('page_hero')
    <h1><i class="bi bi-file-earmark-check me-2"></i>Contracte</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('pddtj.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Contracte</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        @php
            $lucrari = [
                [
                    'cod' => 'CL-1',
                    'titlu' => 'Reabilitarea captărilor din Tulcea și Mahmudia',
                    'valoare' => '30.953.720,62 lei fără TVA',
                    'contractor' => 'S.C. CORAL S.R.L. Tulcea',
                    'data' => '15.12.2023',
                    'durata' => '610 zile (183 zile proiectare + 427 zile execuție)',
                    'obiectiv' => 'Proiectare și execuție de lucrări de reabilitare a captărilor de apă brută în Tulcea și Mahmudia.',
                    'grupe' => [
                        ['titlu' => null, 'items' => [
                            'Reabilitare captare Milă 42+500',
                            'Reparații sisteme hidraulice și instalare semnalizare luminoasă',
                            'Reabilitare 4 camere de vane pe aspirație',
                            'Modernizare stație pompare (clădire, pompe, instalații electro-hidraulice, generator)',
                            'Reabilitare 11 cămine pe conductă aducțiune',
                            'Reparații drum acces (3,9 km)',
                            'Integrare SCADA',
                            'Reabilitări la captări Mahmudia',
                        ]],
                    ],
                    'status' => 'Semnat · în implementare',
                ],
                [
                    'cod' => 'CL-4',
                    'titlu' => 'Extinderea și reabilitarea captărilor, stațiilor de tratare și complexelor de înmagazinare – pompare din Carcaliu și Babadag',
                    'valoare' => '37.983.376,20 lei fără TVA',
                    'contractor' => 'S.C. CORAL S.R.L. Tulcea',
                    'data' => '31.01.2024',
                    'durata' => '610 zile (180 zile proiectare + 430 zile execuție)',
                    'obiectiv' => 'Modernizarea și extinderea infrastructurii de captare, tratare și stocare a apei în Carcaliu și Babadag.',
                    'grupe' => [
                        ['titlu' => 'Carcaliu', 'items' => [
                            '1 foraj nou, reabilitare 2 foraje existente',
                            'Rezervor nou de înmagazinare',
                            'Laborator apă potabilă',
                            'Clădire administrativă cu dispecerat SCADA',
                        ]],
                        ['titlu' => 'Babadag', 'items' => [
                            'Reabilitare 10 foraje',
                            '5 complexe de înmagazinare-pompare (Zahăr, Carierei, Cabanei, Pădure, Ferme)',
                            'Sisteme de monitorizare CCTV și dezinfecție',
                            'Generatoare electrice de urgență',
                        ]],
                    ],
                    'status' => 'Semnat · în implementare',
                ],
                [
                    'cod' => 'CL-8',
                    'titlu' => 'Stație nouă de epurare în localitatea Chilia Veche. Extindere (completare) stație de epurare în Sulina',
                    'valoare' => '17.694.733,16 lei fără TVA',
                    'contractor' => 'Asocierea S.C. NESS PROIECT EUROPE S.R.L. (lider) – S.C. I.G.U.T S.R.L. (asociat)',
                    'data' => '23.05.2023',
                    'durata' => '17 luni (6 luni proiectare + 11 luni execuție) de la ordinul administrativ de începere',
                    'obiectiv' => 'Extinderea și modernizarea infrastructurii publice de alimentare cu apă și canalizare, pentru creșterea gradului de acces al populației la servicii de calitate și protecția mediului.',
                    'grupe' => [
                        ['titlu' => 'Stație nouă Chilia Veche', 'items' => [
                            'Stație automată de recepție a vidanjelor',
                            'Treaptă de epurare mecano-biologică cu procesare nămol pe paturi de stuf',
                            'Laborator ape uzate',
                            'Centru local de comandă SCADA',
                            'Foraje de observație, conductă nouă de evacuare efluent',
                            'Generator electric de rezervă și panouri fotovoltaice',
                        ]],
                        ['titlu' => 'Extindere stație existentă Sulina', 'items' => [
                            'Stație automată de recepție, punct de monitorizare calitate influent',
                            'Sistem de dezinfecție și monitorizare debit efluent',
                            'Modernizare laborator ape uzate, foraje de observație',
                            'Sistem local SCADA, platforme depozitare nămol deshidratat',
                            'Panouri fotovoltaice',
                        ]],
                    ],
                    'status' => 'Semnat · în implementare',
                ],
                [
                    'cod' => 'CL-10',
                    'titlu' => 'Extinderea și reabilitarea sistemului de alimentare cu apă și a sistemului de colectare a apelor uzate menajere din Tulcea (zona centrală)',
                    'valoare' => '60.935.705,84 lei fără TVA',
                    'contractor' => 'Asocierea S.C. NESS PROIECT EUROPE S.R.L. (lider) – CONSORZIO STABILE EBG GROUP (asociat)',
                    'data' => '09.11.2022',
                    'durata' => '20 de luni de la data ordinului administrativ privind începerea lucrărilor',
                    'obiectiv' => 'Reabilitarea și extinderea infrastructurii de apă și canalizare în Municipiul Tulcea, cu focus pe îmbunătățirea serviciilor și protecția mediului.',
                    'grupe' => [
                        ['titlu' => null, 'items' => [
                            'Înlocuire rețea de distribuție apă: 37 străzi (9.784 m)',
                            'Extindere rețea apă: 3 străzi (317 m)',
                            'Instalare 14 puncte de monitorizare și 5 vane de presiune',
                            'Stație nouă de pompare apă potabilă',
                            'Înlocuire rețea canalizare: 34 străzi (11.204 m)',
                            'Extindere canalizare: 5 străzi (515 m)',
                            'Stație nouă de pompare apă uzată și reabilitarea a 4 stații existente',
                            'Integrare SCADA pentru 24 stații',
                        ]],
                    ],
                    'status' => 'Autorizație de construire emisă (22.06.2023) · în implementare',
                ],
                [
                    'cod' => 'CL5',
                    'titlu' => 'TL-CL-05: Extinderea și reabilitarea captărilor de apă, stațiilor de tratare și rezervoarelor de înmagazinare în Sulina, Crișan și Mila 23',
                    'valoare' => '39.900.000 lei fără TVA',
                    'contractor' => 'Asocierea S.C. DINAMIC CONSTRUCT S.R.L. (lider ofertant) – S.C. GAZ CONTROL S.R.L. (ofertant), cu ALLPLAN PROIECT (subcontractant) și ARCIF AG, S.C. ARCON AG (terți susținători)',
                    'data' => '16.07.2026',
                    'durata' => '24 luni de la ordinul administrativ de începere, din care 6 luni proiectare',
                    'obiectiv' => 'Extinderea și reabilitarea surselor de apă, stațiilor de tratare și rezervoarelor de înmagazinare din Sulina, Crișan și Mila 23.',
                    'grupe' => [
                        ['titlu' => 'Obiect 1 — Sistem de alimentare cu apă Sulina', 'items' => [
                            'Reabilitare sursă existentă și zonă de protecție sanitară Sulina',
                            'Dotări stație pompare apă brută existentă (în incinta GA Sulina)',
                            'Reabilitare stație de tratare (Qic = 18 l/s)',
                            'Extindere rezervoare de înmagazinare / reabilitare filtre lente (V = 4 × 240 mc)',
                        ]],
                        ['titlu' => 'Obiect 2 — Sistem de alimentare cu apă Crișan', 'items' => [
                            'Reabilitare captare cu crib și zonă de protecție sanitară Crișan',
                            'Reabilitare conductă de aducțiune apă brută',
                            'Stație de pompare apă brută nouă (în incinta GA Crișan)',
                            'Stație de tratare nouă (Qic = 8 l/s), rezervor nou (V = 450 mc)',
                            'Stație de pompare nouă pentru distribuție',
                        ]],
                        ['titlu' => 'Obiect 3 — Sistem de alimentare cu apă Mila 23', 'items' => [
                            'Reabilitare captare cu crib și zonă de protecție sanitară Mila 23',
                            'Realizare ponton de acostare',
                            'Reabilitare conductă de aducțiune și stație de pompare apă brută',
                            'Reabilitare stație de tratare (Qic = 6 l/s)',
                            'Rezervoare de înmagazinare noi (V = 2 × 250 mc) și stație de pompare nouă pentru distribuție',
                        ]],
                    ],
                    'status' => 'Semnat · detalii suplimentare în curs de actualizare',
                    'nou' => true,
                ],
            ];

            $servicii = [
                [
                    'cod' => 'CS-1',
                    'titlu' => 'Asistență tehnică și supervizare, inclusiv publicitate',
                    'valoare' => '22.743.012,68 lei fără TVA',
                    'contractor' => 'Asocierea TADECO CONSULTING – Resourcing Environmental Consulting – Romanian Soft Company',
                    'data' => '09.11.2022',
                    'durata' => '62 de luni de la ordinul administrativ de începere',
                    'obiectiv' => 'Servicii de management și suport pentru Unitatea de Implementare a Proiectului și Aquaserv S.A. Tulcea, pentru implementarea cu succes a proiectului regional, cu respectarea termenelor și bugetelor aprobate.',
                    'grupe' => [],
                    'status' => 'Semnat · în implementare',
                ],
                [
                    'cod' => 'CS-2',
                    'titlu' => 'Servicii de audit financiar',
                    'valoare' => '1.177.200 lei plus TVA',
                    'contractor' => null,
                    'data' => '19.07.2023',
                    'durata' => '59 de luni de la emiterea Ordinului de Începere',
                    'obiectiv' => 'Auditarea cheltuielilor proiectului, inclusiv întocmirea de rapoarte trimestriale și anuale privind Proiectul Regional.',
                    'grupe' => [],
                    'status' => 'Semnat · în implementare',
                ],
            ];

            $furnizare = [
                [
                    'cod' => 'CF-2',
                    'titlu' => 'Furnizare echipament naval pentru operarea infrastructurii de apă și apă uzată – Lot 2 – Echipament naval bărci',
                    'valoare' => '484.229,67 lei plus TVA',
                    'contractor' => 'S.C. PAGREIMA S.R.L.',
                    'data' => '28.11.2023',
                    'durata' => '6 luni de la emiterea Ordinului de Începere',
                    'obiectiv' => 'Furnizarea echipamentelor operaționale: o barcă pentru transport persoane (inclusiv peridoc) și o barcă pentru transport materiale.',
                    'grupe' => [],
                    'status' => 'Finalizat (18.12.2023)',
                ],
            ];

        @endphp

        {{-- LUCRARI --}}
        <div class="mb-5" id="lucrari">
            <h2 class="section-title mb-4">Contracte de lucrări</h2>
            <div class="accordion" id="accordionCL">
                @foreach($lucrari as $c)
                    @php($id = 'cl-'.strtolower(str_replace([' ', '.'], '', $c['cod'])))
                    <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(61, 143, 135,0.09);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $id }}"
                                    style="background:#eef2f1;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                                <span style="background:{{ !empty($c['nou']) ? 'var(--aqua-accent)' : 'var(--aqua-primary)' }};color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;white-space:nowrap;">{{ $c['cod'] }}</span>
                                {{ $c['titlu'] }}
                                @if(!empty($c['nou']))
                                    <span class="badge-aqua ms-2" style="background:var(--aqua-cta);">nou</span>
                                @endif
                            </button>
                        </h2>
                        <div id="{{ $id }}" class="accordion-collapse collapse" data-bs-parent="#accordionCL">
                            <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#4a4a4a;line-height:1.8;">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4"><div style="background:#eef2f1;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare contract</div><div style="font-weight:700;color:var(--aqua-dark);">{{ $c['valoare'] }}</div></div></div>
                                    <div class="col-md-4"><div style="background:#eef2f1;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Data semnării</div><div style="font-weight:700;color:var(--aqua-dark);">{{ $c['data'] }}</div></div></div>
                                    <div class="col-md-4"><div style="background:#e3efed;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Durată de execuție</div><div style="font-weight:700;color:var(--aqua-primary);">{{ $c['durata'] }}</div></div></div>
                                </div>
                                @if($c['contractor'])
                                <p><strong>Antreprenor:</strong> {{ $c['contractor'] }}</p>
                                @endif
                                <p><strong>Obiectiv:</strong> {{ $c['obiectiv'] }}</p>
                                @foreach($c['grupe'] as $grupa)
                                    @if($grupa['titlu'])
                                        <p class="mb-2 mt-3"><strong>{{ $grupa['titlu'] }}:</strong></p>
                                    @else
                                        <p class="mb-2"><strong>Obiecte principale:</strong></p>
                                    @endif
                                    <ul style="margin:0;padding-left:1.25rem;">
                                        @foreach($grupa['items'] as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @endforeach
                                <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                    <i class="bi bi-check-circle-fill me-1"></i> <strong>{{ $c['status'] }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- SERVICII --}}
        <div class="mb-5" id="servicii">
            <h2 class="section-title mb-4">Contracte de servicii</h2>
            <div class="accordion" id="accordionCS">
                @foreach($servicii as $c)
                    @php($id = 'cs-'.strtolower(str_replace([' ', '.'], '', $c['cod'])))
                    <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(61, 143, 135,0.09);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $id }}"
                                    style="background:#eef2f1;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                                <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;white-space:nowrap;">{{ $c['cod'] }}</span>
                                {{ $c['titlu'] }}
                            </button>
                        </h2>
                        <div id="{{ $id }}" class="accordion-collapse collapse" data-bs-parent="#accordionCS">
                            <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#4a4a4a;line-height:1.8;">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4"><div style="background:#eef2f1;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare contract</div><div style="font-weight:700;color:var(--aqua-dark);">{{ $c['valoare'] }}</div></div></div>
                                    <div class="col-md-4"><div style="background:#eef2f1;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Data semnării</div><div style="font-weight:700;color:var(--aqua-dark);">{{ $c['data'] }}</div></div></div>
                                    <div class="col-md-4"><div style="background:#e3efed;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Durată de execuție</div><div style="font-weight:700;color:var(--aqua-primary);">{{ $c['durata'] }}</div></div></div>
                                </div>
                                @if($c['contractor'])
                                <p><strong>Prestator:</strong> {{ $c['contractor'] }}</p>
                                @endif
                                <p class="mb-0"><strong>Obiectiv:</strong> {{ $c['obiectiv'] }}</p>
                                <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                    <i class="bi bi-check-circle-fill me-1"></i> <strong>{{ $c['status'] }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- FURNIZARE --}}
        <div class="mb-2" id="furnizare">
            <h2 class="section-title mb-4">Contracte de furnizare</h2>
            <div class="accordion" id="accordionCF">
                @foreach($furnizare as $c)
                    @php($id = 'cf-'.strtolower(str_replace([' ', '.'], '', $c['cod'])))
                    <div class="accordion-item mb-3" style="border-radius:12px!important;overflow:hidden;border:none;box-shadow:0 2px 16px rgba(61, 143, 135,0.09);">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $id }}"
                                    style="background:#eef2f1;color:var(--aqua-dark);font-size:0.9rem;border-radius:12px!important;">
                                <span style="background:var(--aqua-primary);color:#fff;border-radius:8px;padding:2px 10px;font-size:0.78rem;margin-right:12px;font-weight:800;white-space:nowrap;">{{ $c['cod'] }}</span>
                                {{ $c['titlu'] }}
                            </button>
                        </h2>
                        <div id="{{ $id }}" class="accordion-collapse collapse" data-bs-parent="#accordionCF">
                            <div class="accordion-body" style="background:#fff;font-size:0.875rem;color:#4a4a4a;line-height:1.8;">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4"><div style="background:#eef2f1;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare contract</div><div style="font-weight:700;color:var(--aqua-dark);">{{ $c['valoare'] }}</div></div></div>
                                    <div class="col-md-4"><div style="background:#eef2f1;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Data semnării</div><div style="font-weight:700;color:var(--aqua-dark);">{{ $c['data'] }}</div></div></div>
                                    <div class="col-md-4"><div style="background:#e3efed;border-radius:10px;padding:0.75rem 1rem;"><div style="font-size:0.7rem;font-weight:700;color:#64748b;text-transform:uppercase;">Durată de execuție</div><div style="font-weight:700;color:var(--aqua-primary);">{{ $c['durata'] }}</div></div></div>
                                </div>
                                @if($c['contractor'])
                                <p><strong>Furnizor:</strong> {{ $c['contractor'] }}</p>
                                @endif
                                <p class="mb-0"><strong>Obiectiv:</strong> {{ $c['obiectiv'] }}</p>
                                <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.8rem;color:#065f46;">
                                    <i class="bi bi-check-circle-fill me-1"></i> <strong>{{ $c['status'] }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection
