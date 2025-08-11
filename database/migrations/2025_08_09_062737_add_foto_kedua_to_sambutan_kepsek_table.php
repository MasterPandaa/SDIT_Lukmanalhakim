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
            // Add second photo field for the 2-photo header layout
            $table->string('foto_kedua')->nullable()->after('foto_kepsek')->comment('Second photo for header layout');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sambutan_kepsek', function (Blueprint $table) {
            $table->dropColumn('foto_kedua');
        });
    }
};
