<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('fasilitas', 'nama')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->string('nama')->nullable()->after('id');
            });
        }
        if (!Schema::hasColumn('fasilitas', 'deskripsi')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->text('deskripsi')->nullable()->after('nama');
            });
        }
        if (!Schema::hasColumn('fasilitas', 'kategori')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->string('kategori')->nullable()->after('deskripsi');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('fasilitas', 'kategori')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->dropColumn('kategori');
            });
        }
        if (Schema::hasColumn('fasilitas', 'deskripsi')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->dropColumn('deskripsi');
            });
        }
        if (Schema::hasColumn('fasilitas', 'nama')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->dropColumn('nama');
            });
        }
    }
};
