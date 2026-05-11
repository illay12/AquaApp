@extends('layouts.app')

@section('title', 'Pagină negăsită (404)')
@section('meta_description', 'Pagina pe care o căutați nu a fost găsită.')

@push('styles')
<style>
    .error-hero {
        min-height: 78vh;
        display: flex;
        align-items: center;
        background: linear-gradient(150deg, #f0f8ff 0%, #e0f2fe 50%, #f0f8ff 100%);
        position: relative;
        overflow: hidden;
        padding: 4rem 0;
    }

    /* Cercuri decorative de fundal */
    .error-hero::before,
    .error-hero::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }
    .error-hero::before {
        width: 480px; height: 480px;
        top: -120px; right: -100px;
        background: radial-gradient(circle, rgba(0,180,216,0.10) 0%, transparent 70%);
    }
    .error-hero::after {
        width: 320px; height: 320px;
        bottom: -80px; left: -60px;
        background: radial-gradient(circle, rgba(0,119,182,0.10) 0%, transparent 70%);
    }

    /* Numărul 404 mare */
    .error-code {
        font-family: 'Merriweather', serif;
        font-size: clamp(6rem, 18vw, 11rem);
        font-weight: 700;
        line-height: 1;
        letter-spacing: -0.04em;
        background: linear-gradient(135deg, #023e8a 0%, #0077b6 50%, #00b4d8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        user-select: none;
    }

    /* Picătura de apă animată */
    .drop-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }
    .drop-icon {
        font-size: 5rem;
        color: #0077b6;
        animation: bob 2.8s ease-in-out infinite;
        filter: drop-shadow(0 8px 16px rgba(0,119,182,0.25));
    }
    @keyframes bob {
        0%, 100% { transform: translateY(0);   }
        50%       { transform: translateY(-14px); }
    }

    /* Undele de apă sub picătură */
    .waves-svg {
        display: block;
        margin: 0 auto 1rem;
        animation: wave-drift 3s ease-in-out infinite alternate;
        opacity: 0.35;
    }
    @keyframes wave-drift {
        from { transform: scaleX(0.95); }
        to   { transform: scaleX(1.05); }
    }

    .error-title {
        font-family: 'Merriweather', serif;
        font-size: clamp(1.2rem, 3vw, 1.6rem);
        font-weight: 700;
        color: #023e8a;
        margin-bottom: 0.75rem;
    }
    .error-text {
        font-size: 1rem;
        color: #475569;
        max-width: 420px;
        line-height: 1.7;
        margin: 0 auto 2rem;
    }

    /* Carduri sugestii rapide */
    .suggestion-card {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        background: #fff;
        border: 1.5px solid #caf0f8;
        border-radius: 12px;
        padding: 0.9rem 1.1rem;
        text-decoration: none;
        color: #1a1a2e;
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.2s;
        box-shadow: 0 2px 8px rgba(0,119,182,0.06);
    }
    .suggestion-card:hover {
        border-color: #0077b6;
        color: #0077b6;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0,119,182,0.14);
    }
    .suggestion-card .sc-icon {
        width: 38px; height: 38px;
        border-radius: 10px;
        background: #f0f8ff;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        color: #0077b6;
        flex-shrink: 0;
        transition: background 0.2s;
    }
    .suggestion-card:hover .sc-icon {
        background: #0077b6;
        color: #fff;
    }

    /* Linie separatoare cu text */
    .or-divider {
        display: flex; align-items: center; gap: 0.75rem;
        color: #94a3b8; font-size: 0.8rem; font-weight: 600;
        text-transform: uppercase; letter-spacing: 0.07em;
        margin: 1.5rem 0;
    }
    .or-divider::before,
    .or-divider::after {
        content: ''; flex: 1; height: 1px; background: #e2e8f0;
    }
</style>
@endpush

@section('content')
<section class="error-hero">
    <div class="container position-relative" style="z-index:1;">
        <div class="row align-items-center g-5">

            {{-- Stânga: ilustrație --}}
            <div class="col-lg-5 text-center order-lg-1 order-2">
                <div class="drop-wrap">
                    <i class="bi bi-droplet-half drop-icon"></i>
                </div>

                {{-- Unde SVG --}}
                <svg class="waves-svg" width="220" height="30" viewBox="0 0 220 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 15 Q27 0 55 15 Q82 30 110 15 Q137 0 165 15 Q192 30 220 15"
                          stroke="#0077b6" stroke-width="3" stroke-linecap="round" fill="none"/>
                </svg>

                <div class="error-code">404</div>
            </div>

            {{-- Dreapta: text + acțiuni --}}
            <div class="col-lg-7 order-lg-2 order-1 text-center text-lg-start">

                <p class="error-title">Pagina nu a fost găsită</p>

                <p class="error-text mx-auto mx-lg-0">
                    Ne pare rău, pagina pe care o căutați nu există sau a fost mutată.
                    Verificați adresa URL sau navigați folosind meniul de mai jos.
                </p>

                {{-- Buton principal --}}
                <a href="{{ url('/') }}" class="btn btn-aqua mb-4" style="padding:0.7rem 2rem;font-size:1rem;">
                    <i class="bi bi-house-fill me-2"></i> Înapoi la pagina principală
                </a>

                <div class="or-divider">sau navigați direct la</div>

                {{-- Sugestii --}}
                <div class="row g-2">
                    <div class="col-sm-6">
                        <a href="{{ url('/anunturi') }}" class="suggestion-card">
                            <span class="sc-icon"><i class="bi bi-megaphone"></i></span>
                            <span>Anunțuri</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ url('/contact') }}" class="suggestion-card">
                            <span class="sc-icon"><i class="bi bi-envelope"></i></span>
                            <span>Contact</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ url('/servicii') }}" class="suggestion-card">
                            <span class="sc-icon"><i class="bi bi-droplet"></i></span>
                            <span>Servicii</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ url('/client/login') }}" class="suggestion-card">
                            <span class="sc-icon"><i class="bi bi-person-circle"></i></span>
                            <span>Cont MyApa</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
