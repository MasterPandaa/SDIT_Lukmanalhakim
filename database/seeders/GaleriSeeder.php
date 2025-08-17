<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'judul' => 'Upacara Bendera',
                'deskripsi' => 'Kegiatan upacara bendera hari Senin.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'judul' => 'Kegiatan Pramuka',
                'deskripsi' => 'Latihan rutin pramuka di lapangan sekolah.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'judul' => 'Lomba Sains',
                'deskripsi' => 'Siswa mengikuti lomba sains tingkat kota.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'judul' => 'Kegiatan Literasi',
                'deskripsi' => 'Program literasi di perpustakaan sekolah.',
                'foto' => null,
                'is_active' => true,
            ],
            [
                'judul' => 'Pentas Seni',
                'deskripsi' => 'Pentas seni akhir semester.',
                'foto' => null,
                'is_active' => true,
            ],
        ];

        foreach ($items as $data) {
            Galeri::create($data);
        }
    }
}
