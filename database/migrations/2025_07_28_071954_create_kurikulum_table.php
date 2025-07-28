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
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->default('Kurikulum');
            $table->string('subtitle')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar_header')->nullable(); // Gambar header untuk halaman kurikulum
            $table->json('meta_data')->nullable(); // Data tambahan dalam format JSON
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum');
    }
};
