<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

namespace Tests\Feature;

use Tests\TestCase;

class LoadLandingPageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     public function test_example()
    {

        for ($i = 0; $i < 5; $i++) {
            $response = $this->get('/');
        
            $response->assertStatus(200);
        }
    } 
}
