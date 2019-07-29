<?php

namespace App\Http\Controllers;

use App\Order;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::all()->sortByDesc('id');
        $total = 0;
        $cart = [];
        return view('orders', compact('orders', 'total','cart'));
    }
}
