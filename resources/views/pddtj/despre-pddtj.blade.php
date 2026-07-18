@extends('layouts.pddtj')

@section('title', 'Despre PDDTJ')

@section('page_hero')
    <h1><i class="bi bi-info-circle me-2"></i>Despre PDDTJ</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('pddtj.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Despre PDDTJ</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">
        <div style="background:#fff;border-radius:16px;padding:2.5rem;box-shadow:0 4px 24px rgba(0,119,182,0.08);border-left:5px solid var(--aqua-primary);">
            <div style="width:56px;height:56px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:1.25rem;">
                <i class="bi bi-hourglass-split" style="font-size:1.4rem;color:var(--aqua-primary);"></i>
            </div>
            <p style="color:#374151;font-size:0.95rem;line-height:1.9;margin:0;">
                Conținutul acestei pagini este în curs de finalizare. Programul <strong>Dezvoltare Durabilă și Tranziție Justă
                (PDDTJ)</strong> este programul operațional din care este cofinanțat, prin Fondul European de Dezvoltare
                Regională (FEDR), „Proiectul regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea".
                Prezentarea detaliată a programului va fi publicată aici în cel mai scurt timp.
            </p>
        </div>
    </div>
</section>
@endsection
