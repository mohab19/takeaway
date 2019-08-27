<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResturantItems;
use App\OrderItem;
use App\Resturant;
use App\Order;
use App\User;

class OrderController extends Controller
{

    public function sendMessageToUser($id)
    {
        $user  = User::where('id', $id)->first();
        $order = Order::where('user_id', $id)->where('order_status', 'sent')->with('orderItem')->latest()->first();
        foreach($order->orderItem as $item) {
            $item_ids[] = $item->resturantitems_id;
        }
        $item = ResturantItems::whereIn('id', $item_ids)->first();
        if($user) {
            $MessageBird         = new \MessageBird\Client('DIP64vL2DlZ0bO1D9Vnpdl5dX');
            $Message             = new \MessageBird\Objects\Message();
            
            $Message->originator = 'MessageBird';
            $Message->recipients = array(intval('0020' . $user->phone));
            $Message->body       = 'Your order from ' .$item->resturant->name. ' will arraive in ' .$item->resturant->delivery_minutes. ' min, Thank you for using takeaway.com.';
            
            $response = $MessageBird->messages->create($Message);
            $update = Order::where('user_id', $id)->where('order_status', 'sent')->update([
                'message_status' => $response->recipients->items[0]->status,
                'delivered_at'   => date('Y-m-d H:i:s', strtotime('+' . $item->resturant->delivery_minutes))
                ]);
            if($response) 
                return response(200);
            else
                return response(300);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $resturants = Resturant::all();
        return view('order', ['users' => $users, 'resturants' => $resturants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Items = ResturantItems::whereIn('id', $request->item_ids)->get();
        $total = 0;
        foreach($Items as $key => $item) {
            $total += $item->price;
        }
        $order = Order::where('user_id', $request->user_id)->where('order_status', 'sent')->latest()->get();
        if(count($order) == 1) {
            return response(['message' => 'User still has an un-delivered Order !'], 300);
        }
        $saveOrder = Order::create([
            'user_id'        => $request->user_id,
            'resturant_id'   => $request->resturant_id,
            'total'          => $total,
            'order_status'   => 'sent',
            'message_status' => 'stand by',
            'delivered_at'   => null,
        ]);

        foreach($Items as $key => $item) {
            $saveItems = OrderItem::create([
                'order_id'          => $saveOrder->id,
                'resturantitems_id' => $item->id, 
            ]);
        }

        $response = $this->sendMessageToUser($request->user_id);

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
