@if(isset($sambutanKepsek) && $sambutanKepsek)
<form action="{{ route('admin.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
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

@push('scripts')
<script>
    (function(){
        const tContainer = document.getElementById('testimonialsRepeater');
        const sContainer = document.getElementById('skillsRepeater');
        const addT = document.getElementById('addTestimonial');
        const addS = document.getElementById('addSkill');

        function renumber(selector, numberClass){
            document.querySelectorAll(selector).forEach((el, i) => {
               const span = el.querySelector('.' + numberClass);
               if(span) span.textContent = (i+1);
               el.setAttribute('data-index', i);
               el.querySelectorAll('input, textarea').forEach(inp => {
                   inp.name = inp.name.replace(/\[(\d+)\]/, '['+i+']');
               });
            });
        }

        function removeHandler(container, itemClass, numberClass){
            container.addEventListener('click', function(e){
                if(e.target.closest('.btn-remove-testimonial') || e.target.closest('.btn-remove-skill')){
                    const item = e.target.closest('.' + itemClass);
                    item.parentNode.removeChild(item);
                    renumber('.' + itemClass, numberClass);
                }
            });
        }

        removeHandler(tContainer, 'testimonial-item', 'ti-number');
        removeHandler(sContainer, 'skill-item', 'sk-number');

        function createTestimonial(index){
            return `
            <div class="card mb-3 testimonial-item" data-index="${index}">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <strong>Testimoni #<span class="ti-number">${index+1}</span></strong>
                  <button type="button" class="btn btn-sm btn-outline-danger btn-remove-testimonial"><i class="fas fa-trash"></i> Hapus</button>
                </div>
                <div class="row g-3">
                  <div class="col-md-4">
                    <label class="form-label">Foto</label>
                    <input type="file" name="testimonial_photos[${index}]" accept="image/*" class="form-control">
                    <input type="hidden" name="testimonials[${index}][photo_path]" value="">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="testimonials[${index}][name]" class="form-control" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Peran</label>
                    <input type="text" name="testimonials[${index}][role]" class="form-control">
                  </div>
                  <div class="col-md-9">
                    <label class="form-label">Isi Testimoni <span class="text-danger">*</span></label>
                    <textarea name="testimonials[${index}][text]" rows="3" class="form-control" required></textarea>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Rating</label>
                    <input type="number" min="1" max="5" name="testimonials[${index}][rating]" class="form-control" value="5">
                  </div>
                </div>
              </div>
            </div>`;
        }

        function createSkill(index){
            return `
            <div class="card mb-3 skill-item" data-index="${index}">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <strong>Skill #<span class="sk-number">${index+1}</span></strong>
                  <button type="button" class="btn btn-sm btn-outline-danger btn-remove-skill"><i class="fas fa-trash"></i> Hapus</button>
                </div>
                <div class="row g-3">
                  <div class="col-md-3">
                    <label class="form-label">Ikon</label>
                    <input type="file" name="skill_icons[${index}]" accept="image/*" class="form-control">
                    <input type="hidden" name="skills[${index}][icon_path]" value="">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="skills[${index}][title]" class="form-control" required>
                  </div>
                  <div class="col-md-5">
                    <label class="form-label">Tagline</label>
                    <input type="text" name="skills[${index}][tagline]" class="form-control">
                  </div>
                </div>
              </div>
            </div>`;
        }

        if(addT){
            addT.addEventListener('click', function(){
                const index = tContainer.querySelectorAll('.testimonial-item').length;
                tContainer.insertAdjacentHTML('beforeend', createTestimonial(index));
            });
        }
        if(addS){
            addS.addEventListener('click', function(){
                const index = sContainer.querySelectorAll('.skill-item').length;
                sContainer.insertAdjacentHTML('beforeend', createSkill(index));
            });
        }
    })();
