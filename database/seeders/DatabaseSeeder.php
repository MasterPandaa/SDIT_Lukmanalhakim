<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WebsiteSettingSeeder::class,
            SambutanKepsekSeeder::class,
            KurikulumSeeder::class,
            VisiMisiSeeder::class,
            ContactSettingSeeder::class,
            GuruKaryawanSeeder::class,
            PrestasiSeeder::class,
            EkstrakurikulerSeeder::class,
            FasilitasSeeder::class,
            GaleriSeeder::class,
            AlumniSeeder::class,
            ArtikelSeeder::class,
        ]);
    }
}
