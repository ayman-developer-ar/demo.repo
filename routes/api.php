<?php

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use \App\Http\Controllers\Admin\AuthController as AdminAuthController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\OrderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//////////// Authentication lesson //////////////////////////////////
Route::post('user/register', [AuthController::class, 'register']);
Route::post('user/login', [AuthController::class, 'login']);
Route::post('user/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('user/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');


Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::middleware(['auth:sanctum', 'admin'])->group(function () 
{
    Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
});


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


//////////////////// API Resources lesson///////////////////////////////////
Route::get('/products', [ProductController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);

/////////////////// Exceptions /////////////////////////////
Route::middleware('auth:sanctum')->group(function() {     
    //// For User
    Route::get('/user/products', [ProductController::class, 'index']);
    Route::get('user/products/{id}', function($id) {
        /*$product = Product::find($id);
        abort_if(!$product, 404, 'The product not found');
        return new ProductResource($product);*/
        try {
            $product = Product::find($id);
            if(!$product) {
                throw new \Exception('The product not found');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
        return new ProductResource($product);
    });

    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);

    //// For Admin
    Route::middleware('role:admin')->group(function () {
        Route::post('/admin/products', [ProductController::class, 'store']);
        Route::get('/admin/products/{id}', function ($id) {
            $product = Product::find($id);
            abort_if(!$product, 404, 'المنتج غير موجود');   // ← هنا
            return new ProductResource($product);
        });

    });
});



/////////////// Middleware lesson ////////////////////////
route::get('/club', fn()=>"أهلاً بك في النادي")->middleware('age');







