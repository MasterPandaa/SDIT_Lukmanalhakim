@extends('layouts.app')

@section('title', 'Prestasi')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Prestasi</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Prestasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="d-flex align-items-center justify-content-between mb-1">
        <h3 class="mb-0">Daftar Prestasi Sekolah</h3>
        <span id="totalPrestasi" class="badge bg-success-subtle text-success border border-success small">Total: {{ $prestasi->total() }}</span>
    </div>
    <p class="text-muted mb-4">Kumpulan capaian terbaik siswa dan sekolah dalam berbagai kompetisi dan kegiatan.</p>
    <form method="GET" action="{{ route('about.prestasi') }}" class="card card-body mb-4 border-0 filter-card" id="prestasiFilterForm">
        <input type="hidden" name="page" value="1">
        <div class="row g-3 align-items-end">
            <div class="col-12 col-lg-9">
                <label class="form-label small text-uppercase fw-semibold text-muted">Cari Prestasi</label>
                <div class="input-group input-group-sm stylish-input glow-on-focus">
                    <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" name="q" value="{{ $q ?? '' }}" class="form-control auto-submit" placeholder="Ketik judul, deskripsi, tingkat, peraih, atau penyelenggara...">
                    @if(!empty($q))
                      <a class="btn btn-outline-secondary" data-ajax="1" href="{{ route('about.prestasi', ['tahun' => request('tahun')]) }}" title="Bersihkan"><i class="fas fa-times"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <label class="form-label small text-uppercase fw-semibold text-muted">Tahun</label>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-sm stylish-input flex-fill glow-on-focus">
                        <span class="input-group-text bg-white"><i class="fas fa-calendar-alt text-muted"></i></span>
                        <select name="tahun" class="form-select auto-change">
                            <option value="">Semua</option>
                            @foreach(($years ?? collect()) as $yr)
                                <option value="{{ $yr }}" {{ (isset($tahun) && (string)$tahun === (string)$yr) ? 'selected' : '' }}>{{ $yr }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{ route('about.prestasi') }}" data-ajax="1" class="btn btn-outline-secondary btn-sm flex-shrink-0"><i class="fas fa-undo me-1"></i>Reset</a>
                </div>
            </div>
        </div>
        
    </form>
    <div id="prestasiList">
        @include('about.partials.prestasi_list')
    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="prestasiModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 overflow-hidden">
      <div class="modal-hero position-relative">
        <div class="modal-hero-bg"></div>
        <div class="modal-hero-overlay"></div>
        <div class="position-absolute top-0 start-0 m-3 d-flex gap-2">
          <span class="badge bg-primary modal-tingkat"></span>
        </div>
        <div class="position-absolute top-0 end-0 m-3 d-flex gap-2">
          <span class="badge bg-dark modal-date"></span>
        </div>
      </div>
      <div class="p-4">
        <h4 class="mb-2 modal-title"></h4>
        <p class="modal-desc text-muted"></p>
        <div class="d-flex flex-wrap gap-2 mt-3">
          <span class="badge rounded-pill bg-success-subtle text-success border border-success modal-peraih d-none"><i class="fas fa-user-graduate me-1"></i></span>
          <span class="badge rounded-pill bg-info-subtle text-info border border-info modal-penyelenggara d-none"><i class="fas fa-building me-1"></i></span>
        </div>
        <div class="text-end mt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
 </div>

