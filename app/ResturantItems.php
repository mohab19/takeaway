<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResturantItems extends Model
{
    /**
     * Get the Resturant that owns the Menu Item.
     */
    public function resturant()
    {
        return $this->belongsToMany('App\Resturant')->using('App\OrderItems');
    }
}
