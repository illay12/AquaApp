@extends('layouts.app')

@section('title', 'Contact')

@section('page_hero')
    <h1><i class="bi bi-envelope-fill me-2"></i> Contact</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">

            {{-- FORMULAR --}}
            <div class="col-lg-7">
                <h2 class="section-title">Trimite-ne un mesaj</h2>
                <div class="card p-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ url('/contact/trimite') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nume și prenume <span class="text-danger">*</span></label>
                                <input type="text" name="nume" class="form-control @error('nume') is-invalid @enderror"
                                       value="{{ old('nume') }}" placeholder="Ex: Ion Popescu">
                                @error('nume') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" placeholder="email@exemplu.ro">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Telefon</label>
                                <input type="tel" name="telefon" class="form-control" value="{{ old('telefon') }}" placeholder="07xx xxx xxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Subiect <span class="text-danger">*</span></label>
                                <select name="subiect" class="form-select @error('subiect') is-invalid @enderror">
                                    <option value="">-- Alegeți subiectul --</option>
                                    <option value="avarie" {{ old('subiect')=='avarie'?'selected':'' }}>Avarie / urgență</option>
                                    <option value="facturare" {{ old('subiect')=='facturare'?'selected':'' }}>Facturare</option>
                                    <option value="contract" {{ old('subiect')=='contract'?'selected':'' }}>Contract nou</option>
                                    <option value="calitate" {{ old('subiect')=='calitate'?'selected':'' }}>Calitatea apei</option>
                                    <option value="altele" {{ old('subiect')=='altele'?'selected':'' }}>Altele</option>
                                </select>
                                @error('subiect') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Mesaj <span class="text-danger">*</span></label>
                                <textarea name="mesaj" rows="5" class="form-control @error('mesaj') is-invalid @enderror"
                                          placeholder="Descrieți pe scurt solicitarea dumneavoastră...">{{ old('mesaj') }}</textarea>
                                @error('mesaj') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" name="gdpr" id="gdpr" class="form-check-input @error('gdpr') is-invalid @enderror">
                                    <label class="form-check-label" for="gdpr" style="font-size:0.875rem;">
                                        Sunt de acord cu <a href="{{ url('/gdpr') }}" target="_blank">politica de confidențialitate</a>
                                        și prelucrarea datelor personale.
                                    </label>
                                    @error('gdpr') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-aqua">
                                    <i class="bi bi-send-fill me-2"></i> Trimite mesajul
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- INFO CONTACT --}}
            <div class="col-lg-5">
                <h2 class="section-title">Informații de contact</h2>

                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="fw-bold text-aqua mb-3"><i class="bi bi-building me-2"></i>Sediu central</h6>
                        <ul class="list-unstyled" style="font-size:0.9rem;">
                            <li class="mb-2"><i class="bi bi-geo-alt-fill text-aqua me-2"></i> Str. Exemple nr. 1, Tulcea</li>
                            <li class="mb-2"><i class="bi bi-telephone-fill text-aqua me-2"></i> <a href="tel:0240511111">0240 511 111</a></li>
                            <li class="mb-2"><i class="bi bi-fax text-aqua me-2"></i> 0240 511 222</li>
                            <li class="mb-2"><i class="bi bi-envelope-fill text-aqua me-2"></i> <a href="mailto:office@aquaserv.ro">office@aquaserv.ro</a></li>
                        </ul>
                    </div>
                </div>

                <div class="card mb-3" style="border-color:#f8d7da;">
                    <div class="card-body" style="background:#fff5f5;border-radius:12px;">
                        <h6 style="color:#dc3545;" class="fw-bold mb-2">
                            <i class="bi bi-telephone-fill me-2"></i> Dispecerat avarii 24/7
                        </h6>
                        <p style="font-size:2rem;font-weight:800;color:#dc3545;margin:0;letter-spacing:-1px;">0340 131 111</p>
                        <small class="text-muted">Apelabil non-stop pentru urgențe</small>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h6 class="fw-bold text-aqua mb-3"><i class="bi bi-clock me-2"></i> Program de lucru</h6>
                        <table class="table table-sm mb-0" style="font-size:0.875rem;">
                            <tbody>
                                <tr>
                                    <td>Luni – Vineri</td>
                                    <td class="fw-bold">08:00 – 16:30</td>
                                </tr>
                                <tr>
                                    <td>Sâmbătă</td>
                                    <td class="text-muted">Închis</td>
                                </tr>
                                <tr>
                                    <td>Duminică</td>
                                    <td class="text-muted">Închis</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
