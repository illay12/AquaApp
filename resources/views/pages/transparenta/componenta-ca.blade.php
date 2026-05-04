@extends('layouts.app')

@section('title', 'Componența CA și Directori — AquaServ Tulcea')

@section('page_hero')
    <h1><i class="bi bi-people-fill me-2"></i> Componența CA și Directori</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/transparenta/componenta-ca') }}">Transparență</a></li>
            <li class="breadcrumb-item active">Componența CA și Directori</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    .doc-item {
        display: flex; align-items: center; gap: 0.85rem;
        padding: 0.85rem 1.25rem; text-decoration: none; color: inherit;
        border-bottom: 1px solid #f1f5f9; transition: background 0.14s;
    }
    .doc-item:last-child { border-bottom: none; }
    .doc-item:hover { background: #f8fafc; }
    .doc-icon {
        width: 38px; height: 38px; min-width: 38px; border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1rem; color: #fff;
    }
    .doc-title { flex: 1; font-size: 0.875rem; font-weight: 600; color: #1e293b; }
    .doc-badge {
        font-size: 0.68rem; font-weight: 700; padding: 0.22rem 0.6rem;
        border-radius: 5px; flex-shrink: 0;
        display: inline-flex; align-items: center; gap: 3px;
    }
    .doc-badge-pdf  { background: #fff0f0; color: #dc3545; }
    .doc-badge-doc  { background: #e8f0fe; color: #1a73e8; }
</style>
@endpush

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                <h2 class="section-title mb-4">C.V. Consiliu de Administrație</h2>

                <div class="card">
                    <div class="card-body p-0">
                        @forelse($fisiere as $fisier)
                            @php
                                $ext = strtolower(pathinfo($fisier, PATHINFO_EXTENSION));
                                $isPdf = $ext === 'pdf';
                                $iconClass = $isPdf ? 'bi-file-earmark-pdf-fill' : 'bi-file-earmark-word-fill';
                                $iconBg    = $isPdf ? '#dc3545' : '#1a73e8';
                                $badgeClass = $isPdf ? 'doc-badge-pdf' : 'doc-badge-doc';
                                $badgeText  = strtoupper($ext);
                            @endphp
                            <a href="{{ asset('storage/documente/componenta%20ca/cv/' . rawurlencode($fisier)) }}"
                               target="_blank" rel="noopener" class="doc-item">
                                <div class="doc-icon" style="background:{{ $iconBg }};">
                                    <i class="bi {{ $iconClass }}"></i>
                                </div>
                                <span class="doc-title">{{ pathinfo($fisier, PATHINFO_FILENAME) }}</span>
                                <span class="doc-badge {{ $badgeClass }}">
                                    <i class="bi bi-download"></i> {{ $badgeText }}
                                </span>
                            </a>
                        @empty
                            <div class="text-center py-5" style="background:#f8fafc;border-radius:12px;border:1.5px dashed #dee2e6;">
                                <i class="bi bi-folder2-open" style="font-size:3rem;color:#ccc;display:block;margin-bottom:1rem;"></i>
                                <p class="text-muted mb-0">Nu există documente disponibile momentan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
            <div class="col-lg-4 d-none d-lg-block">
                @include('components.sidebar-transparenta')
            </div>
        </div>
    </div>
</section>
@endsection
