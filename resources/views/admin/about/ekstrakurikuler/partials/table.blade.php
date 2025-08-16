<div class="table-responsive">
  <table class="table table-hover">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Thumb</th>
        <th>Nama Ekstrakurikuler</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($items as $i => $item)
      <tr>
        <td>{{ $items->firstItem() + $i }}</td>
        <td>
          @php $img = $item->gambar ? asset('storage/'.$item->gambar) : asset('assets/images/category/icon/01.jpg'); @endphp
          <img src="{{ $img }}" alt="{{ $item->nama }}" style="width:48px;height:48px;object-fit:cover;border-radius:.35rem;">
        </td>
        <td>{{ $item->nama }}</td>
        <td>
          <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
            {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
          </span>
        </td>
        <td class="text-nowrap">
          <div class="btn-group" role="group">
            <a href="{{ route('admin.ekstrakurikuler.edit', $item) }}" class="btn btn-sm btn-success" title="Edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('admin.ekstrakurikuler.toggle', $item) }}" method="POST" onsubmit="return confirm('Ubah status item ini?')">
              @csrf
              <button type="submit" class="btn btn-sm btn-warning" title="Toggle">
                <i class="fas fa-toggle-on"></i>
              </button>
            </form>
            <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus" data-url="{{ route('admin.ekstrakurikuler.destroy', $item) }}">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center text-muted">Belum ada data.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="d-flex justify-content-end">
  {{ $items->links() }}
</div>
