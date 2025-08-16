<div class="row">
  <div class="col-12">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" value="{{ old('nama', $fasilitas->nama ?? '') }}" required>
      @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
  </div>
  <div class="col-12">
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $fasilitas->deskripsi ?? '') }}</textarea>
      @error('deskripsi')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-3">
      <label class="form-label">Kategori</label>
      <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $fasilitas->kategori ?? '') }}">
      @error('kategori')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>
  </div>
  <div class="col-md-6 d-flex align-items-end">
    <div class="form-check mb-3">
      <input type="hidden" name="is_active" value="0">
      <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', ($fasilitas->is_active ?? true)) ? 'checked' : '' }}>
      <label class="form-check-label" for="is_active">Aktif</label>
    </div>
  </div>
  <div class="col-12">
    <div class="mb-3">
      <label class="form-label">Foto</label>
      <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
      @error('foto')<div class="text-danger small">{{ $message }}</div>@enderror
      <div class="mt-2">
        @php $prev = old('foto') ? null : ($fasilitas->foto ?? null); @endphp
        <img id="fotoPreview" src="{{ isset($fasilitas) && $fasilitas->foto ? asset('storage/'.$fasilitas->foto) : '' }}" alt="Preview" class="img-thumbnail" style="max-height:150px; {{ isset($fasilitas) && $fasilitas->foto ? '' : 'display:none;' }}">
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const input = document.getElementById('foto');
    const img = document.getElementById('fotoPreview');
    if(input){
      input.addEventListener('change', function(){
        const [file] = this.files || [];
        if(file){
          const url = URL.createObjectURL(file);
          if(img){ img.src = url; img.style.display = 'inline-block'; }
        }
      });
    }
  });
</script>
@endpush
