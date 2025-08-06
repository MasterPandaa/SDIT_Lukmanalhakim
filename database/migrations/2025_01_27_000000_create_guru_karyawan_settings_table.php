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
        Schema::create('guru_karyawan_settings', function (Blueprint $table) {
            $table->id();
            $table->string('judul_header')->default('Guru & Karyawan');
            $table->text('deskripsi_header')->nullable();
            $table->string('gambar_header')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_karyawan_settings');
    }
};