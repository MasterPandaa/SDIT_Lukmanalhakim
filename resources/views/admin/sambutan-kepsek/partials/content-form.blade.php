@if(isset($sambutanKepsek) && $sambutanKepsek)
<form action="{{ route('admin.sambutan-kepsek.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Sambutan Content -->
    <div class="form-section">
        <h5><i class="fas fa-file-text me-2"></i>Konten Sambutan</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="sambutan" class="font-weight-bold">Sambutan Kepala Sekolah <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('sambutan') is-invalid @enderror" 
                              id="sambutan" name="sambutan" rows="12" required
                              placeholder="Assalamu'alaikum Warrahmatullahi Wabarakatuh...">{{ old('sambutan', $sambutanKepsek->sambutan ?? 'Assalamu\'alaikum Warrahmatullahi Wabarakatuh.<br><br>Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya kepada kita semua. Shalawat dan salam semoga selalu tercurah kepada Nabi Muhammad SAW.') }}</textarea>
                    @error('sambutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Sambutan kepala sekolah yang akan ditampilkan di halaman sambutan</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="form-section">
        <h5><i class="fas fa-eye me-2"></i>Preview Sambutan</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-file-text me-2"></i>Sambutan Kepala Sekolah</h6>
                    </div>
                    <div class="card-body">
                        <div id="sambutanPreview" class="text-center">
                            <div id="sambutanPreviewText">
                                {!! old('sambutan', $sambutanKepsek->sambutan ?? 'Assalamu\'alaikum Warrahmatullahi Wabarakatuh.<br><br>Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya kepada kita semua. Shalawat dan salam semoga selalu tercurah kepada Nabi Muhammad SAW.') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Information -->
    <div class="alert alert-info">
        <h6><i class="fas fa-info-circle me-2"></i>Informasi</h6>
        <ul class="mb-0 small">
            <li>Sambutan kepala sekolah akan ditampilkan sebagai konten utama</li>
            <li>Anda dapat menggunakan tag HTML untuk formatting (seperti &lt;br&gt;, &lt;strong&gt;, &lt;em&gt;, dll.)</li>
            <li>Sambutan akan ditampilkan dengan styling yang sesuai dengan tema website</li>
        </ul>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>
            Simpan Sambutan
        </button>
    </div>
</form>

<script>
// Live preview for sambutan
document.getElementById('sambutan').addEventListener('input', function() {
    document.getElementById('sambutanPreviewText').innerHTML = this.value;
});
</script>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat.</p>
</div>
@endif 