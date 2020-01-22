<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function index(){
        return view('cart.index');
    }
}
