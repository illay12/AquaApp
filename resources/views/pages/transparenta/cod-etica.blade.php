@extends('layouts.app')

@section('title', 'Cod de etică — AquaServ Tulcea')

@section('page_hero')
    <h1><i class="bi bi-award me-2"></i> Cod de etică</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/transparenta/cod-etica') }}">Transparență</a></li>
            <li class="breadcrumb-item active">Cod de etică</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    .cod-etica-text p { font-size: 0.9375rem; line-height: 1.85; margin-bottom: 1.1rem; color: #333; }
    .doc-item { display:flex; align-items:center; gap:0.85rem; padding:0.9rem 1.25rem; text-decoration:none; color:inherit; transition:background 0.14s; border-radius:10px; border:1.5px solid var(--aqua-border); }
    .doc-item:hover { background:#e8f4fd; border-color:var(--aqua-primary); }
    .doc-icon { width:40px; height:40px; min-width:40px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:1.1rem; color:#fff; background:#dc3545; }
    .doc-title { flex:1; font-size:0.9rem; font-weight:700; color:var(--aqua-dark); }
    .doc-pdf-badge { font-size:0.68rem; font-weight:700; padding:0.22rem 0.6rem; border-radius:5px; background:#fff0f0; color:#dc3545; display:inline-flex; align-items:center; gap:3px; }
</style>
@endpush

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                <div class="cod-etica-text">

                    <p>
                        Prezentul Cod de Conduită Etică se aplică întregii organizații, centrelor operaționale,
                        tuturor compartimentelor precum și tuturor persoanelor care acționează în numele
                        <strong>S.C. Aquaserv S.A. Tulcea</strong>:
                    </p>

                    {{-- Fisier Cod Etica --}}
                    @if(!empty($ani))
                        @foreach($ani as $an => $fisiere)
                            @foreach($fisiere as $fisier)
                            <a href="{{ asset('storage/' . $storageUrl . '/' . $an . '/' . rawurlencode($fisier)) }}"
                               target="_blank" rel="noopener" class="doc-item mb-3 d-flex">
                                <div class="doc-icon">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </div>
                                <span class="doc-title">{{ pathinfo($fisier, PATHINFO_FILENAME) }}</span>
                                <span class="doc-pdf-badge"><i class="bi bi-download"></i> PDF</span>
                            </a>
                            @endforeach
                        @endforeach
                    @else
                        <div class="doc-item mb-3 d-flex" style="opacity:0.5;cursor:default;">
                            <div class="doc-icon">
                                <i class="bi bi-file-earmark-pdf-fill"></i>
                            </div>
                            <span class="doc-title">Cod Etica CA AQUASERV</span>
                            <span class="doc-pdf-badge">PDF</span>
                        </div>
                    @endif

                    <p>
                        Codul stabilește normele de conduită etică și profesională și formulează principiile
                        ce trebuie respectate pentru o bună funcționare a Societății și pentru o relație cu clienții,
                        furnizorii, partenerii de afaceri și celelalte părți interesate, bazată pe încredere.
                    </p>

                    <p>
                        Prevederile Codului sunt obligatorii pentru toți angajații și persoanele care activează
                        în cadrul societății, indiferent de funcția deținută.
                    </p>

                    <p>
                        Prin intermediul obiectivelor sale, prezentul cod își propune o continuă îmbunătățire
                        a calității serviciilor publice, eliminarea birocrației și eliminarea oricăror fapte de
                        corupție din cadrul Societății.
                    </p>

                    <p>
                        Nerespectarea prevederilor cuprinse în prezentul Cod atrage după sine răspunderea
                        disciplinară a celor care îl încalcă, în condițiile legii.
                    </p>

                    <p>
                        Semnalarea de către oricare dintre angajați a încălcărilor normelor de conduită nu
                        atrage după sine vreun represaliu asupra avertizorilor.
                    </p>

                    <div class="card mt-2" style="border-color:var(--aqua-border);border-left:4px solid var(--aqua-primary);">
                        <div class="card-body" style="background:var(--aqua-bg);border-radius:0 10px 10px 0;">
                            <p class="mb-2">
                                <strong style="color:var(--aqua-dark);">Sesizările pot fi transmise prin:</strong>
                            </p>
                            <ul style="font-size:0.9375rem;line-height:1.85;margin:0;padding-left:1.5rem;color:#333;">
                                <li>Depuse în scris la secretariatul societății</li>
                                <li>Depuse în cutia de sesizări la sediul central — Str. Tudor Vladimirescu nr. 2</li>
                                <li>
                                    Postate pe site la adresa
                                    <a href="mailto:sesizari.etice@aquaservtulcea.ro" class="text-aqua fw-bold">
                                        sesizari.etice@aquaservtulcea.ro
                                    </a>
                                </li>
                                <li>Transmise consilierilor de etică ai societății</li>
                            </ul>
                        </div>
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
