<form action="{{ route('admin.kurikulum.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-8">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <i class="fas fa-heading me-2"></i>Header Kurikulum
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="judul" class="form-label">Judul Kurikulum</label>
                                <input type="text" 
                                       class="form-control @error('judul') is-invalid @enderror" 
                                       id="judul" 
                                       name="judul" 
                                       value="{{ old('judul', $kurikulum->judul) }}" 
                                       required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="subtitle" class="form-label">Subtitle</label>
                                <input type="text" 
                                       class="form-control @error('subtitle') is-invalid @enderror" 
                                       id="subtitle" 
                                       name="subtitle" 
                                       value="{{ old('subtitle', $kurikulum->subtitle) }}">
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                          id="deskripsi" 
                                          name="deskripsi" 
                                          rows="4">{{ old('deskripsi', $kurikulum->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        <i class="fas fa-image me-2"></i>Gambar Header
                    </div>
                    
                    @if($kurikulum->gambar_header_url)
                        <div class="mb-3">
                            <img src="{{ $kurikulum->gambar_header_url }}" 
                                 alt="Current Header Image" 
                                 class="img-fluid rounded shadow"
                                 style="max-height: 200px; width: 100%; object-fit: cover;">
                        </div>
                    @endif

                    <div class="form-group mb-3">
                        <label for="gambar_header" class="form-label">Upload Gambar Header Baru</label>
                        <input type="file" 
                               class="form-control @error('gambar_header') is-invalid @enderror" 
                               id="gambar_header" 
                               name="gambar_header" 
                               accept="image/*">
                        @error('gambar_header')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Format yang didukung: JPEG, PNG, GIF. Maksimal 2MB.
                        </small>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" 
                                   class="form-check-input" 
                                   id="is_active" 
                                   name="is_active" 
                                   value="1" 
                                   {{ old('is_active', $kurikulum->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Aktifkan Kurikulum
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Simpan Header
        </button>
    </div>
</form>