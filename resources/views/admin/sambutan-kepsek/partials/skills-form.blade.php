@if(isset($sambutanKepsek) && $sambutanKepsek)
<form action="{{ route('admin.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-section mt-2">
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
            Simpan Skills
        </button>
    </div>
</form>
@push('scripts')
<script>
(function(){
    const sContainer = document.getElementById('skillsRepeater');
    const addS = document.getElementById('addSkill');

    function renumber(){
        const items = sContainer.querySelectorAll('.skill-item');
        items.forEach((el, i) => {
            const span = el.querySelector('.sk-number');
            if(span) span.textContent = (i+1);
            el.setAttribute('data-index', i);
            el.querySelectorAll('input').forEach(inp => {
                if(inp.name){ inp.name = inp.name.replace(/\[(\d+)\]/, '['+i+']'); }
            });
        });
    }

    sContainer.addEventListener('click', function(e){
        if(e.target.closest('.btn-remove-skill')){
            const item = e.target.closest('.skill-item');
            item.parentNode.removeChild(item);
            renumber();
        }
    });

    if(addS){
        addS.addEventListener('click', function(){
            const idx = sContainer.querySelectorAll('.skill-item').length;
            const html = `
            <div class=\"card mb-3 skill-item\" data-index=\"${idx}\">
              <div class=\"card-body\">
                <div class=\"d-flex justify-content-between align-items-center mb-2\">
                  <strong>Skill #<span class=\"sk-number\">${idx+1}</span></strong>
                  <button type=\"button\" class=\"btn btn-sm btn-outline-danger btn-remove-skill\"><i class=\"fas fa-trash\"></i> Hapus</button>
                </div>
                <div class=\"row g-3\">
                  <div class=\"col-md-3\">
                    <label class=\"form-label\">Ikon</label>
                    <input type=\"file\" name=\"skill_icons[${idx}]\" accept=\"image/*\" class=\"form-control\">
                    <input type=\"hidden\" name=\"skills[${idx}][icon_path]\" value=\"\">
                  </div>
                  <div class=\"col-md-4\">
                    <label class=\"form-label\">Judul <span class=\"text-danger\">*</span></label>
                    <input type=\"text\" name=\"skills[${idx}][title]\" class=\"form-control\" required>
                  </div>
                  <div class=\"col-md-5\">
                    <label class=\"form-label\">Tagline</label>
                    <input type=\"text\" name=\"skills[${idx}][tagline]\" class=\"form-control\">
                  </div>
                </div>
              </div>
            </div>`;
            sContainer.insertAdjacentHTML('beforeend', html);
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
