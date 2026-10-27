@extends('layouts.app')

@section('title', 'Anunțuri')

@section('page_hero')
    <h1>Anunțuri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Anunțuri</li>
        </ol>
    </nav>
@endsection

@php
$categorii = [
    ''         => ['Toate',        null],
    'avarie'   => ['Avarii',       '#d64545'],
    'anunturi' => ['Anunțuri',     '#0077b6'],
    'angajare' => ['Angajare',     '#15936b'],
    'diverse'  => ['Diverse',      '#7c5cd6'],
];
$catLabel = [
    'anunturi' => 'Anunț',
    'avarie'   => 'Avarie',
    'angajare' => 'Angajare',
    'calitate' => 'Calitate apă',
    'diverse'  => 'Diverse',
];
$catColor = [
    'anunturi' => '#0077b6',
    'avarie'   => '#d64545',
    'angajare' => '#15936b',
    'calitate' => '#0aa2c0',
    'diverse'  => '#7c5cd6',
];
$catActiva = request('categorie', '');
@endphp

@push('styles')
<style>
    .an-section { padding: 1.5rem 0 4rem; }

    /* Căutare + filtre */
    .an-search { position: relative; margin-bottom: 1rem; }
    .an-search i { position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #8a9aab; pointer-events: none; }
    .an-search input { padding-left: 2.6rem; height: 50px; border-radius: 999px; background: #f6fafd; border-color: transparent; font-weight: 600; }
    .an-search input:focus { background: #fff; }

    .an-chips { display: flex; gap: .5rem; flex-wrap: wrap; margin-bottom: 1.5rem; }
    .an-chip {
        display: inline-flex; align-items: center; gap: .45rem; height: 40px; padding: 0 1rem;
        border-radius: 999px; border: 1.5px solid var(--site-line); background: #fff;
        color: var(--site-ink); font-weight: 700; font-size: .9rem; text-decoration: none; white-space: nowrap;
        transition: background .2s, border-color .2s, color .2s;
    }
    .an-chip__dot { width: 8px; height: 8px; border-radius: 50%; background: var(--c); }
    .an-chip:hover { border-color: #cfdde8; color: var(--site-ink); }
    .an-chip.is-active { background: var(--site-ink); border-color: var(--site-ink); color: #fff; }

    /* Lista */
    .an-list { display: grid; gap: .85rem; }
    .an-card {
        position: relative; display: block; padding: 1.3rem 1.4rem 1.25rem 1.6rem;
        border-radius: 18px; background: #fff; border: 1px solid var(--site-line);
        color: var(--site-ink); text-decoration: none; overflow: hidden;
        transition: box-shadow .25s, transform .25s, border-color .25s;
    }
    .an-card::before { content: ""; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: var(--cat); }
    .an-card__meta { display: flex; align-items: center; justify-content: space-between; gap: .75rem; margin-bottom: .5rem; }
    .an-card__cat { font-size: .72rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: var(--cat); }
    .an-card__meta time { font-size: .82rem; font-weight: 600; color: #6b7a8c; white-space: nowrap; }
    .an-card__title { font-size: 1.08rem; font-weight: 800; line-height: 1.4; margin: 0 0 .35rem; overflow-wrap: anywhere; }
    .an-card__excerpt { font-size: .92rem; line-height: 1.6; color: #5f7184; margin: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    @media (hover: hover) {
        .an-card:hover { border-color: transparent; box-shadow: 0 18px 40px -24px rgba(13,34,54,.4); transform: translateY(-2px); color: var(--site-ink); }
    }
    .an-card:active { background: #f6fafd; }

    .an-empty { padding: 3rem 1.5rem; text-align: center; color: #6b7a8c; border: 1.5px dashed var(--site-line); border-radius: 18px; }
    .an-empty i { display: block; font-size: 2rem; color: #b6c4d2; margin-bottom: .5rem; }

    .an-pages { margin-top: 2rem; }

    /* Sidebar (desktop) */
    .an-side { position: sticky; top: 110px; }
    .an-side h6 { font-size: .75rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; color: #6b7a8c; margin: 0 0 .75rem; }
    .an-side__links a { display: flex; align-items: center; justify-content: space-between; padding: .8rem 0; border-bottom: 1px solid var(--site-line); color: var(--site-ink); font-weight: 700; text-decoration: none; }
    .an-side__links a:hover { color: var(--aqua-primary); }
    .an-side__links a i { color: #b6c4d2; }

    @media (max-width: 767.98px) {
        .an-section { padding: 1rem 0 3rem; }
        .an-search input { height: 48px; }
        /* Pastile: derulare orizontală, până la marginea ecranului */
        .an-chips {
            flex-wrap: nowrap; overflow-x: auto; scrollbar-width: none;
            margin: 0 calc(var(--bs-gutter-x) * -.5) 1.1rem; padding: 0 calc(var(--bs-gutter-x) * .5);
        }
        .an-chips::-webkit-scrollbar { display: none; }
        .an-list { gap: .7rem; }
        .an-card { padding: 1.1rem 1.1rem 1.05rem 1.35rem; border-radius: 16px; }
        .an-card__title { font-size: 1rem; }
        .an-card__excerpt { font-size: .88rem; }
    }
</style>
@endpush

@section('content')
<section class="an-section">
    <div class="container">
        <div class="row g-4 g-xl-5">

            <div class="col-lg-8">
                <form method="GET" action="{{ url('/anunturi') }}" role="search">
                    @if($catActiva)<input type="hidden" name="categorie" value="{{ $catActiva }}">@endif
                    <div class="an-search">
                        <i class="bi bi-search"></i>
                        <input type="search" name="q" class="form-control" placeholder="Caută în anunțuri…"
                               value="{{ request('q') }}" aria-label="Caută în anunțuri">
                    </div>
                </form>

                <nav class="an-chips" aria-label="Categorii">
                    @foreach($categorii as $cheie => [$eticheta, $culoare])
                        <a href="{{ url('/anunturi') . '?' . http_build_query(array_filter(['q' => request('q'), 'categorie' => $cheie])) }}"
                           class="an-chip {{ $catActiva === $cheie ? 'is-active' : '' }}"
                           @if($culoare) style="--c:{{ $culoare }};" @endif>
                            @if($culoare)<span class="an-chip__dot"></span>@endif
                            {{ $eticheta }}
                        </a>
                    @endforeach
                </nav>

                <div class="an-list">
                    @forelse($anunturi ?? [] as $anunt)
                        <a href="{{ url('/anunturi/'.$anunt->slug) }}" class="an-card" style="--cat:{{ $catColor[$anunt->categorie] ?? '#64748b' }};">
                            <div class="an-card__meta">
                                <span class="an-card__cat">{{ $catLabel[$anunt->categorie] ?? ucfirst($anunt->categorie) }}</span>
                                <time datetime="{{ $anunt->created_at->toDateString() }}">{{ $anunt->created_at->locale('ro')->translatedFormat('j M Y') }}</time>
                            </div>
                            <h2 class="an-card__title">{{ $anunt->titlu }}</h2>
                            <p class="an-card__excerpt">
                                {{ Str::limit(strip_tags(html_entity_decode($anunt->continut, ENT_QUOTES | ENT_HTML5, 'UTF-8')), 180) }}
                            </p>
                        </a>
                    @empty
                        <div class="an-empty">
                            <i class="bi bi-inbox"></i>
                            @if(request('q') || $catActiva)
                                Niciun anunț nu corespunde căutării.
                                <div class="mt-3"><a href="{{ url('/anunturi') }}" class="btn btn-outline-aqua btn-sm">Vezi toate anunțurile</a></div>
                            @else
                                Momentan nu există anunțuri publicate.
                            @endif
                        </div>
                    @endforelse
                </div>

                @if(isset($anunturi) && method_exists($anunturi, 'links'))
                    <div class="an-pages">
                        {{ $anunturi->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>

            {{-- Sidebar – doar desktop --}}
            <aside class="col-lg-4 d-none d-lg-block">
                <div class="an-side">
                    <a href="tel:+40747022009" class="side-call mb-4">
                        <span class="side-call__icon"><i class="bi bi-telephone-fill"></i></span>
                        <span><small>Dispecerat avarii 24/7</small><strong>0747 022 009</strong></span>
                    </a>
                    <h6>Vezi și</h6>
                    <div class="an-side__links">
                        <a href="{{ url('/informatii/calitatea-apei') }}">Calitatea apei <i class="bi bi-arrow-right"></i></a>
                        <a href="{{ url('/program-casierii') }}">Program casierii <i class="bi bi-arrow-right"></i></a>
                        <a href="{{ url('/contact') }}">Contact <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>
@endsection
