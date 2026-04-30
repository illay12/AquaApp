@extends('layouts.app')

@section('title', 'Contracte de achiziții — AquaServ Tulcea')

@section('page_hero')
    <h1><i class="bi bi-file-earmark-check me-2"></i> Contracte de achiziții</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații publice</a></li>
            <li class="breadcrumb-item active">Contracte de achiziții</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">

                {{-- Contract 1 --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-file-earmark-text me-2"></i> CL 7_2020
                    </div>
                    <div class="card-body" style="padding:1.75rem;">

                        <h5 style="font-family:'Merriweather',serif;font-size:1.05rem;font-weight:700;color:var(--aqua-dark);line-height:1.5;margin-bottom:1.5rem;">
                            Reabilitarea și extinderea rețelelor de distribuție și a sistemului de canalizare inclusiv stații de pompare în aglomerarea Tulcea
                        </h5>

                        <div class="row g-3">

                            <div class="col-12">
                                <div style="background:var(--aqua-bg);border-radius:10px;padding:1rem 1.25rem;border-left:4px solid var(--aqua-primary);">
                                    <div style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--aqua-gray);margin-bottom:0.3rem;">Valoare contract</div>
                                    <div style="font-size:1.1rem;font-weight:800;color:var(--aqua-dark);">24.781.842,13 lei <span style="font-size:0.85rem;font-weight:600;color:var(--aqua-gray);">fără TVA</span></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div style="background:#f8fafc;border-radius:10px;padding:1.25rem;border:1.5px solid var(--aqua-border);">
                                    <div style="font-size:0.78rem;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;color:var(--aqua-gray);margin-bottom:0.85rem;">
                                        <i class="bi bi-building me-1"></i> Antreprenor
                                    </div>

                                    {{-- Lider --}}
                                    <div class="mb-3 pb-3" style="border-bottom:1px solid var(--aqua-border);">
                                        <span class="badge-aqua mb-2 d-inline-block">Lider asociere</span>
                                        <div style="font-weight:700;font-size:0.95rem;color:var(--aqua-dark);margin-bottom:0.4rem;">Termopro Edil SRL</div>
                                        <div style="font-size:0.875rem;color:#555;line-height:1.7;">
                                            <i class="bi bi-geo-alt text-aqua me-1"></i> Oradea, Județul Bihor, Strada Alexandru Roman nr. 2/C<br>
                                            <i class="bi bi-hash text-aqua me-1"></i> CUI: RO 26155181<br>
                                            <i class="bi bi-journal-text text-aqua me-1"></i> ORC: J5/1338/2009<br>
                                            <i class="bi bi-person text-aqua me-1"></i> Administrator: Ghighilicea Andi Sorin
                                        </div>
                                    </div>

                                    {{-- Asociat --}}
                                    <div>
                                        <span style="background:#e8f4fd;color:var(--aqua-primary);font-size:0.72rem;font-weight:700;padding:0.3em 0.65em;border-radius:6px;" class="mb-2 d-inline-block">Asociat</span>
                                        <div style="font-weight:700;font-size:0.95rem;color:var(--aqua-dark);margin-bottom:0.4rem;">Europan Prod SA</div>
                                        <div style="font-size:0.875rem;color:#555;line-height:1.7;">
                                            <i class="bi bi-geo-alt text-aqua me-1"></i> Pitești, Județul Argeș, Strada Crinului nr. 47<br>
                                            <i class="bi bi-hash text-aqua me-1"></i> CUI: RO 6833760<br>
                                            <i class="bi bi-journal-text text-aqua me-1"></i> ORC: J3/1857/1994<br>
                                            <i class="bi bi-person text-aqua me-1"></i> Administrator: Molete Ion
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 d-none d-lg-block">
                @include('components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection
