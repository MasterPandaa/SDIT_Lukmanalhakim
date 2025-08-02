@if(isset($settings) && $settings)
@if(Route::has('admin.website.settings.updateFooter'))
<form action="{{ route('admin.website.settings.updateFooter') }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-6">
            <!-- Footer Information -->
            <div class="form-section">
                <h5><i class="fas fa-info-circle mr-2"></i>Informasi Footer</h5>
                <div class="form-group">
                    <label for="footer_description" class="font-weight-bold">Deskripsi</label>
                    <textarea class="form-control @error('footer_description') is-invalid @enderror" 
                              id="footer_description" name="footer_description" rows="4"
                              placeholder="SDIT Luqman Al Hakim Sleman is a leading Islamic elementary school...">{{ old('footer_description', $settings->footer_description ?? 'SDIT Luqman Al Hakim Sleman is a leading Islamic elementary school that integrates the national curriculum with Qur\'anic values and Islamic character education.') }}</textarea>
                    @error('footer_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="footer_address" class="font-weight-bold">Alamat</label>
                            <input type="text" class="form-control @error('footer_address') is-invalid @enderror" 
                                   id="footer_address" name="footer_address" 
                                   value="{{ old('footer_address', $settings->footer_address ?? 'Sleman, Yogyakarta') }}"
                                   placeholder="Sleman, Yogyakarta">
                            @error('footer_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="footer_phone" class="font-weight-bold">Telepon</label>
                            <input type="text" class="form-control @error('footer_phone') is-invalid @enderror" 
                                   id="footer_phone" name="footer_phone" 
                                   value="{{ old('footer_phone', $settings->footer_phone ?? '+62 857-4725-5761') }}"
                                   placeholder="+62 857-4725-5761">
                            @error('footer_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="footer_email" class="font-weight-bold">Email</label>
                    <input type="email" class="form-control @error('footer_email') is-invalid @enderror" 
                           id="footer_email" name="footer_email" 
                           value="{{ old('footer_email', $settings->footer_email ?? 'info@luqmanalhakim.sch.id') }}"
                           placeholder="info@luqmanalhakim.sch.id">
                    @error('footer_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="form-section">
                <h5><i class="fas fa-share-alt mr-2"></i>Media Sosial</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="footer_facebook" class="font-weight-bold">Facebook</label>
                            <input type="url" class="form-control @error('footer_facebook') is-invalid @enderror" 
                                   id="footer_facebook" name="footer_facebook" 
                                   value="{{ old('footer_facebook', $settings->footer_facebook ?? '') }}"
                                   placeholder="https://facebook.com/...">
                            @error('footer_facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="footer_twitter" class="font-weight-bold">Twitter</label>
                            <input type="url" class="form-control @error('footer_twitter') is-invalid @enderror" 
                                   id="footer_twitter" name="footer_twitter" 
                                   value="{{ old('footer_twitter', $settings->footer_twitter ?? '') }}"
                                   placeholder="https://twitter.com/...">
                            @error('footer_twitter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="footer_linkedin" class="font-weight-bold">LinkedIn</label>
                            <input type="url" class="form-control @error('footer_linkedin') is-invalid @enderror" 
                                   id="footer_linkedin" name="footer_linkedin" 
                                   value="{{ old('footer_linkedin', $settings->footer_linkedin ?? '') }}"
                                   placeholder="https://linkedin.com/...">
                            @error('footer_linkedin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="footer_instagram" class="font-weight-bold">Instagram</label>
                            <input type="url" class="form-control @error('footer_instagram') is-invalid @enderror" 
                                   id="footer_instagram" name="footer_instagram" 
                                   value="{{ old('footer_instagram', $settings->footer_instagram ?? '') }}"
                                   placeholder="https://instagram.com/...">
                            @error('footer_instagram')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="footer_pinterest" class="font-weight-bold">Pinterest</label>
                    <input type="url" class="form-control @error('footer_pinterest') is-invalid @enderror" 
                           id="footer_pinterest" name="footer_pinterest" 
                           value="{{ old('footer_pinterest', $settings->footer_pinterest ?? '') }}"
                           placeholder="https://pinterest.com/...">
                    @error('footer_pinterest')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <!-- Copyright & Designer -->
            <div class="form-section">
                <h5><i class="fas fa-copyright mr-2"></i>Copyright & Designer</h5>
                <div class="form-group">
                    <label for="footer_copyright_text" class="font-weight-bold">Copyright Text</label>
                    <input type="text" class="form-control @error('footer_copyright_text') is-invalid @enderror" 
                           id="footer_copyright_text" name="footer_copyright_text" 
                           value="{{ old('footer_copyright_text', $settings->footer_copyright_text ?? 'SDIT Luqman Al Hakim') }}"
                           placeholder="SDIT Luqman Al Hakim">
                    @error('footer_copyright_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="footer_designer_text" class="font-weight-bold">Designer Text</label>
                            <input type="text" class="form-control @error('footer_designer_text') is-invalid @enderror" 
                                   id="footer_designer_text" name="footer_designer_text" 
                                   value="{{ old('footer_designer_text', $settings->footer_designer_text ?? 'TIM IT SDIT Luqman Al Hakim') }}"
                                   placeholder="TIM IT SDIT Luqman Al Hakim">
                            @error('footer_designer_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="footer_designer_link" class="font-weight-bold">Designer Link</label>
                            <input type="url" class="form-control @error('footer_designer_link') is-invalid @enderror" 
                                   id="footer_designer_link" name="footer_designer_link" 
                                   value="{{ old('footer_designer_link', $settings->footer_designer_link ?? '') }}"
                                   placeholder="https://...">
                            @error('footer_designer_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer News -->
            <div class="form-section">
                <h5><i class="fas fa-newspaper mr-2"></i>Berita Footer</h5>
                <div class="form-group">
                    <label for="footer_news_1" class="font-weight-bold">Berita 1</label>
                    <textarea class="form-control @error('footer_news_1') is-invalid @enderror" 
                              id="footer_news_1" name="footer_news_1" rows="3"
                              placeholder="SDIT Luqman Al Hakim @sditlhsleman Pendaftaran Siswa Baru Tahun Ajaran 2025/2026 telah dibuka!">{{ old('footer_news_1', $settings->footer_news_1 ?? 'SDIT Luqman Al Hakim @sditlhsleman Pendaftaran Siswa Baru Tahun Ajaran 2025/2026 telah dibuka!') }}</textarea>
                    @error('footer_news_1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="footer_news_2" class="font-weight-bold">Berita 2</label>
                    <textarea class="form-control @error('footer_news_2') is-invalid @enderror" 
                              id="footer_news_2" name="footer_news_2" rows="3"
                              placeholder="SDIT Luqman Al Hakim @sditlhsleman Selamat kepada siswa-siswi yang telah berhasil menyelesaikan hafalan Juz 30!">{{ old('footer_news_2', $settings->footer_news_2 ?? 'SDIT Luqman Al Hakim @sditlhsleman Selamat kepada siswa-siswi yang telah berhasil menyelesaikan hafalan Juz 30!') }}</textarea>
                    @error('footer_news_2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="form-section">
        <h5><i class="fas fa-link mr-2"></i>Link Cepat Footer</h5>
        <div class="row">
            @for($i = 1; $i <= 6; $i++)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Link {{ $i }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="footer_quick_link_{{ $i }}_text" class="font-weight-bold">Teks</label>
                                <input type="text" class="form-control" 
                                       id="footer_quick_link_{{ $i }}_text" 
                                       name="footer_quick_link_{{ $i }}_text" 
                                       value="{{ old("footer_quick_link_{$i}_text", $settings->{"footer_quick_link_{$i}_text"} ?? '') }}"
                                       placeholder="Beranda">
                            </div>
                            <div class="form-group mb-0">
                                <label for="footer_quick_link_{{ $i }}_url" class="font-weight-bold">URL</label>
                                <input type="text" class="form-control" 
                                       id="footer_quick_link_{{ $i }}_url" 
                                       name="footer_quick_link_{{ $i }}_url" 
                                       value="{{ old("footer_quick_link_{$i}_url", $settings->{"footer_quick_link_{$i}_url"} ?? '') }}"
                                       placeholder="/">
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Programs -->
    <div class="form-section">
        <h5><i class="fas fa-graduation-cap mr-2"></i>Program Footer</h5>
        <div class="row">
            @for($i = 1; $i <= 6; $i++)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Program {{ $i }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="footer_program_{{ $i }}_text" class="font-weight-bold">Teks</label>
                                <input type="text" class="form-control" 
                                       id="footer_program_{{ $i }}_text" 
                                       name="footer_program_{{ $i }}_text" 
                                       value="{{ old("footer_program_{$i}_text", $settings->{"footer_program_{$i}_text"} ?? '') }}"
                                       placeholder="Tahfidz Al-Qur'an">
                            </div>
                            <div class="form-group mb-0">
                                <label for="footer_program_{{ $i }}_url" class="font-weight-bold">URL</label>
                                <input type="text" class="form-control" 
                                       id="footer_program_{{ $i }}_url" 
                                       name="footer_program_{{ $i }}_url" 
                                       value="{{ old("footer_program_{$i}_url", $settings->{"footer_program_{$i}_url"} ?? '') }}"
                                       placeholder="/">
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Bottom Links -->
    <div class="form-section">
        <h5><i class="fas fa-list mr-2"></i>Link Bottom Footer</h5>
        <div class="row">
            @for($i = 1; $i <= 4; $i++)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Link {{ $i }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="footer_bottom_link_{{ $i }}_text" class="font-weight-bold">Teks</label>
                                <input type="text" class="form-control" 
                                       id="footer_bottom_link_{{ $i }}_text" 
                                       name="footer_bottom_link_{{ $i }}_text" 
                                       value="{{ old("footer_bottom_link_{$i}_text", $settings->{"footer_bottom_link_{$i}_text"} ?? '') }}"
                                       placeholder="Guru">
                            </div>
                            <div class="form-group mb-0">
                                <label for="footer_bottom_link_{{ $i }}_url" class="font-weight-bold">URL</label>
                                <input type="text" class="form-control" 
                                       id="footer_bottom_link_{{ $i }}_url" 
                                       name="footer_bottom_link_{{ $i }}_url" 
                                       value="{{ old("footer_bottom_link_{$i}_url", $settings->{"footer_bottom_link_{$i}_url"} ?? '') }}"
                                       placeholder="/">
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save mr-2"></i>
            Simpan Pengaturan Footer
        </button>
    </div>
</form>
@else
<div class="alert alert-danger">
    <i class="fas fa-exclamation-triangle mr-2"></i>
    <strong>Error!</strong> Route untuk update footer tidak ditemukan. Silakan hubungi administrator.
</div>
@endif
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Pengaturan footer tidak dapat dimuat.</p>
</div>
@endif 