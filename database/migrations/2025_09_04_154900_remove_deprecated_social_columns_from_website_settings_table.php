<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            if (Schema::hasColumn('website_settings', 'footer_twitter')) {
                $table->dropColumn('footer_twitter');
            }
            if (Schema::hasColumn('website_settings', 'footer_linkedin')) {
                $table->dropColumn('footer_linkedin');
            }
            if (Schema::hasColumn('website_settings', 'footer_pinterest')) {
                $table->dropColumn('footer_pinterest');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('website_settings', 'footer_twitter')) {
                $table->string('footer_twitter')->nullable()->after('footer_facebook');
            }
            if (!Schema::hasColumn('website_settings', 'footer_linkedin')) {
                $table->string('footer_linkedin')->nullable()->after('footer_twitter');
            }
            if (!Schema::hasColumn('website_settings', 'footer_pinterest')) {
                $table->string('footer_pinterest')->nullable()->after('footer_instagram');
            }
        });
    }
};
