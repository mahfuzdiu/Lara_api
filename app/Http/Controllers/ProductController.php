<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function getProducts(){
        return response()->json(Product::get());
    }
}
