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
        Schema::table('sambutan_kepsek', function (Blueprint $table) {
            // Rename existing columns to match new structure
            $table->renameColumn('judul', 'judul_header');
            $table->renameColumn('subtitle', 'deskripsi_header');
            
            // Add new columns
            $table->string('gambar_header')->nullable()->after('foto_kepsek2');
            $table->boolean('is_active')->default(true)->after('gambar_header');
            
            // Remove foto_kepsek2 column as it's not needed
            $table->dropColumn('foto_kepsek2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sambutan_kepsek', function (Blueprint $table) {
            // Revert column renames
            $table->renameColumn('judul_header', 'judul');
            $table->renameColumn('deskripsi_header', 'subtitle');
            
            // Remove new columns
            $table->dropColumn(['gambar_header', 'is_active']);
            
            // Add back foto_kepsek2 column
            $table->string('foto_kepsek2')->nullable();
        });
    }
};
