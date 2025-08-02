@if(isset($settings) && $settings)
@if(Route::has('admin.website.settings.updateHeader'))
<form action="{{ route('admin.website.settings.updateHeader') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-8">
            <!-- Contact Information -->
            <div class="form-section">
                <h5><i class="fas fa-phone mr-2"></i>Informasi Kontak</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="header_phone" class="font-weight-bold">Telepon</label>
                            <input type="text" class="form-control @error('header_phone') is-invalid @enderror" 
                                   id="header_phone" name="header_phone" 
                                   value="{{ old('header_phone', $settings->header_phone ?? '+62 857-4725-5761') }}"
                                   placeholder="+62 857-4725-5761">
                            @error('header_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="header_address" class="font-weight-bold">Alamat</label>
                            <input type="text" class="form-control @error('header_address') is-invalid @enderror" 
                                   id="header_address" name="header_address" 
                                   value="{{ old('header_address', $settings->header_address ?? 'Sleman, Yogyakarta') }}"
                                   placeholder="Sleman, Yogyakarta">
                            @error('header_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="form-section">
                <h5><i class="fas fa-share-alt mr-2 mt-4"></i>Media Sosial</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="header_facebook" class="font-weight-bold">Facebook</label>
                            <input type="url" class="form-control @error('header_facebook') is-invalid @enderror" 
                                   id="header_facebook" name="header_facebook" 
                                   value="{{ old('header_facebook', $settings->header_facebook ?? '') }}"
                                   placeholder="https://facebook.com/...">
                            @error('header_facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="header_instagram" class="font-weight-bold">Instagram</label>
                            <input type="url" class="form-control @error('header_instagram') is-invalid @enderror" 
                                   id="header_instagram" name="header_instagram" 
                                   value="{{ old('header_instagram', $settings->header_instagram ?? '') }}"
                                   placeholder="https://instagram.com/...">
                            @error('header_instagram')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="header_youtube" class="font-weight-bold">YouTube</label>
                            <input type="url" class="form-control @error('header_youtube') is-invalid @enderror" 
                                   id="header_youtube" name="header_youtube" 
                                   value="{{ old('header_youtube', $settings->header_youtube ?? '') }}"
                                   placeholder="https://youtube.com/...">
                            @error('header_youtube')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="header_google_map" class="font-weight-bold">Google Maps</label>
                            <input type="url" class="form-control @error('header_google_map') is-invalid @enderror" 
                                   id="header_google_map" name="header_google_map" 
                                   value="{{ old('header_google_map', $settings->header_google_map ?? '') }}"
                                   placeholder="https://maps.google.com/...">
                            @error('header_google_map')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- PSB Link -->
            <div class="form-section">
                <h5><i class="fas fa-users mr-2 mt-4"></i>Link Pendaftaran</h5>
                <div class="form-group">
                    <label for="header_psb_link" class="font-weight-bold">Link PSB (Pendaftaran Siswa Baru)</label>
                    <input type="url" class="form-control @error('header_psb_link') is-invalid @enderror" 
                           id="header_psb_link" name="header_psb_link" 
                           value="{{ old('header_psb_link', $settings->header_psb_link ?? 'https://psb.luqmanalhakim.sch.id/') }}"
                           placeholder="https://psb.luqmanalhakim.sch.id/">
                    @error('header_psb_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Link ini akan digunakan untuk tombol "DAFTAR" di header</small>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <!-- Logo Upload -->
            <div class="form-section">
                <h5><i class="fas fa-image mr-2 mt-4"></i>Logo Website</h5>
                <div class="form-group">
                    <label for="header_logo" class="font-weight-bold">Upload Logo Baru</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('header_logo') is-invalid @enderror" 
                               id="header_logo" name="header_logo" accept="image/*">
                        <label class="custom-file-label" for="header_logo">Pilih file logo</label>
                    </div>
                    @error('header_logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF. Maks: 2MB</small>
                </div>
                
                @if($settings->header_logo)
                    <div class="form-group">
                        <label class="font-weight-bold">Logo Saat Ini</label>
                        <div class="mb-2">
                            @php
                                $logoPath = 'storage/' . $settings->header_logo;
                                $logoExists = file_exists(public_path($logoPath));
                            @endphp
                            @if($logoExists)
                                <img src="{{ asset($logoPath) }}" 
                                     alt="Logo Website" class="img-thumbnail" style="max-height: 100px;">
                            @else
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    <strong>Peringatan!</strong> File logo tidak ditemukan di server.
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                
                <div class="form-group">
                    <label class="font-weight-bold">Preview Logo Baru</label>
                    <div class="logo-preview-container">
                        <img id="logoPreview" src="#" alt="Preview Logo" class="logo-preview" 
                             style="display: none;">
                    </div>
                </div>
            </div>

            <!-- Information -->
            <div class="alert alert-info">
                <h6><i class="fas fa-info-circle mr-2"></i>Informasi</h6>
                <ul class="mb-0 small">
                    <li>Semua field bersifat opsional</li>
                    <li>Logo akan ditampilkan di header website</li>
                    <li>Link media sosial akan ditampilkan di header</li>
                    <li>Link PSB akan digunakan untuk tombol "DAFTAR"</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save mr-2"></i>
            Simpan Pengaturan Header
        </button>
    </div>
</form>
@else
<div class="alert alert-danger">
    <i class="fas fa-exclamation-triangle mr-2"></i>
    <strong>Error!</strong> Route untuk update header tidak ditemukan. Silakan hubungi administrator.
</div>
@endif
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Pengaturan header tidak dapat dimuat.</p>
</div>
@endif 