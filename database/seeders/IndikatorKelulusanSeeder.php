<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IndikatorKelulusanKategori;
use App\Models\IndikatorKelulusan;

class IndikatorKelulusanSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure categories exist (created by IndikatorKelulusanKategoriSeeder)
        $alquran = IndikatorKelulusanKategori::firstOrCreate(
            ['nama' => "AL-QUR'AN"],
            ['deskripsi' => null, 'urutan' => 1, 'is_active' => true]
        );
        $ibadah = IndikatorKelulusanKategori::firstOrCreate(
            ['nama' => 'IBADAH & AKHLAK'],
            ['deskripsi' => null, 'urutan' => 2, 'is_active' => true]
        );
        $akademik = IndikatorKelulusanKategori::firstOrCreate(
            ['nama' => 'AKADEMIK'],
            ['deskripsi' => null, 'urutan' => 3, 'is_active' => true]
        );

        // Seed some example indicators if none exist for each category
        $this->seedIfEmpty($alquran->id, [
            ['judul' => 'Mampu membaca Al-Qur\'an dengan tartil', 'durasi' => '6 tahun', 'urutan' => 1],
            ['judul' => 'Menghafal minimal 2 Juz', 'durasi' => '6 tahun', 'urutan' => 2],
            ['judul' => 'Memahami adab terhadap Al-Qur\'an', 'durasi' => 'berkelanjutan', 'urutan' => 3],
        ]);

        $this->seedIfEmpty($ibadah->id, [
            ['judul' => 'Terbiasa sholat wajib tepat waktu', 'durasi' => 'harian', 'urutan' => 1],
            ['judul' => 'Mampu berwudhu dengan benar', 'durasi' => 'semester', 'urutan' => 2],
            ['judul' => 'Menunjukkan akhlak mulia dalam keseharian', 'durasi' => 'berkelanjutan', 'urutan' => 3],
        ]);

        $this->seedIfEmpty($akademik->id, [
            ['judul' => 'Menguasai literasi dasar (membaca/menulis)', 'durasi' => 'kelas 1-3', 'urutan' => 1],
            ['judul' => 'Numerasi dasar (penjumlahan/pengurangan)', 'durasi' => 'kelas 1-3', 'urutan' => 2],
            ['judul' => 'Berpikir kritis dan pemecahan masalah', 'durasi' => 'kelas 4-6', 'urutan' => 3],
        ]);
    }

    private function seedIfEmpty(int $kategoriId, array $items): void
    {
        $exists = IndikatorKelulusan::where('kategori_id', $kategoriId)->exists();
        if ($exists) return;

        foreach ($items as $i) {
            IndikatorKelulusan::create([
                'kategori_id' => $kategoriId,
                'judul' => $i['judul'],
                'deskripsi' => $i['judul'], // simple default mirrors title; can be edited in Admin
                'durasi' => $i['durasi'],
                'urutan' => $i['urutan'],
                'is_active' => true,
            ]);
        }
    }
}
