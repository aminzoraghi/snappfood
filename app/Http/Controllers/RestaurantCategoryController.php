<?php

namespace App\Http\Controllers;

use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
//
    public function index()
    {
        $restaurantCategories = RestaurantCategory::all();
        dd($restaurantCategories);

        return view('restaurant-categories.index', compact('restaurantCategories'));
    }

    public function create()
    {
        return view('restaurant-categories.create');
    }

    public function store(Request $request)
    {
        $restaurantCategory = new RestaurantCategory();
        $restaurantCategory->fill($request->all());
        $restaurantCategory->save();

        return redirect()->route('restaurant-categories.index');
    }

    public function show(RestaurantCategory $restaurantCategory)
    {
        return view('restaurant-categories.show', compact('restaurantCategory'));
    }

    public function edit(RestaurantCategory $restaurantCategory)
    {
        return view('restaurant-categories.edit', compact('restaurantCategory'));
    }

    public function update(Request $request, RestaurantCategory $restaurantCategory)
    {
        $restaurantCategory->fill($request->all());
        $restaurantCategory->save();

        return redirect()->route('restaurant-categories.index');
    }

    public

    function

    destroy(RestaurantCategory $restaurantCategory)
    {
        $restaurantCategory->delete();

        return redirect()->route('restaurant-categories.index');
    }
}
