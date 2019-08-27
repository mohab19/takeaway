<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'resturant_id', 'total', 'order_status', 'message_status', 'delivered_at' 
    ];

    /**
     * Get the User that made the order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all Items that registered under an Order.
     */
    public function orderItem()
    {
        return $this->hasMany('App\OrderItem');
    }
}
