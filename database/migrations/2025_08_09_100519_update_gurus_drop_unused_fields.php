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
        // Drop columns individually only if they exist to avoid errors
        $columns = ['gelar', 'jumlah_siswa', 'rating', 'kemampuan_bahasa', 'penghargaan'];
        foreach ($columns as $col) {
            if (Schema::hasColumn('gurus', $col)) {
                Schema::table('gurus', function (Blueprint $table) use ($col) {
                    $table->dropColumn($col);
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Re-add the columns if they were dropped. Use nullable defaults to be safe
        if (!Schema::hasColumn('gurus', 'gelar')) {
            Schema::table('gurus', function (Blueprint $table) {
                $table->string('gelar')->nullable()->after('jabatan');
            });
        }
        if (!Schema::hasColumn('gurus', 'jumlah_siswa')) {
            Schema::table('gurus', function (Blueprint $table) {
                $table->integer('jumlah_siswa')->default(0)->after('pengalaman_mengajar');
            });
        }
        if (!Schema::hasColumn('gurus', 'rating')) {
            Schema::table('gurus', function (Blueprint $table) {
                $table->integer('rating')->default(5)->after('jumlah_siswa');
            });
        }
        if (!Schema::hasColumn('gurus', 'kemampuan_bahasa')) {
            Schema::table('gurus', function (Blueprint $table) {
                $table->text('kemampuan_bahasa')->nullable()->after('rating');
            });
        }
        if (!Schema::hasColumn('gurus', 'penghargaan')) {
            Schema::table('gurus', function (Blueprint $table) {
                $table->text('penghargaan')->nullable()->after('kemampuan_bahasa');
            });
        }
    }
};
