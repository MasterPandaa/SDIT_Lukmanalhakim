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
        if (!Schema::hasTable('indikator_kelulusan_settings')) {
            Schema::create('indikator_kelulusan_settings', function (Blueprint $table) {
                $table->id();
                $table->string('judul_utama')->nullable();
                $table->string('judul_header')->nullable();
                $table->text('deskripsi_header')->nullable();
                $table->string('nama_pembicara')->nullable();
                $table->string('video_url')->nullable();
                $table->json('kategori_tags')->nullable();
                $table->string('gambar_header')->nullable();
                $table->string('foto_pembicara')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->text('meta_description')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_kelulusan_settings');
    }
};
