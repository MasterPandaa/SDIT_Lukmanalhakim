<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('prestasis', function (Blueprint $table) {
            $table->string('judul')->after('id');
            $table->text('deskripsi')->nullable()->after('judul');
            $table->string('gambar')->nullable()->after('deskripsi');
            $table->date('tanggal')->nullable()->after('gambar');
            $table->string('tingkat')->nullable()->after('tanggal');
            $table->string('peraih')->nullable()->after('tingkat');
            $table->string('penyelenggara')->nullable()->after('peraih');
            $table->boolean('is_active')->default(true)->after('penyelenggara');
            $table->integer('urutan')->default(0)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('prestasis', function (Blueprint $table) {
            $table->dropColumn([
                'judul','deskripsi','gambar','tanggal','tingkat','peraih','penyelenggara','is_active','urutan'
            ]);
        });
    }
};
