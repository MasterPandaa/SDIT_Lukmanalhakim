@extends('layouts.admin')

@section('title', 'Kelola Sambutan Kepala Sekolah')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-2 bg-light">
                    <h5 class="card-title m-0 font-weight-bold text-primary">Kelola Sambutan Kepala Sekolah</h5>
                </div>
                <div class="card-body p-3">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-3">
                            <i class="fas fa-check-circle mr-1"></i>
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('admin.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $sambutan->judul ?? '') }}">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="subtitle" class="font-weight-bold">Subtitle</label>
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $sambutan->subtitle ?? '') }}">
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="sambutan" class="font-weight-bold">Sambutan</label>
                            <textarea class="form-control @error('sambutan') is-invalid @enderror" id="sambutan" name="sambutan" rows="6">{{ old('sambutan', $sambutan->sambutan ?? '') }}</textarea>
                            @error('sambutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Gunakan editor untuk memformat teks sambutan</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="video_url" class="font-weight-bold">URL Video</label>
                            <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $sambutan->video_url ?? '') }}">
                            @error('video_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Contoh: https://www.youtube-nocookie.com/embed/jP649ZHA8Tg</small>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tahun_berdiri" class="font-weight-bold">Tahun Berdiri</label>
                                    <input type="number" class="form-control @error('tahun_berdiri') is-invalid @enderror" id="tahun_berdiri" name="tahun_berdiri" value="{{ old('tahun_berdiri', $sambutan->tahun_berdiri ?? '') }}">
                                    @error('tahun_berdiri')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto_kepsek" class="font-weight-bold">Foto Kepala Sekolah 1</label>
                                    @if($sambutan && $sambutan->foto_kepsek)
                                        <div class="mb-2">
                                            <img src="{{ Storage::url($sambutan->foto_kepsek) }}" alt="Foto Kepala Sekolah" class="img-thumbnail" style="max-height: 150px">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control-file @error('foto_kepsek') is-invalid @enderror" id="foto_kepsek" name="foto_kepsek">
                                    @error('foto_kepsek')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto_kepsek2" class="font-weight-bold">Foto Kepala Sekolah 2</label>
                                    @if($sambutan && $sambutan->foto_kepsek2)
                                        <div class="mb-2">
                                            <img src="{{ Storage::url($sambutan->foto_kepsek2) }}" alt="Foto Kepala Sekolah 2" class="img-thumbnail" style="max-height: 150px">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control-file @error('foto_kepsek2') is-invalid @enderror" id="foto_kepsek2" name="foto_kepsek2">
                                    @error('foto_kepsek2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ml-2">
                                <i class="fas fa-arrow-left mr-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('sambutan', {
        height: 250,
        toolbar: [
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'insert', items: [ 'Image', 'Table' ] },
            { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor' ] },
            { name: 'tools', items: [ 'Maximize' ] }
        ]
    });
</script>
@endpush 