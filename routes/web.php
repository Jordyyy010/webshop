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

Route::get('/product/{product}', 'ProductController@show');
Route::get('/products/index', 'ProductController@index');
Route::get('/categories/{categories}', 'CategoriesController@show');
Route::get('/orders', 'ordersController@index');