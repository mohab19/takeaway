<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_must_show_Orders()
    {
        $attributes = [
            'id'             => $this->faker->randomDigit,
            'user_id'        => $this->faker->randomDigit,
            'resturant_id'   => $this->faker->randomDigit,
            'total'          => $this->faker->randomNumber,
            'order_status'   => 'sent',
            'message_status' => 'sent',
            'delivered_at'   => $this->faker->dateTimeThisMonth('now', null)
        ];

        $response = $this->get('/');

        $response->assertStatus(200);
        
        $response->assertSee($attributes['id'], $attributes['total'], $attributes['order_status'], $attributes['message_status']);
    }
}
