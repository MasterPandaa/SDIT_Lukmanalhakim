# Sistem Manajemen Indikator Kelulusan

Sistem ini memungkinkan admin untuk mengelola konten halaman indikator kelulusan secara dinamis melalui panel admin.

## Fitur Utama

### 1. Manajemen Pengaturan Halaman
- **Judul Utama**: Judul utama halaman (contoh: "100 Indikator Kelulusan")
- **Judul Header**: Judul yang ditampilkan di bagian header
- **Gambar Header**: Upload gambar untuk header halaman
- **Video URL**: Link video YouTube atau platform lain
- **Nama Pembicara**: Nama pembicara atau narasumber
- **Foto Pembicara**: Upload foto pembicara
- **Deskripsi Header**: Deskripsi singkat tentang program
- **Kategori Tags**: Tag-tag yang ditampilkan (contoh: Unggul, Islami, Berprestasi)

### 2. Manajemen Kategori
- **Tambah Kategori**: Membuat kategori baru untuk mengelompokkan indikator
- **Edit Kategori**: Mengubah nama, deskripsi, dan urutan kategori
- **Hapus Kategori**: Menghapus kategori beserta semua indikator di dalamnya
- **Status Kategori**: Mengaktifkan/menonaktifkan kategori
- **Urutan Kategori**: Mengurutkan tampilan kategori

### 3. Manajemen Indikator
- **Tambah Indikator**: Membuat indikator baru dalam kategori tertentu
- **Edit Indikator**: Mengubah judul, deskripsi, durasi, dan urutan indikator
- **Hapus Indikator**: Menghapus indikator
- **Status Indikator**: Mengaktifkan/menonaktifkan indikator
- **Urutan Indikator**: Mengurutkan tampilan indikator dalam kategori

## Instalasi dan Setup

### 1. Jalankan Migrasi Database
```bash
php artisan migrate
```

### 2. Jalankan Seeder (Opsional)
Untuk mengisi data contoh:
```bash
php artisan db:seed --class=IndikatorKelulusanSeeder
```

### 3. Setup Storage Link
Pastikan storage link sudah dibuat untuk upload gambar:
```bash
php artisan storage:link
```

## Struktur Database

### Tabel `indikator_kelulusan_settings`
Menyimpan pengaturan halaman indikator kelulusan:
- `judul_utama`: Judul utama halaman
- `judul_header`: Judul header
- `gambar_header`: Path gambar header
- `video_url`: URL video
- `nama_pembicara`: Nama pembicara
- `foto_pembicara`: Path foto pembicara
- `deskripsi_header`: Deskripsi header
- `kategori_tags`: Array tag kategori (JSON)
- `is_active`: Status aktif/nonaktif

### Tabel `indikator_kelulusan_kategoris`
Menyimpan kategori indikator:
- `nama`: Nama kategori
- `deskripsi`: Deskripsi kategori
- `urutan`: Urutan tampil
- `is_active`: Status aktif/nonaktif

### Tabel `indikator_kelulusans`
Menyimpan indikator kelulusan:
- `kategori_id`: ID kategori (foreign key)
- `judul`: Judul indikator
- `deskripsi`: Deskripsi indikator
- `durasi`: Durasi (contoh: "30 menit")
- `urutan`: Urutan dalam kategori
- `is_active`: Status aktif/nonaktif

## Cara Penggunaan

### 1. Akses Panel Admin
- Login ke panel admin: `/adminpanel/login`
- Klik menu "Indikator Kelulusan" di sidebar

### 2. Mengatur Pengaturan Halaman
1. Di halaman utama admin indikator kelulusan, scroll ke bagian "Pengaturan Halaman"
2. Isi form dengan informasi yang diinginkan
3. Upload gambar header dan foto pembicara jika diperlukan
4. Klik "Simpan Pengaturan"

