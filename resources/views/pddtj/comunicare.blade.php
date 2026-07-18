@extends('layouts.pddtj')

@section('title', 'Comunicare')

@section('page_hero')
    <h1><i class="bi bi-megaphone me-2"></i>Comunicare</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('pddtj.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Comunicare</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        {{--
            Pentru a adăuga un comunicat nou:
            1. Urcă fișierul PDF în storage/app/public/documente/pddtj/
            2. Adaugă un rând nou în array-ul $comunicate de mai jos (cel mai recent primul)
        --}}
        @php $comunicate = [
            [
                'data' => '16.07.2026',
                'titlu' => 'Semnare Contract de Lucrări CL5 — „Extinderea și reabilitarea captărilor de apă, stațiilor de tratare și rezervoarelor de înmagazinare în Sulina, Crișan și Mila 23"',
                'fisier' => 'comunicat-semnare-cl5.pdf',
            ],
            [
                'data' => '18.06.2026',
                'titlu' => 'Semnare Contract de Finanțare — „Proiectul regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea" (cod MySMIS 2021 – 333789)',
                'fisier' => 'comunicat-semnare-cf.pdf',
            ],
            [
                'data' => '10.04.2024',
                'titlu' => 'Finalizare Contract CF-2 — „Furnizare echipament naval pentru operarea infrastructurii de apă și apă uzată – Lot 2"',
                'fisier' => 'comunicat-finalizare-cf2.pdf',
            ],
            [
                'data' => '05.02.2024',
                'titlu' => 'Semnare Contract CL-4 — „Extinderea și reabilitarea captărilor, stațiilor de tratare și complexelor de înmagazinare-pompare din Carcaliu și Babadag"',
                'fisier' => 'comunicat-semnare-cl4.pdf',
            ],
            [
                'data' => '19.12.2023',
                'titlu' => 'Semnare Contract CL-1 — „Reabilitarea captărilor din Tulcea și Mahmudia"',
                'fisier' => 'comunicat-semnare-cl1.pdf',
            ],
            [
                'data' => '13.12.2023',
                'titlu' => 'Semnare Contract CF-2 — furnizare echipament naval (bărci)',
                'fisier' => 'comunicat-semnare-cf2.pdf',
            ],
            [
                'data' => '22.09.2023',
                'titlu' => 'Semnare Contract CS-2 — servicii de audit financiar pentru proiect',
                'fisier' => 'comunicat-semnare-cs2.pdf',
            ],
        ]; @endphp

        <div class="d-flex flex-column gap-3">
            @foreach($comunicate as $comunicat)
            <div class="d-flex align-items-center gap-3 p-3 comunicat-card" style="background:#fff;border-radius:14px;box-shadow:0 4px 24px rgba(0,119,182,0.08);border:1px solid var(--aqua-border);">
                <div style="width:48px;height:48px;background:#fdecea;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="bi bi-file-earmark-pdf" style="font-size:1.5rem;color:#dc2626;"></i>
                </div>
                <div class="comunicat-text" style="flex:1;min-width:0;">
                    <div style="font-size:0.72rem;font-weight:700;color:var(--aqua-primary);text-transform:uppercase;letter-spacing:0.03em;">{{ $comunicat['data'] }}</div>
                    <div style="font-weight:700;color:var(--aqua-dark);font-size:0.9rem;">{{ $comunicat['titlu'] }}</div>
                </div>
                @if(file_exists(storage_path('app/public/documente/pddtj/'.$comunicat['fisier'])))
                    <a href="{{ asset('storage/documente/pddtj/'.$comunicat['fisier']) }}" class="btn btn-sm btn-aqua flex-shrink-0" target="_blank">
                        <i class="bi bi-eye me-1"></i> Vezi documentul
                    </a>
                @else
                    <span class="badge text-muted flex-shrink-0" style="background:#f1f5f9;font-size:0.72rem;font-weight:700;padding:0.5rem 0.75rem;">
                        <i class="bi bi-hourglass-split me-1"></i>În curs de încărcare
                    </span>
                @endif
            </div>
            @endforeach
        </div>

    </div>
</section>

@push('styles')
<style>
    @media (max-width: 575.98px) {
        .comunicat-card { flex-wrap: wrap; }
        .comunicat-text { flex-basis: 100%; order: 2; margin-top: 0.5rem; }
    }
</style>
@endpush
@endsection
