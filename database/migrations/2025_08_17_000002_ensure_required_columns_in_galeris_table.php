<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            if (!Schema::hasColumn('galeris', 'judul')) {
                $table->string('judul')->after('id')->default('')->index();
            }
            if (!Schema::hasColumn('galeris', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('judul');
            }
            if (!Schema::hasColumn('galeris', 'foto')) {
                $table->string('foto')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('galeris', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('foto');
            }
        });
    }

    public function down(): void
    {
        // No-op: we won't drop added columns in down to avoid data loss
    }
};
