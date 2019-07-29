<?php

namespace App\Cart;

use App\Customer;
use App\Order;
use App\OrderItems;

class Checkout
{
    private $cart;

    /**
     * Checkout constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function checkout($request)
    {
        // get summation of cart items
        $total = $this->cart->getTotal();
        $customer = Customer::find(1);
        /*
         * check if customer credit less than cart total price if true
         * return error
         */
        if ($customer->store_credit < $total) {
            return false;
        }
        $this->saveOrder($customer, $request, $total);
        $this->cart->emptyCart();

        $customer->store_credit -= $total;
        $customer->save();
        return true;
    }

    /**
     * @param $customer
     * @param $request
     * @param $total
     * @return Order
     */
    private function saveOrder($customer, $request, $total)
    {
        $order = new Order();
        $order->customer_id = $customer->id;
        $order->address = $request->input('address');
        $order->telephone = $request->input('telephone');
        $order->total = $total;
        $order->save();
        return $order;
    }

}
