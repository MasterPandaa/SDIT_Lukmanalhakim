@if(isset($indikatorKelulusan) && $indikatorKelulusan)
<div class="form-section">
    <h5><i class="fas fa-heading me-2"></i>Pengaturan Header</h5>
    
    <form action="{{ route('admin.indikator-kelulusan.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="judul_header">Judul Header</label>
                    <input type="text" class="form-control @error('judul_header') is-invalid @enderror" 
                           id="judul_header" name="judul_header" 
                           value="{{ old('judul_header', $indikatorKelulusan->judul_header ?? 'Target sekolah untuk menghafal 10 juz Al-Qur\'an menjadi motivasi bagi orang tua.') }}"
                           placeholder="Target sekolah untuk menghafal 10 juz Al-Qur'an menjadi motivasi bagi orang tua.">
                    @error('judul_header')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="judul_utama">Judul Utama</label>
                    <input type="text" class="form-control @error('judul_utama') is-invalid @enderror" 
                           id="judul_utama" name="judul_utama" 
                           value="{{ old('judul_utama', $indikatorKelulusan->judul_utama ?? '100 Indikator Kelulusan') }}"
                           placeholder="100 Indikator Kelulusan">
                    @error('judul_utama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="deskripsi_header">Deskripsi Header</label>
            <textarea class="form-control @error('deskripsi_header') is-invalid @enderror" 
                      id="deskripsi_header" name="deskripsi_header" rows="3"
                      placeholder="Program indikator kelulusan yang komprehensif untuk mengukur pencapaian siswa dalam berbagai aspek pembelajaran dan pengembangan karakter.">{{ old('deskripsi_header', $indikatorKelulusan->deskripsi_header ?? 'Program indikator kelulusan yang komprehensif untuk mengukur pencapaian siswa dalam berbagai aspek pembelajaran dan pengembangan karakter.') }}</textarea>
            @error('deskripsi_header')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_pembicara">Nama Pembicara</label>
                    <input type="text" class="form-control @error('nama_pembicara') is-invalid @enderror" 
                           id="nama_pembicara" name="nama_pembicara" 
                           value="{{ old('nama_pembicara', $indikatorKelulusan->nama_pembicara ?? '') }}"
                           placeholder="Nama Pembicara">
                    @error('nama_pembicara')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kategori_tags">Kategori Tags (pisahkan dengan koma)</label>
                    <input type="text" class="form-control @error('kategori_tags') is-invalid @enderror" 
                           id="kategori_tags" name="kategori_tags" 
                           value="{{ old('kategori_tags', is_array($indikatorKelulusan->kategori_tags) ? implode(', ', $indikatorKelulusan->kategori_tags) : '') }}"
                           placeholder="Unggul, Islami, Berprestasi">
                    @error('kategori_tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gambar_header">Gambar Header</label>
                    <input type="file" class="form-control-file @error('gambar_header') is-invalid @enderror" 
                           id="gambar_header" name="gambar_header" accept="image/*">
                    @error('gambar_header')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($indikatorKelulusan->gambar_header)
                        <div class="col-md-12">
                            <div class="image-preview-container">
                                <h6>Gambar Header Saat Ini</h6>
                                @php
                                    $imagePath = 'assets/images/indikator-kelulusan/' . $indikatorKelulusan->gambar_header;
                                    $imageExists = file_exists(public_path($imagePath));
                                @endphp
                                @if($imageExists)
                                    <img src="{{ asset($imagePath) }}" alt="Header Image" class="image-preview">
                                @else
                                    <div class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        File gambar tidak ditemukan: {{ $indikatorKelulusan->gambar_header }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="foto_pembicara">Foto Pembicara</label>
                    <input type="file" class="form-control-file @error('foto_pembicara') is-invalid @enderror" 
                           id="foto_pembicara" name="foto_pembicara" accept="image/*">
                    @error('foto_pembicara')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($indikatorKelulusan->foto_pembicara)
                        <div class="col-md-12">
                            <div class="image-preview-container">
                                <h6>Foto Pembicara Saat Ini</h6>
                                @php
                                    $imagePath = 'assets/images/indikator-kelulusan/' . $indikatorKelulusan->foto_pembicara;
                                    $imageExists = file_exists(public_path($imagePath));
                                @endphp
                                @if($imageExists)
                                    <img src="{{ asset($imagePath) }}" alt="Foto Pembicara" class="image-preview">
                                @else
                                    <div class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        File foto tidak ditemukan: {{ $indikatorKelulusan->foto_pembicara }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="video_url">URL Video</label>
            <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                   id="video_url" name="video_url" 
                   value="{{ old('video_url', $indikatorKelulusan->video_url ?? '') }}"
                   placeholder="https://www.youtube.com/embed/VIDEO_ID">
            @error('video_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-2"></i>
                Simpan Perubahan Header
            </button>
        </div>
    </form>
</div>

<!-- Preview Section -->
<div class="form-section">
    <h5><i class="fas fa-eye me-2"></i>Preview Header</h5>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ $indikatorKelulusan->judul_header ?? 'Target sekolah untuk menghafal 10 juz Al-Qur\'an menjadi motivasi bagi orang tua.' }}</h6>
                    <p class="card-text">{{ $indikatorKelulusan->deskripsi_header ?? 'Program indikator kelulusan yang komprehensif untuk mengukur pencapaian siswa dalam berbagai aspek pembelajaran dan pengembangan karakter.' }}</p>
                    @if($indikatorKelulusan->kategori_tags && is_array($indikatorKelulusan->kategori_tags))
                        <div class="mb-2">
                            @foreach($indikatorKelulusan->kategori_tags as $tag)
                                <span class="badge badge-primary me-1">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif
                    @if($indikatorKelulusan->nama_pembicara)
                        <small class="text-muted">Pembicara: {{ $indikatorKelulusan->nama_pembicara }}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="{{ route('indikator-kelulusan') }}" target="_blank" class="btn btn-outline-secondary w-100 mb-2">
                <i class="fas fa-eye me-2"></i>Preview
            </a>
            <a href="{{ route('admin.indikator-kelulusan.index') }}" class="btn btn-outline-primary w-100">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>
@endif