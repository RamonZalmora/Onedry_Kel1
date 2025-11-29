<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /** @test */
    public function server_time_api_works()
    {
        $response = $this->get('/api/server-time');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'time',
            'date'
        ]);
    }

    /** @test */
    public function weather_api_works()
    {
        $response = $this->get('/api/weather');

        $response->assertStatus(200);
    }
}
