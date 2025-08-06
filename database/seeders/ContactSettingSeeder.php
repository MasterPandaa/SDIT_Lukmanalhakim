<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactSetting;

class ContactSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactSetting::create([
            'address' => 'Jl. Raya Sleman No. 123, Sleman, Yogyakarta 55514',
            'phone' => '0274-123456',
            'email' => 'info@sditlukmanalhakim.sch.id',
            'whatsapp' => '08123456789',
            'facebook' => 'https://facebook.com/sditlukmanalhakim',
            'instagram' => 'https://instagram.com/sditlukmanalhakim',
            'youtube' => 'https://youtube.com/@sditlukmanalhakim',
            'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2675292549946!2d110.3823762!3d-7.7675913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59b2d4729729%3A0xac4d7b5fcf34f8e4!2sSDIT%20Lukmanalhakim%2C%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1627282901237!5m2!1sid!2sid',
            'office_hours' => 'Senin - Jumat: 07:00 - 15:00 WIB<br>Sabtu: 07:00 - 12:00 WIB<br>Minggu: Tutup',
            'is_active' => true
        ]);
    }
}
