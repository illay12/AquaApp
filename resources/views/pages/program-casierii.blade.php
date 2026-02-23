@extends('layouts.app')

@section('title', 'Program casierii')

@section('page_hero')
    <h1><i class="bi bi-clock me-2"></i> Program casierii</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Program casierii</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 class="section-title">Program de lucru cu publicul</h2>

                <div class="alert-band mb-4" style="border-radius:8px;">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Plata facturilor se poate efectua și <strong>online</strong> prin portalul Zona Clienți, 24/7.
                    <a href="{{ url('/client/factura') }}" class="ms-2 fw-bold">Plătește online →</a>
                </div>

                <div class="row g-4">
                    @foreach([
                        ['Sediu central – Tulcea','Str. Principală nr. 1, Tulcea','Lun–Vin','08:00 – 14:30','0240 511 111'],
                        ['Agenție Măcin','Str. Dunării nr. 5, Măcin','Lun–Vin','08:00 – 12:00','0240 512 222'],
                        ['Agenție Babadag','Str. Republicii nr. 10, Babadag','Lun–Mie','08:00 – 12:00','0240 513 333'],
                        ['Agenție Sulina','Str. nr. 1, nr. 20, Sulina','Lun, Mie, Vin','08:00 – 12:00','0240 514 444'],
                        ['Agenție Isaccea','Str. Calea Macin nr. 3, Isaccea','Mar, Joi','08:00 – 12:00','0240 515 555'],
                    ] as [$denumire, $adresa, $zile, $ore, $tel])
                    <div class="col-md-6">
                        <div class="card p-4 h-100">
                            <h6 class="fw-bold text-aqua mb-3">
                                <i class="bi bi-geo-alt-fill me-2"></i>{{ $denumire }}
                            </h6>
                            <ul class="list-unstyled mb-0" style="font-size:0.875rem;">
                                <li class="mb-2"><i class="bi bi-map text-muted me-2"></i>{{ $adresa }}</li>
                                <li class="mb-2">
                                    <i class="bi bi-calendar3 text-muted me-2"></i>
                                    <strong>{{ $zile }}</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-clock text-muted me-2"></i>
                                    <strong style="color:var(--aqua-primary);">{{ $ore }}</strong>
                                </li>
                                <li><i class="bi bi-telephone text-muted me-2"></i>
                                    <a href="tel:{{ $tel }}">{{ $tel }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="card mt-4 p-4" style="border-color:#f8d7da;background:#fff5f5;">
                    <h6 class="fw-bold" style="color:#dc3545;">
                        <i class="bi bi-telephone-fill me-2"></i> Modalități de plată
                    </h6>
                    <ul style="font-size:0.875rem;line-height:2;padding-left:1.2rem;margin:0;">
                        <li>La ghișeul casieriei – numerar sau card bancar</li>
                        <li>Online prin portalul <a href="{{ url('/client/factura') }}">Zona Clienți</a></li>
                        <li>Prin virament bancar (IBAN indicat pe factură)</li>
                        <li>La orice oficiu poștal din județ</li>
                        <li>Prin aplicații de mobile banking (Ghișeul.ro)</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection
