<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    /**
     * Get all Menu Items that belongs to the Resturant.
     */
    public function resturantItems()
    {
        return $this->hasMany('App\ResturantItems');
    }
}
