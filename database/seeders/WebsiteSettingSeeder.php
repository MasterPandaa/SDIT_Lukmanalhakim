<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebsiteSetting::updateOrCreate(['id' => 1], [
            // Header Settings
            'header_phone' => '+62 857-4725-5761',
            'header_address' => 'Sleman, Yogyakarta',
            'header_facebook' => '',
            'header_instagram' => '',
            'header_youtube' => '',
            'header_google_map' => '',
            'header_logo' => null,
            'header_psb_link' => 'https://psb.luqmanalhakim.sch.id/',
            
            // Footer Settings
            'footer_description' => 'SDIT Luqman Al Hakim Sleman is a leading Islamic elementary school that integrates the national curriculum with Qur\'anic values and Islamic character education. We are committed to nurturing a Qur\'anic generation—intelligent, noble in character, independent, and ready to face the future.',
            'footer_address' => 'Sleman, Yogyakarta',
            'footer_phone' => '+62 857-4725-5761',
            'footer_email' => 'info@luqmanalhakim.sch.id',
            'footer_facebook' => '',
            'footer_tiktok' => '',
            'footer_instagram' => '',
            'footer_copyright_text' => 'SDIT Luqman Al Hakim',
            'footer_designer_text' => 'TIM IT SDIT Luqman Al Hakim',
            'footer_designer_link' => '',
            
            // Footer Quick Links
            'footer_quick_link_1_text' => 'Beranda',
            'footer_quick_link_1_url' => '/',
            'footer_quick_link_2_text' => 'Visi & Misi',
            'footer_quick_link_2_url' => '/visi-misi',
            'footer_quick_link_3_text' => 'Guru',
            'footer_quick_link_3_url' => '/guru',
            'footer_quick_link_4_text' => 'Berita',
            'footer_quick_link_4_url' => '/blog',
            'footer_quick_link_5_text' => 'Kontak',
            'footer_quick_link_5_url' => '/kontak',
            'footer_quick_link_6_text' => 'Galeri',
            'footer_quick_link_6_url' => '/about/galeri',
            
            // Footer Programs
            'footer_program_1_text' => 'Semua Program',
            'footer_program_1_url' => '/program',
            'footer_program_2_text' => 'Tahfidz Al-Qur\'an',
            'footer_program_2_url' => '#',
            'footer_program_3_text' => 'Pendidikan Karakter',
            'footer_program_3_url' => '#',
            'footer_program_4_text' => 'Bahasa Arab & Inggris',
            'footer_program_4_url' => '#',
            'footer_program_5_text' => 'Sains & Teknologi',
            'footer_program_5_url' => '#',
            'footer_program_6_text' => 'Kepesantrenan',
            'footer_program_6_url' => '#',
            
            // Footer News
            'footer_news_1' => 'SDIT Luqman Al Hakim @sditlhsleman Pendaftaran Siswa Baru Tahun Ajaran 2025/2026 telah dibuka!',
            'footer_news_2' => 'SDIT Luqman Al Hakim @sditlhsleman Selamat kepada siswa-siswi yang telah berhasil menyelesaikan hafalan Juz 30!',
            
            // Footer Bottom Links
            'footer_bottom_link_1_text' => 'Guru',
            'footer_bottom_link_1_url' => '/guru',
            'footer_bottom_link_2_text' => 'Staff',
            'footer_bottom_link_2_url' => '#',
            'footer_bottom_link_3_text' => 'Siswa',
            'footer_bottom_link_3_url' => '#',
            'footer_bottom_link_4_text' => 'Alumni',
            'footer_bottom_link_4_url' => '/about/alumni',

            // Home: Hero/Title Section
            'judul_hero' => '<span class="d-lg-block">Sekolah Dasar</span> Islam Terpadu <span class="d-lg-block">Luqman Al Hakim</span>',
            'subtitle_hero' => 'Islamic education',
            'deskripsi_hero' => "Membangun Generasi Qur'ani yang Cerdas, Berprestasi, dan Berakhlak Mulia untuk Masa Depan Gemilang",
            'teks_tombol' => 'Daftar Segera',
            'link_tombol' => 'https://psb.luqmanalhakim.sch.id/',
            'gambar_hero' => null,

            // Home: Program Unggulan Section
            'program_section_title' => 'Program Unggulan',
            'program_section_subtitle' => 'Bangun Generasi Berkarakter bersama Kami',
            'program_1_text' => 'Tahfiz Quran 10 juz',
            'program_1_url' => '#',
            'program_1_image' => null,
            'program_2_text' => 'Pendidikan Karakter',
            'program_2_url' => '#',
            'program_2_image' => null,
            'program_3_text' => 'Fasih Membaca Quran',
            'program_3_url' => '#',
            'program_3_image' => null,
            'program_4_text' => 'Hafal 20 Hadis Pilihan',
            'program_4_url' => '#',
            'program_4_image' => null,
            'program_5_text' => 'Sukses Asessmen AKM',
            'program_5_url' => '#',
            'program_5_image' => null,
            'program_6_text' => 'Program Kepesantrenan',
            'program_6_url' => '#',
            'program_6_image' => null,

            // Home: Statistik Section
            'stat_peserta_didik' => 465,
            'stat_guru' => 76,
            'stat_kelas' => 28,
            'stat_ekstrakurikuler' => 10,
        ]);
    }
}
