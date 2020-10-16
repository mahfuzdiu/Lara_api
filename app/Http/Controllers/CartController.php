<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        if(!$cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $request->id)->first()){
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->id,
                'name' => $request->name,
                'quantity' => 1
            ]);
        }

        return response()->json(['status' => 'success']);
    }

    public function getCartProducts()
    {
        return  response()->json(Cart::where('user_id', auth()->user()->id)->get());
    }

    public function incrementItem($id)
    {
        $cart =  Cart::where('user_id', auth()->user()->id)->where('id', $id)->first();
        $cart->update([
            'quantity' => $cart->quantity + 1
        ]);

        return response()->json(['status' => 'success']);
    }

    public function decrementItem($id)
    {
        $cart =  Cart::where('user_id', auth()->user()->id)->where('id', $id)->first();
        $cart->update([
            'quantity' => $cart->quantity - 1
        ]);

        return response()->json(['status' => 'success']);
    }

    public function deleteCartItem($id){
        $cart = new Cart();
        $cart->destroy($id);
        return response()->json(['status' => 'success']);
    }
}
