@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">{{ $title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($method === 'PUT')
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="judul" class="font-weight-bold">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $item->judul ?? '') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="6" required>{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="font-weight-bold">Gambar/Icon</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                                <label class="custom-file-label" for="gambar">Pilih gambar...</label>
                            </div>
                            <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
                            @error('gambar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @if(isset($item) && $item->gambar)
                                <div class="mt-3">
                                    <label class="font-weight-bold">Gambar Saat Ini:</label>
                                    <div class="card">
                                        <img src="{{ $item->gambar_url }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.kurikulum') }}" class="btn btn-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Custom file input
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endpush 