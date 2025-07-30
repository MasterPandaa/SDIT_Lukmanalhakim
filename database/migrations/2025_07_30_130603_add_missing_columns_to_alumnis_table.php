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
        Schema::table('alumnis', function (Blueprint $table) {
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->integer('tahun_lulus');
            $table->string('pendidikan_lanjutan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->text('prestasi')->nullable();
            $table->text('testimoni')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumnis', function (Blueprint $table) {
            $table->dropColumn([
                'nama',
                'foto',
                'tahun_lulus',
                'pendidikan_lanjutan',
                'pekerjaan',
                'prestasi',
                'testimoni',
                'is_active'
            ]);
        });
    }
};
