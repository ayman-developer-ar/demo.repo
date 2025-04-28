<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Laptop', 'price' => 1500],
            ['name' => 'TV', 'price' => 1200],
            ['name' => 'Headphone', 'price' => 300]
        ];
        //return $products;
        //return view('products.index', compact('products'));

        $products = Product::all();
        return view('products.index', compact('products'));
    } 

    public function create()
    {
        return view('products.create_product');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $products = ['name' => $name, 'price' => $price];
        return $products;
        //return view('products.show', compact('products'));
    }

    /*public function show($id) 
    {
        $products = [
            1 => ['name' => 'laptop', 'price' => 1500],
            2 => ['name' => 'TV', 'price' => 1200],
            3 => ['name' => 'Headphone', 'price' => 300] 
        ];

        $product = $products[$id] ?? ['name' => 'unknown product', 'price' => 0];

        //return $product;
        //return view('products.show', compact('product'));
    }*/

    public function show($id) {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }
        
    
}
