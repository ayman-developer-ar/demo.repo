<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
Route::get('/products', function () {
    $products = [
        ['name' => 'Laptop', 'price' => 1500],
        ['name' => 'TV', 'price' => 1200],
        ['name' => 'Headphone', 'price' => 300]
    ];
    return view('products.index', compact('products'));
});
*/

/*
Route::get('/ayman', function () {
    return 'ayman';
});

Route::get('/ayman/{name}', function () {
    return 'hello ' . request('name');
});
        //OR
Route::get('/ayman/{name}', function ($name) {
    return 'hello ' . $name;
});
*/

/*
Route::get('/products/{id}', function ($id) {
    return "product id: $id";
});

Route::get('/products/{id?}', function ($id = 4) {
    return "product id: $id";
});
*/

Route::get('/products/index', [ProductController::class, 'index'])->name('products');

Route::get('/products/create_product', [ProductController::class, 'create'])->name('products.create');

Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');

