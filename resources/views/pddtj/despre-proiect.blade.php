@extends('layouts.pddtj')

@section('title', 'Despre proiect')

@section('page_hero')
    <h1><i class="bi bi-file-earmark-text me-2"></i> Despre proiect</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('pddtj.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Despre proiect</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        {{-- VALOARE TOTALA --}}
        <div class="mb-5">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-4 pdd-valoare-totala" style="background:linear-gradient(135deg,#002756,#3d8f87,#76b1a8);border-radius:16px;padding:2rem;">
                <div>
                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.5px;font-weight:700;margin-bottom:0.4rem;">Valoarea totală a investiției</div>
                    <div style="font-size:2rem;font-weight:800;color:#fff;line-height:1.15;">810.748.282,98 lei</div>
                </div>
                <div class="d-flex flex-wrap gap-2 pdd-valoare-procente">
                    <div class="text-center" style="background:rgba(255,255,255,0.12);border-radius:12px;padding:0.75rem 1.25rem;">
                        <div style="font-size:1.15rem;font-weight:800;color:#fff;line-height:1.2;">79,9%</div>
                        <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:2px;white-space:nowrap;">FEDR</div>
                    </div>
                    <div class="text-center" style="background:rgba(255,255,255,0.12);border-radius:12px;padding:0.75rem 1.25rem;">
                        <div style="font-size:1.15rem;font-weight:800;color:#fff;line-height:1.2;">12,2%</div>
                        <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:2px;white-space:nowrap;">Buget de stat</div>
                    </div>
                    <div class="text-center" style="background:rgba(255,255,255,0.12);border-radius:12px;padding:0.75rem 1.25rem;">
                        <div style="font-size:1.15rem;font-weight:800;color:#fff;line-height:1.2;">1,9%</div>
                        <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:2px;white-space:nowrap;">Buget local</div>
                    </div>
                    <div class="text-center" style="background:rgba(255,255,255,0.12);border-radius:12px;padding:0.75rem 1.25rem;">
                        <div style="font-size:1.15rem;font-weight:800;color:#fff;line-height:1.2;">6,0%</div>
                        <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);margin-top:2px;white-space:nowrap;">Cofinanțare beneficiar</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- STRUCTURA FINANTARII --}}
        <div class="mb-5">
            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);">
                <div class="table-responsive">
                    <table class="table table-bordered table-stack-sm mb-0" style="font-size:0.875rem;">
                        <thead>
                            <tr>
                                <th class="text-white fw-bold py-3 px-4" style="width:60%;background:linear-gradient(90deg,#002756,#3d8f87);">Sursă de finanțare</th>
                                <th class="text-white fw-bold py-3 px-4 text-end" style="background:#3d8f87;">Valoare (lei)</th>
                                <th class="text-white fw-bold py-3 px-4 text-center" style="white-space:nowrap;background:#3d8f87;">Pondere</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background:#e3efed;">
                                <td class="px-4 py-2">FEDR</td>
                                <td class="px-4 py-2 text-end fw-bold" data-label="Valoare (lei)" style="color:#2a6d66;">647.787.878,10</td>
                                <td class="px-4 py-2 text-center fw-bold" data-label="Pondere" style="color:#2a6d66;">79,9%</td>
                            </tr>
                            <tr style="background:#f8fafc;">
                                <td class="px-4 py-2">Bugetul de stat</td>
                                <td class="px-4 py-2 text-end" data-label="Valoare (lei)">99.073.440,18</td>
                                <td class="px-4 py-2 text-center" data-label="Pondere">12,2%</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Bugetul local</td>
                                <td class="px-4 py-2 text-end" data-label="Valoare (lei)">15.242.067,72</td>
                                <td class="px-4 py-2 text-center" data-label="Pondere">1,9%</td>
                            </tr>
                            <tr style="background:#f8fafc;">
                                <td class="px-4 py-2">Cofinanțarea beneficiarului</td>
                                <td class="px-4 py-2 text-end" data-label="Valoare (lei)">48.644.896,98</td>
                                <td class="px-4 py-2 text-center" data-label="Pondere">6,0%</td>
                            </tr>
                            <tr style="background:#eef2f1;">
                                <td class="px-4 py-2 fw-bold" style="color:var(--aqua-dark);">Valoare totală</td>
                                <td class="px-4 py-2 text-end fw-bold" data-label="Valoare (lei)" style="color:var(--aqua-dark);">810.748.282,98</td>
                                <td class="px-4 py-2 text-center fw-bold" data-label="Pondere" style="color:var(--aqua-dark);">100%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- OBIECTIVUL GENERAL --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Obiectivul general al proiectului</h2>
            <div class="pdd-card-lg" style="background:#fff;border-radius:16px;padding:2rem;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);border-left:5px solid var(--aqua-primary);">
                <p style="color:#4a4a4a;font-size:0.925rem;line-height:1.9;margin:0;">
                    Oferirea unei strategii regionale de dezvoltare a sectorului de apă și apă uzată, astfel încât să fie în
                    concordanță cu obiectivele generale negociate de România în cadrul procesului de aderare și post-aderare,
                    cu angajamentele de tranziție și obiectivele intermediare convenite între Comisia Europeană și Guvernul
                    României pentru implementarea Directivei 91/271/CEE privind colectarea și tratarea apelor uzate urbane și
                    conformarea la Directiva 2184/2020 privind calitatea apei destinate consumului uman, transpusă în legislația
                    românească prin Legea nr. 458/2002 — în vederea îmbunătățirii performanțelor operaționale ale infrastructurii
                    de apă a județului, pentru asigurarea viabilității financiare și operaționale.
                </p>
            </div>
        </div>

        {{-- OBIECTIVE PRINCIPALE: APA + APA UZATA --}}
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);">
                    <div class="px-4 py-3" style="background:linear-gradient(90deg,#002756,#3d8f87);">
                        <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                            <i class="bi bi-droplet-fill me-2"></i>Obiective principale — infrastructura de apă
                        </h5>
                    </div>
                    <div class="p-4">
                        <ul style="list-style:none;padding:0;margin:0;">
                            @php $obiectiveApa = [
                                'Înființarea de sisteme noi de alimentare cu apă',
                                'Asigurarea continuității, calității și siguranței în furnizarea serviciului de alimentare cu apă, prin conectarea la surse și aducțiuni care vor asigura cantitatea și calitatea conform normelor în vigoare',
                                'Extinderea rețelelor de alimentare cu apă în sistemele existente și reabilitarea rețelelor actuale, pentru creșterea gradului de conectare a populației',
                                'Execuția de branșamente la rețelele de distribuție existente în localitățile urbane și rurale, pentru siguranță și conformitate',
                                'Reabilitarea rezervoarelor existente în exploatarea sistemelor',
                                'Construirea, extinderea și modernizarea stațiilor de tratare și dezinfecție, pentru asigurarea calității apei potabile',
                                'Realizarea sistemelor locale SCADA și integrarea lor în sistemul central dispecerat SCADA al Operatorului Regional',
                            ]; @endphp
                            @foreach($obiectiveApa as $i => $ob)
                            <li class="d-flex gap-3 {{ $i < count($obiectiveApa)-1 ? 'mb-3' : '' }}">
                                <div style="width:28px;height:28px;min-width:28px;background:var(--aqua-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                    <i class="bi bi-check text-white" style="font-size:0.85rem;"></i>
                                </div>
                                <span style="font-size:0.85rem;color:#4a4a4a;line-height:1.6;">{{ $ob }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);">
                    <div class="px-4 py-3" style="background:linear-gradient(90deg,#3d8f87,#76b1a8);">
                        <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                            <i class="bi bi-recycle me-2"></i>Obiective principale — infrastructura de apă uzată
                        </h5>
                    </div>
                    <div class="p-4">
                        <ul style="list-style:none;padding:0;margin:0;">
                            @php $obiectiveApaUzata = [
                                'Creșterea gradului de conectare la sistemele de canalizare, prin extinderea rețelelor de canalizare existente',
                                'Înființarea de sisteme de canalizare în aglomerările rurale cu peste 2.000 i.e.',
                                'Extinderea stațiilor de epurare',
                            ]; @endphp
                            @foreach($obiectiveApaUzata as $i => $ob)
                            <li class="d-flex gap-3 {{ $i < count($obiectiveApaUzata)-1 ? 'mb-3' : '' }}">
                                <div style="width:28px;height:28px;min-width:28px;background:var(--aqua-accent);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                    <i class="bi bi-check text-white" style="font-size:0.85rem;"></i>
                                </div>
                                <span style="font-size:0.85rem;color:#4a4a4a;line-height:1.6;">{{ $ob }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- OBIECTIVE SPECIFICE --}}
                <div class="mt-4" style="background:var(--aqua-bg);border-left:4px solid var(--aqua-primary);border-radius:0 10px 10px 0;padding:1.25rem 1.5rem;">
                    <p style="font-size:0.78rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:0.75rem;">Obiective specifice</p>
                    <ul style="margin:0;padding-left:1.1rem;">
                        <li style="font-size:0.82rem;color:#4a4a4a;line-height:1.7;margin-bottom:0.4rem;">Dezvoltarea unor sisteme de apă care să asigure condițiile de calitate conform Directivei 2184/2020 și OUG 7/2023</li>
                        <li style="font-size:0.82rem;color:#4a4a4a;line-height:1.7;margin-bottom:0.4rem;">Asigurarea continuității în furnizarea serviciului de alimentare cu apă</li>
                        <li style="font-size:0.82rem;color:#4a4a4a;line-height:1.7;margin-bottom:0.4rem;">Eliminarea deficiențelor actuale</li>
                        <li style="font-size:0.82rem;color:#4a4a4a;line-height:1.7;margin-bottom:0.4rem;">Creșterea ratei de conectare a consumatorilor la sistemul centralizat de alimentare cu apă</li>
                        <li style="font-size:0.82rem;color:#4a4a4a;line-height:1.7;margin-bottom:0.4rem;">Reducerea pierderilor de apă din sistem prin lucrări de reabilitare</li>
                        <li style="font-size:0.82rem;color:#4a4a4a;line-height:1.7;margin-bottom:0.4rem;">Funcționarea sistemelor cu costuri de exploatare minime</li>
                        <li style="font-size:0.82rem;color:#4a4a4a;line-height:1.7;margin:0;">Asigurarea posibilității de extindere a acestor sisteme în viitor</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- INDICATORI DE MONITORIZARE --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Indicatorii proiectului</h2>

            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);margin-bottom:1.5rem;">
                <div class="px-4 py-3" style="background:linear-gradient(90deg,#002756,#3d8f87);">
                    <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                        <i class="bi bi-bar-chart-fill me-2"></i>Indicatori de realizare
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-stack-sm mb-0" style="font-size:0.82rem;">
                        <thead>
                            <tr style="background:#e3efed;">
                                <th class="px-3 py-2" style="color:var(--aqua-dark);">Cod</th>
                                <th class="px-3 py-2" style="color:var(--aqua-dark);">Indicator</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);white-space:nowrap;">Țintă</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-3 py-2 fw-bold" style="color:var(--aqua-primary);">RCO31</td>
                                <td class="px-3 py-2" data-label="Indicator">Lungimea conductelor noi sau optimizate pentru rețeaua publică de colectare a apelor uzate</td>
                                <td class="px-3 py-2 text-center fw-bold" data-label="Țintă" style="white-space:nowrap;">112.000 km</td>
                            </tr>
                            <tr style="background:#f8fafc;">
                                <td class="px-3 py-2 fw-bold" style="color:var(--aqua-primary);">RCO30</td>
                                <td class="px-3 py-2" data-label="Indicator">Lungimea conductelor noi sau optimizate pentru sistemele de distribuție din rețeaua publică de alimentare cu apă</td>
                                <td class="px-3 py-2 text-center fw-bold" data-label="Țintă" style="white-space:nowrap;">133.000 km</td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2 fw-bold" style="color:var(--aqua-primary);">RCO32</td>
                                <td class="px-3 py-2" data-label="Indicator">Capacități noi sau optimizate pentru tratarea apelor uzate</td>
                                <td class="px-3 py-2 text-center fw-bold" data-label="Țintă" style="white-space:nowrap;">2.645.000 e.l.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);">
                <div class="px-4 py-3" style="background:linear-gradient(90deg,#3d8f87,#76b1a8);">
                    <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                        <i class="bi bi-graph-up-arrow me-2"></i>Indicatori de rezultat
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-stack-sm mb-0" style="font-size:0.82rem;">
                        <thead>
                            <tr style="background:#e3efed;">
                                <th class="px-3 py-2" style="color:var(--aqua-dark);">Cod</th>
                                <th class="px-3 py-2" style="color:var(--aqua-dark);">Indicator</th>
                                <th class="px-3 py-2 text-center" style="color:var(--aqua-dark);white-space:nowrap;">Țintă</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-3 py-2 fw-bold" style="color:var(--aqua-primary);">RCR41</td>
                                <td class="px-3 py-2" data-label="Indicator">Populația racordată la rețele publice îmbunătățite de alimentare cu apă</td>
                                <td class="px-3 py-2 text-center fw-bold" data-label="Țintă" style="white-space:nowrap;">92.504.000 persoane</td>
                            </tr>
                            <tr style="background:#f8fafc;">
                                <td class="px-3 py-2 fw-bold" style="color:var(--aqua-primary);">RCR42</td>
                                <td class="px-3 py-2" data-label="Indicator">Populația racordată cel puțin la instalații publice secundare de tratare a apelor uzate</td>
                                <td class="px-3 py-2 text-center fw-bold" data-label="Țintă" style="white-space:nowrap;">8.187.000 persoane</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- INDICATORI SUPLIMENTARI DE REALIZARE --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Indicatori suplimentari de realizare</h2>
            <div class="pdd-card-lg" style="background:#fff;border-radius:16px;padding:2rem;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);">
                <div class="row g-3 pdd-indicatori-supl">
                    @php $indicatoriSuplimentari = [
                        ['Rezervoare de înmagazinare — noi', '5 buc'],
                        ['Sursă apă subterană — extindere', '1 buc'],
                        ['Rezervoare de înmagazinare — reabilitare', '12 buc'],
                        ['Stații epurare — reabilitare', '2 buc'],
                        ['Stații de clorinare — reabilitare', '5 buc'],
                        ['Stații de tratare — extindere', '2 buc'],
                        ['Stații de pompare apă uzată — reabilitare', '33 buc'],
                        ['Stații epurare — extindere', '4 buc'],
                        ['Stații de pompare apă — noi', '5 buc'],
                        ['Stații de pompare apă uzată — noi', '41 buc'],
                        ['Sursă apă suprafață — reabilitare', '7 buc'],
                        ['Stații de tratare — reabilitare', '4 buc'],
                        ['Sursă apă subterană — reabilitare', '3 buc'],
                        ['Stații de clorinare — noi', '6 buc'],
                        ['Populația care beneficiază de modernizarea stațiilor de epurare', '95.106 loc'],
                    ]; @endphp
                    @foreach($indicatoriSuplimentari as $ind)
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

        {{-- ALTE INVESTITII --}}
        <div class="mb-5">
            <h2 class="section-title mb-4">Alte investiții</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-4 h-100" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);border-top:4px solid var(--aqua-primary);">
                        <h6 style="font-weight:800;color:var(--aqua-dark);margin-bottom:1rem;">
                            <i class="bi bi-gear-fill me-2" style="color:var(--aqua-primary);"></i>Echipamente de operare
                        </h6>
                        <ul style="margin:0;padding-left:1.1rem;">
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Extinderea sistemului SCADA regional</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Utilaje de curățare a sistemului de canalizare</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Utilaje de transport și echipamente de intervenție</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Echipamente pentru detecție pierderi de apă și inspecții video</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Mașini și barje transport nămol</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 h-100" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);border-top:4px solid var(--aqua-accent);">
                        <h6 style="font-weight:800;color:var(--aqua-dark);margin-bottom:1rem;">
                            <i class="bi bi-headset me-2" style="color:var(--aqua-accent);"></i>Servicii suport pentru operator
                        </h6>
                        <ul style="margin:0;padding-left:1.1rem;">
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Asistență tehnică pentru managementul proiectului</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Asistență tehnică pentru supervizarea lucrărilor</li>
                            <li style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">Auditul proiectului</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- DURATA + SEMNATURA --}}
        <div class="row g-4">
            <div class="col-md-6">
                <div class="h-100 d-flex align-items-center gap-3 p-4" style="background:var(--aqua-bg);border-radius:16px;">
                    <div style="width:48px;height:48px;background:var(--aqua-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="bi bi-calendar-range text-white" style="font-size:1.2rem;"></i>
                    </div>
                    <div>
                        <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.5px;font-weight:700;">Durata proiectului</div>
                        <div style="font-weight:800;color:var(--aqua-dark);font-size:1rem;">86 luni</div>
                        <div style="font-size:0.8rem;color:#6c757d;">Octombrie 2021 – Noiembrie 2028</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-4 text-end" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);">
                    <p style="margin:0;color:#4a4a4a;font-size:0.9rem;">Director General</p>
                    <p style="margin:0;font-weight:800;color:var(--aqua-dark);font-size:0.95rem;">Ing. Ifrim C. Valentin</p>
                </div>
            </div>
        </div>

    </div>
