# Visi Misi Management System

Sistem manajemen konten Visi Misi untuk SDIT Luqman Al Hakim yang terintegrasi dengan admin panel.

## Fitur

### Admin Panel
1. **Header Section**: Mengelola judul header, deskripsi header, dan gambar header
2. **Visi Section**: Mengelola konten visi sekolah
3. **Misi Section**: Mengelola daftar misi sekolah dengan icon dan deskripsi
4. **Settings Section**: Mengelola status aktif/nonaktif dan informasi konten
5. **Preview**: Melihat halaman frontend
6. **Toggle Status**: Mengaktifkan/menonaktifkan konten

### Frontend
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
- `resources/views/admin/profil/visi-misi/index.blade.php` - View admin utama
- `resources/views/admin/profil/visi-misi/partials/header-form.blade.php` - Form header
- `resources/views/admin/profil/visi-misi/partials/visi-form.blade.php` - Form visi
- `resources/views/admin/profil/visi-misi/partials/misi-form.blade.php` - Form misi
- `resources/views/admin/profil/visi-misi/partials/settings-form.blade.php` - Form settings

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
Route::get('/profil/visi-misi', [VisiMisiController::class, 'index'])->name('admin.profil.visi-misi.index');
Route::put('/profil/visi-misi', [VisiMisiController::class, 'update'])->name('admin.profil.visi-misi.update');
Route::get('/profil/visi-misi/toggle', [VisiMisiController::class, 'toggleStatus'])->name('admin.profil.visi-misi.toggle');
```

## Database Schema

### Tabel: visi_misi
- `id` - Primary key
- `judul_header` - Judul header section
- `deskripsi_header` - Deskripsi header section
- `visi` - Konten visi sekolah
- `misi_items` - Array JSON untuk daftar misi
- `gambar_header` - Nama file gambar header
- `is_active` - Status aktif/nonaktif
- `created_at` - Timestamp pembuatan
- `updated_at` - Timestamp update

## Penggunaan

### 1. Mengakses Admin Panel
1. Login ke admin panel di `/adminpanel/login`
2. Navigasi ke "Profil" > "Visi & Misi"
3. Pilih tab yang sesuai untuk mengedit konten

### 2. Mengedit Header Section
1. Klik tab "Header Section"
2. Edit judul header dan deskripsi
3. Upload gambar header jika diperlukan
4. Simpan perubahan

### 3. Mengedit Visi
1. Klik tab "Visi"
2. Edit konten visi sekolah
3. Lihat preview langsung
4. Simpan perubahan

### 4. Mengedit Misi
1. Klik tab "Misi"
2. Edit misi yang ada atau tambah misi baru
3. Pilih icon untuk setiap misi
4. Atur deskripsi misi
5. Simpan perubahan

### 5. Pengaturan
1. Klik tab "Pengaturan"
2. Lihat status konten saat ini
3. Toggle status aktif/nonaktif
4. Lihat informasi konten

## Icon yang Tersedia

- `icofont-credit-card` - Al Quran
- `icofont-light-bulb` - Pendidikan Karakter
- `icofont-graduate` - Active Deep Learner
- `icofont-paper-plane` - Prestasi
- `icofont-site-map` - Budaya
- `icofont-users-alt-3` - Peduli Lingkungan
- `icofont-book` - Buku
- `icofont-heart` - Hati
- `icofont-star` - Bintang
- `icofont-trophy` - Piala

## Data Default

Jika tidak ada data di database, sistem akan menggunakan data default:

### Header
- **Judul**: "Faith is the Light of Life"
- **Deskripsi**: "Yuk, jadikan pendidikan agama sebagai panduan hidup untuk masa depan yang lebih bermakna!"

### Visi
"Terwujudnya Generasi Unggul yang Qur'ani, Berakhlaq Mulia, Berprestasi, Peduli, Berbudaya Lingkungan, dan Berwawasan Global.​"

### Misi (6 item)
1. **Al Quran** - Menyelenggarakan pendidikan Al Qur'an yang handal dan integratif
2. **Pendidikan Karakter** - Menyelenggarakan pendidikan yang menumbuhkan kesadaran untuk menjadi pribadi yang beriman, bertaqwa, berakhlaq mulia, manidiri, dan bertanggung jawab
3. **Active Deep Learner** - Menyelenggarakan pembelajaran yang menyenangkan, dengan pendekatan ADLX (Active, Deep, Learner, Experience), INTROFLEX (Individualiasi, Interaksi, Observasi, Refleksi) TERPADU (Telaah, Eksplorasi, Rumuskan, Presentasikan, Aplikasikan, Dunia, Ukhrowi)
4. **Prestasi** - Menyelenggarakan pembinaan peserta didik secara intensif dan efektif untuk merah prestasi
5. **Budaya** - Menyelenggarakan program pelestarian budaya lokal, nasional, dan internasional
6. **Peduli Lingkungan** - Menyelenggarakan program yang membangkitkan kepedulian lingkungan secara terpadu

## Setup

### 1. Jalankan Migrasi
```bash
php artisan migrate
```

### 2. Jalankan Seeder
```bash
php artisan db:seed --class=VisiMisiSeeder
```

### 3. Buat Direktori Upload
```bash
mkdir -p public/assets/images/visi-misi
chmod 755 public/assets/images/visi-misi
```

## Keamanan

- Semua input divalidasi
- File upload dibatasi hanya untuk gambar
- Maksimal ukuran file 2MB
- Hanya admin yang dapat mengakses panel admin

## Tema dan Styling

Admin panel menggunakan tema yang sama dengan pengaturan website:
- Bootstrap 5
- Font Awesome icons
- Custom CSS untuk styling khusus
- Responsive design
- Tab-based navigation 