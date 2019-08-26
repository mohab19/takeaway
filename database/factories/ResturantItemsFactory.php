<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ResturantItems;
use Faker\Generator as Faker;

$factory->define(ResturantItems::class, function (Faker $faker) {
    $type = $faker->randomElement(['food', 'beverages', 'dessert']);
    return [
        'resturant_id' => $faker->numberBetween(1, 10),
        'name' => $faker->word,
        'price' => $faker->numberBetween(10, 100),
        'type' => $type
    ];
});