</script>
@endpush
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

    <!-- Testimonials Section -->
    <div class="form-section mt-4">
        <h5><i class="fas fa-comment-dots me-2"></i>Student Feedback (Testimonials)</h5>
        <p class="text-muted">Maksimal ukuran foto 2MB. Hanya 2 testimoni yang akan tampil sekaligus di frontend (bergantian bila lebih dari 2).</p>
        @php
            $defaultTestimonials = [
                [
                    'name' => 'Ibu Siti',
                    'role' => 'Wali Murid Kelas 2',
                    'text' => 'Alhamdulillah, anak saya semakin semangat belajar sejak bersekolah di SDIT Luqman Al Hakim Sleman. Guru-gurunya sabar, pembelajarannya menarik, dan nilai-nilai Islam diterapkan dengan baik. Terima kasih!',
                    'rating' => 5,
                    'photo_path' => 'assets/images/feedback/student/01.jpg',
                ],
                [
                    'name' => 'Bapak Ahmad',
                    'role' => 'Wali Murid Kelas 3',
                    'text' => 'Anak saya jadi lebih disiplin, mandiri, dan mencintai ilmu agama sejak sekolah di SDIT Luqman Al Hakim. Lingkungan belajar yang nyaman membuatnya betah. Sangat puas dengan sekolah ini!',
                    'rating' => 5,
                    'photo_path' => 'assets/images/feedback/student/02.jpg',
                ],
            ];
            $testimonials = old('testimonials', $sambutanKepsek->testimonials ?? $defaultTestimonials);
        @endphp
        <div id="testimonialsRepeater">
            @foreach($testimonials as $idx => $t)
            <div class="card mb-3 testimonial-item" data-index="{{ $idx }}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>Testimoni #<span class="ti-number">{{ $idx + 1 }}</span></strong>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-remove-testimonial"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Foto</label>
                            <input type="file" name="testimonial_photos[{{ $idx }}]" accept="image/*" class="form-control">
                            <input type="hidden" name="testimonials[{{ $idx }}][photo_path]" value="{{ $t['photo_path'] ?? '' }}">
                            @if(!empty($t['photo_path']))
                                <img src="{{ asset($t['photo_path']) }}" class="mt-2 img-thumbnail" style="max-height:100px" alt="foto testimoni">
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="testimonials[{{ $idx }}][name]" class="form-control" value="{{ $t['name'] ?? '' }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Peran</label>
                            <input type="text" name="testimonials[{{ $idx }}][role]" class="form-control" value="{{ $t['role'] ?? '' }}">
                        </div>
                        <div class="col-md-9">
                            <label class="form-label">Isi Testimoni <span class="text-danger">*</span></label>
                            <textarea name="testimonials[{{ $idx }}][text]" rows="3" class="form-control" required>{{ $t['text'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Rating</label>
                            <input type="number" min="1" max="5" name="testimonials[{{ $idx }}][rating]" class="form-control" value="{{ $t['rating'] ?? 5 }}">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-outline-primary" id="addTestimonial"><i class="fas fa-plus"></i> Tambah Testimoni</button>
    </div>

    <!-- Skills Section -->
    <div class="form-section mt-4">
        <h5><i class="fas fa-layer-group me-2"></i>Skills</h5>
        @php
            $defaultSkills = [
                ['title' => 'Bela Diri','tagline' => 'Berani, Disiplin, Tangguh!','icon_path' => 'assets/images/skill/icon/01.jpg'],
                ['title' => 'Robotik','tagline' => 'Kreatif, Inovatif, Futuristik!','icon_path' => 'assets/images/skill/icon/02.jpg'],
                ['title' => 'Sinematografi','tagline' => 'Ekspresi, Kreativitas,Visual!','icon_path' => 'assets/images/skill/icon/03.jpg'],
                ['title' => 'Mini Soccer','tagline' => 'Cepat, Taktis, Seru, Sportif!','icon_path' => 'assets/images/skill/icon/04.jpg'],
            ];
            $skills = old('skills', $sambutanKepsek->skills ?? $defaultSkills);
        @endphp
        <div id="skillsRepeater">
            @foreach($skills as $idx => $s)
            <div class="card mb-3 skill-item" data-index="{{ $idx }}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>Skill #<span class="sk-number">{{ $idx + 1 }}</span></strong>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-remove-skill"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Ikon</label>
                            <input type="file" name="skill_icons[{{ $idx }}]" accept="image/*" class="form-control">
                            <input type="hidden" name="skills[{{ $idx }}][icon_path]" value="{{ $s['icon_path'] ?? '' }}">
                            @if(!empty($s['icon_path']))
                                <img src="{{ asset($s['icon_path']) }}" class="mt-2 img-thumbnail" style="max-height:80px" alt="ikon skill">
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Judul <span class="text-danger">*</span></label>
                            <input type="text" name="skills[{{ $idx }}][title]" class="form-control" value="{{ $s['title'] ?? '' }}" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Tagline</label>
                            <input type="text" name="skills[{{ $idx }}][tagline]" class="form-control" value="{{ $s['tagline'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-outline-primary" id="addSkill"><i class="fas fa-plus"></i> Tambah Skill</button>
    </div>

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