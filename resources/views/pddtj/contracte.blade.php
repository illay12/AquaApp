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
