<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\Categories;

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
}
