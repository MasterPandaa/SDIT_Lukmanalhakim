<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Convert many VARCHAR(255) columns to TEXT to reduce row size
        $sql = "ALTER TABLE `website_settings`
            MODIFY `header_phone` TEXT NULL,
            MODIFY `header_address` TEXT NULL,
            MODIFY `header_facebook` TEXT NULL,
            MODIFY `header_instagram` TEXT NULL,
            MODIFY `header_youtube` TEXT NULL,
            MODIFY `header_google_map` TEXT NULL,
            MODIFY `header_logo` TEXT NULL,
            MODIFY `header_psb_link` TEXT NULL,

            MODIFY `footer_address` TEXT NULL,
            MODIFY `footer_phone` TEXT NULL,
            MODIFY `footer_email` TEXT NULL,
            MODIFY `footer_facebook` TEXT NULL,
            MODIFY `footer_twitter` TEXT NULL,
            MODIFY `footer_linkedin` TEXT NULL,
            MODIFY `footer_instagram` TEXT NULL,
            MODIFY `footer_pinterest` TEXT NULL,
            MODIFY `footer_copyright_text` TEXT NULL,
            MODIFY `footer_designer_text` TEXT NULL,
            MODIFY `footer_designer_link` TEXT NULL,

            MODIFY `footer_quick_link_1_text` TEXT NULL,
            MODIFY `footer_quick_link_1_url` TEXT NULL,
            MODIFY `footer_quick_link_2_text` TEXT NULL,
            MODIFY `footer_quick_link_2_url` TEXT NULL,
            MODIFY `footer_quick_link_3_text` TEXT NULL,
            MODIFY `footer_quick_link_3_url` TEXT NULL,
            MODIFY `footer_quick_link_4_text` TEXT NULL,
            MODIFY `footer_quick_link_4_url` TEXT NULL,
            MODIFY `footer_quick_link_5_text` TEXT NULL,
            MODIFY `footer_quick_link_5_url` TEXT NULL,
            MODIFY `footer_quick_link_6_text` TEXT NULL,
            MODIFY `footer_quick_link_6_url` TEXT NULL,

            MODIFY `footer_program_1_text` TEXT NULL,
            MODIFY `footer_program_1_url` TEXT NULL,
            MODIFY `footer_program_2_text` TEXT NULL,
            MODIFY `footer_program_2_url` TEXT NULL,
            MODIFY `footer_program_3_text` TEXT NULL,
            MODIFY `footer_program_3_url` TEXT NULL,
            MODIFY `footer_program_4_text` TEXT NULL,
            MODIFY `footer_program_4_url` TEXT NULL,
            MODIFY `footer_program_5_text` TEXT NULL,
            MODIFY `footer_program_5_url` TEXT NULL,
            MODIFY `footer_program_6_text` TEXT NULL,
            MODIFY `footer_program_6_url` TEXT NULL,

            MODIFY `footer_bottom_link_1_text` TEXT NULL,
            MODIFY `footer_bottom_link_1_url` TEXT NULL,
            MODIFY `footer_bottom_link_2_text` TEXT NULL,
            MODIFY `footer_bottom_link_2_url` TEXT NULL,
            MODIFY `footer_bottom_link_3_text` TEXT NULL,
            MODIFY `footer_bottom_link_3_url` TEXT NULL,
            MODIFY `footer_bottom_link_4_text` TEXT NULL,
            MODIFY `footer_bottom_link_4_url` TEXT NULL
        ";

        try {
            DB::statement($sql);
        } catch (\Exception $e) {
            // If any column doesn't exist (older installs), ignore gracefully
        }
    }

    public function down(): void
    {
        // Best-effort revert to VARCHAR(255)
        $sql = "ALTER TABLE `website_settings`
            MODIFY `header_phone` VARCHAR(255) NULL,
            MODIFY `header_address` VARCHAR(255) NULL,
            MODIFY `header_facebook` VARCHAR(255) NULL,
            MODIFY `header_instagram` VARCHAR(255) NULL,
            MODIFY `header_youtube` VARCHAR(255) NULL,
            MODIFY `header_google_map` VARCHAR(255) NULL,
            MODIFY `header_logo` VARCHAR(255) NULL,
            MODIFY `header_psb_link` VARCHAR(255) NULL,

            MODIFY `footer_address` VARCHAR(255) NULL,
            MODIFY `footer_phone` VARCHAR(255) NULL,
            MODIFY `footer_email` VARCHAR(255) NULL,
            MODIFY `footer_facebook` VARCHAR(255) NULL,
            MODIFY `footer_twitter` VARCHAR(255) NULL,
            MODIFY `footer_linkedin` VARCHAR(255) NULL,
            MODIFY `footer_instagram` VARCHAR(255) NULL,
            MODIFY `footer_pinterest` VARCHAR(255) NULL,
            MODIFY `footer_copyright_text` VARCHAR(255) NULL,
            MODIFY `footer_designer_text` VARCHAR(255) NULL,
            MODIFY `footer_designer_link` VARCHAR(255) NULL,

            MODIFY `footer_quick_link_1_text` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_1_url` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_2_text` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_2_url` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_3_text` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_3_url` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_4_text` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_4_url` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_5_text` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_5_url` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_6_text` VARCHAR(255) NULL,
            MODIFY `footer_quick_link_6_url` VARCHAR(255) NULL,

            MODIFY `footer_program_1_text` VARCHAR(255) NULL,
            MODIFY `footer_program_1_url` VARCHAR(255) NULL,
            MODIFY `footer_program_2_text` VARCHAR(255) NULL,
            MODIFY `footer_program_2_url` VARCHAR(255) NULL,
            MODIFY `footer_program_3_text` VARCHAR(255) NULL,
            MODIFY `footer_program_3_url` VARCHAR(255) NULL,
            MODIFY `footer_program_4_text` VARCHAR(255) NULL,
            MODIFY `footer_program_4_url` VARCHAR(255) NULL,
            MODIFY `footer_program_5_text` VARCHAR(255) NULL,
            MODIFY `footer_program_5_url` VARCHAR(255) NULL,
            MODIFY `footer_program_6_text` VARCHAR(255) NULL,
            MODIFY `footer_program_6_url` VARCHAR(255) NULL,

            MODIFY `footer_bottom_link_1_text` VARCHAR(255) NULL,
            MODIFY `footer_bottom_link_1_url` VARCHAR(255) NULL,
            MODIFY `footer_bottom_link_2_text` VARCHAR(255) NULL,
            MODIFY `footer_bottom_link_2_url` VARCHAR(255) NULL,
            MODIFY `footer_bottom_link_3_text` VARCHAR(255) NULL,
            MODIFY `footer_bottom_link_3_url` VARCHAR(255) NULL,
            MODIFY `footer_bottom_link_4_text` VARCHAR(255) NULL,
            MODIFY `footer_bottom_link_4_url` VARCHAR(255) NULL
        ";

        try {
            DB::statement($sql);
        } catch (\Exception $e) {
            // ignore
        }
    }
};
