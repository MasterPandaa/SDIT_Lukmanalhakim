<?php

namespace Database\Seeders;

use App\Models\Kurikulum;
use App\Models\KurikulumItem;
use Illuminate\Database\Seeder;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat data kurikulum utama
        $kurikulum = Kurikulum::create([
            'judul' => 'Kurikulum SDIT Luqman Al Hakim',
            'subtitle' => 'Pendidikan Berkualitas',
            'deskripsi' => 'SD Islam Terpadu Luqman Al Hakim Sleman menerapkan empat kurikulum terpadu'
        ]);

        // Buat data item kurikulum
        $items = [
            [
                'judul' => 'Kurikulum Merdeka',
                'deskripsi' => 'Fokusnya pada pengembangan kompetensi, keterampilan berpikir kritis, kreativitas, serta pembelajaran yang inovatif dan aplikatif, selaras dengan kebutuhan dunia nyata.',
                'urutan' => 1
            ],
            [
                'judul' => 'Kurikulum JSIT',
                'deskripsi' => "Pendidikan holistik yang mencakup akademik, spiritual, emosional, dan sosial, dengan fokus pada akhlak mulia, hafalan Al-Qur'an, serta pembentukan kepribadian Islami dalam lingkungan kondusif.",
                'urutan' => 2
            ],
            [
                'judul' => 'Kurikulum Khas Yayasan',
                'deskripsi' => 'Kurikulum ini dikembangkan secara mandiri oleh Konsorsium Yayasan Mulia untuk mencerminkan visi, misi, serta nilai-nilai khas yang ingin diterapkan dalam pendidikan.',
                'urutan' => 3
            ],
            [
                'judul' => 'Kurikulum Kepesantrenan',
                'deskripsi' => 'Kurikulum ini berfokus pada pengajaran ilmu agama, seperti hadis, fiqh, akhlak, dan bahasa Arab, serta pendalaman Al-Qur\'an melalui pemahaman mendalam dan hafalan yang terstruktur.',
                'urutan' => 4
            ]
        ];

        foreach ($items as $item) {
            KurikulumItem::create([
                'kurikulum_id' => $kurikulum->id,
                'judul' => $item['judul'],
                'deskripsi' => $item['deskripsi'],
                'urutan' => $item['urutan']
            ]);
        }
    }
}