<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShortenUrlReadTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRedirect()
    {
        $response = $this->post('/api/shorten-url', [
            'url' => 'https://www.youtube.com/'
        ]);

        $response->assertStatus(200);

        $data = json_decode($response->getContent(), true);
        $code = $data['data']['code'];

        $readResponse = $this->get('/' . $code);

        $readResponse->assertStatus(302);
    }
}
