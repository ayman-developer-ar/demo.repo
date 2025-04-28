<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products/show/{id}', function(Request $request, $id)
{
    //return Product::all();
    
    $product = Product::find($id);
    return view('products.show', compact('product'));
});
