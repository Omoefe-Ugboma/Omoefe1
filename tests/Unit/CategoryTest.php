<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**

     * @test
     */
    public function testExample()
    {
        $this->actingAs($this->user, 'api')
            ->get('/api/v1/user/details')
            ->assertStatus(200)
            ->assertJsonFragment([
                'status' => 'success'
            ]);
    }
}
