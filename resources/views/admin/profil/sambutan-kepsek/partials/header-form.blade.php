@if(isset($sambutanKepsek) && $sambutanKepsek)
<form action="{{ route('admin.profil.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-12">
            <!-- Header Content -->
            <div class="form-section">
                <h5><i class="fas fa-heading me-2"></i>Konten Header</h5>
                <div class="row">
                    <div class="col-12">
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
                    <div class="col-12">
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
            
            <!-- Foto Kepala Sekolah (2 Foto) -->
            <div class="form-section mt-4">
                <h5><i class="fas fa-user-circle me-2"></i>Foto Kepala Sekolah (2 Foto untuk Layout)</h5>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="foto_kepsek" class="font-weight-bold">Upload Foto Pertama</label>
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
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="foto_kedua" class="font-weight-bold">Upload Foto Kedua</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('foto_kedua') is-invalid @enderror" 
                                       id="foto_kedua" name="foto_kedua" accept="image/*">
                                <label class="custom-file-label" for="foto_kedua">Pilih file foto</label>
                            </div>
                            @error('foto_kedua')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF. Maks: 2MB</small>
                        </div>
                    </div>
                    
                    @if($sambutanKepsek->foto_kepsek || $sambutanKepsek->foto_kedua)
                        <div class="col-12 col-md-6">
                            @if($sambutanKepsek->foto_kepsek)
                                <div class="form-group">
                                    <label class="font-weight-bold">Foto Pertama Saat Ini</label>
                                    <div class="mb-2">
                                        @php
                                            $imagePath = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kepsek;
                                            $imageExists = file_exists(public_path($imagePath));
                                        @endphp
                                        @if($imageExists)
                                            <img src="{{ asset($imagePath) }}" 
                                                 alt="Foto Kepala Sekolah" class="img-thumbnail" style="max-height: 120px; width: 100%;">
                                        @else
                                            <div class="alert alert-warning">
                                                <i class="fas fa-exclamation-triangle me-2"></i>
                                                <strong>Peringatan!</strong> File foto tidak ditemukan.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            @if($sambutanKepsek->foto_kedua)
                                <div class="form-group">
                                    <label class="font-weight-bold">Foto Kedua Saat Ini</label>
                                    <div class="mb-2">
                                        @php
                                            $imagePath2 = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kedua;
                                            $imageExists2 = file_exists(public_path($imagePath2));
                                        @endphp
                                        @if($imageExists2)
                                            <img src="{{ asset($imagePath2) }}" 
                                                 alt="Foto Kedua Kepala Sekolah" class="img-thumbnail" style="max-height: 120px; width: 100%;">
                                        @else
                                            <div class="alert alert-warning">
                                                <i class="fas fa-exclamation-triangle me-2"></i>
                                                <strong>Peringatan!</strong> File foto tidak ditemukan.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Preview Foto Pertama</label>
                            <div class="image-preview-container">
                                <img id="fotoKepsekPreview" src="#" alt="Preview Foto Pertama" class="image-preview" 
                                     style="display: none; max-height: 120px; width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Preview Foto Kedua</label>
                            <div class="image-preview-container">
                                <img id="fotoKeduaPreview" src="#" alt="Preview Foto Kedua" class="image-preview" 
                                     style="display: none; max-height: 120px; width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sambutan Content -->
            <div class="form-section mt-4">
                <h5><i class="fas fa-comments me-2"></i>Isi Sambutan</h5>
                <div class="row">
                    <div class="col-12">
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
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="video_url" class="font-weight-bold">URL Video Sambutan</label>
                            <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                                   id="video_url" name="video_url" 
                                   value="{{ old('video_url', $sambutanKepsek->video_url ?? '') }}"
                                   placeholder="https://www.youtube.com/watch?v=VIDEO_ID atau https://youtu.be/VIDEO_ID">
                            @error('video_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Link video YouTube (format: https://www.youtube.com/watch?v=VIDEO_ID atau https://youtu.be/VIDEO_ID). 
                                Sistem akan otomatis mengkonversi ke format embed.
                            </small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tahun_berdiri" class="font-weight-bold">Lama Sekolah Berdiri (Tahun) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('tahun_berdiri') is-invalid @enderror" 
                                   id="tahun_berdiri" name="tahun_berdiri" 
                                   value="{{ old('tahun_berdiri', $sambutanKepsek->tahun_berdiri ?? 11) }}"
                                   min="1" max="100"
                                   placeholder="11">
                            @error('tahun_berdiri')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Berapa lama sekolah sudah berdiri (1-100 tahun)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Testimonials & Skills moved to their own tabs --}}

    <div class="form-group mb-0 mt-4">
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
