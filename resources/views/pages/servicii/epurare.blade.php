@extends('layouts.app')

@section('title', 'Epurare ape uzate')

@section('page_hero')
    <h1><i class="bi bi-recycle me-2"></i> Epurare ape uzate</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/servicii') }}">Servicii</a></li>
            <li class="breadcrumb-item active">Epurare ape uzate</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 class="section-title">Stații de epurare</h2>
                <p>
                    Apele uzate colectate prin rețeaua de canalizare sunt transportate la stațiile de epurare,
                    unde sunt supuse unui proces complex de tratare mecano-biologică înainte de evacuarea
                    în emisarul natural (râuri, lacuri, Dunăre, mare).
                </p>
                <p>
                    Stațiile noastre de epurare sunt dotate cu echipamente moderne și funcționează în conformitate
                    cu Directiva Europeană privind epurarea apelor uzate urbane, iar efluenții evacuați respectă
                    în totalitate limitele impuse de autorizațiile de mediu.
                </p>

                <h4 class="mt-4 mb-3" style="font-family:'Merriweather',serif;font-size:1.1rem;color:var(--aqua-dark);">
                    Etapele procesului de epurare
                </h4>
                <div class="row g-3 mb-4">
                    @foreach([
                        ['1','Epurare mecanică','Reținerea materialelor grosiere prin grătare, separarea nisipului și a grăsimilor, decantare primară.'],
                        ['2','Epurare biologică','Degradarea substanțelor organice dizolvate cu ajutorul microorganismelor aerobe în bazinele de aerare.'],
                        ['3','Decantare secundară','Separarea nămolului activ de apa epurată și recircularea nămolului în procesul biologic.'],
                        ['4','Tratare nămol','Îngroșarea, fermentarea anaerobă și deshidratarea mecanică a nămolului rezultat.'],
                    ] as [$nr, $titlu, $desc])
                    <div class="col-12">
                        <div class="d-flex gap-3 p-3" style="background:var(--aqua-bg);border-radius:10px;border:1px solid var(--aqua-border);">
                            <div style="width:44px;height:44px;background:var(--aqua-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:1.1rem;flex-shrink:0;">{{ $nr }}</div>
                            <div>
                                <div class="fw-bold mb-1" style="font-size:0.9rem;">{{ $titlu }}</div>
                                <div class="text-muted" style="font-size:0.85rem;">{{ $desc }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.1rem;color:var(--aqua-dark);">
                    Stații de epurare în operare
                </h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" style="font-size:0.875rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th>Stație epurare</th>
                                <th>Capacitate (l.e.)</th>
                                <th>An dare în folosință</th>
                                <th>Tip epurare</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>STEP Tulcea</td>
                                <td>120.000</td>
                                <td>2012</td>
                                <td>Mecano-biologică</td>
                            </tr>
                            <tr>
                                <td>STEP Măcin</td>
                                <td>15.000</td>
                                <td>2015</td>
                                <td>Mecano-biologică</td>
                            </tr>
                            <tr>
                                <td>STEP Babadag</td>
                                <td>12.000</td>
                                <td>2016</td>
                                <td>Mecano-biologică</td>
                            </tr>
                            <tr>
                                <td>STEP Sulina</td>
                                <td>8.000</td>
                                <td>2018</td>
                                <td>Mecano-biologică</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p style="font-size:0.8rem;" class="text-muted">l.e. = locuitori echivalenți</p>
            </div>
            <div class="col-lg-4">
                @include('components.sidebar-servicii')
            </div>
        </div>
    </div>
</section>
@endsection
