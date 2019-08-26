<?php

use Illuminate\Database\Seeder;
use App\Resturant;

class ResturantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Resturant::class, 10)->create();
    }
}
