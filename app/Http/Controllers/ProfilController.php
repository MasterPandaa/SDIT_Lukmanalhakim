<?php

namespace App\Http\Controllers;

use App\Models\SambutanKepsek;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function sambutanKepsek()
    {
        $sambutan = SambutanKepsek::first();
        
        // Jika tidak ada data, gunakan data default
        if (!$sambutan) {
            $sambutan = (object) [
                'judul' => 'Mewujudkan Generasi Unggul Berakhlak Mulia',
                'subtitle' => 'Cerdas, Berakhlak, Menginspirasi',
                'sambutan' => 'Assalamu\'alaikum Warrahmatullahi Wabarakatuh.<br><br>Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya kepada kita semua. Shalawat dan salam semoga selalu tercurah kepada Nabi Muhammad SAW, keluarga, sahabat, dan seluruh umatnya.<br><br>SDIT Luqman Al Hakim Sleman hadir sebagai lembaga pendidikan yang berkomitmen untuk mengembangkan potensi peserta didik secara holistik, mengintegrasikan pendidikan akademik dengan nilai-nilai Islam, dan membentuk karakter yang unggul.<br><br>Kami percaya bahwa setiap anak memiliki potensi unik yang perlu dikembangkan dengan pendekatan yang tepat. Melalui kurikulum yang terintegrasi, metode pembelajaran yang inovatif, dan lingkungan yang kondusif, kami berusaha menciptakan generasi yang tidak hanya cerdas secara akademik, tetapi juga berakhlak mulia dan siap menghadapi tantangan masa depan.<br><br>Kepada seluruh orang tua, guru, dan stakeholder yang telah mendukung perjalanan kami, kami ucapkan terima kasih. Mari kita bersama-sama mewujudkan visi besar untuk menciptakan generasi unggul yang membanggakan bangsa dan agama.<br><br>Wassalamu\'alaikum Warrahmatullahi Wabarakatuh.',
                'video_url' => 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg',
                'tahun_berdiri' => 11, // Lama sekolah berdiri (11 tahun)
                'foto_kepsek_url' => asset('assets/images/default/kepsek-default.jpg'),
                'foto_kepsek2_url' => asset('assets/images/default/kepsek-default2.jpg')
            ];
        }
        
        return view('profil.sambutan-kepsek', compact('sambutan'));
    }

    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    public function kurikulum()
    {
        return view('profil.kurikulum');
    }

    public function indikatorKelulusan()
    {
        return view('profil.indikator-kelulusan');
    }
}
