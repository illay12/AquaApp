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
                    Principalele acte normative care reglementează organizarea și funcționarea societății.
                </p>

                @foreach([
                    [
                        'bi-building','Organizare societăți și utilități publice',
                        [
                            ['Legea 31/1990','Legea privind societățile comerciale.','http://legislatie.just.ro/Public/DetaliiDocument/56732'],
                            ['Legea nr. 51/2006','Legea serviciilor comunitare de utilități publice.','http://legislatie.just.ro/Public/DetaliiDocument/70'],
                            ['OUG nr. 13/2008','Pentru modificarea și completarea Legii serviciilor comunitare de utilități publice nr. 51/2006 și a Legii serviciului de alimentare cu apă și de canalizare nr. 241/2006.','http://legislatie.just.ro/Public/DetaliiDocument/89869'],
                            ['Legea nr. 225/2016','Pentru modificarea și completarea Legii serviciilor comunitare de utilități publice nr. 51/2006.','http://legislatie.just.ro/Public/DetaliiDocument/183917'],
                        ]
                    ],
                    [
                        'bi-droplet-fill','Serviciul de apă și canalizare',
                        [
                            ['Legea nr. 241/2006','Legea serviciului de alimentare cu apă și de canalizare, cu modificările ulterioare.','http://legislatie.just.ro/Public/DetaliiDocument/73044'],
                            ['Legea nr. 224/2015','Pentru modificarea și completarea Legii serviciului de alimentare cu apă și de canalizare nr. 241/2006.','http://legislatie.just.ro/Public/DetaliiDocument/73044'],
                            ['Ordinul ANRSC nr. 88/2007','Pentru aprobarea Regulamentului-cadru al serviciului de alimentare cu apă și de canalizare.','http://legislatie.just.ro/Public/DetaliiDocument/82'],
                            ['Ordinul ANRSC nr. 90/2007','Pentru aprobarea Contractului-cadru de furnizare/prestare a serviciului de alimentare cu apă și de canalizare.','http://legislatie.just.ro/Public/DetaliiDocument/82045'],
                            ['OUG nr. 68/2007','Privind răspunderea de mediu cu referire la prevenirea și repararea prejudiciului asupra mediului.','http://legislatie.just.ro/Public/DetaliiDocument/83294'],
                        ]
                    ],
                    [
                        'bi-clipboard2-pulse','Calitatea apei și contorizare',
                        [
                            ['Legea nr. 458/2002','Legea privind calitatea apei potabile.','http://legislatie.just.ro/Public/DetaliiDocument/37723'],
                            ['Legea nr. 311/2004','Pentru modificarea și completarea Legii nr. 458/2002 privind calitatea apei potabile.','http://legislatie.just.ro/Public/DetaliiDocument/53106'],
                            ['H.G. nr. 348/1993','Privind contorizarea apei și a energiei termice la populație, instituții publice și agenți economici.','http://legislatie.just.ro/Public/DetaliiDocument/3481'],
                            ['Normativul-Cadru 1993','Privind contorizarea apei și a energiei termice la populație, instituții publice și agenți economici.','http://legislatie.just.ro/Public/DetaliiDocument/3481'],
                            ['Ordinul MLPAT nr. 29/N/1993','Pentru aprobarea Normativului-cadru privind contorizarea apei și a energiei termice.','http://www.cdep.ro/pls/legis/legis_pck.htp_act_text?idt=13739'],
                        ]
                    ],
                    [
                        'bi-shield-check','Transparență și petiții',
                        [
                            ['O.G. nr. 27/2002','Privind reglementarea activității de soluționare a petițiilor, actualizată 2016.','http://legislatie.just.ro/Public/DetaliiDocument/33817'],
                            ['Legea nr. 233/2002','Pentru aprobarea Ordonanței Guvernului nr. 27/2002 privind reglementarea activității de soluționare a petițiilor.','http://legislatie.just.ro/Public/DetaliiDocument/3568'],
                            ['Legea nr. 544/2001','Privind liberul acces la informațiile de interes public.','http://legislatie.just.ro/Public/DetaliiDocument/31413'],
                            ['H.G. nr. 478/2016','Pentru modificarea și completarea Normelor metodologice de aplicare a Legii nr. 544/2001 privind liberul acces la informațiile de interes public.','http://legislatie.just.ro/Public/DetaliiDocument/179920'],
                            ['Legea nr. 52/2003','Transparența decizională în administrația publică, republicată 2013.','http://legislatie.just.ro/Public/DetaliiDocument/41571'],
                        ]
                    ],
                ] as [$icon, $categorie, $acte])
                <div class="mb-5">
                    <h4 class="d-flex align-items-center gap-2 mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                        <i class="bi {{ $icon }} text-aqua"></i> {{ $categorie }}
                    </h4>
                    <div class="list-group" style="border-radius:10px;overflow:hidden;">
                        @foreach($acte as [$nr, $desc, $link])
                        <a href="{{ $link }}" class="list-group-item list-group-item-action" target="_blank" rel="noopener">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge-aqua me-2">{{ $nr }}</span>
                                    <span style="font-size:0.875rem;">{{ $desc }}</span>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-muted ms-2" style="flex-shrink:0;"></i>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                @include('components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection
