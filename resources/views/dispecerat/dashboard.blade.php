@extends('dispecerat.layout')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

@php
$labelCategorie = match($categorie) {
    'angajare' => ['Angajări', 'bi-person-plus-fill', '#d1fae5', '#059669'],
    'calitate' => ['Laborator – Calitate Apă', 'bi-droplet-half', '#e0f2fe', '#0369a1'],
    'avarie'   => ['Avarii & Anunțuri Generale', 'bi-tools', '#fee2e2', '#dc2626'],
    'diverse'  => ['Diverse', 'bi-grid', '#f3e8ff', '#7c3aed'],
    default    => [ucfirst($categorie), 'bi-tag', '#f1f5f9', '#475569'],
};

$labelsCategorie = [
    'angajare' => 'Angajări',
    'calitate' => 'Calitate Apă',
    'avarie'   => 'Avarii',
    'anunturi' => 'Anunțuri Generale',
    'diverse'  => 'Diverse',
];
@endphp

{{-- BANNER --}}
<div class="d-flex align-items-center gap-3 p-3 mb-4"
     style="background:{{ $labelCategorie[2] }};border-radius:10px;border:1px solid rgba(0,0,0,0.06);">
    <i class="bi {{ $labelCategorie[1] }}" style="font-size:1.5rem;color:{{ $labelCategorie[3] }};"></i>
    <div>
        <div style="font-weight:800;color:{{ $labelCategorie[3] }};">{{ $labelCategorie[0] }}</div>
        <div style="font-size:0.8rem;color:{{ $labelCategorie[3] }};opacity:0.8;">
            Aveți acces la {{ count($categorii) === 1 ? 'categoria' : 'categoriile' }}:
            {{ implode(', ', array_map(fn($c) => $labelsCategorie[$c] ?? ucfirst($c), $categorii)) }}
        </div>
    </div>
    <div class="ms-auto text-end">
        <div style="font-size:2rem;font-weight:800;color:{{ $labelCategorie[3] }};line-height:1;">{{ $total }}</div>
        <div style="font-size:0.75rem;color:{{ $labelCategorie[3] }};opacity:0.8;">anunțuri</div>
    </div>
</div>

{{-- ================================================================
     SECTIUNEA BULETINE – doar pentru laborator
     ================================================================ --}}
