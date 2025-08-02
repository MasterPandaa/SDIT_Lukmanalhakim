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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            
            // Header Settings
            $table->string('header_phone')->nullable();
            $table->string('header_address')->nullable();
            $table->string('header_facebook')->nullable();
            $table->string('header_instagram')->nullable();
            $table->string('header_youtube')->nullable();
            $table->string('header_google_map')->nullable();
            $table->string('header_logo')->nullable();
            $table->string('header_psb_link')->nullable();
            
            // Footer Settings
            $table->text('footer_description')->nullable();
            $table->string('footer_address')->nullable();
            $table->string('footer_phone')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_facebook')->nullable();
            $table->string('footer_twitter')->nullable();
            $table->string('footer_linkedin')->nullable();
            $table->string('footer_instagram')->nullable();
            $table->string('footer_pinterest')->nullable();
            $table->string('footer_copyright_text')->nullable();
            $table->string('footer_designer_text')->nullable();
            $table->string('footer_designer_link')->nullable();
            
            // Footer Quick Links
            $table->string('footer_quick_link_1_text')->nullable();
            $table->string('footer_quick_link_1_url')->nullable();
            $table->string('footer_quick_link_2_text')->nullable();
            $table->string('footer_quick_link_2_url')->nullable();
            $table->string('footer_quick_link_3_text')->nullable();
            $table->string('footer_quick_link_3_url')->nullable();
            $table->string('footer_quick_link_4_text')->nullable();
            $table->string('footer_quick_link_4_url')->nullable();
            $table->string('footer_quick_link_5_text')->nullable();
            $table->string('footer_quick_link_5_url')->nullable();
            $table->string('footer_quick_link_6_text')->nullable();
            $table->string('footer_quick_link_6_url')->nullable();
            
            // Footer Programs
            $table->string('footer_program_1_text')->nullable();
            $table->string('footer_program_1_url')->nullable();
            $table->string('footer_program_2_text')->nullable();
            $table->string('footer_program_2_url')->nullable();
            $table->string('footer_program_3_text')->nullable();
            $table->string('footer_program_3_url')->nullable();
            $table->string('footer_program_4_text')->nullable();
            $table->string('footer_program_4_url')->nullable();
            $table->string('footer_program_5_text')->nullable();
            $table->string('footer_program_5_url')->nullable();
            $table->string('footer_program_6_text')->nullable();
            $table->string('footer_program_6_url')->nullable();
            
            // Footer News
            $table->text('footer_news_1')->nullable();
            $table->text('footer_news_2')->nullable();
            
            // Footer Bottom Links
            $table->string('footer_bottom_link_1_text')->nullable();
            $table->string('footer_bottom_link_1_url')->nullable();
            $table->string('footer_bottom_link_2_text')->nullable();
            $table->string('footer_bottom_link_2_url')->nullable();
            $table->string('footer_bottom_link_3_text')->nullable();
            $table->string('footer_bottom_link_3_url')->nullable();
            $table->string('footer_bottom_link_4_text')->nullable();
            $table->string('footer_bottom_link_4_url')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
