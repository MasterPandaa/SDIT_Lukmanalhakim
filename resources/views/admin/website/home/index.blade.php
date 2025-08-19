@extends('layouts.admin')

@section('title', 'Pengaturan Halaman Utama')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-home fa-lg text-success mr-2"></i>
                    Pengaturan Halaman Utama
                </h1>
                <a href="{{ url('/') }}" target="_blank" class="btn btn-primary shadow-sm">
                    <i class="fas fa-eye mr-2"></i>
                    Lihat Website
                </a>
             </div>


            <!-- Form Pengaturan Halaman Utama -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Halaman Utama
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.website.home.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <ul class="nav nav-tabs" id="homeTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="hero-tab" data-bs-toggle="tab" href="#hero" role="tab" aria-controls="hero" aria-selected="true">
                                    <i class="fas fa-heading mr-1"></i> Title / Hero
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="program-tab" data-bs-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">
                                    <i class="fas fa-star mr-1"></i> Program Unggulan
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="statistik-tab" data-bs-toggle="tab" href="#statistik" role="tab" aria-controls="statistik" aria-selected="false">
                                    <i class="fas fa-chart-line mr-1"></i> Statistik
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content pt-3" id="homeTabContent">
                            <!-- Hero Tab -->
                            <div class="tab-pane fade show active" id="hero" role="tabpanel" aria-labelledby="hero-tab">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="judul_hero" class="font-weight-bold">Judul Hero <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('judul_hero') is-invalid @enderror" id="judul_hero" name="judul_hero" value="{{ old('judul_hero', $home->judul_hero ?? '') }}" required>
                                            @error('judul_hero')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="subtitle_hero" class="font-weight-bold">Subtitle Hero</label>
                                            <input type="text" class="form-control @error('subtitle_hero') is-invalid @enderror" id="subtitle_hero" name="subtitle_hero" value="{{ old('subtitle_hero', $home->subtitle_hero ?? '') }}">
                                            @error('subtitle_hero')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi_hero" class="font-weight-bold">Deskripsi Hero</label>
                                            <textarea class="form-control @error('deskripsi_hero') is-invalid @enderror" id="deskripsi_hero" name="deskripsi_hero" rows="3">{{ old('deskripsi_hero', $home->deskripsi_hero ?? '') }}</textarea>
                                            @error('deskripsi_hero')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="teks_tombol" class="font-weight-bold">Teks Tombol CTA</label>
                                                <input type="text" class="form-control @error('teks_tombol') is-invalid @enderror" id="teks_tombol" name="teks_tombol" value="{{ old('teks_tombol', $home->teks_tombol ?? '') }}">
                                                @error('teks_tombol')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="link_tombol" class="font-weight-bold">Link Tombol CTA</label>
                                                <input type="text" class="form-control @error('link_tombol') is-invalid @enderror" id="link_tombol" name="link_tombol" value="{{ old('link_tombol', $home->link_tombol ?? '') }}" placeholder="/psb atau https://...">
                                                @error('link_tombol')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gambar_hero" class="font-weight-bold">Gambar Hero</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('gambar_hero') is-invalid @enderror" id="gambar_hero" name="gambar_hero" accept="image/*">
                                                <label class="custom-file-label" for="gambar_hero">Pilih file gambar</label>
                                            </div>
                                            @error('gambar_hero')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Format: JPG, JPEG, PNG, WEBP. Maks: 2MB</small>
                                        </div>
                                        @if(isset($home) && $home->gambar_hero)
                                            <div class="form-group">
                                                <label class="font-weight-bold">Gambar Saat Ini</label>
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/' . $home->gambar_hero) }}" alt="Gambar Hero" class="img-thumbnail" style="max-height: 200px;">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Program Unggulan Tab -->
                            <div class="tab-pane fade" id="program" role="tabpanel" aria-labelledby="program-tab">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold" for="program_section_title">Judul Bagian</label>
                                        <input type="text" name="program_section_title" id="program_section_title" class="form-control" value="{{ old('program_section_title', $home->program_section_title ?? '') }}" placeholder="Program Unggulan">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold" for="program_section_subtitle">Subjudul</label>
                                        <input type="text" name="program_section_subtitle" id="program_section_subtitle" class="form-control" value="{{ old('program_section_subtitle', $home->program_section_subtitle ?? '') }}" placeholder="Bangun Generasi Berkarakter bersama Kami">
                                    </div>
                                </div>

                                <div class="row">
                                    @for($i=1; $i<=6; $i++)
                                        <div class="col-md-6 mb-4">
                                            <div class="border rounded p-3 h-100">
                                                <h6 class="font-weight-bold mb-3">Program #{{ $i }}</h6>
                                                <div class="form-group">
                                                    <label for="program_{{ $i }}_text">Judul Program</label>
                                                    <input type="text" class="form-control" id="program_{{ $i }}_text" name="program_{{ $i }}_text" value="{{ old("program_{$i}_text", $home->{"program_{$i}_text"} ?? '') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="program_{{ $i }}_url">Link Program</label>
                                                    <input type="text" class="form-control" id="program_{{ $i }}_url" name="program_{{ $i }}_url" value="{{ old("program_{$i}_url", $home->{"program_{$i}_url"} ?? '') }}" placeholder="/program /about/... atau #">
                                                </div>
                                                <div class="form-group">
                                                    <label for="program_{{ $i }}_image">Gambar Program</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="program_{{ $i }}_image" name="program_{{ $i }}_image" accept="image/*">
                                                        <label class="custom-file-label" for="program_{{ $i }}_image">Pilih file</label>
                                                    </div>
                                                    <small class="form-text text-muted">Format: JPG, JPEG, PNG, WEBP. Maks: 2MB</small>
                                                </div>
                                                @php $img = $home->{"program_{$i}_image"} ?? null; @endphp
                                                @if($img)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $img) }}" alt="Program {{ $i }}" class="img-thumbnail" style="max-height: 120px;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <!-- Statistik Tab -->
                            <div class="tab-pane fade" id="statistik" role="tabpanel" aria-labelledby="statistik-tab">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="stat_peserta_didik">Peserta Didik</label>
                                            <input type="number" min="0" class="form-control" id="stat_peserta_didik" name="stat_peserta_didik" value="{{ old('stat_peserta_didik', $home->stat_peserta_didik ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="stat_guru">Guru & Staf</label>
                                            <input type="number" min="0" class="form-control" id="stat_guru" name="stat_guru" value="{{ old('stat_guru', $home->stat_guru ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="stat_kelas">Jumlah Kelas</label>
                                            <input type="number" min="0" class="form-control" id="stat_kelas" name="stat_kelas" value="{{ old('stat_kelas', $home->stat_kelas ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="stat_ekstrakurikuler">Ekstrakurikuler</label>
                                            <input type="number" min="0" class="form-control" id="stat_ekstrakurikuler" name="stat_ekstrakurikuler" value="{{ old('stat_ekstrakurikuler', $home->stat_ekstrakurikuler ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.custom-file-label::after {
    content: "Browse";
}
</style>
@endpush

@push('scripts')
<script>
// Custom file input (vanilla JS, no jQuery needed)
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.custom-file-input').forEach(function (input) {
    input.addEventListener('change', function (e) {
      const fileName = e.target.value.split('\\\\').pop();
      const label = e.target.nextElementSibling;
      if (label && label.classList.contains('custom-file-label')) {
        label.classList.add('selected');
        label.textContent = fileName;
      }
    });
  });
});
</script>
@endpush 
