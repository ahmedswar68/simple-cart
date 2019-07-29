<?php


namespace App\Cart;

use App\Cart as CartModel;

class Cart
{
    /**
     * @return mixed array
     */
    public function getCart()
    {
        return CartModel::with('item')->where('customer_id', 1)->get();
    }


    public function emptyCart()
    {
        CartModel::truncate();
    }

    public function isEmpty()
    {
        return $this->getCart()->isEmpty();
    }

    /**
     * @return float|int
     */
    public function getTotal()
    {
        $total = 0;
        foreach ($this->getCart() as $item) {
            $total += $item->item->price * $item->quantity;
        }
        return $total;
    }

    public function addToCart($product)
    {
        $id = $product->id;
        $cartItem = $this->findCartItem($id);
        // if cart is empty then this the first product
        if (is_null($cartItem)) {
            $cartItem = new CartModel();
            $cartItem->item_id = $id;
            $cartItem->customer_id = 1;
            $cartItem->quantity = 1;
            $cartItem->save();
            return true;
        }
        // if cart not empty then check if this product exist then increment quantity
        $cartItem->quantity++;
        $cartItem->save();
        return true;
    }

    public function updateCartQuantity($request)
    {
        $id = $request->id;
        $cartItem = $this->findCartItem($id);
        if (!is_null($cartItem)) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            return true;
        }

        return false;
    }

    public function deleteItemFromCart($id)
    {
        $product = $this->findCartItem($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;

    }

    private function findCartItem($id)
    {
        return CartModel::where('item_id', $id)->first();
    }
}