<style>
  .gradient-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.35),rgba(0,0,0,0));}
  .line-clamp-3{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;}
  .prestasi-card{transition:transform .25s ease}
  .prestasi-card:hover{transform:translateY(-4px);}
  /* Ensure no shadow on cards/images/badges */
  .prestasi-card, .prestasi-card img, .prestasi-card .badge { box-shadow: none !important; }
  .card-img-top-zoom{transition:transform .4s ease; aspect-ratio:16/9; height:auto; object-fit:cover}
  .prestasi-card:hover .card-img-top-zoom{transform:scale(1.05)}
  .stylish-input .input-group-text{border-right:0}
  .stylish-input .form-control,.stylish-input .form-select{border-left:0}
  .stylish-input .form-control:focus,.stylish-input .form-select:focus{box-shadow:none}
  /* Innovative filter card (no shadow) */
  .filter-card{background:linear-gradient(180deg, rgba(255,255,255,.85), rgba(255,255,255,.75)); backdrop-filter: blur(6px); box-shadow:none!important}
  .glow-on-focus:focus-within{box-shadow:none!important; border-radius:.5rem}
  .bg-success-subtle{background:rgba(25,135,84,.1)!important}
  .bg-info-subtle{background:rgba(13,202,240,.1)!important}
  .border-success{border-color:rgba(25,135,84,.35)!important}
  .border-info{border-color:rgba(13,202,240,.35)!important}
  .bg-primary{background-color:#0d6efd!important}
  .bg-dark{background-color:#212529!important}
  /* Modal hero */
  .modal-hero{aspect-ratio:16/9; max-height:360px}
  .modal-hero-bg{position:absolute;inset:0;background-size:cover;background-position:center}
  .modal-hero-overlay{position:absolute;inset:0;background:linear-gradient(180deg, rgba(0,0,0,.15) 0%, rgba(0,0,0,.45) 100%)}
  @media (max-width: 576px){
    .modal-hero{aspect-ratio:4/3; max-height:260px}
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function(){
    // AJAX filter & pagination (no reload)
    (function(){
      const form = document.getElementById('prestasiFilterForm');
      const list = document.getElementById('prestasiList');
      const total = document.getElementById('totalPrestasi');
      if(!form || !list) return;

      const buildUrl = (base, paramsStr)=>{
        const url = new URL(base, window.location.origin);
        if(paramsStr){ url.search = paramsStr; }
        return url.toString();
      };
      const getParams = ()=> new URLSearchParams(new FormData(form)).toString();
      const setPageOne = ()=>{ const p=form.querySelector('input[name="page"]'); if(p) p.value='1'; };
      const syncFormWithUrl = (urlStr)=>{
        try{
          const sp = new URL(urlStr, window.location.origin).searchParams;
          const q = sp.get('q') || '';
          const tahun = sp.get('tahun') || '';
          const qEl = form.querySelector('[name="q"]');
          const tEl = form.querySelector('[name="tahun"]');
          if(qEl) qEl.value = q;
          if(tEl) tEl.value = tahun;
        }catch(e){}
      };
      const updateList = (urlStr)=>{
        document.body.style.cursor='progress';
        fetch(urlStr, { headers: { 'X-Requested-With': 'XMLHttpRequest' }})
          .then(r=>r.json())
          .then(data=>{
            list.innerHTML = data.html || '';
            if(total && typeof data.total !== 'undefined') total.textContent = `Total: ${data.total}`;
          })
          .finally(()=>{ document.body.style.cursor='default'; });
      };

      // Debounced input handler
      const debounce = (fn, delay=500)=>{ let t; return (...args)=>{ clearTimeout(t); t=setTimeout(()=>fn(...args), delay); }; };
      const onFilterChange = ()=>{
        setPageOne();
        const url = buildUrl(form.action, getParams());
        window.history.pushState({}, '', url);
        updateList(url);
      };

      // Bind events
      form.addEventListener('submit', e=>{ e.preventDefault(); onFilterChange(); });
      form.querySelectorAll('.auto-submit').forEach(el=> el.addEventListener('input', debounce(onFilterChange, 500)));
      form.querySelectorAll('.auto-change').forEach(el=> el.addEventListener('change', onFilterChange));

      // Intercept Reset/Clear links
      form.querySelectorAll('a[data-ajax="1"]').forEach(a=>{
        a.addEventListener('click', e=>{
          e.preventDefault();
          const href = a.getAttribute('href');
          syncFormWithUrl(href);
          window.history.pushState({}, '', href);
          updateList(href);
        });
      });

      // Delegate pagination clicks
      list.addEventListener('click', (e)=>{
        const a = e.target.closest('.pagination a');
        if(a){
          e.preventDefault();
          const href = a.getAttribute('href');
          window.history.pushState({}, '', href);
          syncFormWithUrl(href);
          updateList(href);
        }
      });
    })();
    // Modal rich content
    var modal = document.getElementById('prestasiModal');
    if(modal){
      modal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var title = button.getAttribute('data-title') || '';
        var img = button.getAttribute('data-img') || '';
        var desc = button.getAttribute('data-desc') || '';
        var date = button.getAttribute('data-date') || '';
        var tingkat = button.getAttribute('data-tingkat') || '';
        var peraih = button.getAttribute('data-peraih') || '';
        var penyelenggara = button.getAttribute('data-penyelenggara') || '';

        modal.querySelector('.modal-title').textContent = title;
        modal.querySelector('.modal-desc').textContent = desc;
        var bg = modal.querySelector('.modal-hero-bg');
        if(bg) bg.style.backgroundImage = 'url('+img+')';
        var badgeTingkat = modal.querySelector('.modal-tingkat');
        var badgeDate = modal.querySelector('.modal-date');
        if(badgeTingkat) badgeTingkat.textContent = tingkat;
        if(badgeDate) badgeDate.textContent = date;

        var peraihEl = modal.querySelector('.modal-peraih');
        var penyEl = modal.querySelector('.modal-penyelenggara');
        if(peraih && peraih !== '-') { peraihEl.classList.remove('d-none'); peraihEl.innerHTML = '<i class="fas fa-user-graduate me-1"></i>'+peraih; }
        else { peraihEl.classList.add('d-none'); }
        if(penyelenggara && penyelenggara !== '-') { penyEl.classList.remove('d-none'); penyEl.innerHTML = '<i class="fas fa-building me-1"></i>'+penyelenggara; }
        else { penyEl.classList.add('d-none'); }
      });
    }
  });
</script>

@endsection