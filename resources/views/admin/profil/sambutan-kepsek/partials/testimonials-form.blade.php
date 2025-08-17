@if(isset($sambutanKepsek) && $sambutanKepsek)
<form action="{{ route('admin.profil.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-section mt-2">
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

    <div class="form-group mb-0 mt-4">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>
            Simpan Testimonials
        </button>
    </div>
</form>
@push('scripts')
<script>
(function(){
    const tContainer = document.getElementById('testimonialsRepeater');
    const addT = document.getElementById('addTestimonial');

    function renumber(){
        const items = tContainer.querySelectorAll('.testimonial-item');
        items.forEach((el, i) => {
            const span = el.querySelector('.ti-number');
            if(span) span.textContent = (i+1);
            el.setAttribute('data-index', i);
            el.querySelectorAll('input, textarea').forEach(inp => {
                if(inp.name){ inp.name = inp.name.replace(/\[(\d+)\]/, '['+i+']'); }
            });
        });
    }

    tContainer.addEventListener('click', function(e){
        if(e.target.closest('.btn-remove-testimonial')){
            const item = e.target.closest('.testimonial-item');
            item.parentNode.removeChild(item);
            renumber();
        }
    });

    if(addT){
        addT.addEventListener('click', function(){
            const idx = tContainer.querySelectorAll('.testimonial-item').length;
            const html = `
            <div class="card mb-3 testimonial-item" data-index="${idx}">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <strong>Testimoni #<span class="ti-number">${idx+1}</span></strong>
                  <button type="button" class="btn btn-sm btn-outline-danger btn-remove-testimonial"><i class="fas fa-trash"></i> Hapus</button>
                </div>
                <div class="row g-3">
                  <div class="col-md-4">
                    <label class="form-label">Foto</label>
                    <input type="file" name="testimonial_photos[${idx}]" accept="image/*" class="form-control">
                    <input type="hidden" name="testimonials[${idx}][photo_path]" value="">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="testimonials[${idx}][name]" class="form-control" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Peran</label>
                    <input type="text" name="testimonials[${idx}][role]" class="form-control">
                  </div>
                  <div class="col-md-9">
                    <label class="form-label">Isi Testimoni <span class="text-danger">*</span></label>
                    <textarea name="testimonials[${idx}][text]" rows="3" class="form-control" required></textarea>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Rating</label>
                    <input type="number" min="1" max="5" name="testimonials[${idx}][rating]" class="form-control" value="5">
                  </div>
                </div>
              </div>
            </div>`;
            tContainer.insertAdjacentHTML('beforeend', html);
        });
    }
})();
</script>
@endpush
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat.</p>
</div>
@endif
