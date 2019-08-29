<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResturantTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_resturant_is_there()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'name'             => $this->faker->name,
            'delivery_minutes' => $this->faker->randomNumber,
        ];

        $response = $this->get('/resturant')->assertStatus(200);
        
    }
}