</section>

@push('styles')
<style>
    @media (max-width: 575.98px) {
        .pdd-card-lg { padding: 1.25rem !important; }
        .section-title { font-size: 1.2rem; margin-bottom: 1rem !important; }
        .mb-5 { margin-bottom: 2rem !important; }
        .pdd-card-lg .row.g-2 { --bs-gutter-x: 0.5rem; --bs-gutter-y: 0.5rem; }
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
            padding: 0.5rem 0.85rem !important;
            text-align: left !important;
            white-space: normal !important;
        }
        .table-stack-sm td:last-child { border-bottom: none !important; }
        .table-stack-sm td:first-child {
            font-weight: 700;
            color: var(--aqua-dark);
            font-size: 0.85rem;
            padding-top: 0.6rem !important;
        }
        .table-stack-sm td[data-label]::before {
            content: attr(data-label);
            display: block;
            font-size: 0.64rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 0.15rem;
        }
        .pdd-indicatori-supl .col-md-6 > div { font-size: 0.8rem; padding: 0.6rem 0.75rem !important; }
        .pdd-valoare-totala { padding: 1.5rem !important; }
        .pdd-valoare-procente { width: 100%; }
        .pdd-valoare-procente > div { flex: 1 1 calc(50% - 0.5rem); padding: 0.6rem 0.5rem !important; }
    }
</style>
@endpush
@endsection
