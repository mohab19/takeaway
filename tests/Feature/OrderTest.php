<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_orders_is_stored()
    {
        $this->withoutExceptionHandling();

        $request = [
            'user_id'        => $this->faker->randomDigit,
            'resturant_id'   => $this->faker->randomDigit,
            'item_ids'       => [
                0 => $this->faker->randomDigit,
                1 => $this->faker->randomDigit
            ]
        ];

        $response = $this->post('/order', $request)->assertStatus(200);
        $this->assertDatabaseHas('orders', ['user_id' => $request['user_id'], 'resturant_id' => $request['resturant_id']]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_orders_requires_a_user()
    {
        $this->post('/order', [])->assertSessionHasErrors('user_id');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_orders_requires_a_resturant()
    {
        $this->post('/order', [])->assertSessionHasErrors('resturant_id');
    }


}
