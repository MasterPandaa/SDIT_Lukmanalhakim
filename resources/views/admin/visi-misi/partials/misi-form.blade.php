@if(isset($visiMisi) && $visiMisi)
<form action="{{ route('admin.visi-misi.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Misi Items -->
    <div class="form-section">
        <h5><i class="fas fa-list me-2"></i>Konten Misi</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Daftar Misi Sekolah</h6>
                    <button type="button" class="btn btn-primary btn-sm" onclick="addMisiItem()">
                        <i class="fas fa-plus me-2"></i>Tambah Misi
                    </button>
                </div>
                
                <div id="misiItemsContainer">
                    @if(isset($visiMisi->misi_items) && is_array($visiMisi->misi_items))
                        @foreach($visiMisi->misi_items as $index => $item)
                            <div class="misi-item" data-index="{{ $index }}">
                                <div class="misi-item-header">
                                    <div class="d-flex align-items-center">
                                        <div class="misi-item-number">{{ $index + 1 }}</div>
                                        <button type="button" class="btn btn-outline-danger btn-sm misi-item-remove ms-2 me-2" onclick="removeMisiItem(this)" title="Hapus misi">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <h6 class="mb-0">Item Misi {{ $index + 1 }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Judul Misi <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" 
                                                   name="misi_items[{{ $index }}][judul]" 
                                                   value="{{ $item['judul'] ?? '' }}" 
                                                   placeholder="Al Quran" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="font-weight-bold">CSS Kode Icon <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" 
                                                   name="misi_items[{{ $index }}][icon]" 
                                                   value="{{ $item['icon'] ?? '' }}" 
                                                   placeholder="contoh: icofont-credit-card atau fas fa-star" required>
                                            <small class="text-muted">Gunakan class icon (Icofont/FontAwesome), misal: icofont-heart, fas fa-star</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <label class="font-weight-bold">Deskripsi Misi <span class="text-danger">*</span></label>
                                            <textarea class="form-control" 
                                                      name="misi_items[{{ $index }}][deskripsi]" 
                                                      rows="3" 
                                                      placeholder="Menyelenggarakan pendidikan Al Qur'an yang handal dan integratif." required>{{ $item['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default misi items -->
                        @foreach(App\Models\VisiMisi::getDefaultMisiItems() as $index => $item)
                            <div class="misi-item" data-index="{{ $index }}">
                                <div class="misi-item-header">
                                    <div class="d-flex align-items-center">
                                        <div class="misi-item-number">{{ $index + 1 }}</div>
                                        <button type="button" class="btn btn-outline-danger btn-sm misi-item-remove ms-2 me-2" onclick="removeMisiItem(this)" title="Hapus misi">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <h6 class="mb-0">Item Misi {{ $index + 1 }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Judul Misi <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" 
                                                   name="misi_items[{{ $index }}][judul]" 
                                                   value="{{ $item['judul'] }}" 
                                                   placeholder="Al Quran" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="font-weight-bold">CSS Kode Icon <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" 
                                                   name="misi_items[{{ $index }}][icon]" 
                                                   value="{{ $item['icon'] }}" 
                                                   placeholder="contoh: icofont-credit-card atau fas fa-star" required>
                                            <small class="text-muted">Gunakan class icon (Icofont/FontAwesome), misal: icofont-heart, fas fa-star</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <label class="font-weight-bold">Deskripsi Misi <span class="text-danger">*</span></label>
                                            <textarea class="form-control" 
                                                      name="misi_items[{{ $index }}][deskripsi]" 
                                                      rows="3" 
                                                      placeholder="Menyelenggarakan pendidikan Al Qur'an yang handal dan integratif." required>{{ $item['deskripsi'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Information -->
    <div class="alert alert-info">
        <h6><i class="fas fa-info-circle me-2"></i>Informasi</h6>
        <ul class="mb-0 small">
            <li>Misi sekolah akan ditampilkan dalam bentuk card dengan icon</li>
            <li>Setiap misi memiliki judul, icon, dan deskripsi</li>
            <li>Minimal 3 misi dan maksimal 6 misi</li>
            <li>Icon akan ditampilkan di sebelah kiri konten misi</li>
        </ul>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>
            Simpan Misi
        </button>
    </div>
</form>

<script>
let misiItemIndex = {{ isset($visiMisi->misi_items) ? count($visiMisi->misi_items) : 6 }};

function addMisiItem() {
    const container = document.getElementById('misiItemsContainer');
    const items = container.querySelectorAll('.misi-item');
    
    if (items.length >= 6) {
        alert('Maksimal 6 misi yang dapat ditambahkan');
        return;
    }
    
    const newItem = document.createElement('div');
    newItem.className = 'misi-item';
    newItem.setAttribute('data-index', misiItemIndex);
    
    newItem.innerHTML = `
        <div class="misi-item-header">
            <div class="d-flex align-items-center">
                <div class="misi-item-number">${misiItemIndex + 1}</div>
                <button type="button" class="btn btn-outline-danger btn-sm misi-item-remove ms-2 me-2" onclick="removeMisiItem(this)" title="Hapus misi">
                    <i class="fas fa-trash"></i>
                </button>
                <h6 class="mb-0">Item Misi ${misiItemIndex + 1}</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Judul Misi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" 
                           name="misi_items[${misiItemIndex}][judul]" 
                           placeholder="Judul Misi" required>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label class="font-weight-bold">CSS Kode Icon <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" 
                           name="misi_items[${misiItemIndex}][icon]" 
                           placeholder="contoh: icofont-credit-card atau fas fa-star" required>
                    <small class="text-muted">Gunakan class icon (Icofont/FontAwesome), misal: icofont-heart, fas fa-star</small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-0">
                    <label class="font-weight-bold">Deskripsi Misi <span class="text-danger">*</span></label>
                    <textarea class="form-control" 
                              name="misi_items[${misiItemIndex}][deskripsi]" 
                              rows="3" 
                              placeholder="Deskripsi misi..." required></textarea>
                </div>
            </div>
        </div>
    `;
    
    container.appendChild(newItem);
    misiItemIndex++;
    updateMisiNumbers();
}

function removeMisiItem(button) {
    const container = document.getElementById('misiItemsContainer');
    const items = container.querySelectorAll('.misi-item');
    
    if (items.length <= 3) {
        alert('Minimal 3 misi yang harus ada');
        return;
    }
    
    button.closest('.misi-item').remove();
    updateMisiNumbers();
}

function updateMisiNumbers() {
    const items = document.querySelectorAll('.misi-item');
    items.forEach((item, index) => {
        const number = item.querySelector('.misi-item-number');
        const title = item.querySelector('h6');
        number.textContent = index + 1;
        title.textContent = `Item Misi ${index + 1}`;
    });
}

// Tidak diperlukan preview icon; pengguna mengisi class CSS icon secara langsung
</script>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data visi misi tidak dapat dimuat.</p>
</div>
@endif 