@if(isset($sambutan) && $sambutan)
<form action="{{ route('admin.profil.sambutan-kepsek.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Sambutan Content -->
    <div class="form-section">
        <h5><i class="fas fa-file-alt me-2"></i>Konten Sambutan</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="sambutan" class="font-weight-bold">Sambutan Kepala Sekolah <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('sambutan') is-invalid @enderror" 
                              id="sambutan" name="sambutan" rows="12" required
                              placeholder="Assalamu'alaikum Warrahmatullahi Wabarakatuh...">{{ old('sambutan', $sambutan->sambutan ?? 'Assalamu\'alaikum Warrahmatullahi Wabarakatuh.<br><br>Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya kepada kita semua. Shalawat dan salam semoga selalu tercurah kepada Nabi Muhammad SAW, keluarga, sahabat, dan seluruh umatnya.<br><br>SDIT Luqman Al Hakim Sleman hadir sebagai lembaga pendidikan yang berkomitmen untuk mengembangkan potensi peserta didik secara holistik, mengintegrasikan pendidikan akademik dengan nilai-nilai Islam, dan membentuk karakter yang unggul.<br><br>Kami percaya bahwa setiap anak memiliki potensi unik yang perlu dikembangkan dengan pendekatan yang tepat. Melalui kurikulum yang terintegrasi, metode pembelajaran yang inovatif, dan lingkungan yang kondusif, kami berusaha menciptakan generasi yang tidak hanya cerdas secara akademik, tetapi juga berakhlak mulia dan siap menghadapi tantangan masa depan.<br><br>Kepada seluruh orang tua, guru, dan stakeholder yang telah mendukung perjalanan kami, kami ucapkan terima kasih. Mari kita bersama-sama mewujudkan visi besar untuk menciptakan generasi unggul yang membanggakan bangsa dan agama.<br><br>Wassalamu\'alaikum Warrahmatullahi Wabarakatuh.') }}</textarea>
                    @error('sambutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Sambutan kepala sekolah yang akan ditampilkan di halaman sambutan. Gunakan &lt;br&gt; untuk line break.</small>
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
                        <h6 class="mb-0"><i class="fas fa-file-alt me-2"></i>Preview Sambutan</h6>
                    </div>
                    <div class="card-body">
                        <div id="sambutanPreview" class="text-center">
                            <div id="sambutanPreviewText" class="text-left">
                                {!! old('sambutan', $sambutan->sambutan ?? 'Assalamu\'alaikum Warrahmatullahi Wabarakatuh.<br><br>Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya kepada kita semua. Shalawat dan salam semoga selalu tercurah kepada Nabi Muhammad SAW, keluarga, sahabat, dan seluruh umatnya.<br><br>SDIT Luqman Al Hakim Sleman hadir sebagai lembaga pendidikan yang berkomitmen untuk mengembangkan potensi peserta didik secara holistik, mengintegrasikan pendidikan akademik dengan nilai-nilai Islam, dan membentuk karakter yang unggul.<br><br>Kami percaya bahwa setiap anak memiliki potensi unik yang perlu dikembangkan dengan pendekatan yang tepat. Melalui kurikulum yang terintegrasi, metode pembelajaran yang inovatif, dan lingkungan yang kondusif, kami berusaha menciptakan generasi yang tidak hanya cerdas secara akademik, tetapi juga berakhlak mulia dan siap menghadapi tantangan masa depan.<br><br>Kepada seluruh orang tua, guru, dan stakeholder yang telah mendukung perjalanan kami, kami ucapkan terima kasih. Mari kita bersama-sama mewujudkan visi besar untuk menciptakan generasi unggul yang membanggakan bangsa dan agama.<br><br>Wassalamu\'alaikum Warrahmatullahi Wabarakatuh.') !!}
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
            <li>Sambutan kepala sekolah akan ditampilkan sebagai konten utama di halaman sambutan</li>
            <li>Gunakan format HTML sederhana seperti &lt;br&gt; untuk line break</li>
            <li>Sambutan akan ditampilkan dengan styling yang sesuai dengan tema website</li>
            <li>Pastikan sambutan mencakup salam pembuka, isi sambutan, dan salam penutup</li>
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