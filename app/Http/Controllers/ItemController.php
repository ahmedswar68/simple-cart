<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Item;

class ItemController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $products = Item::all();
        $cart = $this->cart->getCart();
        $total = $this->cart->getTotal();
        return view('products',
            compact('products','cart','total'));
    }
}
