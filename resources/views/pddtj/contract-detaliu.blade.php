@extends('layouts.pddtj')

@section('title', $contract['cod'].' — '.$tipLabel)

@section('page_hero')
    <h1><i class="bi bi-file-earmark-check me-2"></i>{{ $contract['cod'] }}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('pddtj.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pddtj.contracte') }}#{{ $tipAncora }}">Contracte</a></li>
            <li class="breadcrumb-item active">{{ $contract['cod'] }}</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <p style="font-size:0.8rem;font-weight:700;color:var(--aqua-accent);text-transform:uppercase;letter-spacing:0.04em;margin-bottom:0.4rem;">{{ $tipLabel }}</p>
                <h2 class="mb-4" style="font-family:'Roboto',sans-serif;font-size:1.4rem;font-weight:700;color:var(--aqua-dark);">
                    <span style="background:{{ !empty($contract['nou']) ? 'var(--aqua-accent)' : 'var(--aqua-primary)' }};color:#fff;border-radius:8px;padding:3px 12px;font-size:0.85rem;margin-right:12px;font-weight:800;white-space:nowrap;">{{ $contract['cod'] }}</span>
                    {{ $contract['titlu'] }}
                    @if(!empty($contract['nou']))
                        <span class="badge-aqua ms-2" style="background:var(--aqua-cta);">nou</span>
                    @endif
                </h2>

                <div class="p-4" style="background:#fff;border-radius:14px;box-shadow:0 4px 24px rgba(61,143,135,0.1);font-size:0.95rem;color:#4a4a4a;line-height:1.8;">
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <div style="background:#eef2f1;border-radius:10px;padding:0.85rem 1.1rem;">
                                <div style="font-size:0.72rem;font-weight:700;color:#64748b;text-transform:uppercase;">Valoare contract</div>
                                <div style="font-weight:700;color:var(--aqua-dark);">{{ $contract['valoare'] }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#eef2f1;border-radius:10px;padding:0.85rem 1.1rem;">
                                <div style="font-size:0.72rem;font-weight:700;color:#64748b;text-transform:uppercase;">Data semnării</div>
                                <div style="font-weight:700;color:var(--aqua-dark);">{{ $contract['data'] }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background:#e3efed;border-radius:10px;padding:0.85rem 1.1rem;">
                                <div style="font-size:0.72rem;font-weight:700;color:#64748b;text-transform:uppercase;">Durată de execuție</div>
                                <div style="font-weight:700;color:var(--aqua-primary);">{{ $contract['durata'] }}</div>
                            </div>
                        </div>
                    </div>

                    @if($contract['contractor'])
                        <p>
                            <strong>
                                @if($tipAncora === 'servicii') Prestator:
                                @elseif($tipAncora === 'furnizare') Furnizor:
                                @else Antreprenor:
                                @endif
                            </strong>
                            {{ $contract['contractor'] }}
                        </p>
                    @endif

                    <p><strong>Obiectiv:</strong> {{ $contract['obiectiv'] }}</p>

                    @foreach($contract['grupe'] as $grupa)
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

                    <div class="mt-3 p-2" style="background:#d1fae5;border-radius:8px;font-size:0.85rem;color:#065f46;">
                        <i class="bi bi-check-circle-fill me-1"></i> <strong>{{ $contract['status'] }}</strong>
                    </div>
                </div>

                <a href="{{ route('pddtj.contracte') }}#{{ $tipAncora }}" class="btn btn-aqua mt-4">
                    <i class="bi bi-arrow-left me-1"></i> Înapoi la toate contractele
                </a>

            </div>
        </div>
    </div>
</section>
@endsection
