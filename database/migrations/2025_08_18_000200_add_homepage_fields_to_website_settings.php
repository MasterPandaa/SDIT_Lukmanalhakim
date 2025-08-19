<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            // Hero/Title Section
            if (!Schema::hasColumn('website_settings', 'judul_hero')) {
                $table->string('judul_hero')->nullable();
            }
            if (!Schema::hasColumn('website_settings', 'subtitle_hero')) {
                $table->string('subtitle_hero')->nullable();
            }
            if (!Schema::hasColumn('website_settings', 'deskripsi_hero')) {
                $table->text('deskripsi_hero')->nullable();
            }
            if (!Schema::hasColumn('website_settings', 'teks_tombol')) {
                $table->string('teks_tombol')->nullable();
            }
            if (!Schema::hasColumn('website_settings', 'link_tombol')) {
                $table->string('link_tombol')->nullable();
            }
            if (!Schema::hasColumn('website_settings', 'gambar_hero')) {
                $table->string('gambar_hero')->nullable();
            }

            // Program Unggulan Section
            if (!Schema::hasColumn('website_settings', 'program_section_title')) {
                $table->string('program_section_title')->nullable();
            }
            if (!Schema::hasColumn('website_settings', 'program_section_subtitle')) {
                $table->string('program_section_subtitle')->nullable();
            }

            for ($i = 1; $i <= 6; $i++) {
                $textCol = "program_{$i}_text";
                $urlCol = "program_{$i}_url";
                $imgCol = "program_{$i}_image";

                if (!Schema::hasColumn('website_settings', $textCol)) {
                    $table->string($textCol)->nullable();
                }
                if (!Schema::hasColumn('website_settings', $urlCol)) {
                    $table->string($urlCol)->nullable();
                }
                if (!Schema::hasColumn('website_settings', $imgCol)) {
                    $table->string($imgCol)->nullable();
                }
            }

            // Statistik Section
            if (!Schema::hasColumn('website_settings', 'stat_peserta_didik')) {
                $table->unsignedInteger('stat_peserta_didik')->nullable();
            }
            if (!Schema::hasColumn('website_settings', 'stat_guru')) {
                $table->unsignedInteger('stat_guru')->nullable();
            }
            if (!Schema::hasColumn('website_settings', 'stat_kelas')) {
                $table->unsignedInteger('stat_kelas')->nullable();
            }
            if (!Schema::hasColumn('website_settings', 'stat_ekstrakurikuler')) {
                $table->unsignedInteger('stat_ekstrakurikuler')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            // Drop Statistik
            if (Schema::hasColumn('website_settings', 'stat_peserta_didik')) {
                $table->dropColumn('stat_peserta_didik');
            }
            if (Schema::hasColumn('website_settings', 'stat_guru')) {
                $table->dropColumn('stat_guru');
            }
            if (Schema::hasColumn('website_settings', 'stat_kelas')) {
                $table->dropColumn('stat_kelas');
            }
            if (Schema::hasColumn('website_settings', 'stat_ekstrakurikuler')) {
                $table->dropColumn('stat_ekstrakurikuler');
            }

            // Drop Program Unggulan
            if (Schema::hasColumn('website_settings', 'program_section_title')) {
                $table->dropColumn('program_section_title');
            }
            if (Schema::hasColumn('website_settings', 'program_section_subtitle')) {
                $table->dropColumn('program_section_subtitle');
            }
            for ($i = 1; $i <= 6; $i++) {
                $textCol = "program_{$i}_text";
                $urlCol = "program_{$i}_url";
                $imgCol = "program_{$i}_image";

                if (Schema::hasColumn('website_settings', $textCol)) {
                    $table->dropColumn($textCol);
                }
                if (Schema::hasColumn('website_settings', $urlCol)) {
                    $table->dropColumn($urlCol);
                }
                if (Schema::hasColumn('website_settings', $imgCol)) {
                    $table->dropColumn($imgCol);
                }
            }

            // Drop Hero/Title
            if (Schema::hasColumn('website_settings', 'judul_hero')) {
                $table->dropColumn('judul_hero');
            }
            if (Schema::hasColumn('website_settings', 'subtitle_hero')) {
                $table->dropColumn('subtitle_hero');
            }
            if (Schema::hasColumn('website_settings', 'deskripsi_hero')) {
                $table->dropColumn('deskripsi_hero');
            }
            if (Schema::hasColumn('website_settings', 'teks_tombol')) {
                $table->dropColumn('teks_tombol');
            }
            if (Schema::hasColumn('website_settings', 'link_tombol')) {
                $table->dropColumn('link_tombol');
            }
            if (Schema::hasColumn('website_settings', 'gambar_hero')) {
                $table->dropColumn('gambar_hero');
            }
        });
    }
};
