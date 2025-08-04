@if(isset($visiMisi) && $visiMisi)
<form action="{{ route('admin.profil.visi-misi.update') }}" method="POST">
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
                                        <h6 class="mb-0">Misi {{ $index + 1 }}</h6>
                                    </div>
                                    <button type="button" class="misi-item-remove" onclick="removeMisiItem(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Icon <span class="text-danger">*</span></label>
                                                                                         <select class="form-control" name="misi_items[{{ $index }}][icon]" required onchange="updateIconPreview({{ $index }}, this.value)">
                                                <option value="">Pilih Icon</option>
                                                <option value="icofont-credit-card" {{ ($item['icon'] ?? '') == 'icofont-credit-card' ? 'selected' : '' }}>Al Quran</option>
                                                <option value="icofont-light-bulb" {{ ($item['icon'] ?? '') == 'icofont-light-bulb' ? 'selected' : '' }}>Pendidikan Karakter</option>
                                                <option value="icofont-graduate" {{ ($item['icon'] ?? '') == 'icofont-graduate' ? 'selected' : '' }}>Active Deep Learner</option>
                                                <option value="icofont-paper-plane" {{ ($item['icon'] ?? '') == 'icofont-paper-plane' ? 'selected' : '' }}>Prestasi</option>
                                                <option value="icofont-site-map" {{ ($item['icon'] ?? '') == 'icofont-site-map' ? 'selected' : '' }}>Budaya</option>
                                                <option value="icofont-users-alt-3" {{ ($item['icon'] ?? '') == 'icofont-users-alt-3' ? 'selected' : '' }}>Peduli Lingkungan</option>
                                                <option value="icofont-book" {{ ($item['icon'] ?? '') == 'icofont-book' ? 'selected' : '' }}>Buku</option>
                                                <option value="icofont-heart" {{ ($item['icon'] ?? '') == 'icofont-heart' ? 'selected' : '' }}>Hati</option>
                                                <option value="icofont-star" {{ ($item['icon'] ?? '') == 'icofont-star' ? 'selected' : '' }}>Bintang</option>
                                                <option value="icofont-trophy" {{ ($item['icon'] ?? '') == 'icofont-trophy' ? 'selected' : '' }}>Piala</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Preview Icon</label>
                                            <div class="text-center">
                                                <i class="{{ $item['icon'] ?? 'icofont-credit-card' }} fa-2x text-success" id="iconPreview{{ $index }}"></i>
                                            </div>
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
                                        <h6 class="mb-0">Misi {{ $index + 1 }}</h6>
                                    </div>
                                    <button type="button" class="misi-item-remove" onclick="removeMisiItem(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Icon <span class="text-danger">*</span></label>
                                            <select class="form-control" name="misi_items[{{ $index }}][icon]" required onchange="updateIconPreview({{ $index }}, this.value)">
                                                <option value="">Pilih Icon</option>
                                                <option value="icofont-credit-card" {{ $item['icon'] == 'icofont-credit-card' ? 'selected' : '' }}>Al Quran</option>
                                                <option value="icofont-light-bulb" {{ $item['icon'] == 'icofont-light-bulb' ? 'selected' : '' }}>Pendidikan Karakter</option>
                                                <option value="icofont-graduate" {{ $item['icon'] == 'icofont-graduate' ? 'selected' : '' }}>Active Deep Learner</option>
                                                <option value="icofont-paper-plane" {{ $item['icon'] == 'icofont-paper-plane' ? 'selected' : '' }}>Prestasi</option>
                                                <option value="icofont-site-map" {{ $item['icon'] == 'icofont-site-map' ? 'selected' : '' }}>Budaya</option>
                                                <option value="icofont-users-alt-3" {{ $item['icon'] == 'icofont-users-alt-3' ? 'selected' : '' }}>Peduli Lingkungan</option>
                                                <option value="icofont-book" {{ $item['icon'] == 'icofont-book' ? 'selected' : '' }}>Buku</option>
                                                <option value="icofont-heart" {{ $item['icon'] == 'icofont-heart' ? 'selected' : '' }}>Hati</option>
                                                <option value="icofont-star" {{ $item['icon'] == 'icofont-star' ? 'selected' : '' }}>Bintang</option>
                                                <option value="icofont-trophy" {{ $item['icon'] == 'icofont-trophy' ? 'selected' : '' }}>Piala</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Preview Icon</label>
                                            <div class="text-center">
                                                <i class="{{ $item['icon'] }} fa-2x text-success" id="iconPreview{{ $index }}"></i>
                                            </div>
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
                <h6 class="mb-0">Misi ${misiItemIndex + 1}</h6>
            </div>
            <button type="button" class="misi-item-remove" onclick="removeMisiItem(this)">
                <i class="fas fa-times"></i>
            </button>
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
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Icon <span class="text-danger">*</span></label>
                    <select class="form-control" name="misi_items[${misiItemIndex}][icon]" required onchange="updateIconPreview(${misiItemIndex}, this.value)">
                        <option value="">Pilih Icon</option>
                        <option value="icofont-credit-card">Al Quran</option>
                        <option value="icofont-light-bulb">Pendidikan Karakter</option>
                        <option value="icofont-graduate">Active Deep Learner</option>
                        <option value="icofont-paper-plane">Prestasi</option>
                        <option value="icofont-site-map">Budaya</option>
                        <option value="icofont-users-alt-3">Peduli Lingkungan</option>
                        <option value="icofont-book">Buku</option>
                        <option value="icofont-heart">Hati</option>
                        <option value="icofont-star">Bintang</option>
                        <option value="icofont-trophy">Piala</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Preview Icon</label>
                    <div class="text-center">
                        <i class="icofont-credit-card fa-2x text-success" id="iconPreview${misiItemIndex}"></i>
                    </div>
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
        title.textContent = `Misi ${index + 1}`;
    });
}

function updateIconPreview(index, iconClass) {
    const preview = document.getElementById(`iconPreview${index}`);
    if (preview) {
        preview.className = `${iconClass} fa-2x text-success`;
    }
}

// Initialize icon previews for existing items
document.addEventListener('DOMContentLoaded', function() {
    const iconSelects = document.querySelectorAll('select[name*="[icon]"]');
    iconSelects.forEach((select, index) => {
        select.addEventListener('change', function() {
            updateIconPreview(index, this.value);
        });
    });
});
</script>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data visi misi tidak dapat dimuat.</p>
</div>
@endif 