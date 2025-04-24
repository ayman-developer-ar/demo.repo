<?php

use Illuminate\Support\Facades\Route;

Route::get('/products', function () {
    $products = [
        ['name' => 'Laptop', 'price' => 1500],
        ['name' => 'TV', 'price' => 1200],
        ['name' => 'Headphone', 'price' => 300]
    ];
    return view('products.index', compact('products'));
});
