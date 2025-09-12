<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IndikatorKelulusanKategori;

class IndikatorKelulusanKategoriSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            ['nama' => "AL-QUR'AN", 'deskripsi' => null, 'urutan' => 1, 'is_active' => true],
            ['nama' => 'IBADAH & AKHLAK', 'deskripsi' => null, 'urutan' => 2, 'is_active' => true],
            ['nama' => 'AKADEMIK', 'deskripsi' => null, 'urutan' => 3, 'is_active' => true],
        ];

        foreach ($defaults as $data) {
            IndikatorKelulusanKategori::updateOrCreate(
                ['nama' => $data['nama']],
                $data
            );
        }
    }
}
