<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'resturantitems_id',
    ];

    /**
     * Get the Order that lists this Items.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * Get the Item that is lested in this Order.
     */
    public function resturantItem()
    {
        return $this->belongsTo('App\ResturantItems', 'resturantitems_id');
    }
}
