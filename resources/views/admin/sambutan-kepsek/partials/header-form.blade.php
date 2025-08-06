@if(isset($sambutanKepsek) && $sambutanKepsek)
<form action="{{ route('admin.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-8">
            <!-- Header Content -->
            <div class="form-section">
                <h5><i class="fas fa-heading me-2"></i>Konten Header</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="judul_header" class="font-weight-bold">Judul Header <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('judul_header') is-invalid @enderror" 
                                   id="judul_header" name="judul_header" 
                                   value="{{ old('judul_header', $sambutanKepsek->judul_header ?? 'Sambutan Kepala Sekolah') }}"
                                   placeholder="Sambutan Kepala Sekolah">
                            @error('judul_header')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Judul yang akan ditampilkan di bagian header halaman sambutan kepala sekolah</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="deskripsi_header" class="font-weight-bold">Deskripsi Header <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('deskripsi_header') is-invalid @enderror" 
                                      id="deskripsi_header" name="deskripsi_header" rows="3"
                                      placeholder="Selamat datang di website resmi sekolah kami. Mari bersama membangun masa depan pendidikan yang berkualitas.">{{ old('deskripsi_header', $sambutanKepsek->deskripsi_header ?? 'Selamat datang di website resmi sekolah kami. Mari bersama membangun masa depan pendidikan yang berkualitas.') }}</textarea>
                            @error('deskripsi_header')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Deskripsi singkat yang akan ditampilkan di bawah judul header</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <!-- Image Upload -->
            <div class="form-section">
                <h5><i class="fas fa-image me-2"></i>Gambar Header</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="gambar_header" class="font-weight-bold">Upload Gambar Baru</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('gambar_header') is-invalid @enderror" 
                                       id="gambar_header" name="gambar_header" accept="image/*">
                                <label class="custom-file-label" for="gambar_header">Pilih file gambar</label>
                            </div>
                            @error('gambar_header')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF. Maks: 2MB</small>
                        </div>
                    </div>
                    
                    @if($sambutanKepsek->gambar_header)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Gambar Saat Ini</label>
                                <div class="mb-2">
                                    @php
                                        $imagePath = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->gambar_header;
                                        $imageExists = file_exists(public_path($imagePath));
                                    @endphp
                                    @if($imageExists)
                                        <img src="{{ asset($imagePath) }}" 
                                             alt="Gambar Header" class="img-thumbnail" style="max-height: 100px;">
                                    @else
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            <strong>Peringatan!</strong> File gambar tidak ditemukan di server.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-md-12 mb-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Preview Gambar Baru</label>
                            <div class="image-preview-container">
                                <img id="headerImagePreview" src="#" alt="Preview Gambar" class="image-preview" 
                                     style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information -->
            <div class="alert alert-info">
                <h6><i class="fas fa-info-circle me-2"></i>Informasi</h6>
                <ul class="mb-0 small">
                    <li>Judul header akan ditampilkan sebagai heading utama</li>
                    <li>Deskripsi header akan ditampilkan sebagai subtitle</li>
                    <li>Gambar header akan ditampilkan di bagian header section</li>
                    <li>Jika tidak ada gambar, akan menggunakan gambar default</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>
            Simpan Pengaturan Header
        </button>
    </div>
</form>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat.</p>
</div>
@endif