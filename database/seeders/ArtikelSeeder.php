<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artikels = [
            [
                'judul' => 'Kegiatan Ramadhan SDIT Lukmanalhakim',
                'konten' => '<p>SDIT Lukmanalhakim mengadakan berbagai kegiatan selama bulan Ramadhan untuk meningkatkan keimanan dan ketakwaan siswa. Kegiatan ini meliputi:</p>
                <ul>
                    <li>Tadarus Al-Quran setiap pagi</li>
                    <li>Kajian keislaman</li>
                    <li>Buka puasa bersama</li>
                    <li>Shalat tarawih berjamaah</li>
                </ul>
                <p>Kegiatan ini bertujuan untuk membentuk karakter islami siswa dan mempererat ukhuwah islamiyah.</p>',
                'ringkasan' => 'Berbagai kegiatan keislaman selama bulan Ramadhan untuk meningkatkan keimanan dan ketakwaan siswa.',
                'penulis' => 'Tim Humas SDIT Lukmanalhakim',
                'kategori' => 'Kegiatan Sekolah',
                'is_active' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'judul' => 'Prestasi Olimpiade Matematika Tingkat Provinsi',
                'konten' => '<p>Siswa SDIT Lukmanalhakim berhasil meraih prestasi gemilang dalam Olimpiade Matematika tingkat provinsi. Prestasi yang diraih:</p>
                <ul>
                    <li>Juara 1 - Ahmad Fadillah (Kelas 6)</li>
                    <li>Juara 2 - Siti Nurhaliza (Kelas 5)</li>
                    <li>Juara 3 - Muhammad Rizki (Kelas 6)</li>
                </ul>
                <p>Prestasi ini membuktikan bahwa SDIT Lukmanalhakim memiliki kualitas pendidikan yang unggul dalam bidang akademik.</p>',
                'ringkasan' => 'Siswa SDIT Lukmanalhakim berhasil meraih juara 1, 2, dan 3 dalam Olimpiade Matematika tingkat provinsi.',
                'penulis' => 'Tim Akademik SDIT Lukmanalhakim',
                'kategori' => 'Prestasi',
                'is_active' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'judul' => 'PPDB Tahun Ajaran 2025/2026',
                'konten' => '<p>SDIT Lukmanalhakim membuka pendaftaran siswa baru untuk tahun ajaran 2025/2026. Informasi pendaftaran:</p>
                <h4>Persyaratan:</h4>
                <ul>
                    <li>Usia minimal 6 tahun per 1 Juli 2025</li>
                    <li>Membawa akta kelahiran dan KK</li>
                    <li>Fotokopi ijazah TK (jika ada)</li>
                </ul>
                <h4>Biaya Pendaftaran:</h4>
                <ul>
                    <li>Biaya pendaftaran: Rp 500.000</li>
                    <li>SPP bulanan: Rp 750.000</li>
                </ul>
                <p>Pendaftaran dibuka mulai 1 Januari 2025. Kuota terbatas!</p>',
                'ringkasan' => 'Informasi lengkap pendaftaran siswa baru tahun ajaran 2025/2026 SDIT Lukmanalhakim.',
                'penulis' => 'Tim PPDB SDIT Lukmanalhakim',
                'kategori' => 'PPDB',
                'is_active' => true,
                'published_at' => now()->subDays(1),
            ],
        ];

        foreach ($artikels as $artikel) {
            Artikel::create($artikel);
        }
    }
} 