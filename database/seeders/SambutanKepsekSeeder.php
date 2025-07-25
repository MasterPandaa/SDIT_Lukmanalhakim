<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SambutanKepsek;

class SambutanKepsekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SambutanKepsek::create([
            'judul' => 'Mewujudkan Generasi Unggul Berakhlak Mulia',
            'subtitle' => 'Cerdas, Berakhlak, Menginspirasi',
            'sambutan' => 'Assalamu\'alaikum warahmatullahi wabarakatuh,
            Alhamdulillah, segala puji bagi Allah SWT yang telah memberikan kita kesempatan untuk terus belajar dan berkembang. Sebagai bagian dari keluarga besar sekolah ini, kami berkomitmen untuk menciptakan lingkungan pendidikan yang tidak hanya mengasah kecerdasan intelektual, tetapi juga membentuk karakter mulia sesuai nilai-nilai Islam.
            Dengan kerja sama yang baik antara guru, siswa, dan orang tua, insyaAllah kita dapat mencetak generasi yang cerdas, berakhlak, dan siap menghadapi tantangan masa depan. Mari bersama, mendidik dengan hati dan menginspirasi dengan teladan.
            Wassalamu\'alaikum warahmatullahi wabarakatuh.',
            'video_url' => 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg',
            'tahun_berdiri' => 11,
        ]);
    }
} 