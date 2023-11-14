<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodCategoryRequest;
use App\Http\Requests\UpdateFoodCategoryRequest;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $foodCategories = FoodCategory::all();

        return view('admin.food-categories.index', compact('foodCategories'));
    }

    public function create()
    {
        return view('admin.food-categories.create');
    }

    public function store(StoreFoodCategoryRequest $request)
    {
        try {
            FoodCategory::query()->create($request->validated());
            return redirect()->route('admin.food-categories.index')->with('success', 'category added successfully');
        } catch (\Exception $e) {
            return redirect(status: 500)->route('admin.food-categories.create')->with('error', $e->getMessage());
        }
    }
    public function show(FoodCategory $foodCategory)
    {
        return view('admin.food-categories.show', compact('foodCategory'));
    }

    public function edit(FoodCategory $foodCategory)
    {
        return view('admin.food-categories.edit', compact('foodCategory'));
    }

    public function update(UpdateFoodCategoryRequest $request, FoodCategory $foodCategory)
    {

       try {
           $foodCategory->update($request->validated());
           return redirect()->route('admin.food-categories.index')->with('success', 'category edit successfully');
       } catch (\Exception $e) {
           return redirect(status: 500)->route('admin.food-categories.edit')->with('error', $e->getMessage());
       }
    }

    public function destroy(FoodCategory $foodCategory)
    {
        try {
            $foodCategory->delete();
            return redirect()->route('admin.food-categories.index')->with('success', 'category deleted successfully');
        } catch (\Exception $e) {
            return redirect(status: 500)->route('admin.food-categories.index')->with('error', $e->getMessage());
        }
    }
}
