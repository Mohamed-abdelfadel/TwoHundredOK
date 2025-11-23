<?php

namespace Tests\Feature;

use Tests\TestCase;

class PingTest extends TestCase
{
    public function test_ping_endpoint_returns_pong(): void
    {
        $response = $this->get('/api/ping');

        $response->assertStatus(200)
            ->assertJsonStructure(['pong', 'time', 'app'])
            ->assertJson(['pong' => true]);
    }
}