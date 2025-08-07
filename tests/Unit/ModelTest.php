<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\VisiMisi;
use App\Models\Guru;
use App\Models\Artikel;

class ModelTest extends TestCase
{
    public function test_visi_misi_model_exists()
    {
        $this->assertTrue(class_exists(VisiMisi::class));
    }

    public function test_guru_model_exists()
    {
        $this->assertTrue(class_exists(Guru::class));
    }

    public function test_artikel_model_exists()
    {
        $this->assertTrue(class_exists(Artikel::class));
    }
}