<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::all();
        return view('index', ['orders' => $orders]);
    }

    /**
     * authenticate the user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        return view('index');
    }
}
