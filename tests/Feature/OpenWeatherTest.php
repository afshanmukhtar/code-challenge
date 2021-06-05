<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OpenWeatherTest extends TestCase
{
    /**
     * Test for site working
     *
     * @return void
     */
    public function testOpenWeather()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Simple Weather App');
    }
    /**
     * Test for receiving response from api
     *
     * @return void
     */
    public function testApiResponse()
    {
        $response = $this->get('/city/vapi');

        $response->assertStatus(200);
        $response->assertSee('status');
    }
}
