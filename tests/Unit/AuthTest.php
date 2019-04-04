<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{

    /**
     * @test
     */
    public function user_can_view_his_profile()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => $this->headers['Authorization']
        ])->json('GET', '/api/v1/user');
        $response->assertStatus(200);
    }


    /** @test */
    public function user_can_log_out(){
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => $this->headers['Authorization']
        ])->json('GET', '/api/v1/logout');
        $response->assertStatus(200)
            ->assertJsonFragment([
            'message' => 'Successfully logged out'
        ]);

    }

    /** @test */
    public function user_can_signup(){
        $data = [
            'name' => 'Kingsley smith',
            'email' => 'kkdutk@gmail.com',
            'password' => 'secret'
        ];

        $response = $this->withHeaders([
            'Content-Type' => 'application/json'
        ])->json('POST', route('signup'), $data);

        $response->assertStatus(201);
    }
}
