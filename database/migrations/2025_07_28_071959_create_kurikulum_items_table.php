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
        Schema::create('kurikulum_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kurikulum_id')->constrained('kurikulum')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('gambar')->nullable(); // Path gambar/icon untuk item
            $table->string('icon_class')->nullable(); // CSS class untuk icon (seperti fas fa-book)
            $table->string('color')->default('#4e73df'); // Warna tema untuk item
            $table->integer('urutan')->default(0); // Urutan tampil
            $table->boolean('is_active')->default(true);
            $table->json('extra_data')->nullable(); // Data tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum_items');
    }
};
