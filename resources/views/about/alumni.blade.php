@extends('layouts.app')

@section('title', 'Alumni')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Alumni</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alumni</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="d-flex align-items-center justify-content-between mb-1">
        <h3 class="mb-0">Data Alumni</h3>
        <span id="totalAlumni" class="badge bg-success-subtle text-success border border-success small">Total: {{ $alumni->total() }}</span>
    </div>
    <p class="text-muted mb-4">Testimoni dan perjalanan alumni SDIT Lukman Al Hakim setelah lulus.</p>

    <form method="GET" action="{{ route('about.alumni') }}" class="card card-body mb-4 border-0 filter-card" id="alumniFilterForm">
        <input type="hidden" name="page" value="1">
        <div class="row g-3 align-items-end">
            <div class="col-12">
                <label class="form-label small text-uppercase fw-semibold text-muted">Cari Alumni</label>
                <div class="input-group input-group-sm stylish-input glow-on-focus">
                    <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" name="q" value="{{ $q ?? '' }}" class="form-control auto-submit" placeholder="Ketik nama, tahun lulus, pendidikan, pekerjaan, prestasi, atau testimoni...">
                    @if(!empty($q))
                      <a class="btn btn-outline-secondary" data-ajax="1" href="{{ route('about.alumni') }}" title="Bersihkan"><i class="fas fa-times"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </form>

    <div id="alumniList">
        @include('about.partials.alumni_list')
    </div>
</div>

<style>
  .stylish-input .input-group-text{border-right:0}
  .stylish-input .form-control{border-left:0}
  .stylish-input .form-control:focus{box-shadow:none}
  .filter-card{background:linear-gradient(180deg, rgba(255,255,255,.85), rgba(255,255,255,.75)); backdrop-filter: blur(6px); box-shadow:none!important}
  .glow-on-focus:focus-within{box-shadow:none!important; border-radius:.5rem}
  .bg-success-subtle{background:rgba(25,135,84,.1)!important}
  .border-success{border-color:rgba(25,135,84,.35)!important}
  .alumni-card, .alumni-card img { box-shadow: none !important; }
  .alumni-card{transition:transform .25s ease}
  .alumni-card:hover{transform:translateY(-4px);}
</style>

<script>
  document.addEventListener('DOMContentLoaded', function(){
    (function(){
      const form = document.getElementById('alumniFilterForm');
      const list = document.getElementById('alumniList');
      const total = document.getElementById('totalAlumni');
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
          const qEl = form.querySelector('[name="q"]');
          if(qEl) qEl.value = q;
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

      const debounce = (fn, delay=500)=>{ let t; return (...args)=>{ clearTimeout(t); t=setTimeout(()=>fn(...args), delay); }; };
      const onFilterChange = ()=>{
        setPageOne();
        const url = buildUrl(form.action, getParams());
        window.history.pushState({}, '', url);
        updateList(url);
      };

      form.addEventListener('submit', e=>{ e.preventDefault(); onFilterChange(); });
      form.querySelectorAll('.auto-submit').forEach(el=> el.addEventListener('input', debounce(onFilterChange, 500)));

      form.querySelectorAll('a[data-ajax="1"]').forEach(a=>{
        a.addEventListener('click', e=>{
          e.preventDefault();
          const href = a.getAttribute('href');
          syncFormWithUrl(href);
          window.history.pushState({}, '', href);
          updateList(href);
        });
      });

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
  });
</script>
@endsection 