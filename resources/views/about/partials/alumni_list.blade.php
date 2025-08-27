<div class="row g-4">
  @forelse($alumni as $item)
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 border-0 overflow-hidden alumni-card">
        <div class="ratio ratio-16x9 bg-light">
          <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" class="w-100 h-100" style="object-fit:cover; box-shadow:none;">
        </div>
        <div class="card-body">
          <h5 class="card-title mb-1 text-truncate" title="{{ $item->nama }}">{{ $item->nama }}</h5>
          <span class="badge bg-success-subtle text-success border border-success mb-2">Lulus {{ $item->tahun_lulus }}</span>
          @if($item->pendidikan_lanjutan)
            <div class="small text-muted text-truncate" title="{{ $item->pendidikan_lanjutan }}">
              <i class="fas fa-university me-1"></i>{{ $item->pendidikan_lanjutan }}
            </div>
          @endif
          @if($item->pekerjaan)
            <div class="small text-muted text-truncate" title="{{ $item->pekerjaan }}">
              <i class="fas fa-briefcase me-1"></i>{{ $item->pekerjaan }}
            </div>
          @endif
          @if($item->prestasi)
            <div class="mt-2 small">{!! \Illuminate\Support\Str::limit(strip_tags($item->prestasi), 120) !!}</div>
          @endif
        </div>
        @if($item->testimoni)
        <div class="card-footer bg-transparent border-0 pt-0">
          <blockquote class="blockquote mb-0 small text-muted">
            <em>“{{ $item->testimoni_plain }}”</em>
          </blockquote>
        </div>
        @endif
      </div>
    </div>
  @empty
    <div class="col-12 text-center text-muted">Belum ada data.</div>
  @endforelse
</div>
<div class="d-flex justify-content-end mt-3">
  {{ $alumni->links() }}
</div>
