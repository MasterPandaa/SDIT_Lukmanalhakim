@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Artikel</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4 text-center">Artikel Sekolah</h3>

            <div class="card border-0 mb-4">
                <div class="card-body">
                    <form class="row g-2 align-items-center" id="filterForm" onsubmit="return false;">
                        <div class="col-12 col-md-8">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchInput" name="q" value="{{ $q ?? request('q') }}" placeholder="Cari artikel (judul, ringkasan, konten, penulis, kategori)...">
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-md-end">
                            <a href="{{ route('about.artikel') }}" class="btn btn-light" id="resetBtn"><i class="fas fa-undo me-1"></i>Reset</a>
                        </div>
                    </form>
                </div>
            </div>

            <div id="artikelListWrapper">
                @include('about.partials.artikel_list', ['artikels' => $artikels])
            </div>
        </div>
    </div>
</div>
@endsection 

@push('scripts')
<script>
  (function() {
    const wrapper = document.getElementById('artikelListWrapper');
    const input = document.getElementById('searchInput');
    const baseUrl = @json(route('about.artikel'));
    let timer;

    function fetchList(url) {
      const u = new URL(url || baseUrl, window.location.origin);
      if (input && input.value) u.searchParams.set('q', input.value);
      fetch(u.toString(), { headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }})
        .then(r => r.json())
        .then(data => {
          if (data && data.html && wrapper) {
            wrapper.innerHTML = data.html;
          } else if (wrapper) {
            // fallback: full reload if unexpected
            window.location.href = u.toString();
          }
        })
        .catch(() => { window.location.href = u.toString(); });
    }

    if (input) {
      input.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(() => fetchList(), 350);
      });
    }

    // Delegate pagination clicks
    document.addEventListener('click', function(e) {
      const a = e.target.closest('#artikelListWrapper .pagination a');
      if (!a) return;
      e.preventDefault();
      fetchList(a.getAttribute('href'));
    });
  })();
</script>
@endpush