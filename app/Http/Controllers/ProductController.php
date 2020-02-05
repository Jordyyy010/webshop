<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\Categories;
use App\Cart;
use App\Orders;
use App\OrderProduct;
use Auth;

use Session;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $categories = Categories::all();
        $products = DB::table('products')->get();
        return view('products.show', ['products' => $products, 'categories'=>$categories]);
    }

    public static function index()
    {
        $categories = Categories::all();
        $data = DB::table('products')->paginate(9);
        return view('products.index', ['data'=>$data, 'categories'=> $categories]);
    }

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

    public function removeFromCart($id) {
        $cart = new Cart();
        $cart->remove($id);

        return redirect('cart/index');
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

    public function destroy($id){
        $cart = Session::get('cart');
        $cart->remove($id);

        return redirect(url()->previous());
    }
}
