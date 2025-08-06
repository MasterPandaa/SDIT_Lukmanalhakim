@if(isset($sambutanKepsek) && $sambutanKepsek)
<form action="{{ route('admin.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-8">
            <!-- Sambutan Content -->
            <div class="form-section">
                <h5><i class="fas fa-comments me-2"></i>Isi Sambutan</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="sambutan" class="font-weight-bold">Sambutan Kepala Sekolah <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('sambutan') is-invalid @enderror" 
                                      id="sambutan" name="sambutan" rows="10"
                                      placeholder="Assalamu'alaikum Warahmatullahi Wabarakatuh...">{{ old('sambutan', $sambutanKepsek->sambutan ?? 'Assalamu\'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT atas segala rahmat dan karunia-Nya. Selamat datang di website resmi sekolah kami.') }}</textarea>
                            @error('sambutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Isi sambutan lengkap dari kepala sekolah</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="video_url" class="font-weight-bold">URL Video Sambutan</label>
                            <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                                   id="video_url" name="video_url" 
                                   value="{{ old('video_url', $sambutanKepsek->video_url ?? '') }}"
                                   placeholder="https://www.youtube.com/embed/example">
                            @error('video_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Link video YouTube embed (opsional)</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tahun_berdiri" class="font-weight-bold">Tahun Berdiri Sekolah <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('tahun_berdiri') is-invalid @enderror" 
                                   id="tahun_berdiri" name="tahun_berdiri" 
                                   value="{{ old('tahun_berdiri', $sambutanKepsek->tahun_berdiri ?? date('Y')) }}"
                                   min="1900" max="{{ date('Y') + 10 }}"
                                   placeholder="{{ date('Y') }}">
                            @error('tahun_berdiri')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Tahun didirikannya sekolah</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <!-- Foto Kepala Sekolah -->
            <div class="form-section">
                <h5><i class="fas fa-user-circle me-2"></i>Foto Kepala Sekolah</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="foto_kepsek" class="font-weight-bold">Upload Foto Baru</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('foto_kepsek') is-invalid @enderror" 
                                       id="foto_kepsek" name="foto_kepsek" accept="image/*">
                                <label class="custom-file-label" for="foto_kepsek">Pilih file foto</label>
                            </div>
                            @error('foto_kepsek')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF. Maks: 2MB</small>
                        </div>
                    </div>
                    
                    @if($sambutanKepsek->foto_kepsek)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Foto Saat Ini</label>
                                <div class="mb-2">
                                    @php
                                        $imagePath = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kepsek;
                                        $imageExists = file_exists(public_path($imagePath));
                                    @endphp
                                    @if($imageExists)
                                        <img src="{{ asset($imagePath) }}" 
                                             alt="Foto Kepala Sekolah" class="img-thumbnail" style="max-height: 150px;">
                                    @else
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            <strong>Peringatan!</strong> File foto tidak ditemukan di server.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-md-12 mb-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Preview Foto Baru</label>
                            <div class="image-preview-container">
                                <img id="fotoKepsekPreview" src="#" alt="Preview Foto" class="image-preview" 
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
                    <li>Sambutan akan ditampilkan sebagai konten utama</li>
                    <li>Video URL harus dalam format embed YouTube</li>
                    <li>Tahun berdiri digunakan untuk menghitung usia sekolah</li>
                    <li>Foto kepala sekolah akan ditampilkan di samping sambutan</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>
            Simpan Konten Sambutan
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