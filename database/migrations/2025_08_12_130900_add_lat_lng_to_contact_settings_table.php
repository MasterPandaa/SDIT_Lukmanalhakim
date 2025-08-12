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
        Schema::table('contact_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_settings', 'latitude')) {
                $table->decimal('latitude', 12, 9)->nullable()->after('youtube');
            }
            if (!Schema::hasColumn('contact_settings', 'longitude')) {
                $table->decimal('longitude', 12, 9)->nullable()->after('latitude');
            }
            // Keeping google_maps_embed column for backward compatibility; can be dropped later if desired
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            if (Schema::hasColumn('contact_settings', 'latitude')) {
                $table->dropColumn('latitude');
            }
            if (Schema::hasColumn('contact_settings', 'longitude')) {
                $table->dropColumn('longitude');
            }
        });
    }
};
