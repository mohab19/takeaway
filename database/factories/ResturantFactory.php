<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Resturant;
use Faker\Generator as Faker;

$factory->define(Resturant::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'delivery_minutes' => $faker->numberBetween(20, 100),
        
    ];
});
