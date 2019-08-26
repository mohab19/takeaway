<?php

use Illuminate\Database\Seeder;
use App\ResturantItems;

class ResturantItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ResturantItems::class, 50)->create();        
    }
}
