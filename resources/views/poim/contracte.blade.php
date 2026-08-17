@extends('layouts.poim')

@section('title', 'Contracte')

@section('page_hero')
    <h1><i class="bi bi-file-earmark-check me-2"></i>Contracte proiect</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('poim.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Contracte</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        <p style="color:#4a4a4a;font-size:0.95rem;line-height:1.8;max-width:820px;">
            Investițiile Proiectului Major sunt grupate în 18 contracte de lucrări, 2 contracte de furnizare și 3 contracte de
            servicii. Contractele cu pagină de detaliu (semnate și documentate public) sunt marcate și pot fi accesate direct
            din listă.
        </p>

        @php
            $sectiuni = [
                ['titlu' => 'Contracte de lucrări',  'icon' => 'bi-tools',            'toate' => $lucrariToateCodurile,   'detaliate' => $lucrari],
                ['titlu' => 'Contracte de furnizare', 'icon' => 'bi-box-seam',         'toate' => $furnizareToateCodurile, 'detaliate' => $furnizare],
                ['titlu' => 'Contracte de servicii',  'icon' => 'bi-person-workspace', 'toate' => $serviciiToateCodurile,  'detaliate' => $servicii],
            ];
        @endphp

        @foreach($sectiuni as $sectiune)
        <div class="mb-5">
            <h2 class="section-title mb-3"><i class="bi {{ $sectiune['icon'] }} me-2"></i>{{ $sectiune['titlu'] }}</h2>
            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);">
                <ul style="list-style:none;margin:0;padding:0;">
                    @foreach($sectiune['toate'] as $cod => $titlu)
                        @php
                            $detaliu = collect($sectiune['detaliate'])->firstWhere('cod', $cod);
                        @endphp
                        <li class="d-flex align-items-center gap-3 px-4 py-3" style="border-bottom:1px solid var(--aqua-border);background:{{ $loop->even ? '#f8fafc' : '#fff' }};">
                            <span class="badge-aqua" style="min-width:56px;text-align:center;{{ $detaliu ? '' : 'background:var(--aqua-gray);' }}">{{ $cod }}</span>
                            <span style="flex:1;font-size:0.85rem;color:#4a4a4a;">{{ $titlu }}</span>
                            @if($detaliu)
                                <a href="{{ route('poim.contract-detaliu', strtolower($cod)) }}" class="btn btn-aqua btn-sm flex-shrink-0">
                                    Detalii <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach

    </div>
</section>
@endsection
