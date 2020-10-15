<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        foreach ($request->all() as $cartItem){
            $cartItem = (object)  $cartItem;
            if(!$cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $cartItem->product_id)->first()){
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $cartItem->product_id,
                    'name' => $cartItem->name,
                    'quantity' => $cartItem->quantity
                ]);
            }else{
                $cart->quantity = $cartItem->quantity;
            }
        }
        return response()->json(['status' => 'success']);
    }

    public function deleteCartItem($id){
        $cart = new Cart();
        $cart->destroy($id);
        return response()->json(['status' => 'success']);
    }
}
