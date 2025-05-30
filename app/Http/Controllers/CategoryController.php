<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Catregory;
use App\Http\Resources\CategoryResource;


class CategoryController extends Controller
{
    /*public function index()
    {
        $categories = [
            ['name' => 'Laptop', 'type' => 'hp', 'price' => 1500],
            ['name' => 'TV', 'type' => 'LG', 'price' => 1200],
            ['name' => 'charger', 'type' => 'anker', 'price' => 45]
        ];
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    } */


    public function index()
    {
        $categories = Category::with(['products'])->get();
        //$categories = Category::with(['products'])->paginate(2);

        return CategoryResource::collection($categories);
    }

    public function show($id) {
        $categories = Category::find($id);
        return view('categories.show', compact('categories'));
    }
    //
}
