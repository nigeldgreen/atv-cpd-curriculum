<?php

namespace Tests\Integration;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /** @test */
    public function valid_token_will_create_authenticated_user()
    {
        $this->withExceptionHandling();
        $response = $this->json('GET', '/api/v1/module', [], [
            'Authorization' => 'Bearer ' . env('TEST_TOKEN'),
        ]);

        $response->assertStatus(200);
    }
}
