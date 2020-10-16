<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'LoginController@login');
Route::post('/register', 'RegisterController@register');

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/products', 'ProductController@getProducts');

    Route::post('/add-to-cart', 'CartController@addToCart');
    Route::get('/get-cart-products', 'CartController@getCartProducts');
    Route::get('/delete-cart-item/{id}', 'CartController@deleteCartItem');
    Route::get('/increment/{id}', 'CartController@incrementItem');
    Route::get('/decrement/{id}', 'CartController@decrementItem');

    Route::get('/submit-order', 'OrderController@submitOrder');
    Route::get('/get-orders', 'OrderController@getOrders');

    Route::get('/logout', 'LoginController@logout');

});
