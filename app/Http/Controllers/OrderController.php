<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;

class OrderController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitOrder(){
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();

        $amount = $this->getTotalPrice($cartItems);

        $order = Order::create([
            'customer_id'   => auth()->user()->id,
            'order_no'      => time(),
            'sub_total'     => $amount,
            'total'         => $amount,
        ]);

        if($order){
            $this->deleteCart($cartItems);
        }else
            return response()->json(['status' => 'error']);

        return response()->json(['status' => $cartItems]);
    }

    /**
     * @param $cartItems
     * @return int
     */
    public function getTotalPrice($cartItems)
    {
        $orderPrice = 0;

        foreach ($cartItems as $item){
            $orderPrice +=  $item->quantity * Product::where('id', $item->product_id)->first()->unit_price;
        }

        return $orderPrice;
    }

    /**
     * @param $cartItems
     */
    public function deleteCart($cartItems){
        foreach ($cartItems as $item){
            $cart = Cart::where('user_id', auth()->user()->id)->first();
            $cart->delete();

            $product = Product::where('id', $item->product_id)->first();
            $product->quantity = $product->quantity - $item->quantity;
            $product->update();
        }

    }
}
