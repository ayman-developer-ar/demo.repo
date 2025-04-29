<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products/show/{id}', function(Request $request, $id)
{
    //return Product::all();          //For index function
    
    $product = Product::find($id);    //For show function
    return view('products.show', compact('product'));
});

/*Route::post('/products/create', function(Request $request)
{
    $product = Product::create($request->all());
    return $product;
});*/


Route::post('/products/create', function(Request $request){
    $validator = Validator::make($request->all(),[
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'category' => 'string|max:15'
    ]);

    if($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }
    $product = Product::create($request->all());
    return $product;
});
