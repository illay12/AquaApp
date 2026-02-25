@extends('dispecerat.layout')

@section('title', 'Editare anunț')
@section('page_title', 'Editează anunț')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card-panel">
            <div class="card-panel-header">
                <span><i class="bi bi-pencil me-2"></i>Editează anunț #{{ $anunt->id }}</span>
                <a href="{{ route('dispecerat.dashboard') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Înapoi
                </a>
            </div>
            <div class="card-panel-body">

                <div class="d-flex gap-3 mb-4 p-2 px-3"
                     style="background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0;font-size:0.82rem;color:#64748b;">
                    <span><i class="bi bi-calendar3 me-1"></i> Publicat: <strong>{{ $anunt->created_at->format('d.m.Y H:i') }}</strong></span>
                    <span><i class="bi bi-link-45deg me-1"></i> Slug: <strong>{{ $anunt->slug }}</strong></span>
                    <span class="ms-auto">
                        <a href="{{ url('/anunturi/'.$anunt->slug) }}" target="_blank"
                           style="color:#0077b6;text-decoration:none;">
                            <i class="bi bi-eye me-1"></i> Vezi pe site
                        </a>
                    </span>
                </div>

                {{-- FORMULAR PRINCIPAL --}}
                <form id="form-editare" action="{{ route('dispecerat.anunturi.update', $anunt->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @php
                    $labels = [
                        'angajare' => 'Angajări',
                        'calitate' => 'Laborator – Calitate Apă',
                        'avarie'   => 'Avarii',
                        'anunturi' => 'Anunțuri Generale',
                        'diverse'  => 'Diverse',
                    ];
                    $culori = [
                        'angajare' => ['#d1fae5','#059669'],
                        'calitate' => ['#e0f2fe','#0369a1'],
                        'avarie'   => ['#fee2e2','#dc2626'],
                        'anunturi' => ['#dbeafe','#1d4ed8'],
                        'diverse'  => ['#f3e8ff','#7c3aed'],
                    ];
                    @endphp

                    {{-- TITLU --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            Titlu anunț <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="titlu"
                               class="form-control @error('titlu') is-invalid @enderror"
                               value="{{ old('titlu', $anunt->titlu) }}">
                        @error('titlu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- CATEGORIE --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">Categorie <span class="text-danger">*</span></label>
                        @if(count($categorii) === 1)
                            @php $c = $culori[$categorii[0]] ?? ['#f1f5f9','#475569']; @endphp
                            <input type="hidden" name="categorie" value="{{ $categorii[0] }}">
                            <div class="p-2 px-3 d-flex align-items-center gap-2"
                                 style="background:{{ $c[0] }};border-radius:8px;font-size:0.875rem;">
                                <i class="bi bi-tag-fill" style="color:{{ $c[1] }};"></i>
                                <span style="color:{{ $c[1] }};font-weight:700;">{{ $labels[$categorii[0]] ?? ucfirst($categorii[0]) }}</span>
                            </div>
                        @else
                            <select name="categorie" class="form-select @error('categorie') is-invalid @enderror">
                                @foreach($categorii as $cat)
                                    <option value="{{ $cat }}" {{ old('categorie', $anunt->categorie) === $cat ? 'selected' : '' }}>
                                        {{ $labels[$cat] ?? ucfirst($cat) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categorie')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        @endif
                    </div>

                    {{-- CONTINUT --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            Conținut anunț <span class="text-danger">*</span>
                        </label>
                        @error('continut')
                            <div class="text-danger mb-1" style="font-size:0.875rem;">{{ $message }}</div>
                        @enderror
                        <textarea name="continut" id="editor-continut"
                                  class="form-control @error('continut') is-invalid @enderror"
                                  rows="12">{{ old('continut', $anunt->continut) }}</textarea>
                    </div>

                    {{-- FISIERE EXISTENTE --}}
                    @if($anunt->fisiere->count() > 0)
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-paperclip me-1"></i> Fișiere atașate
                            <span class="badge" style="background:#e2e8f0;color:#475569;font-size:0.75rem;">
                                {{ $anunt->fisiere->count() }}
                            </span>
                        </label>
                        @foreach($anunt->fisiere as $fisier)
                        <div class="d-flex align-items-center gap-2 p-2 mb-2"
                             style="background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0;">
                            <i class="bi {{ $fisier->icon }}" style="font-size:1.3rem;color:{{ $fisier->culoare_icon }};flex-shrink:0;"></i>
                            <div style="flex:1;overflow:hidden;">
                                <div style="font-size:0.875rem;font-weight:600;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                    {{ $fisier->nume_original }}
                                </div>
                                <div style="font-size:0.75rem;color:#94a3b8;">{{ $fisier->marime_fomatata }}</div>
                            </div>
                            <a href="{{ $fisier->url }}" target="_blank"
                               class="btn btn-sm btn-light" title="Vizualizează">
                                <i class="bi bi-eye"></i>
                            </a>
                            {{-- Buton sterge – trimite formularul ascuns din afara formularului principal --}}
                            <button type="button"
                                    class="btn btn-sm btn-outline-danger"
                                    title="Șterge fișierul"
                                    onclick="stergeFisierExistent({{ $fisier->id }}, '{{ addslashes($fisier->nume_original) }}')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    {{-- ADAUGA FISIERE NOI --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-cloud-upload me-1"></i> Adaugă fișiere noi
                            <span class="text-muted fw-normal" style="font-size:0.8rem;">(opțional)</span>
                        </label>
                        <div id="drop-zone"
                             style="border:2px dashed #cbd5e1;border-radius:10px;padding:1.5rem;text-align:center;cursor:pointer;background:#f8fafc;transition:all 0.2s;"
                             onclick="document.getElementById('fisiere-input').click()"
                             ondragover="event.preventDefault();this.style.borderColor='#0077b6';this.style.background='#f0f8ff';"
                             ondragleave="this.style.borderColor='#cbd5e1';this.style.background='#f8fafc';"
                             ondrop="handleDrop(event)">
                            <i class="bi bi-cloud-upload" style="font-size:1.5rem;color:#94a3b8;"></i>
                            <div style="font-size:0.875rem;color:#64748b;margin-top:0.3rem;">
                                Trage fișierele aici sau <span style="color:#0077b6;font-weight:700;">click pentru a selecta</span>
                            </div>
                            <div style="font-size:0.75rem;color:#94a3b8;margin-top:0.2rem;">
                                PDF, Word (.docx), Excel (.xlsx) — max. 10 MB per fișier
                            </div>
                        </div>
                        <input type="file" id="fisiere-input" name="fisiere[]"
                               multiple accept=".pdf,.docx,.xlsx"
                               class="d-none" onchange="afiseazaFisiere(this.files)">
                        @error('fisiere.*')
                            <div class="text-danger mt-1" style="font-size:0.875rem;">{{ $message }}</div>
                        @enderror
                        <div id="fisiere-preview" class="mt-2"></div>
                    </div>

                    {{-- BUTOANE SALVARE --}}
                    <div class="d-flex gap-2 justify-content-end pt-3" style="border-top:1px solid #e2e8f0;">
                        <a href="{{ route('dispecerat.dashboard') }}" class="btn btn-outline-secondary">
                            Anulează
                        </a>
                        <button type="submit" class="btn btn-primary-aqua">
                            <i class="bi bi-check-lg me-1"></i> Salvează modificările
                        </button>
                    </div>
                </form>
                {{-- SFARSIT FORMULAR PRINCIPAL --}}

                {{-- STERGE ANUNT – formular separat, in afara celui principal --}}
                <div class="mt-3 pt-3" style="border-top:1px solid #fee2e2;">
                    <form id="form-sterge-anunt"
                          action="{{ route('dispecerat.anunturi.destroy', $anunt->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Ești sigur că vrei să ștergi definitiv acest anunț și toate fișierele atașate?')">
                            <i class="bi bi-trash me-1"></i> Șterge anunțul
                        </button>
                    </form>
                </div>

                {{-- FORMULARE ASCUNSE pentru stergere fisiere individuale --}}
                @foreach($anunt->fisiere as $fisier)
                <form id="form-sterge-fisier-{{ $fisier->id }}"
                      action="{{ route('dispecerat.fisiere.sterge', $fisier->id) }}"
                      method="POST"
                      style="display:none;">
                    @csrf
                    @method('DELETE')
                </form>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#editor-continut',
    language: 'ro', height: 420, menubar: false,
    plugins: ['advlist','autolink','lists','link','searchreplace','fullscreen','table','wordcount'],
    toolbar: 'undo redo | blocks | bold italic underline | bullist numlist | link | table | removeformat | fullscreen',
    content_style: 'body { font-family: Nunito, sans-serif; font-size: 15px; line-height: 1.8; }',
    branding: false, promotion: false,
});

// Sterge fisier individual
function stergeFisierExistent(id, nume) {
    if (!confirm('Ștergi fișierul "' + nume + '"?')) return;
    document.getElementById('form-sterge-fisier-' + id).submit();
}

// Preview fisiere noi
const iconeTip = {
    pdf:  { icon: 'bi-file-earmark-pdf',   color: '#dc2626' },
    docx: { icon: 'bi-file-earmark-word',  color: '#1d4ed8' },
    xlsx: { icon: 'bi-file-earmark-excel', color: '#059669' },
};

function afiseazaFisiere(files) {
    const preview = document.getElementById('fisiere-preview');
    preview.innerHTML = '';
    Array.from(files).forEach(file => {
        const ext    = file.name.split('.').pop().toLowerCase();
        const ic     = iconeTip[ext] || { icon: 'bi-file-earmark', color: '#64748b' };
        const marime = file.size < 1048576
            ? (file.size / 1024).toFixed(1) + ' KB'
            : (file.size / 1048576).toFixed(1) + ' MB';
        preview.innerHTML += `
            <div class="d-flex align-items-center gap-2 p-2 mb-1"
                 style="background:#f0f8ff;border-radius:8px;border:1px solid #caf0f8;font-size:0.875rem;">
                <i class="bi ${ic.icon}" style="font-size:1.3rem;color:${ic.color};flex-shrink:0;"></i>
                <span style="flex:1;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">${file.name}</span>
                <span style="color:#94a3b8;font-size:0.75rem;white-space:nowrap;">${marime}</span>
            </div>`;
    });
}

function handleDrop(event) {
    event.preventDefault();
    const dz = document.getElementById('drop-zone');
    dz.style.borderColor = '#cbd5e1';
    dz.style.background  = '#f8fafc';
    const input = document.getElementById('fisiere-input');
    input.files = event.dataTransfer.files;
    afiseazaFisiere(event.dataTransfer.files);
}
</script>
@endpush