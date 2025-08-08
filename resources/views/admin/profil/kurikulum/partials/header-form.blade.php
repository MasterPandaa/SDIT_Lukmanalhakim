<form action="{{ route('admin.kurikulum.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-12">
            <div class="section-block p-3">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                    <i class="fas fa-heading me-2"></i>Header Kurikulum
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
    
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Simpan Header
        </button>
    </div>
</form>