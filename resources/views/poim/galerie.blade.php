@extends('layouts.poim')

@section('title', 'Galerie foto & video')

@section('page_hero')
    <h1><i class="bi bi-images me-2"></i>Galerie foto &amp; video</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('poim.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Galerie</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        <div class="d-flex flex-column gap-5">
            @foreach($galerii as $galerie)
            <div>
                <h2 class="section-title mb-3">{{ $galerie['titlu'] }}</h2>

                @if(count($galerie['poze']))
                    <div class="row g-3">
                        @foreach($galerie['poze'] as $poza)
                        <div class="col-6 col-md-3">
                            <a href="{{ asset('storage/'.$poza) }}" target="_blank" class="d-block" style="border-radius:12px;overflow:hidden;box-shadow:0 4px 16px rgba(61, 143, 135,0.10);">
                                <img src="{{ asset('storage/'.$poza) }}" alt="{{ $galerie['titlu'] }}" style="width:100%;height:150px;object-fit:cover;display:block;">
                            </a>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center" style="background:var(--aqua-bg);border:1.5px dashed var(--aqua-border);border-radius:14px;padding:2rem;">
                        <i class="bi bi-images" style="font-size:1.8rem;color:var(--aqua-primary);opacity:0.6;"></i>
                        <p class="mb-0 mt-2" style="font-size:0.85rem;color:#6c757d;">Fotografiile pentru această categorie vor fi publicate în curând.</p>
                    </div>
                @endif
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection
