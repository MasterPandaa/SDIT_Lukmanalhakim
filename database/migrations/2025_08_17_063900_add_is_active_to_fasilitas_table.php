<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            if (!Schema::hasColumn('fasilitas', 'foto')) {
                $table->string('foto')->nullable();
            }
            if (!Schema::hasColumn('fasilitas', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
        });
    }

    public function down(): void
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            if (Schema::hasColumn('fasilitas', 'is_active')) {
                $table->dropColumn('is_active');
            }
            if (Schema::hasColumn('fasilitas', 'foto')) {
                $table->dropColumn('foto');
            }
        });
    }
};
