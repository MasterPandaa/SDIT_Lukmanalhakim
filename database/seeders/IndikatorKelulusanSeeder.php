<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IndikatorKelulusanSetting;
use App\Models\IndikatorKelulusanKategori;
use App\Models\IndikatorKelulusan;

class IndikatorKelulusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create page settings
        IndikatorKelulusanSetting::create([
            'judul_utama' => '100 Indikator Kelulusan',
            'judul_header' => 'Target sekolah untuk menghafal 10 juz Al-Qur\'an menjadi motivasi bagi orang tua.',
            'nama_pembicara' => 'Rohmat Sunaryo',
            'video_url' => 'https://www.youtube.com/embed/rVzgmeZ3uYg?si=8WVqbZjyTAMas1q-',
            'deskripsi_header' => 'Program indikator kelulusan yang komprehensif untuk mengukur pencapaian siswa dalam berbagai aspek pembelajaran dan pengembangan karakter.',
            'kategori_tags' => ['Unggul', 'Islami', 'Berprestasi'],
            'is_active' => true
        ]);

        // Create categories
        $akidah = IndikatorKelulusanKategori::create([
            'nama' => 'AKIDAH LURUS',
            'deskripsi' => 'Indikator pencapaian dalam bidang akidah dan keimanan',
            'urutan' => 1,
            'is_active' => true
        ]);

        $ibadah = IndikatorKelulusanKategori::create([
            'nama' => 'IBADAH YANG BENAR',
            'deskripsi' => 'Indikator pencapaian dalam pelaksanaan ibadah sehari-hari',
            'urutan' => 2,
            'is_active' => true
        ]);

        $akhlak = IndikatorKelulusanKategori::create([
            'nama' => 'AKHLAK MULIA',
            'deskripsi' => 'Indikator pencapaian dalam pembentukan karakter dan akhlak',
            'urutan' => 3,
            'is_active' => true
        ]);

        $akademik = IndikatorKelulusanKategori::create([
            'nama' => 'PRESTASI AKADEMIK',
            'deskripsi' => 'Indikator pencapaian dalam bidang akademik dan pembelajaran',
            'urutan' => 4,
            'is_active' => true
        ]);

        // Create indicators for Akidah Lurus
        IndikatorKelulusan::create([
            'kategori_id' => $akidah->id,
            'judul' => '1.1 Mengenal Allah SWT sebagai Rabb',
            'deskripsi' => 'Siswa mampu menjelaskan sifat-sifat Allah dan mengimaninya',
            'durasi' => '30 menit',
            'urutan' => 1,
            'is_active' => true
        ]);

        IndikatorKelulusan::create([
            'kategori_id' => $akidah->id,
            'judul' => '1.2 Beriman kepada Malaikat Allah',
            'deskripsi' => 'Siswa mengenal nama-nama malaikat dan tugasnya',
            'durasi' => '25 menit',
            'urutan' => 2,
            'is_active' => true
        ]);

        IndikatorKelulusan::create([
            'kategori_id' => $akidah->id,
            'judul' => '1.3 Beriman kepada Kitab-kitab Allah',
            'deskripsi' => 'Siswa mengenal kitab-kitab Allah dan rasul yang menerimanya',
            'durasi' => '20 menit',
            'urutan' => 3,
            'is_active' => true
        ]);

        // Create indicators for Ibadah Yang Benar
        IndikatorKelulusan::create([
            'kategori_id' => $ibadah->id,
            'judul' => '2.1 Melaksanakan Sholat 5 Waktu',
            'deskripsi' => 'Siswa mampu melaksanakan sholat dengan benar dan tepat waktu',
            'durasi' => '45 menit',
            'urutan' => 1,
            'is_active' => true
        ]);

        IndikatorKelulusan::create([
            'kategori_id' => $ibadah->id,
            'judul' => '2.2 Membaca Al-Qur\'an dengan Tartil',
            'deskripsi' => 'Siswa mampu membaca Al-Qur\'an dengan tajwid yang benar',
            'durasi' => '60 menit',
            'urutan' => 2,
            'is_active' => true
        ]);

        IndikatorKelulusan::create([
            'kategori_id' => $ibadah->id,
            'judul' => '2.3 Menghafal Juz 30 (Juz Amma)',
            'deskripsi' => 'Siswa menghafal minimal 20 surat dari Juz Amma',
            'durasi' => '90 menit',
            'urutan' => 3,
            'is_active' => true
        ]);

        // Create indicators for Akhlak Mulia
        IndikatorKelulusan::create([
            'kategori_id' => $akhlak->id,
            'judul' => '3.1 Berbakti kepada Orang Tua',
            'deskripsi' => 'Siswa menunjukkan sikap hormat dan patuh kepada orang tua',
            'durasi' => '15 menit',
            'urutan' => 1,
            'is_active' => true
        ]);

        IndikatorKelulusan::create([
            'kategori_id' => $akhlak->id,
            'judul' => '3.2 Jujur dalam Perkataan dan Perbuatan',
            'deskripsi' => 'Siswa selalu berkata jujur dan tidak berbohong',
            'durasi' => '20 menit',
            'urutan' => 2,
            'is_active' => true
        ]);

        IndikatorKelulusan::create([
            'kategori_id' => $akhlak->id,
            'judul' => '3.3 Tolong Menolong dengan Sesama',
            'deskripsi' => 'Siswa aktif membantu teman dan masyarakat sekitar',
            'durasi' => '25 menit',
            'urutan' => 3,
            'is_active' => true
        ]);

        // Create indicators for Prestasi Akademik
        IndikatorKelulusan::create([
            'kategori_id' => $akademik->id,
            'judul' => '4.1 Menguasai Bahasa Arab Dasar',
            'deskripsi' => 'Siswa mampu membaca dan memahami teks Arab sederhana',
            'durasi' => '40 menit',
            'urutan' => 1,
            'is_active' => true
        ]);

        IndikatorKelulusan::create([
            'kategori_id' => $akademik->id,
            'judul' => '4.2 Kemampuan Matematika Setingkat Kelas',
            'deskripsi' => 'Siswa menguasai operasi hitung dasar dan pemecahan masalah',
            'durasi' => '50 menit',
            'urutan' => 2,
            'is_active' => true
        ]);

        IndikatorKelulusan::create([
            'kategori_id' => $akademik->id,
            'judul' => '4.3 Kemampuan Bahasa Indonesia yang Baik',
            'deskripsi' => 'Siswa mampu membaca, menulis, dan berbicara dengan baik',
            'durasi' => '35 menit',
            'urutan' => 3,
            'is_active' => true
        ]);

        IndikatorKelulusan::create([
            'kategori_id' => $akademik->id,
            'judul' => '4.4 Pengetahuan Sains Dasar',
            'deskripsi' => 'Siswa memahami konsep dasar IPA sesuai tingkat kelas',
            'durasi' => '30 menit',
            'urutan' => 4,
            'is_active' => true
        ]);
    }
}