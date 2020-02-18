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

// Category
Route::get('/categories/{categories}', 'CategoriesController@show');

// Resources
Route::resource('/orders', 'OrderController');


// Shopping-Cart
Route::get('/add-to-cart/{id}', 'CartController@addToCart');
Route::get('/shopping-cart', 'CartController@index');
Route::get('/shopping-cart/checkout', 'OrderController@bestel');
Route::post('/shopping-cart/checkout', 'OrderController@store');
Route::post('/shopping-cart/update/{id}', 'CartController@update');
Route::post('/shopping-cart/destroyItem/{id}', 'CartController@destroyItem');
Route::post('/shopping-cart/destroyCart', 'CartController@destroyCart');

