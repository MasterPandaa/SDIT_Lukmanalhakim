<?php

namespace Database\Seeders;

use App\Models\Kurikulum;
use App\Models\KurikulumItem;
use Illuminate\Database\Seeder;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat data kurikulum utama
        $kurikulum = Kurikulum::create([
            'judul' => 'Kurikulum',
            'subtitle' => 'Teach on edulon',
            'deskripsi' => '<p>SD Islam Terpadu Luqman Al Hakim Sleman menerapkan empat kurikulum terpadu yang dirancang untuk memberikan pendidikan berkualitas tinggi dengan pendekatan holistik dan islami.</p><p>Sistem kurikulum yang diterapkan bertujuan untuk mengembangkan potensi siswa secara optimal dalam aspek akademik, spiritual, emosional, dan sosial.</p>',
            'gambar_header' => null,
            'is_active' => true
        ]);

        // Buat data item kurikulum dengan data yang lebih lengkap
        $items = [
            [
                'judul' => 'Kurikulum Merdeka',
                'deskripsi' => '<p><strong>Kurikulum Merdeka</strong> adalah kurikulum yang berfokus pada pengembangan kompetensi siswa secara menyeluruh.</p>',
                'gambar' => null
            ],
            [
                'judul' => 'Kurikulum JSIT',
                'deskripsi' => '<p><strong>Jaringan Sekolah Islam Terpadu (JSIT)</strong> menerapkan pendidikan holistik yang mencakup akademik, spiritual, emosional, dan sosial.</p>',
                'gambar' => null
            ],
            [
                'judul' => 'Kurikulum Khas Yayasan',
                'deskripsi' => '<p><strong>Kurikulum Khas Yayasan</strong> dikembangkan secara mandiri oleh Konsorsium Yayasan Mulia untuk mencerminkan visi dan misi yang unik.</p>',
                'gambar' => null
            ],
            [
                'judul' => 'Kurikulum Kepesantrenan',
                'deskripsi' => '<p><strong>Kurikulum Kepesantrenan</strong> berfokus pada pengajaran ilmu agama secara mendalam dan komprehensif.</p>',
                'gambar' => null
            ]
        ];

        foreach ($items as $index => $item) {
            KurikulumItem::create([
                'kurikulum_id' => $kurikulum->id,
                'judul' => $item['judul'],
                'deskripsi' => $item['deskripsi'],
                'gambar' => $item['gambar'],
                'urutan' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}