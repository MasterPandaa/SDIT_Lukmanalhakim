<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('indikator_kelulusan_settings', function (Blueprint $table) {
            $table->id();
            $table->string('judul_utama')->default('100 indikator Kelulusan');
            $table->string('judul_header')->default('Target sekolah untuk menghafal 10 juz Al-Qur\'an menjadi motivasi bagi orang tua.');
            $table->string('gambar_header')->nullable();
            $table->string('video_url')->nullable();
            $table->string('nama_pembicara')->nullable();
            $table->string('foto_pembicara')->nullable();
            $table->text('deskripsi_header')->nullable();
            $table->json('kategori_tags')->nullable(); // Array of tags like ["Unggul", "Islami", "Berprestasi"]
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_kelulusan_settings');
    }
};