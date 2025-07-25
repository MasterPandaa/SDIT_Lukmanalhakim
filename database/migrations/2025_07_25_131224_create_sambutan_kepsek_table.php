<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sambutan_kepsek', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('subtitle');
            $table->text('sambutan');
            $table->string('video_url');
            $table->integer('tahun_berdiri');
            $table->string('foto_kepsek')->nullable();
            $table->string('foto_kepsek2')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sambutan_kepsek');
    }
}; 