<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('sambutan_kepsek', function (Blueprint $table) {
            $table->json('testimonials')->nullable()->after('foto_kedua');
            $table->json('skills')->nullable()->after('testimonials');
        });

        // Seed default content based on current static content
        $defaultTestimonials = [
            [
                'name' => 'Ibu Siti',
                'role' => 'Wali Murid Kelas 2',
                'text' => '"Alhamdulillah, anak saya semakin semangat belajar sejak bersekolah di SDIT Luqman Al Hakim Sleman. Guru-gurunya sabar, pembelajarannya menarik, dan nilai-nilai Islam diterapkan dengan baik. Terima kasih!',
                'rating' => 5,
                'photo_path' => 'assets/images/feedback/student/01.jpg',
            ],
            [
                'name' => 'Bapak Ahmad',
                'role' => 'Wali Murid Kelas 3',
                'text' => '"Anak saya jadi lebih disiplin, mandiri, dan mencintai ilmu agama sejak sekolah di SDIT Luqman Al Hakim. Lingkungan belajar yang nyaman membuatnya betah. Sangat puas dengan sekolah ini!"',
                'rating' => 5,
                'photo_path' => 'assets/images/feedback/student/02.jpg',
            ],
        ];

        $defaultSkills = [
            [
                'title' => 'Bela Diri',
                'tagline' => '"Berani, Disiplin, Tangguh!"',
                'icon_path' => 'assets/images/skill/icon/01.jpg',
            ],
            [
                'title' => 'Robotik',
                'tagline' => '"Kreatif, Inovatif, Futuristik!"',
                'icon_path' => 'assets/images/skill/icon/02.jpg',
            ],
            [
                'title' => 'Sinematografi',
                'tagline' => '"Ekspresi, Kreativitas,Visual!"',
                'icon_path' => 'assets/images/skill/icon/03.jpg',
            ],
            [
                'title' => 'Mini Soccer',
                'tagline' => '"Cepat, Taktis, Seru, Sportif!"',
                'icon_path' => 'assets/images/skill/icon/04.jpg',
            ],
        ];

        // Set defaults for existing row (first row)
        DB::table('sambutan_kepsek')->limit(1)->update([
            'testimonials' => json_encode($defaultTestimonials),
            'skills' => json_encode($defaultSkills),
        ]);
    }

    public function down(): void
    {
        Schema::table('sambutan_kepsek', function (Blueprint $table) {
            $table->dropColumn('skills');
            $table->dropColumn('testimonials');
        });
    }
};
