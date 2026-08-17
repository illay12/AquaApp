@extends('layouts.poim')

@section('title', 'Comunicare')

@section('page_hero')
    <h1><i class="bi bi-megaphone me-2"></i>Comunicare</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('poim.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Comunicare</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        @if($comunicate->isEmpty())
            <div class="text-center" style="background:var(--aqua-bg);border:1.5px dashed var(--aqua-border);border-radius:14px;padding:2.5rem;">
                <i class="bi bi-megaphone" style="font-size:1.8rem;color:var(--aqua-primary);opacity:0.6;"></i>
                <p class="mb-0 mt-2" style="font-size:0.9rem;color:#6c757d;">Comunicatele de presă vor fi publicate în curând.</p>
            </div>
        @else
        <div class="d-flex flex-column gap-3">
            @foreach($comunicate as $comunicat)
            <div class="d-flex align-items-center gap-3 p-3 comunicat-card" style="background:#fff;border-radius:14px;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);border:1px solid var(--aqua-border);">
                <div style="width:48px;height:48px;background:#fdecea;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="bi bi-file-earmark-pdf" style="font-size:1.5rem;color:#dc2626;"></i>
                </div>
                <div class="comunicat-text" style="flex:1;min-width:0;">
                    <div style="font-size:0.72rem;font-weight:700;color:var(--aqua-primary);text-transform:uppercase;letter-spacing:0.03em;">{{ $comunicat->data->format('d.m.Y') }}</div>
                    <div style="font-weight:700;color:var(--aqua-dark);font-size:0.9rem;">{{ $comunicat->titlu }}</div>
                </div>
                @if(file_exists(storage_path('app/public/documente/poim/'.$comunicat->fisier)))
                    <a href="{{ asset('storage/documente/poim/'.$comunicat->fisier) }}" class="btn btn-sm btn-aqua flex-shrink-0" target="_blank">
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
        @endif

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
