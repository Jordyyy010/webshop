<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Orders;
use App\Product;
use Auth;
use Session;
use Input;

class CartController extends Controller
{
    public function index() {
        $cart = new Cart(); //  Add item to cart class
        return view('cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]); //  return cart index with items stored and totalPrice
    }

    public function addToCart(Request $request, $id) {
        $product = Product::find($id);  //  Get product data
        $cart = new Cart(); //  Add cart
        $cart->add($product, $product->id); //  Add item to cart class
        $request->session()->put('cart', $cart);    //  Put the cart class in a laravel session
        return redirect(url()->previous());
    }

    public function destroyItem($id){
        $cart = new Cart();
        $cart->removeItem($id);
        return redirect(url()->previous());
    }
    
    public function destroyCart(){
        $cart = new Cart();
        $cart->removeCart();
        return redirect(url()->previous());
    }

    public function update(Request $request, $id) {
        // Get the product
        $newQty = $request->changeQty;
        $cart = new Cart();
        $cart->update($id, $newQty);
        return redirect(url()->previous());
    }
}
