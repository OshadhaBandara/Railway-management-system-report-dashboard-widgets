<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

namespace Tests\Feature;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_login_page()
    {
        
            $response = $this->get('registration');
        
            $response->assertStatus(200);
        
    }
}
