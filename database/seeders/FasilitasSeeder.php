<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasilitas;

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'nama' => 'Perpustakaan',
                'kategori' => 'Akademik',
                'deskripsi' => 'Koleksi buku bacaan dan referensi untuk menumbuhkan budaya literasi peserta didik.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'Laboratorium Komputer',
                'kategori' => 'Teknologi',
                'deskripsi' => 'Ruang praktik TIK untuk menunjang pembelajaran berbasis teknologi.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'Lapangan Olahraga',
                'kategori' => 'Olahraga',
                'deskripsi' => 'Lapangan serbaguna untuk kegiatan olahraga seperti futsal, bulu tangkis, dan senam.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'UKS',
                'kategori' => 'Kesehatan',
                'deskripsi' => 'Unit Kesehatan Sekolah untuk pertolongan pertama dan pembinaan perilaku hidup bersih dan sehat.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'Mushola',
                'kategori' => 'Keagamaan',
                'deskripsi' => 'Tempat ibadah yang nyaman untuk membina karakter religius peserta didik.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'Ruang Kelas Nyaman',
                'kategori' => 'Akademik',
                'deskripsi' => 'Ruang kelas bersih dan terang dengan ventilasi baik, dilengkapi proyektor untuk pembelajaran interaktif.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'Kantin Sehat',
                'kategori' => 'Fasilitas Umum',
                'deskripsi' => 'Menyediakan makanan sehat dan higienis untuk menunjang gizi peserta didik.',
                'foto' => null,
                'is_active' => false,
            ],
            [
                'nama' => 'Area Bermain',
                'kategori' => 'Rekreasi',
                'deskripsi' => 'Area bermain edukatif dan aman untuk pengembangan motorik dan sosial.',
                'foto' => null,
                'is_active' => true,
            ],
        ];

        foreach ($items as $data) {
            Fasilitas::updateOrCreate(
                ['nama' => $data['nama']],
                $data
            );
        }
    }
}
