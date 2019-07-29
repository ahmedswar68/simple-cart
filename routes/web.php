<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'ItemController@index');
Route::get('cart', 'CartController@index');
Route::get('orders', 'OrderController@index');
Route::get('add-to-cart/{product}', 'CartController@addToCart');
Route::patch('update-cart', 'CartController@update');
Route::delete('remove-from-cart', 'CartController@remove');
Route::get('checkout', 'CheckoutController@index');
Route::post('checkout-end-order', 'CheckoutController@checkout');
