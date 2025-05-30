<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /*public function index()
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
    } */

    public function index()
    {
        /////////////// Eager Loading ///////////////////////////
        //$products = Product::with(['category'])->get();
        $products = Product::with(['category'])->paginate(2);
        return ProductResource::collection($products);


        /////////////// Lazy Loading ///////////////////////////
        /*$products = Product::all(); 
        foreach ($products as $product) {
            $product->load('category');
        }
        return $products;*/

    }

    public function create()
    {
        return view('products.create_product');
    }

    /*public function store(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $products = ['name' => $name, 'price' => $price];
        return $products;
    }*/
    public function store(Request $r)
    {
        $p = Product::create($r->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]));
        return new ProductResource($p);
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
