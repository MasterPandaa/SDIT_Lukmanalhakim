# Sistem Manajemen Visi Misi

Sistem ini memungkinkan admin untuk mengelola konten halaman visi misi secara dinamis melalui panel admin.

## Fitur Utama

### 1. Manajemen Konten Halaman
- **Judul Header**: Judul utama yang ditampilkan di bagian header halaman
- **Deskripsi Header**: Deskripsi singkat yang ditampilkan di bawah judul header
- **Visi Sekolah**: Teks visi sekolah yang dapat diedit
- **Gambar Header**: Upload gambar untuk header halaman
- **Status Konten**: Mengaktifkan/menonaktifkan konten

### 2. Manajemen Misi Sekolah
- **Tambah Misi**: Menambahkan misi baru dengan judul, deskripsi, dan icon
- **Edit Misi**: Mengubah judul, deskripsi, dan icon misi
- **Hapus Misi**: Menghapus misi yang tidak diperlukan
- **Icon Custom**: Menggunakan class CSS untuk icon (contoh: icofont-credit-card)

## Instalasi dan Setup

### 1. Jalankan Migrasi Database
```bash
php artisan migrate
```

### 2. Jalankan Seeder (Opsional)
Untuk mengisi data contoh:
```bash
php artisan db:seed --class=VisiMisiSeeder
```

### 3. Setup Storage Link
Pastikan storage link sudah dibuat untuk upload gambar:
```bash
php artisan storage:link
```

## Struktur Database

### Tabel `visi_misi`
Menyimpan konten halaman visi misi:
- `judul_header`: Judul header halaman
- `deskripsi_header`: Deskripsi header
- `visi`: Teks visi sekolah
- `misi_items`: JSON array untuk menyimpan item misi
- `gambar_header`: Path gambar header
- `is_active`: Status aktif/nonaktif konten

### Struktur misi_items
```json
[
    {
        "judul": "Al Quran",
        "deskripsi": "Menyelenggarakan pendidikan Al Qur'an yang handal dan integratif.",
        "icon": "icofont-credit-card"
    }
]
```

## Akses Admin Panel

### URL Admin Panel
- **Dashboard**: `/adminpanel/dashboard`
- **Manajemen Visi Misi**: `/adminpanel/visi-misi`

### Fitur Admin Panel
1. **Edit Konten**: Mengubah judul header, deskripsi, visi, dan misi
2. **Upload Gambar**: Upload gambar header
3. **Toggle Status**: Mengaktifkan/menonaktifkan konten
4. **Preview**: Melihat halaman frontend

## Frontend

### URL Frontend
- **Halaman Visi Misi**: `/visi-misi`

### Fitur Frontend
1. **Konten Dinamis**: Menampilkan konten dari database
2. **Fallback Default**: Jika tidak ada data aktif, menggunakan konten default
3. **Responsive Design**: Tampilan yang responsif untuk berbagai ukuran layar

## Struktur File

### Controllers
- `app/Http/Controllers/VisiMisiController.php` - Controller frontend
- `app/Http/Controllers/Admin/VisiMisiController.php` - Controller admin

### Models
- `app/Models/VisiMisi.php` - Model untuk visi misi

### Views
- `resources/views/profil/visi-misi.blade.php` - View frontend
- `resources/views/admin/visi-misi/index.blade.php` - View admin

### Migrations
- `database/migrations/2025_01_20_000000_create_visi_misi_table.php`

### Seeders
- `database/seeders/VisiMisiSeeder.php`

## Routes

### Frontend Routes
```php
Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('visi-misi');
```

### Admin Routes
```php
Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('admin.visi-misi.index');
Route::put('/visi-misi', [VisiMisiController::class, 'update'])->name('admin.visi-misi.update');
Route::get('/visi-misi/toggle', [VisiMisiController::class, 'toggleStatus'])->name('admin.visi-misi.toggle');
```

## Penggunaan

### 1. Mengakses Admin Panel
1. Login ke admin panel di `/adminpanel/login`
2. Navigasi ke "Manajemen Visi Misi"
3. Edit konten sesuai kebutuhan
4. Upload gambar header jika diperlukan
5. Simpan perubahan

### 2. Menambah Misi Baru
1. Klik tombol "Tambah Misi"
2. Isi judul misi
3. Isi deskripsi misi
4. Pilih icon (gunakan class CSS)
5. Simpan perubahan

### 3. Mengaktifkan/Nonaktifkan Konten
1. Klik tombol "Aktifkan" atau "Nonaktifkan"
2. Konfirmasi aksi
3. Konten akan berubah status

## Icon yang Tersedia

Sistem menggunakan IcoFont. Beberapa icon yang tersedia:
- `icofont-credit-card` - Kartu kredit
- `icofont-light-bulb` - Lampu
- `icofont-graduate` - Wisuda
- `icofont-paper-plane` - Pesawat kertas
- `icofont-site-map` - Peta situs
- `icofont-users-alt-3` - Pengguna

## Troubleshooting

### 1. Gambar tidak muncul
- Pastikan direktori `public/assets/images/visi-misi/` sudah dibuat
- Periksa permission direktori
- Pastikan file gambar ada di direktori yang benar

### 2. Konten tidak berubah
- Periksa status konten (aktif/nonaktif)
- Clear cache browser
- Periksa log error Laravel

### 3. Error migration
- Pastikan MySQL version mendukung JSON
- Periksa konfigurasi database
- Jalankan `php artisan migrate:refresh` jika diperlukan 