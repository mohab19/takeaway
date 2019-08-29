<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\ResturantItems;
use App\OrderItem;
use App\Resturant;
use App\Order;
use App\User;

class OrderController extends Controller
{

    public function sendMessageToUser($id, $indicator)
    {
        $user  = User::where('id', $id)->first();
        $order = Order::where('user_id', $id)->latest()->first();
        $resturant = Resturant::where('id', $order->resturant_id)->first();

        if(empty($resturant)) {
            $resturantName = 'takeaway.com';
            $deliveryMinutes = 90;
        } else {
            $resturantName = $resturant->name;
            $deliveryMinutes = $resturant->delivery_minutes;
        }
        
        if($indicator == 'create')
            $message = 'Your order from ' .$resturantName. ' will arraive in ' .$deliveryMinutes. ' min, Thank you for using takeaway.com.';
        else
            $message = 'Have you recieved your order from ' .$resturantName. ', are you satisfied with our services? please rate us on the app.';

        if($user) {
            $MessageBird         = new \MessageBird\Client('DIP64vL2DlZ0bO1D9Vnpdl5dX');
            $Message             = new \MessageBird\Objects\Message();
            
            $Message->originator = 'MessageBird';
            $Message->recipients = array(intval('0020' . $user->phone));
            $Message->body       = $message;
            
            $response = $MessageBird->messages->create($Message);
            
            if($response) 
                return true;
            else
                return false;
        }
    }

    public function messageCronjob()
    {
        $deliveredOrders = Order::where('delivered_at', '<=',date('Y-m-d H:i:s', strtotime('-90 minutes')))->get();
        $indicator = 0;
        foreach($deliveredOrders as $key => $order) {
            $update = Order::where('user_id', $order->user_id)->where('order_status', 'delivered')->update([
                'message_status' => 'delivered',
            ]);
            $response = $this->sendMessageToUser($order->user_id, 'update');
            if($response)
                $indicator += 1;
        }

        if($indicator == count($deliveredOrders))
            return response(200);
        else
            return response(300);
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
    public function store(OrderRequest $request)
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
            'message_status' => 'pending',
            'delivered_at'   => null,
        ]);

        foreach($Items as $key => $item) {
            $saveItems = OrderItem::create([
                'order_id'          => $saveOrder->id,
                'resturantitems_id' => $item->id, 
            ]);
        }

        $response = $this->sendMessageToUser($request->user_id, 'create');

        if($response) {
            $update = Order::where('user_id', $request->user_id)->where('order_status', 'sent')->update([
                'message_status' => 'sent',
            ]);
            return response(200);
        } else {
            return response(200);
        }
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
    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->update([
            'order_status'   => 'delivered',
            'message_status' => 'pending',
            'delivered_at'   => date('Y-m-d H:i:s'),

        ]);

        if($order)
            return redirect()->back()->with('status', 'Order updated!');
        else 
            return redirect()->back()->with('error', 'something went wrong!');
            
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
