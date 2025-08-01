@extends('layouts.admin')

@section('title', $title ?? 'Form Guru')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-chalkboard-teacher fa-2x text-success mr-2"></i>
                    {{ $title ?? 'Form Guru' }}
                </h1>
                <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle fa-2x mr-3"></i>
                        <div>
                            <strong>Error!</strong> Terdapat kesalahan pada form.
                            <ul class="mb-0 mt-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- Form Guru -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-edit mr-2"></i>
                        {{ isset($guru) ? 'Edit Data Guru' : 'Tambah Guru Baru' }}
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($method == 'PUT')
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="font-weight-bold">Nama Guru <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $guru->nama ?? '') }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="jabatan" class="font-weight-bold">Jabatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $guru->jabatan ?? '') }}" required>
                                    <small class="form-text text-muted">Contoh: Kepala Sekolah, Guru Kelas 1, Guru Tahfidz</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="gelar" class="font-weight-bold">Gelar Akademik</label>
                                    <input type="text" class="form-control" id="gelar" name="gelar" value="{{ old('gelar', $guru->gelar ?? '') }}">
                                    <small class="form-text text-muted">Contoh: S.Pd, S.Pd.I, M.Pd</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="pengalaman_mengajar" class="font-weight-bold">Pengalaman Mengajar (Tahun) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="pengalaman_mengajar" name="pengalaman_mengajar" value="{{ old('pengalaman_mengajar', $guru->pengalaman_mengajar ?? 0) }}" min="0" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="jumlah_siswa" class="font-weight-bold">Jumlah Siswa <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="jumlah_siswa" name="jumlah_siswa" value="{{ old('jumlah_siswa', $guru->jumlah_siswa ?? 0) }}" min="0" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="rating" class="font-weight-bold">Rating <span class="text-danger">*</span></label>
                                    <select class="form-control" id="rating" name="rating" required>
                                        <option value="">Pilih Rating</option>
                                        @for($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" {{ (old('rating', $guru->rating ?? 5) == $i) ? 'selected' : '' }}>
                                                {{ $i }} Bintang
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto" class="font-weight-bold">Foto Guru</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                                        <label class="custom-file-label" for="foto">Pilih file foto</label>
                                    </div>
                                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                                </div>
                                
                                @if(isset($guru) && $guru->foto)
                                    <div class="form-group">
                                        <label class="font-weight-bold">Foto Saat Ini</label>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}" class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $guru->email ?? '') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="telepon" class="font-weight-bold">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $guru->telepon ?? '') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="website" class="font-weight-bold">Website</label>
                                    <input type="url" class="form-control" id="website" name="website" value="{{ old('website', $guru->website ?? '') }}">
                                </div>
                                
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ (old('is_active', $guru->is_active ?? true) ? 'checked' : '') }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">Aktif</label>
                                        <small class="form-text text-muted">Guru yang aktif akan ditampilkan di halaman publik</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Media Section -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5 class="font-weight-bold text-success mb-3">
                                    <i class="fas fa-share-alt mr-2"></i>
                                    Social Media
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="whatsapp" class="font-weight-bold">WhatsApp</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white">
                                                <i class="fab fa-whatsapp"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $guru->whatsapp ?? '') }}" placeholder="6281234567890">
                                    </div>
                                    <small class="form-text text-muted">Masukkan nomor tanpa tanda + atau 0 di depan</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="instagram" class="font-weight-bold">Instagram</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-danger text-white">
                                                <i class="fab fa-instagram"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $guru->instagram ?? '') }}" placeholder="username">
                                    </div>
                                    <small class="form-text text-muted">Masukkan username Instagram tanpa @</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="facebook" class="font-weight-bold">Facebook</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="fab fa-facebook"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $guru->facebook ?? '') }}" placeholder="username">
                                    </div>
                                    <small class="form-text text-muted">Masukkan username Facebook</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Information -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5 class="font-weight-bold text-success mb-3">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Informasi Tambahan
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat" class="font-weight-bold">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $guru->alamat ?? '') }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="deskripsi" class="font-weight-bold">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $guru->deskripsi ?? '') }}</textarea>
                                    <small class="form-text text-muted">Deskripsi singkat tentang guru</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pernyataan_pribadi" class="font-weight-bold">Pernyataan Pribadi</label>
                                    <textarea class="form-control" id="pernyataan_pribadi" name="pernyataan_pribadi" rows="4">{{ old('pernyataan_pribadi', $guru->pernyataan_pribadi ?? '') }}</textarea>
                                    <small class="form-text text-muted">Pernyataan atau moto pribadi guru</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="kemampuan_bahasa" class="font-weight-bold">Kemampuan Bahasa</label>
                                    <textarea class="form-control" id="kemampuan_bahasa" name="kemampuan_bahasa" rows="3">{{ old('kemampuan_bahasa', $guru->kemampuan_bahasa ?? '') }}</textarea>
                                    <small class="form-text text-muted">Contoh: Indonesia (95%), Inggris (85%), Arab (90%)</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="penghargaan" class="font-weight-bold">Penghargaan</label>
                                    <textarea class="form-control" id="penghargaan" name="penghargaan" rows="3">{{ old('penghargaan', $guru->penghargaan ?? '') }}</textarea>
                                    <small class="form-text text-muted">Daftar penghargaan yang pernah diraih</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-top pt-3 mt-3">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary mr-2">
                                    <i class="fas fa-times mr-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> Simpan
                                </button>
                            </div>
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
// Initialize CKEditor for text areas
CKEDITOR.replace('deskripsi', {
    height: 150,
    toolbar: [
        ['Bold', 'Italic', 'Underline'],
        ['NumberedList', 'BulletedList'],
        ['Link', 'Unlink'],
        ['Maximize']
    ]
});

CKEDITOR.replace('pernyataan_pribadi', {
    height: 150,
    toolbar: [
        ['Bold', 'Italic', 'Underline'],
        ['NumberedList', 'BulletedList'],
        ['Link', 'Unlink'],
        ['Maximize']
    ]
});

// Custom file input
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
</script>
@endpush 