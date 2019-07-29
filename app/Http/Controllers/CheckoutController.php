<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Cart\Checkout;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    private $cart;
    private $checkout;

    public function __construct(Cart $cart, Checkout $checkout)
    {
        $this->cart = $cart;
        $this->checkout = $checkout;
    }

    public function index()
    {
        if ($this->cart->isEmpty()) {
            return redirect('/');
        }
        $cart = $this->cart->getCart();
        $total = $this->cart->getTotal();
        return view('checkout', compact('cart', 'total'));
    }

    public function checkout(CheckoutRequest $request)
    {
        if ($this->cart->isEmpty()) {
            return redirect('/');
        }
        $result = $this->checkout->checkout($request);
        if ($result) {
            return redirect('/orders');
        }
        return redirect()->back()->with('error', "Sorry! You don't have enough credit in your balance");
    }
}
