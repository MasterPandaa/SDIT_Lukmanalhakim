<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IndikatorKelulusanSetting;

class IndikatorKelulusanSettingSeeder extends Seeder
{
    public function run(): void
    {
        IndikatorKelulusanSetting::updateOrCreate(
            ['id' => 1],
            [
                'judul_utama' => '100 Indikator Kelulusan',
                'judul_header' => "Target sekolah untuk menghafal 10 juz Al-Qur'an menjadi motivasi bagi orang tua.",
                'deskripsi_header' => 'Program indikator kelulusan yang komprehensif untuk mengukur pencapaian siswa.',
                'nama_pembicara' => null,
                'video_url' => null,
                'kategori_tags' => ['Unggul', 'Islami', 'Berprestasi'],
                'gambar_header' => null,
                'foto_pembicara' => null,
                'is_active' => true,
            ]
        );
    }
}
