<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic home route test.
     *
     * @return void
     */
    public function testHomeLoads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
