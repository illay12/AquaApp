@extends('layouts.app')

@section('title', 'Legislație')

@section('page_hero')
    <h1><i class="bi bi-book me-2"></i> Legislație</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații publice</a></li>
            <li class="breadcrumb-item active">Legislație</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 class="section-title">Legislație aplicabilă</h2>
                <p>
                    Activitatea AquaServ S.A. se desfășoară în conformitate cu cadrul legal național și european
                    privind serviciile de alimentare cu apă și canalizare.
                </p>

                @foreach([
                    [
                        'bi-file-earmark-text','Legi principale',
                        [
                            ['Legea nr. 241/2006','Legea serviciului de alimentare cu apă și de canalizare, cu modificările și completările ulterioare.','#'],
                            ['Legea nr. 51/2006','Legea serviciilor comunitare de utilități publice, republicată.','#'],
                            ['Legea nr. 458/2002','Legea privind calitatea apei potabile, cu modificările și completările ulterioare.','#'],
                            ['Legea nr. 107/1996','Legea apelor, cu modificările și completările ulterioare.','#'],
                        ]
                    ],
                    [
                        'bi-file-earmark-ruled','Hotărâri de Guvern',
                        [
                            ['H.G. nr. 1213/2007','Privind stabilirea procedurii-cadru de evaluare a impactului asupra mediului.','#'],
                            ['H.G. nr. 188/2002','Privind normele de calitate pe care trebuie să le îndeplinească apele de suprafață.','#'],
                            ['H.G. nr. 352/2005','Privind modificarea și completarea H.G. nr. 188/2002 pentru aprobarea normelor.','#'],
                        ]
                    ],
                    [
                        'bi-file-earmark-medical','Ordine și regulamente',
                        [
                            ['Ordinul nr. 88/2007','Regulamentul cadru al serviciului de alimentare cu apă și canalizare (A.N.R.S.C.).','#'],
                            ['Ordinul nr. 89/2007','Caietul de sarcini cadru al serviciului de alimentare cu apă și canalizare.','#'],
                            ['Ordinul nr. 90/2007','Contractul cadru de furnizare/prestare a serviciului de alimentare cu apă și canalizare.','#'],
                        ]
                    ],
                    [
                        'bi-globe','Directive europene',
                        [
                            ['Directiva 2020/2184/UE','Privind calitatea apei destinate consumului uman (reformare).','#'],
                            ['Directiva 91/271/CEE','Privind epurarea apelor urbane reziduale.','#'],
                            ['Directiva Cadru a Apei 2000/60/CE','Stabilind un cadru de politică comunitară în domeniul apei.','#'],
                        ]
                    ],
                ] as [$icon, $categorie, $acte])
                <div class="mb-5">
                    <h4 class="d-flex align-items-center gap-2 mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                        <i class="bi {{ $icon }} text-aqua"></i> {{ $categorie }}
                    </h4>
                    <div class="list-group" style="border-radius:10px;overflow:hidden;">
                        @foreach($acte as [$nr, $desc, $link])
                        <a href="{{ $link }}" class="list-group-item list-group-item-action"
                           target="{{ $link !== '#' ? '_blank' : '_self' }}">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge-aqua me-2">{{ $nr }}</span>
                                    <span style="font-size:0.875rem;">{{ $desc }}</span>
                                </div>
                                @if($link !== '#')
                                <i class="bi bi-box-arrow-up-right text-muted ms-2" style="flex-shrink:0;"></i>
                                @else
                                <i class="bi bi-file-earmark-pdf text-danger ms-2" style="flex-shrink:0;"></i>
                                @endif
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                @include('components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection
