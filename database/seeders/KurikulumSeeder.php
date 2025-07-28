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
                'deskripsi' => '<p><strong>Kurikulum Merdeka</strong> adalah kurikulum yang berfokus pada pengembangan kompetensi siswa secara menyeluruh.</p><p>Fokusnya pada pengembangan kompetensi, keterampilan berpikir kritis, kreativitas, serta pembelajaran yang inovatif dan aplikatif, selaras dengan kebutuhan dunia nyata.</p><ul><li>Pembelajaran berbasis projek</li><li>Pengembangan karakter</li><li>Keterampilan abad 21</li></ul>',
                'icon_class' => 'fas fa-graduation-cap',
                'color' => '#4e73df',
                'urutan' => 1,
                'is_active' => true
            ],
            [
                'judul' => 'Kurikulum JSIT',
                'deskripsi' => '<p><strong>Jaringan Sekolah Islam Terpadu (JSIT)</strong> menerapkan pendidikan holistik yang mencakup akademik, spiritual, emosional, dan sosial.</p><p>Dengan fokus pada akhlak mulia, hafalan Al-Qur\'an, serta pembentukan kepribadian Islami dalam lingkungan kondusif yang mendukung perkembangan iman dan taqwa.</p><ul><li>Tahfidz Al-Qur\'an</li><li>Pendidikan akhlak</li><li>Lingkungan Islami</li></ul>',
                'icon_class' => 'fas fa-book-open',
                'color' => '#1cc88a',
                'urutan' => 2,
                'is_active' => true
            ],
            [
                'judul' => 'Kurikulum Khas Yayasan',
                'deskripsi' => '<p><strong>Kurikulum Khas Yayasan</strong> dikembangkan secara mandiri oleh Konsorsium Yayasan Mulia untuk mencerminkan visi dan misi yang unik.</p><p>Kurikulum ini dirancang khusus untuk menerapkan nilai-nilai khas yang ingin ditanamkan dalam pendidikan, disesuaikan dengan kebutuhan dan karakteristik siswa.</p><ul><li>Program unggulan yayasan</li><li>Nilai-nilai khas institusi</li><li>Inovasi pembelajaran</li></ul>',
                'icon_class' => 'fas fa-star',
                'color' => '#f6c23e',
                'urutan' => 3,
                'is_active' => true
            ],
            [
                'judul' => 'Kurikulum Kepesantrenan',
                'deskripsi' => '<p><strong>Kurikulum Kepesantrenan</strong> berfokus pada pengajaran ilmu agama secara mendalam dan komprehensif.</p><p>Meliputi pengajaran hadis, fiqh, akhlak, dan bahasa Arab, serta pendalaman Al-Qur\'an melalui pemahaman mendalam dan hafalan yang terstruktur dengan metode pesantren tradisional.</p><ul><li>Ilmu agama mendalam</li><li>Bahasa Arab</li><li>Metode pesantren</li></ul>',
                'icon_class' => 'fas fa-mosque',
                'color' => '#36b9cc',
                'urutan' => 4,
                'is_active' => true
            ]
        ];

        foreach ($items as $item) {
            KurikulumItem::create([
                'kurikulum_id' => $kurikulum->id,
                'judul' => $item['judul'],
                'deskripsi' => $item['deskripsi'],
                'icon_class' => $item['icon_class'],
                'color' => $item['color'],
                'urutan' => $item['urutan'],
                'is_active' => $item['is_active']
            ]);
        }
    }
}