<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'sambutan' => 'Assalamu\'alaikum Warrahmatullahi Wabarakatuh.<br><br>Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya kepada kita semua. Shalawat dan salam semoga selalu tercurah kepada Nabi Muhammad SAW, keluarga, sahabat, dan seluruh umatnya.<br><br>SDIT Luqman Al Hakim Sleman hadir sebagai lembaga pendidikan yang berkomitmen untuk mengembangkan potensi peserta didik secara holistik, mengintegrasikan pendidikan akademik dengan nilai-nilai Islam, dan membentuk karakter yang unggul.<br><br>Kami percaya bahwa setiap anak memiliki potensi unik yang perlu dikembangkan dengan pendekatan yang tepat. Melalui kurikulum yang terintegrasi, metode pembelajaran yang inovatif, dan lingkungan yang kondusif, kami berusaha menciptakan generasi yang tidak hanya cerdas secara akademik, tetapi juga berakhlak mulia dan siap menghadapi tantangan masa depan.<br><br>Kepada seluruh orang tua, guru, dan stakeholder yang telah mendukung perjalanan kami, kami ucapkan terima kasih. Mari kita bersama-sama mewujudkan visi besar untuk menciptakan generasi unggul yang membanggakan bangsa dan agama.<br><br>Wassalamu\'alaikum Warrahmatullahi Wabarakatuh.',
            'video_url' => 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg',
            'tahun_berdiri' => 11, // Lama sekolah berdiri (11 tahun)
            'foto_kepsek' => null,
            'foto_kepsek2' => null
        ]);
    }
} 