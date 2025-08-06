<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\GuruKaryawanSetting;
use Illuminate\Database\Seeder;

class GuruKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create page settings
        GuruKaryawanSetting::create([
            'judul_header' => 'Guru & Karyawan',
            'deskripsi_header' => 'Tim pengajar dan karyawan SDIT Luqman Al Hakim yang berpengalaman dan berdedikasi tinggi dalam dunia pendidikan.',
            'is_active' => true
        ]);

        // Create sample guru data
        $gurus = [
            [
                'nama' => 'Ahmad Maulana',
                'jabatan' => 'Kepala Sekolah',
                'gelar' => 'S.Pd., M.Ed.',
                'deskripsi' => 'Berpengalaman lebih dari 15 tahun dalam dunia pendidikan Islam terpadu.',
                'pernyataan_pribadi' => 'Mendidik dengan hati dan mencerdaskan dengan ilmu.',
                'email' => 'kepsek@sditluqman.sch.id',
                'telepon' => '081234567890',
                'pengalaman_mengajar' => 15,
                'jumlah_siswa' => 200,
                'rating' => 5,
                'kemampuan_bahasa' => ['Indonesia', 'Arab', 'Inggris'],
                'penghargaan' => ['Kepala Sekolah Berprestasi 2023', 'Guru Teladan Kabupaten 2022'],
                'is_active' => true
            ],
            [
                'nama' => 'Siti Nurhasanah',
                'jabatan' => 'Guru Kelas 1',
                'gelar' => 'S.Pd.I.',
                'deskripsi' => 'Spesialis dalam pengajaran anak usia dini dengan pendekatan Islami.',
                'pernyataan_pribadi' => 'Setiap anak adalah unik dan memiliki potensi yang luar biasa.',
                'email' => 'siti.nurhasanah@sditluqman.sch.id',
                'telepon' => '081234567891',
                'pengalaman_mengajar' => 8,
                'jumlah_siswa' => 25,
                'rating' => 5,
                'kemampuan_bahasa' => ['Indonesia', 'Arab'],
                'penghargaan' => ['Guru Favorit Siswa 2023'],
                'is_active' => true
            ],
            [
                'nama' => 'Muhammad Rizki',
                'jabatan' => 'Guru Bahasa Arab',
                'gelar' => 'Lc., M.A.',
                'deskripsi' => 'Lulusan Al-Azhar dengan keahlian dalam bahasa Arab dan studi Islam.',
                'pernyataan_pribadi' => 'Bahasa Arab adalah kunci untuk memahami Al-Qur\'an.',
                'email' => 'muhammad.rizki@sditluqman.sch.id',
                'telepon' => '081234567892',
                'pengalaman_mengajar' => 10,
                'jumlah_siswa' => 120,
                'rating' => 5,
                'kemampuan_bahasa' => ['Indonesia', 'Arab', 'Inggris'],
                'penghargaan' => ['Instruktur Bahasa Arab Terbaik 2023'],
                'is_active' => true
            ],
            [
                'nama' => 'Fatimah Az-Zahra',
                'jabatan' => 'Guru Tahfizh',
                'gelar' => 'S.Pd.I.',
                'deskripsi' => 'Hafizah 30 juz dengan pengalaman mengajar tahfizh untuk anak-anak.',
                'pernyataan_pribadi' => 'Al-Qur\'an adalah petunjuk hidup yang sempurna.',
                'email' => 'fatimah.azzahra@sditluqman.sch.id',
                'telepon' => '081234567893',
                'pengalaman_mengajar' => 7,
                'jumlah_siswa' => 80,
                'rating' => 5,
                'kemampuan_bahasa' => ['Indonesia', 'Arab'],
                'penghargaan' => ['Pembina Tahfizh Terbaik 2023'],
                'is_active' => true
            ],
            [
                'nama' => 'Abdul Rahman',
                'jabatan' => 'Guru Matematika',
                'gelar' => 'S.Pd.',
                'deskripsi' => 'Spesialis dalam pembelajaran matematika yang menyenangkan dan mudah dipahami.',
                'pernyataan_pribadi' => 'Matematika adalah bahasa universal yang indah.',
                'email' => 'abdul.rahman@sditluqman.sch.id',
                'telepon' => '081234567894',
                'pengalaman_mengajar' => 6,
                'jumlah_siswa' => 100,
                'rating' => 4,
                'kemampuan_bahasa' => ['Indonesia', 'Inggris'],
                'penghargaan' => ['Guru Inovatif 2023'],
                'is_active' => true
            ]
        ];

        foreach ($gurus as $guru) {
            Guru::create($guru);
        }
    }
}