### 3. Mengelola Kategori
1. Klik tombol "Tambah Kategori" untuk membuat kategori baru
2. Isi nama kategori (contoh: "AKIDAH LURUS")
3. Tambahkan deskripsi jika diperlukan
4. Atur urutan tampil (0 = paling atas)
5. Centang "Aktifkan kategori" jika ingin langsung ditampilkan
6. Klik "Simpan Kategori"

### 4. Mengelola Indikator
1. Klik tombol "Tambah Indikator" untuk membuat indikator baru
2. Pilih kategori dari dropdown
3. Isi judul indikator (contoh: "1.1 Mengenal Allah SWT")
4. Tambahkan deskripsi dan durasi jika diperlukan
5. Atur urutan dalam kategori
6. Centang "Aktifkan indikator" jika ingin langsung ditampilkan
7. Klik "Simpan Indikator"

### 5. Mengedit Data
- Klik tombol edit (ikon pensil) pada kategori atau indikator yang ingin diubah
- Lakukan perubahan yang diperlukan
- Klik "Update" untuk menyimpan

### 6. Mengaktifkan/Menonaktifkan
- Klik tombol mata (👁️) untuk mengaktifkan/menonaktifkan kategori atau indikator
- Data yang nonaktif tidak akan ditampilkan di halaman publik

### 7. Menghapus Data
- Klik tombol hapus (🗑️) pada kategori atau indikator
- Konfirmasi penghapusan
- **Perhatian**: Menghapus kategori akan menghapus semua indikator di dalamnya

## Halaman Publik

Halaman publik dapat diakses di: `/indikator-kelulusan`

Halaman ini akan menampilkan:
- Header dengan gambar, video, dan informasi pembicara (jika ada)
- Daftar kategori dalam bentuk accordion
- Indikator-indikator dalam setiap kategori
- Sidebar dengan ringkasan dan navigasi cepat

## Tips Penggunaan

1. **Urutan Tampil**: Gunakan angka untuk mengatur urutan. Semakin kecil angka, semakin atas posisinya.

2. **Kategori Tags**: Pisahkan dengan koma untuk multiple tags (contoh: "Unggul, Islami, Berprestasi").

3. **Upload Gambar**: Pastikan ukuran gambar tidak terlalu besar (max 2MB) dan format yang didukung (JPEG, JPG, PNG, GIF).

4. **Video URL**: Gunakan URL embed dari YouTube atau platform video lainnya.

5. **Status Aktif**: Hanya data yang berstatus aktif yang akan ditampilkan di halaman publik.

6. **Backup Data**: Selalu backup database sebelum melakukan perubahan besar.

## Model dan Relasi

### IndikatorKelulusanSetting
- Model untuk pengaturan halaman
- Method `getActive()` untuk mendapatkan setting aktif
- Accessor untuk URL gambar dengan fallback

### IndikatorKelulusanKategori
- Model untuk kategori indikator
- Relasi `hasMany` dengan IndikatorKelulusan
- Scope `active()` dan `ordered()`

### IndikatorKelulusan
- Model untuk indikator kelulusan
- Relasi `belongsTo` dengan IndikatorKelulusanKategori
- Scope `active()` dan `ordered()`

## Route yang Tersedia

### Public Routes
- `GET /indikator-kelulusan` - Halaman publik indikator kelulusan

### Admin Routes
- `GET /adminpanel/indikator-kelulusan` - Halaman utama admin
- `PUT /adminpanel/indikator-kelulusan/settings` - Update pengaturan halaman
- `GET|POST /adminpanel/indikator-kelulusan/kategori/*` - CRUD kategori
- `GET|POST /adminpanel/indikator-kelulusan/indikator/*` - CRUD indikator

## Troubleshooting

### Gambar tidak muncul
- Pastikan storage link sudah dibuat: `php artisan storage:link`
- Periksa permission folder storage

### Data tidak tersimpan
- Periksa validasi form dan error message
- Pastikan semua field required sudah diisi

### Halaman error 500
- Periksa log Laravel di `storage/logs/laravel.log`
- Pastikan semua migrasi sudah dijalankan

## Support

Jika mengalami masalah atau butuh bantuan, silakan hubungi tim development atau buat issue di repository project.