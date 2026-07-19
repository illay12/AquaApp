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
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <h2 class="mb-4" style="font-family:'Roboto',sans-serif;font-size:36px;font-weight:600;line-height:1.3em;color:var(--aqua-dark);">
                    {{ $contract['cod'] }}: {{ $contract['titlu'] }}
                    @if(!empty($contract['nou']))
                        <span class="badge-aqua ms-2 align-middle" style="background:var(--aqua-cta);font-size:0.9rem;">nou</span>
                    @endif
                </h2>

                <div style="font-size:0.95rem;color:#4a4a4a;line-height:1.8;">
                    @foreach($contract['texte'] as $paragraf)
                        <p>{{ $paragraf }}</p>
                    @endforeach

                    @foreach($contract['grupe'] as $grupa)
                        @if($grupa['titlu'])
                            <p class="mb-2 mt-3"><strong>{{ $grupa['titlu'] }}:</strong></p>
                        @endif
                        <ul style="margin:0;padding-left:1.25rem;">
                            @foreach($grupa['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    @endforeach

                    @foreach($contract['texte_final'] ?? [] as $paragraf)
                        <p class="mt-3">{{ $paragraf }}</p>
                    @endforeach

                    <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.85rem;color:#065f46;">
                        <i class="bi bi-check-circle-fill me-1"></i> <strong>{{ $contract['status'] }}</strong>
                    </div>
                </div>

                <a href="{{ route('pddtj.prezentare') }}" class="btn btn-aqua mt-4">
                    <i class="bi bi-arrow-left me-1"></i> Înapoi la Prezentare
                </a>

            </div>
        </div>
    </div>
</section>
@endsection
