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
        if (!Schema::hasTable('indikator_kelulusans')) {
            Schema::create('indikator_kelulusans', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('kategori_id');
                $table->string('judul');
                $table->text('deskripsi')->nullable();
                $table->string('durasi', 50)->nullable();
                $table->integer('urutan')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();

                $table->foreign('kategori_id')
                    ->references('id')
                    ->on('indikator_kelulusan_kategoris')
                    ->onDelete('cascade');

                $table->index(['kategori_id', 'is_active']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_kelulusans');
    }
};
