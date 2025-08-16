@php
    $judul = old('judul', $prestasi->judul ?? '');
    $deskripsi = old('deskripsi', $prestasi->deskripsi ?? '');
    $tanggal = old('tanggal', isset($prestasi) && $prestasi->tanggal ? optional($prestasi->tanggal)->format('Y-m-d') : '');
    $tingkat = old('tingkat', $prestasi->tingkat ?? '');
    $peraih = old('peraih', $prestasi->peraih ?? '');
    $penyelenggara = old('penyelenggara', $prestasi->penyelenggara ?? '');
    $isActive = old('is_active', isset($prestasi) ? (bool)$prestasi->is_active : true);
@endphp

<h6 class="text-uppercase text-muted mb-3">Informasi Utama</h6>
<div class="mb-3">
  <label class="form-label">Judul</label>
  <input type="text" name="judul" class="form-control" value="{{ $judul }}" required>
  @error('judul')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
  <label class="form-label">Deskripsi</label>
  <textarea name="deskripsi" class="form-control" rows="6">{{ $deskripsi }}</textarea>
  @error('deskripsi')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
  <label class="form-label">Gambar</label>
  <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
  @isset($prestasi)
    @if($prestasi->gambar)
      <div class="mt-2">
        <img src="{{ asset('storage/'.$prestasi->gambar) }}" alt="Gambar" id="previewImg" style="height:120px;object-fit:cover;border:1px solid #e9ecef;border-radius:.25rem;">
      </div>
    @endif
  @endisset
  @empty($prestasi)
    <div class="mt-2">
      <img src="https://via.placeholder.com/200x120?text=Preview" alt="Preview" id="previewImg" style="height:120px;object-fit:cover;border:1px solid #e9ecef;border-radius:.25rem;">
    </div>
  @endempty
  @error('gambar')<div class="text-danger small">{{ $message }}</div>@enderror
</div>
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Tanggal</label>
    <input type="date" name="tanggal" class="form-control" value="{{ $tanggal }}">
    @error('tanggal')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Tingkat</label>
    <input type="text" name="tingkat" class="form-control" value="{{ $tingkat }}">
    @error('tingkat')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
</div>
<h6 class="text-uppercase text-muted mt-4 mb-3">Detail Tambahan</h6>
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Peraih</label>
    <input type="text" name="peraih" class="form-control" value="{{ $peraih }}">
    @error('peraih')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Penyelenggara</label>
    <input type="text" name="penyelenggara" class="form-control" value="{{ $penyelenggara }}">
    @error('penyelenggara')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
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
