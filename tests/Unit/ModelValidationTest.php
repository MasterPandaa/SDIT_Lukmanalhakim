<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\VisiMisi;
use App\Models\Guru;
use App\Models\Artikel;

class ModelValidationTest extends TestCase
{
    public function test_models_have_required_properties()
    {
        $this->assertTrue(class_exists(VisiMisi::class));
        $this->assertTrue(class_exists(Guru::class));
        $this->assertTrue(class_exists(Artikel::class));
    }

    public function test_guru_model_has_fillable_attributes()
    {
        $guru = new Guru();
        $fillable = $guru->getFillable();
        $this->assertIsArray($fillable);
    }
}