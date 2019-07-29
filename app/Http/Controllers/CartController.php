<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Http\Requests\CartUpdateRequest;
use App\Http\Requests\DeleteItemFromCartRequest;
use App\Item;

class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $cart = $this->cart->getCart();
        $total = $this->cart->getTotal();
        return view('cart', compact('cart','total'));
    }

    public function addToCart(Item $product)
    {
        $cart = $this->cart->addToCart($product);
        if ($cart) {
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        return redirect()->back()->with('error', 'Failed!');
    }

    public function update(CartUpdateRequest $request)
    {
        if ($this->cart->updateCartQuantity($request)) {
            session()->flash('success', 'Cart updated successfully');
        } else {
            session()->flash('error', 'Failed to update the Cart');
        }

    }

    public function remove(DeleteItemFromCartRequest $request)
    {
        $id = $request->id;
        if ($this->cart->deleteItemFromCart($id)) {
            session()->flash('success', 'Product removed successfully');
        } else {
            session()->flash('error', 'This product is not in your cart');
        }
    }
}
