<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

namespace Tests\Feature;

use Tests\TestCase;

class LoadLoginPageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_login_page()
    {
        
            $response = $this->get('login');
        
            $response->assertStatus(200);
        
    }
}
