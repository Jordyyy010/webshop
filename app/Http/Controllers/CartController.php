<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\Product;
use Auth;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = new Cart(); //  Add item to cart class
        return view('cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]); //  return cart index with items stored and totalPrice
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $product = Product::find($id);  //  Get product data
        $cart = new Cart(); //  Add cart
        $cart->add($product, $product->id); //  Add item to cart class
        $request->session()->put('cart', $cart);    //  Put the cart class in a laravel session
        return redirect(url()->previous());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get the product
        $newQty = $request->changeQty;
        $cart = new Cart();
        $cart->update($id, $newQty);
        return redirect(url()->previous());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = new Cart();
        $cart->removeItem($id);
        return redirect(url()->previous());
    }
    
    /**
     * Remove resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyCart()
    {
        $cart = new Cart();
        $cart->removeCart();
        return redirect(url()->previous());
    }
}
