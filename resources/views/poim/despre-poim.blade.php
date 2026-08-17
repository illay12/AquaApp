@extends('layouts.poim')

@section('title', 'Despre POIM')

@section('page_hero')
    <h1><i class="bi bi-info-circle me-2"></i>Despre POIM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('poim.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Despre POIM</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        <div class="pdd-contract-body" style="font-size:1rem;color:#3f3f3f;line-height:1.85;">

            <p>
                <strong>Programul Operațional Infrastructură Mare (POIM)</strong> este al doilea program ca mărime din Uniunea
                Europeană și cel mai complex din România, cu o alocare de aproximativ <strong>12 miliarde de euro</strong> pentru
                sectoarele de transport, mediu și energie. POIM a fost elaborat pentru a răspunde nevoilor de dezvoltare ale
                României identificate în Acordul de Parteneriat 2014-2020 și în acord cu Cadrul Strategic Comun și Documentul de
                Poziție al serviciilor Comisiei Europene.
            </p>

            <p>
                Strategia POIM este orientată spre obiectivele Strategiei Europa 2020, în corelare cu Programul Național pentru
                Reformă și cu Recomandările Specifice de Țară, concentrându-se asupra creșterii durabile prin promovarea unei
                economii bazate pe consum redus de carbon prin măsuri de eficiență energetică și promovare a energiei verzi,
                precum și prin promovarea unor moduri de transport prietenoase cu mediul și o utilizare mai eficientă a
                resurselor. POIM este gestionat de <strong>Ministerul Fondurilor Europene</strong>, în calitate de Autoritate de
                Management.
            </p>

            <p>
                Prioritățile de finanțare stabilite prin POIM contribuie la realizarea obiectivului general al Acordului de
                Parteneriat de a reduce diferențele de dezvoltare economică și socială dintre România și Statele Membre ale UE,
                prin abordarea directă a două dintre cele cinci provocări de dezvoltare identificate la nivel național —
                Infrastructura și Resursele — în cadrul unui singur program având ca obiectiv global:
            </p>

            <div class="mt-3 mb-4 p-3" style="background:var(--aqua-bg);border-left:4px solid var(--aqua-primary);border-radius:0 10px 10px 0;">
                <p class="mb-0" style="font-weight:700;color:var(--aqua-dark);font-size:0.95rem;">
                    Dezvoltarea infrastructurii de transport, mediu, energie și prevenirea riscurilor la standarde europene, în
                    vederea creării premiselor unei creșteri economice sustenabile, în condiții de siguranță și utilizare
                    eficientă a resurselor naturale.
                </p>
            </div>

            <p>
                Programul Operațional Infrastructură Mare 2014-2020 adresează nevoile de dezvoltare din sectoarele infrastructură
                de transport, protecția mediului, managementul riscurilor și adaptarea la schimbările climatice, energie și
                eficiență energetică, finanțând 4 din cele 11 obiective tematice stabilite prin Regulamentul nr. 1303/2013.
            </p>

            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);margin:1.5rem 0 2rem;">
                <div class="px-4 py-3" style="background:linear-gradient(90deg,#002756,#3d8f87);">
                    <h5 class="mb-0 text-white fw-bold" style="font-size:0.95rem;">
                        Obiectivul tematic 6 — Conservarea și protecția mediului și promovarea eficienței utilizării resurselor
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-stack-sm mb-0" style="font-size:0.875rem;">
                        <tbody>
                            <tr>
                                <td class="px-4 py-3 fw-bold" style="width:260px;color:var(--aqua-dark);background:#eef2f1;">Obiectivul specific 3.1</td>
                                <td class="px-4 py-3">Managementul deșeurilor</td>
                            </tr>
                            <tr style="background:#f8fafc;">
                                <td class="px-4 py-3 fw-bold" style="color:var(--aqua-dark);background:#eef2f1;">Obiectivul specific 3.2</td>
                                <td class="px-4 py-3"><strong style="color:var(--aqua-primary);">Sectorul de apă și apă uzată</strong> — obiectivul specific în care se încadrează Proiectul Regional Tulcea</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 fw-bold" style="color:var(--aqua-dark);background:#eef2f1;">Autoritate de Management</td>
                                <td class="px-4 py-3">Ministerul Fondurilor Europene</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section>

@push('styles')
<style>
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
