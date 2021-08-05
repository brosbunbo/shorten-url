<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShortenUrlCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateInvalidUrl()
    {
        $response = $this->post('/api/shorten-url', [
            'url' => 'abcdef'
        ]);

        $response->assertStatus(422);
    }

    public function testCreateInvalidExpiredAt()
    {
        $response = $this->post('/api/shorten-url', [
            'url' => 'https://www.youtube.com/',
            'expired_at' => now()
        ]);

        $response->assertStatus(422);
    }

    public function testCreateSuccess()
    {
        $response = $this->post('/api/shorten-url', [
            'url' => 'https://www.youtube.com/'
        ]);

        $response->assertStatus(200);
    }
}
