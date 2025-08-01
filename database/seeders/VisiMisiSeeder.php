<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisiMisi;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::create([
            'judul_header' => 'Faith is the Light of Life',
            'deskripsi_header' => 'Yuk, jadikan pendidikan agama sebagai panduan hidup untuk masa depan yang lebih bermakna!',
            'visi' => 'Terwujudnya Generasi Unggul yang Qur\'ani, Berakhlaq Mulia, Berprestasi, Peduli, Berbudaya Lingkungan, dan Berwawasan Global.​',
            'misi_items' => VisiMisi::getDefaultMisiItems(),
            'is_active' => true
        ]);
    }
} 