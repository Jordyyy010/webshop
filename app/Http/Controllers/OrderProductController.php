<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class OrderProductController extends Controller
{
    

    public function index(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('orders/index', ['orders' => $orders]);
    }
}
