<div class="row" id="fasilitasCards">
  @forelse($fasilitas as $item)
  <div class="col-12 col-sm-6 col-lg-4 mb-4">
    <div class="card h-100 border-0">
      @php $img = $item->foto ? asset('storage/'.$item->foto) : asset('assets/images/feature/01.png'); @endphp
      <img src="{{ $img }}" class="card-img-top" alt="{{ $item->nama }}" style="height:200px;object-fit:cover;">
      <div class="card-body">
        <h5 class="card-title mb-2">{{ $item->nama }}</h5>
        @if($item->kategori)
          <div class="text-muted small mb-2">{{ $item->kategori }}</div>
        @endif
        @if($item->deskripsi)
          <p class="card-text mb-0">{{ \Illuminate\Support\Str::limit($item->deskripsi, 140) }}</p>
        @endif
      </div>
    </div>
  </div>
  @empty
  <div class="col-12">
    <div class="text-center text-muted py-4">Belum ada fasilitas yang tersedia.</div>
  </div>
  @endforelse
</div>
<div class="d-flex justify-content-center mt-2">
  {!! $fasilitas->links() !!}
</div>
