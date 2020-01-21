<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Product;

class CategoriesController extends Controller
{
    public function show(Categories $categories){
        $products = $categories->products;  //  matching results of the id from categorie with the Product->categorie_id
        return view('categories.index', [
            'categories' => Product::findOrFail($categories),
            'products' => $products,
        ]);

    }
}
