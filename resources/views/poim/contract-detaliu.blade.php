@extends('layouts.poim')

@section('title', $contract['cod'].' — '.$tipLabel)

@section('page_hero')
    <h1><i class="bi bi-file-earmark-check me-2"></i>{{ $contract['cod'] }}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('poim.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item"><a href="{{ route('poim.contracte') }}">Contracte</a></li>
            <li class="breadcrumb-item active">{{ $contract['cod'] }}</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        <h2 style="font-family:'Roboto',sans-serif;font-size:36px;font-weight:600;line-height:1.3em;color:var(--aqua-dark);margin-bottom:4rem;">
            {{ $contract['cod'] }}: {{ $contract['titlu'] }}
        </h2>

        <div class="pdd-contract-body" style="font-size:1rem;color:#3f3f3f;line-height:1.85;">
            @foreach($contract['texte'] as $paragraf)
                <p>{!! $paragraf !!}</p>
            @endforeach

            @foreach($contract['grupe'] as $grupa)
                @if($grupa['titlu'])
                    <h3 style="font-family:'Roboto',sans-serif;font-size:1.05rem;font-weight:700;color:var(--aqua-dark);border-left:3px solid var(--aqua-accent);padding-left:0.75rem;margin:2rem 0 1rem;">{{ $grupa['titlu'] }}</h3>
                @endif
                <ul class="pdd-lista-contract">
                    @foreach($grupa['items'] as $item)
                        <li><i class="bi bi-check-circle-fill"></i><span>{{ $item }}</span></li>
                    @endforeach
                </ul>
            @endforeach

            @foreach($contract['texte_final'] ?? [] as $paragraf)
                <p class="mt-3">{!! $paragraf !!}</p>
            @endforeach

            @if(!empty($contract['documente']))
                <h3 style="font-family:'Roboto',sans-serif;font-size:1.05rem;font-weight:700;color:var(--aqua-dark);border-left:3px solid var(--aqua-accent);padding-left:0.75rem;margin:2rem 0 1rem;">Documente</h3>
                <div class="d-flex flex-column gap-2 mb-3">
                    @foreach($contract['documente'] as $doc)
                        @php $caleFisier = storage_path('app/public/documente/poim/'.$doc['fisier']); @endphp
                        <div class="d-flex align-items-center gap-3 p-3" style="background:#fff;border-radius:12px;box-shadow:0 4px 16px rgba(61, 143, 135,0.08);border:1px solid var(--aqua-border);">
                            <div style="width:40px;height:40px;background:#fdecea;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="bi bi-file-earmark-pdf" style="font-size:1.2rem;color:#dc2626;"></i>
                            </div>
                            <span style="flex:1;font-size:0.85rem;color:#4a4a4a;">{{ $doc['titlu'] }}</span>
                            @if(file_exists($caleFisier))
                                <a href="{{ asset('storage/documente/poim/'.$doc['fisier']) }}" class="btn btn-sm btn-aqua flex-shrink-0" target="_blank">
                                    <i class="bi bi-eye me-1"></i> Vezi documentul
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-4 p-3" style="background:#d1fae5;border-radius:10px;font-size:0.88rem;color:#065f46;border-left:4px solid #10b981;">
                <i class="bi bi-check-circle-fill me-1"></i> <strong>{{ $contract['status'] }}</strong>
            </div>
        </div>

        <a href="{{ route('poim.contracte') }}" class="btn btn-aqua mt-4">
            <i class="bi bi-arrow-left me-1"></i> Înapoi la Contracte
        </a>

    </div>
</section>

@push('styles')
<style>
    .pdd-lista-contract { list-style:none; margin:0 0 0.5rem; padding:0; }
    .pdd-lista-contract li { display:flex; align-items:flex-start; gap:0.65rem; margin-bottom:0.65rem; }
    .pdd-lista-contract li i { color:var(--aqua-primary); font-size:0.95rem; margin-top:0.3rem; flex-shrink:0; }
    .pdd-lista-contract li span { flex:1; }
    .pdd-contract-body strong { color:var(--aqua-dark); font-weight:700; }
</style>
@endpush
@endsection
