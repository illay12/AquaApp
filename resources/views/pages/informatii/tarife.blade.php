@extends('layouts.app')

@section('title', 'Tarife')

@section('page_hero')
    <h1><i class="bi bi-cash-coin me-2"></i> Tarife</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații publice</a></li>
            <li class="breadcrumb-item active">Tarife</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 class="section-title">Tarife în vigoare</h2>

                <div class="alert d-flex align-items-start gap-2" style="background:var(--aqua-bg);border:1.5px solid var(--aqua-border);border-radius:10px;">
                    <i class="bi bi-info-circle-fill text-aqua mt-1" style="font-size:1.2rem;flex-shrink:0;"></i>
                    <div style="font-size:0.875rem;">
                        Tarifele sunt aprobate de Autoritatea Națională de Reglementare pentru Serviciile Comunitare
                        de Utilități Publice (A.N.R.S.C.) și sunt valabile începând cu data aprobării.
                        Toate prețurile sunt exprimate <strong>fără TVA</strong>.
                    </div>
                </div>

                {{-- Tarife Apă --}}
                <h4 class="mt-4 mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    <i class="bi bi-droplet-fill text-aqua me-2"></i> Tarife apă potabilă
                </h4>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover" style="font-size:0.875rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th>Categorie consumator</th>
                                <th>Tarif (lei/m³)</th>
                                <th>TVA 9%</th>
                                <th>Total cu TVA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Populație (casnic)</strong></td>
                                <td>4,85</td>
                                <td>0,44</td>
                                <td><strong>5,29</strong></td>
                            </tr>
                            <tr>
                                <td>Agenți economici</td>
                                <td>6,20</td>
                                <td>0,56</td>
                                <td><strong>6,76</strong></td>
                            </tr>
                            <tr>
                                <td>Instituții publice</td>
                                <td>5,60</td>
                                <td>0,50</td>
                                <td><strong>6,10</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Tarife Canal --}}
                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    <i class="bi bi-filter-circle-fill text-aqua me-2"></i> Tarife canalizare și epurare
                </h4>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover" style="font-size:0.875rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th>Categorie consumator</th>
                                <th>Tarif (lei/m³)</th>
                                <th>TVA 9%</th>
                                <th>Total cu TVA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Populație (casnic)</strong></td>
                                <td>3,10</td>
                                <td>0,28</td>
                                <td><strong>3,38</strong></td>
                            </tr>
                            <tr>
                                <td>Agenți economici</td>
                                <td>4,50</td>
                                <td>0,41</td>
                                <td><strong>4,91</strong></td>
                            </tr>
                            <tr>
                                <td>Instituții publice</td>
                                <td>3,80</td>
                                <td>0,34</td>
                                <td><strong>4,14</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Tarife branșamente --}}
                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    <i class="bi bi-tools text-aqua me-2"></i> Tarife prestări servicii
                </h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" style="font-size:0.875rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th>Serviciu</th>
                                <th>Tarif (lei, fără TVA)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Aviz de amplasament</td><td>50,00</td></tr>
                            <tr><td>Aviz tehnic de racordare</td><td>80,00</td></tr>
                            <tr><td>Recepție branșament / racord</td><td>120,00</td></tr>
                            <tr><td>Montare contor apă Dn 20</td><td>200,00</td></tr>
                            <tr><td>Verificare metrologică contor</td><td>60,00</td></tr>
                            <tr><td>Desfundare canalizare (per intervenție)</td><td>350,00</td></tr>
                        </tbody>
                    </table>
                </div>

                <p class="text-muted mt-3" style="font-size:0.8rem;">
                    * Tarifele pot fi modificate conform aprobărilor A.N.R.S.C. Ultima actualizare: Ianuarie 2026.
                </p>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                @include('components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection
