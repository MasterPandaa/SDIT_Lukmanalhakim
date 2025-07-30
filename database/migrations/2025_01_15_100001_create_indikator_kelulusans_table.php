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
        Schema::create('indikator_kelulusans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('indikator_kelulusan_kategoris')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('durasi')->nullable(); // Contoh: "02:30 minutes"
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_kelulusans');
    }
};