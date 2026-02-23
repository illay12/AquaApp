@extends('layouts.app')

@section('title', 'Acasă - Companie Apă')

@section('content')
<div class="container mt-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">Bine ați venit la Compania de Apă</h2>
        <p class="lead">Asigurăm servicii de furnizare și întreținere a apei potabile pentru comunitatea noastră.</p>
    </div>

    <!-- Ultimele Anunțuri -->
    <section class="mb-5">
        <h3 class="mb-3">Ultimele Anunțuri</h3>

        @if($anunturi->isEmpty())
            <div class="alert alert-info">Nu există anunțuri momentan.</div>
        @else
            <ul class="list-group">
                @foreach($anunturi as $a)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $a->titlu }}
                        <span class="badge bg-primary rounded-pill">{{ $a->created_at->format('d.m.Y') }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="mt-3">
            <a href="{{ url('/anunturi') }}" class="btn btn-outline-primary">Vezi toate anunțurile</a>
        </div>
    </section>

    <!-- Serviciile noastre -->
    <section class="mb-5">
        <h3 class="mb-3">Serviciile noastre</h3>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Furnizare apă potabilă</h5>
                        <p class="card-text">Asigurăm apă de calitate pentru toți clienții noștri.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Întreținere rețele</h5>
                        <p class="card-text">Lucrări de mentenanță și reparații ale rețelelor de apă.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Contorizare și index apă</h5>
                        <p class="card-text">Gestionăm citirea contoarelor și raportarea consumului.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Consultanță și suport clienți</h5>
                        <p class="card-text">Oferim suport și răspunsuri rapide pentru orice întrebare.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection