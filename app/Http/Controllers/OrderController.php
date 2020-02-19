<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Orders;
use Auth;
use Session;
use Validator;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('orders/index', ['orders' => $orders]);
    }

    /**
     * Show the form for storing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bestel()
    {
        $cart = new Cart();
        $total = $cart->totalPrice;
        return view('cart/checkout', ['total' => $total]);
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
    public function store(Request $request)
    {
        // The rules that the information needs to abide by
        // $rules = array(
        //     'name' => 'required',
        //     'adress' => 'required'
        // );

        // Validate the information
        // $validator = Validator::make($request->all(), $rules);
        // What to do if validation fails
        // if($validator->fails()){
        //     return redirect(url()->previous())
        //                 ->withErrors($validator)
        //                 ->withInput();
        // } else {
            $cart = new Cart();
            $order = new Orders();
            $order->cart = serialize($cart);
            $order->name = $request->input('name');
            $order->adress = $request->input('adress');
            $order->total_price = $cart->totalPrice;

            $cart->totalPrice = 0;
            Auth::user()->orders()->save($order);
            Session::forget('cart');
        // }

        return redirect('/');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
