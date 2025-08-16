<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestasi;
use Carbon\Carbon;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Prestasi::count() > 0) {
            return; // avoid duplicating in non-fresh databases
        }

        Prestasi::create([
            'judul' => 'Juara 1 Lomba Sains Tingkat Kota',
            'deskripsi' => 'Tim sains SDIT Lukman Al Hakim meraih Juara 1 pada Lomba Sains Tingkat Kota dengan inovasi penelitian sederhana dan presentasi yang memukau.',
            'gambar' => null,
            'tanggal' => Carbon::now()->subDays(14),
            'tingkat' => 'Kota',
            'peraih' => 'Tim Sains SDIT',
            'penyelenggara' => 'Dinas Pendidikan Kota',
            'is_active' => true,
            'urutan' => 10,
        ]);

        Prestasi::create([
            'judul' => 'Harapan 1 Olimpiade Matematika',
            'deskripsi' => 'Salah satu siswa kami berhasil meraih juara harapan 1 pada Olimpiade Matematika tingkat provinsi.',
            'gambar' => null,
            'tanggal' => Carbon::now()->subDays(30),
            'tingkat' => 'Provinsi',
            'peraih' => 'Ananda Fulan',
            'penyelenggara' => 'Panitia OMNAS',
            'is_active' => true,
            'urutan' => 5,
        ]);
    }
}
