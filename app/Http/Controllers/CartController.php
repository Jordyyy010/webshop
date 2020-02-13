<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Orders;
use App\Product;
use Auth;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id) {
        $product = Product::find($id);  //  Get product data
        $cart = new Cart(); //  Add cart
        $cart->add($product, $product->id); //  Add item to cart class
        $request->session()->put('cart', $cart);    //  Put the cart class in a laravel session
        return redirect('products/index');  //  Link back to the page
    }

    public function Cart() {
        $cart = new Cart(); //  Add item to cart class
        return view('cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]); //  return cart index with items stored and totalPrice
    }

    public function Checkout() {
        $cart = new Cart();
        $total = $cart->totalPrice;
        return view('cart/checkout', ['total' => $total]);
    }

    public function PostCheckout(Request $request){
        $cart = new Cart();
        $order = new Orders();
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->adress = $request->input('adress');
        $order->total_price = $cart->totalPrice;

        $cart->totalPrice = 0;
        Auth::user()->orders()->save($order);
        Session::forget('cart');
        return redirect('products/index')->with('success', 'Uw bestelling is geplaatst');
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
        $item = Product::findOrFail($id);
        $cart = new Cart();
        $cart->update($id, $item);
        return redirect(url()->previous());
    }
}
