@extends('dispecerat.layout')

@section('title', 'Buletin de analiză nou')
@section('page_title', 'Încarcă buletin de analiză')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card-panel">
            <div class="card-panel-header">
                <span><i class="bi bi-file-earmark-medical me-2"></i>Buletin de analiză nou</span>
                <a href="{{ route('dispecerat.dashboard') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Înapoi
                </a>
            </div>
            <div class="card-panel-body">

                <div class="alert d-flex gap-2 mb-4"
                     style="background:#e0f2fe;border:1px solid #bae6fd;border-radius:8px;font-size:0.875rem;">
                    <i class="bi bi-info-circle-fill" style="color:#0369a1;flex-shrink:0;margin-top:2px;"></i>
                    <div style="color:#0369a1;">
                        Buletinul încărcat va apărea automat pe pagina publică
                        <strong>Calitatea apei</strong>, grupat pe ani.
                        Sunt acceptate doar fișiere <strong>PDF</strong>.
                    </div>
                </div>

                <form action="{{ route('dispecerat.buletin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3 mb-4">
                        {{-- LUNA --}}
                        <div class="col-md-7">
                            <label class="form-label fw-bold">
                                Luna <span class="text-danger">*</span>
                            </label>
                            <select name="luna" class="form-select @error('luna') is-invalid @enderror">
                                <option value="">-- Alegeți luna --</option>
                                @foreach($luni as $l)
                                    <option value="{{ $l }}" {{ old('luna') === $l ? 'selected' : '' }}>
                                        {{ $l }}
                                    </option>
                                @endforeach
                            </select>
                            @error('luna')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- AN --}}
                        <div class="col-md-5">
                            <label class="form-label fw-bold">
                                Anul <span class="text-danger">*</span>
                            </label>
                            <select name="an" class="form-select @error('an') is-invalid @enderror">
                                <option value="">-- Alegeți anul --</option>
                                @foreach($ani as $a)
                                    <option value="{{ $a }}" {{ old('an') == $a ? 'selected' : (old('an') === null && $a == date('Y') ? 'selected' : '') }}>
                                        {{ $a }}
                                    </option>
                                @endforeach
                            </select>
                            @error('an')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    {{-- FISIER PDF --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            Fișier PDF <span class="text-danger">*</span>
                        </label>
                        <div id="drop-zone"
                             style="border:2px dashed #cbd5e1;border-radius:10px;padding:2rem;text-align:center;cursor:pointer;background:#f8fafc;transition:all 0.2s;"
                             onclick="document.getElementById('fisier-input').click()"
                             ondragover="event.preventDefault();this.style.borderColor='#0077b6';this.style.background='#f0f8ff';"
                             ondragleave="this.style.borderColor='#cbd5e1';this.style.background='#f8fafc';"
                             ondrop="handleDrop(event)">
                            <i class="bi bi-file-earmark-pdf" style="font-size:2.5rem;color:#dc2626;"></i>
                            <div style="font-size:0.9rem;color:#64748b;margin-top:0.5rem;">
                                Trage fișierul PDF aici sau <span style="color:#0077b6;font-weight:700;">click pentru a selecta</span>
                            </div>
                            <div style="font-size:0.75rem;color:#94a3b8;margin-top:0.3rem;">
                                Doar PDF — max. 20 MB
                            </div>
                        </div>
                        <input type="file" id="fisier-input" name="fisier"
                               accept=".pdf" class="d-none"
                               onchange="afiseazaFisier(this.files[0])">
                        @error('fisier')
                            <div class="text-danger mt-1" style="font-size:0.875rem;">{{ $message }}</div>
                        @enderror
                        <div id="fisier-preview" class="mt-2"></div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end pt-3" style="border-top:1px solid #e2e8f0;">
                        <a href="{{ route('dispecerat.dashboard') }}" class="btn btn-outline-secondary">
                            Anulează
                        </a>
                        <button type="submit" class="btn btn-primary-aqua">
                            <i class="bi bi-cloud-upload me-1"></i> Încarcă buletinul
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function afiseazaFisier(file) {
    if (!file) return;
    const marime = file.size < 1048576
        ? (file.size / 1024).toFixed(1) + ' KB'
        : (file.size / 1048576).toFixed(1) + ' MB';

    document.getElementById('fisier-preview').innerHTML = `
        <div class="d-flex align-items-center gap-2 p-2"
             style="background:#fff5f5;border-radius:8px;border:1px solid #fecaca;font-size:0.875rem;">
            <i class="bi bi-file-earmark-pdf" style="font-size:1.5rem;color:#dc2626;flex-shrink:0;"></i>
            <span style="flex:1;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-weight:600;">${file.name}</span>
            <span style="color:#94a3b8;font-size:0.75rem;white-space:nowrap;">${marime}</span>
        </div>`;

    // Actualizeaza drop zone
    document.getElementById('drop-zone').style.borderColor = '#dc2626';
    document.getElementById('drop-zone').style.background  = '#fff5f5';
}

function handleDrop(event) {
    event.preventDefault();
    const dz    = document.getElementById('drop-zone');
    const input = document.getElementById('fisier-input');
    dz.style.borderColor = '#cbd5e1';
    dz.style.background  = '#f8fafc';

    const files = event.dataTransfer.files;
    if (files.length > 0) {
        // Setează fișierul în input
        const dt = new DataTransfer();
        dt.items.add(files[0]);
        input.files = dt.files;
        afiseazaFisier(files[0]);
    }
}
</script>
@endpush
