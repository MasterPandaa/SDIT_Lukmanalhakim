<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Alumni;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        if (Alumni::count() > 0) return;

        $samples = [
            [
                'nama' => 'Ahmad Fauzi',
                'tahun_lulus' => date('Y') - 6,
                'pendidikan_lanjutan' => 'SMA Negeri 1 Jakarta',
                'pekerjaan' => null,
                'prestasi' => 'Juara 1 Olimpiade Matematika tingkat kota',
                'testimoni' => 'Guru-guru di SDIT Lukman Al Hakim sangat peduli dan mendampingi kami.',
                'is_active' => true,
            ],
            [
                'nama' => 'Siti Rahma',
                'tahun_lulus' => date('Y') - 5,
                'pendidikan_lanjutan' => 'SMA Islam Al Azhar',
                'pekerjaan' => null,
                'prestasi' => 'Aktif dalam kegiatan pramuka dan menjadi ketua OSIS',
                'testimoni' => 'Lingkungan sekolah yang nyaman membuat saya berkembang.',
                'is_active' => true,
            ],
            [
                'nama' => 'Budi Santoso',
                'tahun_lulus' => date('Y') - 4,
                'pendidikan_lanjutan' => 'SMK Negeri 2 Bandung - Rekayasa Perangkat Lunak',
                'pekerjaan' => 'Magang Web Developer',
                'prestasi' => 'Membuat aplikasi sederhana untuk UKK',
                'testimoni' => 'Bekal akhlak dan kedisiplinan sangat bermanfaat.',
                'is_active' => true,
            ],
        ];

        foreach ($samples as $s) {
            Alumni::create($s);
        }
    }
}
