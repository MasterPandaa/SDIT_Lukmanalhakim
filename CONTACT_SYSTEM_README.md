# Sistem Kontak Website SDIT Lukmanalhakim

## Deskripsi
Sistem kontak yang lengkap untuk website sekolah dengan fitur CRUD di admin panel dan halaman kontak publik yang dinamis.

## Fitur Utama

### 1. Halaman Kontak Publik
- Form kontak yang responsif
- Informasi kontak sekolah yang dinamis
- Integrasi media sosial (Facebook, Instagram, YouTube)
- WhatsApp integration
- Google Maps embed
- Jam operasional sekolah
- Validasi form yang lengkap
- Notifikasi email otomatis ke admin

### 2. Admin Panel - Manajemen Kontak
- Dashboard statistik pesan kontak
- Daftar semua pesan dengan status (unread, read, replied)
- Detail pesan dengan informasi lengkap
- Sistem balas pesan
- Pengaturan informasi kontak sekolah
- Aksi cepat (email, WhatsApp, hapus pesan)

### 3. Database Structure

#### Tabel: contact_messages
```sql
- id (primary key)
- name (string)
- email (string)
- phone (string, nullable)
- subject (string)
- message (text)
- status (enum: unread, read, replied)
- admin_reply (text, nullable)
- replied_at (timestamp, nullable)
- created_at, updated_at
```

#### Tabel: contact_settings
```sql
- id (primary key)
- address (text)
- phone (string)
- email (string)
- whatsapp (string, nullable)
- facebook (string, nullable)
- instagram (string, nullable)
- youtube (string, nullable)
- google_maps_embed (text, nullable)
- office_hours (text, nullable)
- is_active (boolean)
- created_at, updated_at
```

## Cara Penggunaan

### 1. Akses Halaman Kontak Publik
- URL: `/kontak`
- Pengunjung dapat mengisi form kontak
- Pesan akan disimpan ke database
- Email notifikasi dikirim ke admin (jika dikonfigurasi)

### 2. Akses Admin Panel
- URL: `/adminpanel/contact`
- Login sebagai admin terlebih dahulu
- Kelola pesan kontak dan pengaturan

### 3. Fitur Admin Panel

#### Dashboard Statistik
- Total pesan
- Pesan belum dibaca
- Pesan sudah dibaca
- Pesan sudah dibalas

#### Manajemen Pesan
- Lihat daftar semua pesan
- Filter berdasarkan status
- Tandai pesan sebagai sudah dibaca
- Balas pesan langsung dari admin panel
- Hapus pesan

#### Pengaturan Kontak
- Update alamat sekolah
- Update nomor telepon
- Update email
- Update WhatsApp
- Update link media sosial
- Update Google Maps embed
- Update jam operasional

## File yang Dibuat/Dimodifikasi

### Models
- `app/Models/ContactMessage.php` - Model untuk pesan kontak
- `app/Models/ContactSetting.php` - Model untuk pengaturan kontak

### Controllers
- `app/Http/Controllers/ContactController.php` - Controller publik
- `app/Http/Controllers/Admin/ContactController.php` - Controller admin

### Views
- `resources/views/contact/index.blade.php` - Halaman kontak publik
- `resources/views/admin/contact/index.blade.php` - Dashboard admin
- `resources/views/admin/contact/show.blade.php` - Detail pesan
- `resources/views/emails/contact-notification.blade.php` - Template email

### Database
- `database/migrations/2025_08_06_044155_create_contact_messages_table.php`
- `database/migrations/2025_08_06_044206_create_contact_settings_table.php`
- `database/seeders/ContactSettingSeeder.php`

### Routes
- Route publik: `/kontak`, `/kontak/kirim`
- Route admin: `/adminpanel/contact/*`

## Konfigurasi Email

Untuk mengaktifkan notifikasi email, pastikan konfigurasi email di `.env` sudah benar:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email
MAIL_FROM_NAME="${APP_NAME}"
```

## Fitur Tambahan

### 1. WhatsApp Integration
- Link WhatsApp otomatis dengan format yang benar
- Tombol aksi cepat untuk kirim WhatsApp dari admin panel

### 2. Social Media Integration
- Facebook, Instagram, YouTube links
- Icon yang sesuai dengan platform

### 3. Google Maps
- Embed Google Maps yang dapat dikustomisasi
- Fallback ke lokasi default jika tidak dikonfigurasi

### 4. Responsive Design
- Halaman kontak responsif untuk mobile dan desktop
- Admin panel yang user-friendly

## Keamanan

### 1. Validasi Input
- Validasi email format
- Validasi panjang pesan
- Sanitasi input untuk mencegah XSS

### 2. CSRF Protection
- Semua form dilindungi dengan CSRF token
- Validasi token di setiap request

### 3. Admin Authentication
- Semua route admin dilindungi middleware admin
- Hanya admin yang dapat mengakses panel

## Maintenance

### 1. Backup Database
- Backup tabel `contact_messages` dan `contact_settings` secara berkala
- Export data pesan untuk arsip

### 2. Monitoring
- Monitor jumlah pesan yang masuk
- Cek status email delivery
- Review pengaturan kontak secara berkala

### 3. Updates
- Update informasi kontak sesuai perubahan sekolah
- Update jam operasional jika ada perubahan
- Update link media sosial jika diperlukan

## Troubleshooting

### 1. Email Tidak Terkirim
- Cek konfigurasi SMTP di `.env`
- Cek log Laravel untuk error detail
- Pastikan email admin sudah dikonfigurasi

### 2. Form Tidak Berfungsi
- Cek route sudah terdaftar
- Cek validasi form
- Cek database connection

### 3. Admin Panel Error
- Cek middleware admin
- Cek permission user
- Cek route admin sudah benar

## Dependencies

- Laravel 10+
- Bootstrap 5
- Font Awesome
- IcoFont Icons

## Support

Untuk bantuan teknis atau pertanyaan, silakan hubungi tim pengembang. 