@extends('layouts.pddtj')

@section('title', $contract['cod'].' — '.$tipLabel)

@section('page_hero')
    <h1><i class="bi bi-file-earmark-check me-2"></i>{{ $contract['cod'] }}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('pddtj.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">{{ $contract['cod'] }}</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        <h2 style="font-family:'Roboto',sans-serif;font-size:36px;font-weight:600;line-height:1.3em;color:var(--aqua-dark);margin-bottom:4rem;">
            {{ $contract['cod'] }}: {{ $contract['titlu'] }}
            @if(!empty($contract['nou']))
                <span class="badge-aqua ms-2 align-middle" style="background:var(--aqua-cta);font-size:0.9rem;">nou</span>
            @endif
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

            <div class="mt-4 p-3" style="background:#d1fae5;border-radius:10px;font-size:0.88rem;color:#065f46;border-left:4px solid #10b981;">
                <i class="bi bi-check-circle-fill me-1"></i> <strong>{{ $contract['status'] }}</strong>
            </div>
        </div>

        <a href="{{ route('pddtj.prezentare') }}" class="btn btn-aqua mt-4">
            <i class="bi bi-arrow-left me-1"></i> Înapoi la Prezentare
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
