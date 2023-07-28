<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

namespace Tests\Feature;

use Tests\TestCase;

class GetDashboardTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_dashboard_page()
    {
        
            $response = $this->get('dashboard');
        
            $response->assertStatus(200);
        
    }
}
