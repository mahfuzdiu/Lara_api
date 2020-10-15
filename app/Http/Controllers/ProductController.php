<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function getProducts(){
        return response()->json(Product::get());
    }
}
