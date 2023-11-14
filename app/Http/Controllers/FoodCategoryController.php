<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $foodCategories = FoodCategory::all();
//        dd($foodCategories);

        return view('admin.food-categories.index', compact('foodCategories'));
    }

    public function create()
    {
        return view('food-categories.create');
    }

    public function store(Request $request)
    {
        $foodCategory = new FoodCategory();
        $foodCategory->fill($request->all());
        $foodCategory->save();

        return redirect()->route('food-categories.index');
    }

    public function show(FoodCategory $foodCategory)
    {
        return view('food-categories.show', compact('foodCategory'));
    }

    public function edit(FoodCategory $foodCategory)
    {
        return view('food-categories.edit', compact('foodCategory'));
    }

    public

    function

    update(Request $request, FoodCategory $foodCategory)
    {
        $foodCategory->fill($request->all());
        $foodCategory->save();

        return redirect()->route('food-categories.index');
    }

    public function destroy(FoodCategory $foodCategory)
    {
        $foodCategory->delete();

        return redirect()->route('food-categories.index');
    }
}
