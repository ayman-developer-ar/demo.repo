<?php

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//////////// Authentication lesson //////////////////////////////////
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');





////////////////////////////////////////////////////////////////////////////////////////
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


//////////////////// Validations lesson///////////////////////////////////
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


//////////////////// Relationships lesson///////////////////////////////////
Route::get('/category_of_product/{id}', function(Request $request, $id)
{
    $categories = Product::findOrFail($id)->category;
    return $categories;
})->name('category_of_product');

Route::get('/products_of_category/{id}', function(Request $request, $id)
{
    $products = Category::findOrFail($id)->product;
    return $products;
})->name('products_of_category');



/////////////// Middleware lesson ////////////////////////
route::get('/club', fn()=>"أهلاً بك في النادي")->middleware('age');







