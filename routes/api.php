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
    Route::get('/delete-cart-item/{id}', 'CartController@deleteCartItem');

    Route::get('/submit-order', 'OrderController@submitOrder');

    Route::get('/logout', 'LoginController@logout');

});
