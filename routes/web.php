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
Route::get('/', 'ProductController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// Product routes
Route::get('/product/{product}', 'ProductController@show');
Route::get('/products/index', 'ProductController@index');
// Category
Route::get('/categories/{categories}', 'CategoriesController@show');

// Resources
Route::resource('/orders', 'OrderProductController');


// Shopping-Cart
Route::get('/add-to-cart/{id}', 'CartController@addToCart');
Route::get('/shopping-cart', 'CartController@Cart');
Route::get('/shopping-cart/checkout', 'CartController@Checkout');
Route::post('/shopping-cart/checkout', 'CartController@PostCheckout');
Route::post('/shopping-cart/update/{id}', 'CartController@update');
Route::post('/shopping-cart/destroyItem/{id}', 'CartController@destroyItem');
Route::post('/shopping-cart/destroyCart', 'CartController@destroyCart');

