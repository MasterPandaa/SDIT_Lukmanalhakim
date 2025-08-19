<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ensure row format supports off-page storage for TEXT columns
        try {
            DB::statement('ALTER TABLE `website_settings` ROW_FORMAT=DYNAMIC');
        } catch (\Exception $e) {
            // Ignore if not supported
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No-op: this migration only adjusted row format
    }
};
