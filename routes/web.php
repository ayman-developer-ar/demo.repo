<?php

use Illuminate\Support\Facades\Route;

Route::get('/loop', function () {
    $car_Types = ['Merceds', 'BMW', 'Bugatti', 'KIA'];
    $number_to_ten = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $x = 0;
    return view('loop', compact('car_Types', 'number_to_ten', 'x'));
});
