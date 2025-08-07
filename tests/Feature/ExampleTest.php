<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminTest extends TestCase
{
    public function test_admin_login_page_loads()
    {
        $response = $this->get('/adminpanel/login');
        $response->assertStatus(200);
    }

    public function test_admin_dashboard_requires_authentication()
    {
        $response = $this->get('/adminpanel/dashboard');
        $response->assertRedirect();
    }
}