@if($categorie === 'calitate')
<div class="card-panel mb-4">
    <div class="card-panel-header">
        <span><i class="bi bi-file-earmark-medical me-2"></i>Buletine de analiză apă</span>
        <a href="{{ route('dispecerat.buletin.create') }}" class="btn btn-primary-aqua btn-sm">
            <i class="bi bi-cloud-upload me-1"></i> Încarcă buletin nou
        </a>
    </div>
    <div class="card-panel-body">

        <form method="GET" action="{{ route('dispecerat.dashboard') }}"
              class="d-flex flex-wrap gap-2 mb-3 align-items-center">
            <select name="an_buletin" class="form-select form-select-sm" style="width:auto;min-width:100px;flex:0 0 auto;">
                <option value="">Toți anii</option>
                @foreach($aniBuletine as $anB)
                    <option value="{{ $anB }}" {{ request('an_buletin') == $anB ? 'selected' : '' }}>{{ $anB }}</option>
                @endforeach
            </select>
            <select name="luna_buletin" class="form-select form-select-sm" style="width:auto;min-width:130px;flex:0 0 auto;">
                <option value="">Toate lunile</option>
                @foreach(['Ianuarie','Februarie','Martie','Aprilie','Mai','Iunie','Iulie','August','Septembrie','Octombrie','Noiembrie','Decembrie'] as $numeLuna)
                    <option value="{{ $numeLuna }}" {{ request('luna_buletin') === $numeLuna ? 'selected' : '' }}>{{ $numeLuna }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary-aqua btn-sm" style="flex:0 0 auto;">
                <i class="bi bi-search me-1"></i> Filtrează
            </button>
            @if(request()->hasAny(['an_buletin', 'luna_buletin']))
            <a href="{{ route('dispecerat.dashboard') }}" class="btn btn-outline-secondary btn-sm" style="flex:0 0 auto;">
                <i class="bi bi-x-circle me-1"></i> Resetează
            </a>
            @endif
        </form>

        @if($buletine && $buletine->count() > 0)
            @foreach($buletine as $an => $luniAn)
            <div class="mb-4">
                {{-- Header an --}}
                <div class="d-flex align-items-center gap-2 mb-2">
                    <div style="background:#0369a1;color:#fff;font-weight:800;font-size:0.8rem;padding:0.2rem 0.75rem;border-radius:20px;">
                        {{ $an }}
                    </div>
                    <div style="flex:1;height:1px;background:#e2e8f0;"></div>
                </div>

                {{-- Luni --}}
                @foreach($luniAn as $luna => $fisiereLuna)
                <div class="mb-2 ps-2" style="border-left:3px solid #bae6fd;">
                    <div class="fw-bold mb-1" style="font-size:0.78rem;color:#0369a1;text-transform:uppercase;letter-spacing:0.04em;">
                        {{ $luna }}
                    </div>
                    <div class="row g-1">
                        @foreach($fisiereLuna as $buletin)
                        <div class="col-12">
                            <div class="d-flex align-items-center gap-2 p-2"
                                 style="background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0;font-size:0.82rem;">
                                <i class="bi bi-file-earmark-pdf" style="font-size:1.2rem;color:#dc2626;flex-shrink:0;"></i>
                                <div style="flex:1;overflow:hidden;">
                                    <div style="font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                        {{ $buletin->nume_original }}
                                    </div>
                                    <div style="color:#94a3b8;font-size:0.7rem;">{{ $buletin->marime_formatat }}</div>
                                </div>
                                <a href="{{ $buletin->url }}" target="_blank"
                                   class="btn btn-sm btn-light p-1" title="Vizualizează">
                                    <i class="bi bi-eye" style="font-size:0.85rem;"></i>
                                </a>
                                <form action="{{ route('dispecerat.buletin.destroy', $buletin->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Ștergi buletinul {{ $buletin->luna }} {{ $buletin->an }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger p-1" title="Șterge">
                                        <i class="bi bi-trash" style="font-size:0.85rem;"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        @else
            <div class="text-center py-4 text-muted">
                <i class="bi bi-inbox" style="font-size:2rem;display:block;opacity:0.4;margin-bottom:0.5rem;"></i>
                Nu există buletine încărcate.
                <br>
                <a href="{{ route('dispecerat.buletin.create') }}" class="btn btn-primary-aqua btn-sm mt-2">
                    <i class="bi bi-cloud-upload me-1"></i> Încarcă primul buletin
                </a>
            </div>
        @endif

    </div>
</div>
@endif

{{-- ================================================================
     LISTA ANUNTURI
     ================================================================ --}}
<div id="anunturi" class="card-panel">
    <div class="card-panel-header">
        <span><i class="bi bi-list-ul me-2"></i>Anunțurile mele</span>
        <a href="{{ route('dispecerat.anunturi.create') }}" class="btn btn-primary-aqua btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Anunț nou
        </a>
    </div>
    <div class="card-panel-body">

        <form method="GET" action="{{ route('dispecerat.dashboard') }}"
              class="d-flex flex-wrap gap-2 mb-3 align-items-center">
            <input type="text" name="q" class="form-control form-control-sm"
                   placeholder="Caută după titlu..."
                   value="{{ request('q') }}"
                   style="min-width:140px;flex:1 1 140px;">
            @if(count($categorii) > 1)
            <select name="categorie" class="form-select form-select-sm" style="width:auto;min-width:130px;flex:0 0 auto;">
                <option value="">Toate categoriile</option>
                @foreach($categorii as $cat)
                    <option value="{{ $cat }}" {{ request('categorie') === $cat ? 'selected' : '' }}>
                        {{ $labelsCategorie[$cat] ?? ucfirst($cat) }}
                    </option>
                @endforeach
            </select>
            @endif
            <select name="an" class="form-select form-select-sm" style="width:auto;min-width:100px;flex:0 0 auto;">
                <option value="">Toți anii</option>
                @foreach($aniAnunturi as $an)
                    <option value="{{ $an }}" {{ request('an') == $an ? 'selected' : '' }}>{{ $an }}</option>
                @endforeach
            </select>
            <select name="luna" class="form-select form-select-sm" style="width:auto;min-width:120px;flex:0 0 auto;">
                <option value="">Toate lunile</option>
                @foreach(['Ianuarie','Februarie','Martie','Aprilie','Mai','Iunie','Iulie','August','Septembrie','Octombrie','Noiembrie','Decembrie'] as $i => $numeLuna)
                    <option value="{{ $i + 1 }}" {{ request('luna') == $i + 1 ? 'selected' : '' }}>{{ $numeLuna }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary-aqua btn-sm" style="flex:0 0 auto;">
                <i class="bi bi-search me-1"></i> Caută
            </button>
            @if(request()->hasAny(['q', 'categorie', 'an', 'luna']))
            <a href="{{ route('dispecerat.dashboard') }}"
               class="btn btn-outline-secondary btn-sm" title="Resetează filtrele" style="flex:0 0 auto;">
                <i class="bi bi-x-circle"></i>
            </a>
            @endif
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="d-none d-sm-table-cell" style="width:40px;">#</th>
                        <th>Titlu</th>
                        @if(count($categorii) > 1)<th class="d-none d-md-table-cell">Categorie</th>@endif
                        <th style="width:130px;">Data publicării</th>
                        <th class="d-none d-lg-table-cell" style="width:130px;">Ultima modificare</th>
                        <th class="text-end" style="width:100px;">Acțiuni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anunturi as $anunt)
                    <tr>
                        <td class="d-none d-sm-table-cell" style="color:#94a3b8;">{{ $anunt->id }}</td>
                        <td style="max-width:0;">
                            <div style="font-weight:600;font-size:0.875rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                {{ $anunt->titlu }}
                            </div>
                        </td>
                        @if(count($categorii) > 1)
                        <td class="d-none d-md-table-cell">
                            <span class="badge-cat badge-{{ $anunt->categorie }}">
                                {{ $labelsCategorie[$anunt->categorie] ?? ucfirst($anunt->categorie) }}
                            </span>
                        </td>
                        @endif
                        <td style="white-space:nowrap;color:#64748b;font-size:0.82rem;">
                            {{ $anunt->created_at->format('d.m.Y H:i') }}
                        </td>
                        <td class="d-none d-lg-table-cell" style="white-space:nowrap;color:#64748b;font-size:0.82rem;">
                            {{ $anunt->updated_at->format('d.m.Y H:i') }}
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-1">
                                <a href="{{ url('/anunturi/'.$anunt->slug) }}" target="_blank"
                                   class="btn btn-sm btn-light" title="Vizualizează pe site">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('dispecerat.anunturi.edit', $anunt->id) }}"
                                   class="btn btn-sm btn-outline-primary" title="Editează">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('dispecerat.anunturi.destroy', $anunt->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Ești sigur că vrei să ștergi acest anunț?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Șterge">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ count($categorii) > 1 ? 6 : 5 }}" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox" style="font-size:2.5rem;display:block;margin-bottom:0.75rem;opacity:0.4;"></i>
                            Nu există anunțuri.
                            <br>
                            <a href="{{ route('dispecerat.anunturi.create') }}" class="btn btn-primary-aqua btn-sm mt-3">
                                <i class="bi bi-plus-lg me-1"></i> Adaugă primul anunț
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($anunturi->hasPages())
        <div class="d-flex justify-content-center mt-3">
            {{ $anunturi->links() }}
        </div>
        @endif

    </div>
</div>

@endsection
