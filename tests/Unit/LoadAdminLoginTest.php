<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

namespace Tests\Feature;

use Tests\TestCase;

class LoadAdminLoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_admin_login_page()
    {
        
            $response = $this->get('admin');
        
            $response->assertStatus(200);
        
    }
}
