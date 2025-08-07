<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WebsiteTest extends TestCase
{
    public function test_home_page_loads()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_visi_misi_page_loads()
    {
        $response = $this->get('/visi-misi');
        $response->assertStatus(200);
    }

    public function test_contact_page_loads()
    {
        $response = $this->get('/kontak');
        $response->assertStatus(200);
    }

    public function test_guru_page_loads()
    {
        $response = $this->get('/guru');
        $response->assertStatus(200);
    }

    public function test_blog_page_loads()
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
    }
}