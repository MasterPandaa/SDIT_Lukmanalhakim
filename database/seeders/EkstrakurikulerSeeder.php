<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'nama' => 'Pramuka',
                'deskripsi' => 'Kegiatan kepanduan untuk melatih kemandirian, kepemimpinan, dan kerja sama.',
                'gambar' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'Futsal',
                'deskripsi' => 'Latihan teknik dasar dan strategi permainan futsal untuk meningkatkan kebugaran.',
                'gambar' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'Paskibra',
                'deskripsi' => 'Pasukan pengibar bendera untuk membentuk kedisiplinan dan nasionalisme.',
                'gambar' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'KIR (Kelompok Ilmiah Remaja)',
                'deskripsi' => 'Eksplorasi riset ilmiah sederhana dan pengembangan minat sains.',
                'gambar' => null,
                'is_active' => true,
            ],
            [
                'nama' => 'Paduan Suara',
                'deskripsi' => 'Pelatihan vokal dan harmoni untuk penampilan paduan suara sekolah.',
                'gambar' => null,
                'is_active' => false,
            ],
            [
                'nama' => 'Drum Band',
                'deskripsi' => 'Latihan ritme dan koordinasi dalam grup drum band.',
                'gambar' => null,
                'is_active' => true,
            ],
        ];

        foreach ($items as $data) {
            Ekstrakurikuler::updateOrCreate(
                ['nama' => $data['nama']],
                $data
            );
        }
    }
}
