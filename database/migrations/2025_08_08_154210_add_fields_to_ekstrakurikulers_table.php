<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->text('deskripsi')->nullable()->after('nama');
            $table->string('gambar')->nullable()->after('deskripsi');
            $table->boolean('is_active')->default(true)->after('gambar');
            $table->integer('urutan')->default(0)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {
            $table->dropColumn(['nama','deskripsi','gambar','is_active','urutan']);
        });
    }
};
