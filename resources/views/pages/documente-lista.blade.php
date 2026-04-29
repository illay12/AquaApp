@extends('layouts.app')

@section('title', $titlu . ' — AquaServ Tulcea')

@section('page_hero')
    <h1><i class="bi {{ $iconClasa }} me-2"></i> {{ $titlu }}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url($breadcrumbUrl ?? '/informatii') }}">{{ $breadcrumbParent ?? 'Informații publice' }}</a></li>
            <li class="breadcrumb-item active">{{ $titlu }}</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    .year-accordion { border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden; margin-bottom: 0.75rem; }
    .year-header { display: flex; align-items: center; justify-content: space-between; padding: 0.9rem 1.25rem; background: #f8fafc; cursor: pointer; transition: background 0.16s; user-select: none; }
    .year-header:hover { background: #eef4fb; }
    .year-header.open { background: var(--aqua-primary); color: #fff; }
    .year-header.open .year-badge { background: rgba(255,255,255,0.2); color: #fff; }
    .year-header.open .year-chevron { color: #fff; transform: rotate(180deg); }
    .year-label { font-weight: 800; font-size: 0.95rem; display: flex; align-items: center; gap: 0.6rem; }
    .year-badge { font-size: 0.7rem; font-weight: 700; background: #e8f4fd; color: var(--aqua-primary); padding: 0.2rem 0.6rem; border-radius: 20px; }
    .year-chevron { font-size: 0.85rem; color: #94a3b8; transition: transform 0.22s, color 0.18s; }
    .year-body { display: none; border-top: 1px solid #e2e8f0; }
    .year-body.open { display: block; }
    .doc-item { display: flex; align-items: center; gap: 0.85rem; padding: 0.75rem 1.25rem; text-decoration: none; color: inherit; border-bottom: 1px solid #f1f5f9; transition: background 0.14s; }
    .doc-item:last-child { border-bottom: none; }
    .doc-item:hover { background: #f8fafc; }
    .doc-icon { width: 36px; height: 36px; min-width: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1rem; color: #fff; }
    .doc-title { flex: 1; font-size: 0.855rem; font-weight: 600; color: #1e293b; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .doc-pdf-badge { font-size: 0.68rem; font-weight: 700; padding: 0.22rem 0.6rem; border-radius: 5px; background: #fff0f0; color: #dc3545; flex-shrink: 0; display: inline-flex; align-items: center; gap: 3px; }
    @media (max-width: 575.98px) {
        .doc-item { gap: 0.65rem; padding: 0.7rem 1rem; }
        .doc-pdf-badge { display: none; }
        .year-header { padding: 0.8rem 1rem; }
        .year-label { font-size: 0.88rem; }
    }
</style>
@endpush

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                @if(isset($descriere))
                <div class="mb-4" style="border-left:4px solid var(--aqua-primary);background:#f0f8ff;padding:1.1rem 1.4rem;border-radius:0 10px 10px 0;">
                    <p class="mb-0" style="font-size:0.9375rem;line-height:1.75;">{{ $descriere }}</p>
                </div>
                @endif

                @if(empty($ani))
                    <div class="text-center py-5" style="background:#f8fafc;border-radius:16px;border:1.5px dashed #dee2e6;">
                        <i class="bi bi-folder2-open" style="font-size:3rem;color:#ccc;display:block;margin-bottom:1rem;"></i>
                        <p class="text-muted mb-1">Nu există documente disponibile momentan.</p>
                        <p class="text-muted mb-0" style="font-size:0.85rem;">Documentele vor fi publicate în curând.</p>
                    </div>
                @else
                    @foreach($ani as $an => $fisiere)
                    <div class="year-accordion">
                        <div class="year-header {{ $loop->first ? 'open' : '' }}">
                            <div class="year-label">
                                <i class="bi bi-calendar3" style="color:{{ $loop->first ? '#fff' : 'var(--aqua-primary)' }};"></i>
                                {{ $an }}
                                <span class="year-badge">{{ count($fisiere) }} {{ count($fisiere) == 1 ? 'document' : 'documente' }}</span>
                            </div>
                            <i class="bi bi-chevron-down year-chevron" style="{{ $loop->first ? 'transform:rotate(180deg);color:#fff;' : '' }}"></i>
                        </div>
                        <div class="year-body {{ $loop->first ? 'open' : '' }}">
                            @foreach($fisiere as $fisier)
                            <a href="{{ asset('storage/' . $storageUrl . '/' . $an . '/' . rawurlencode($fisier)) }}"
                               target="_blank" rel="noopener" class="doc-item">
                                <div class="doc-icon" style="background:{{ $culoareIcon ?? '#dc3545' }};">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </div>
                                <span class="doc-title">{{ pathinfo($fisier, PATHINFO_FILENAME) }}</span>
                                <span class="doc-pdf-badge"><i class="bi bi-download"></i> PDF</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>
            <div class="col-lg-4 d-none d-lg-block">
                @include($sidebar ?? 'components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script nonce="@nonce">
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.year-header').forEach(function(header) {
        header.addEventListener('click', function() {
            const body = this.nextElementSibling;
            const chevron = this.querySelector('.year-chevron');
            const icon = this.querySelector('.bi-calendar3');
            const isOpen = this.classList.contains('open');
            this.classList.toggle('open', !isOpen);
            body.classList.toggle('open', !isOpen);
            chevron.style.transform = isOpen ? '' : 'rotate(180deg)';
            chevron.style.color = isOpen ? '' : '#fff';
            if (icon) icon.style.color = isOpen ? 'var(--aqua-primary)' : '#fff';
        });
    });
});
</script>
@endpush
