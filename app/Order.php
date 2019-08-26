<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Get the User that made the order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
