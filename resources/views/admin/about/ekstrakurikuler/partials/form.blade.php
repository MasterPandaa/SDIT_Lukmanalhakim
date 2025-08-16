@php
    $nama = old('nama', $ekstrakurikuler->nama ?? '');
    $deskripsi = old('deskripsi', $ekstrakurikuler->deskripsi ?? '');
    $isActive = old('is_active', isset($ekstrakurikuler) ? (bool)$ekstrakurikuler->is_active : true);
@endphp

<h6 class="text-uppercase text-muted mb-3">Informasi Utama</h6>
<div class="mb-3">
  <label class="form-label">Nama</label>
  <input type="text" name="nama" class="form-control" value="{{ $nama }}" required>
  @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
  <label class="form-label">Deskripsi</label>
  <textarea name="deskripsi" class="form-control" rows="6">{{ $deskripsi }}</textarea>
  @error('deskripsi')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
  <label class="form-label">Gambar/Ikon</label>
  <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
  @isset($ekstrakurikuler)
    @if($ekstrakurikuler->gambar)
      <div class="mt-2">
        <img src="{{ asset('storage/'.$ekstrakurikuler->gambar) }}" alt="Gambar" id="previewImg" style="height:120px;object-fit:cover;border:1px solid #e9ecef;border-radius:.25rem;">
      </div>
    @endif
  @endisset
  @empty($ekstrakurikuler)
    <div class="mt-2">
      <img src="https://via.placeholder.com/200x120?text=Preview" alt="Preview" id="previewImg" style="height:120px;object-fit:cover;border:1px solid #e9ecef;border-radius:.25rem;">
    </div>
  @endempty
  @error('gambar')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<h6 class="text-uppercase text-muted mt-4 mb-2">Status</h6>
<div class="form-check form-switch">
  <input type="hidden" name="is_active" value="0">
  <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $isActive ? 'checked' : '' }}>
  <label class="form-check-label" for="is_active">Aktif</label>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function(){
    const input = document.getElementById('gambar');
    const preview = document.getElementById('previewImg');
    if(input && preview){
      input.addEventListener('change', function(e){
        const file = e.target.files && e.target.files[0];
        if(!file) return;
        const reader = new FileReader();
        reader.onload = function(evt){ preview.src = evt.target.result; };
        reader.readAsDataURL(file);
      });
    }
  });
</script>
