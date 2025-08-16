@extends('layouts.app')

@section('title', 'Fasilitas')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Fasilitas</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="row justify-content-center mb-3">
        <div class="col-12 col-lg-8">
            <div class="card border-0">
                <div class="card-body">
                    <form id="filterForm" class="row g-2 align-items-center" action="{{ route('about.fasilitas') }}" method="GET">
                        <div class="col-12">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" name="q" id="q" value="{{ $q ?? request('q') }}" class="form-control" placeholder="Cari fasilitas (nama, kategori, deskripsi)">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="listContainer">
        @include('about.partials.fasilitas_list', ['fasilitas' => $fasilitas])
    </div>
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const form = document.getElementById('filterForm');
    const input = document.getElementById('q');
    const container = document.getElementById('listContainer');
    let t;

    function fetchList(url){
      const u = new URL(url || form.action, window.location.origin);
      const qv = (input?.value || '').trim();
      if (qv) { u.searchParams.set('q', qv); } else { u.searchParams.delete('q'); }
      fetch(u.toString(), {
        headers: {
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(r => r.json())
      .then(data => {
        if (data && data.html !== undefined) {
          container.innerHTML = data.html;
          const newUrl = u.pathname + (u.search ? u.search : '');
          window.history.replaceState({}, '', newUrl);
        }
      })
      .catch(()=>{});
    }

    if (input) {
      input.addEventListener('input', function(){
        clearTimeout(t);
        t = setTimeout(()=>fetchList(), 400);
      });
    }

    container.addEventListener('click', function(e){
      const a = e.target.closest('a');
      if (!a) return;
      if (a.closest('.pagination')) {
        e.preventDefault();
        fetchList(a.href);
      }
    });
  });
</script>
@endpush

@endsection