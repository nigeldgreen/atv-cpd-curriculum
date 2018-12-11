<?php

namespace Tests\Integration;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /** @test */
    public function valid_jwt_will_create_authenticated_user()
    {
        $this->withExceptionHandling();
        $response = $this->json('GET', '/api/v1/module', [], [
            'Authorization' => 'Bearer ' . env('TEST_TOKEN'),
            'X-Organisation-Id' => 1,
        ]);

        $response->assertStatus(200);
    }
    /** @test */
    public function missing_jwt_will_fail()
    {
        $this->withExceptionHandling();
        $response = $this->json('GET', '/api/v1/module', [], [
            'X-Organisation-Id' => 1,
        ]);

        $response->assertStatus(401);
    }
    /** @test */
    public function missing_organisation_id_will_fail()
    {
        $this->withExceptionHandling();
        $response = $this->json('GET', '/api/v1/module', [], [
            'Authorization' => 'Bearer ' . env('TEST_TOKEN'),
        ]);

        $response->assertStatus(401);
    }
}
