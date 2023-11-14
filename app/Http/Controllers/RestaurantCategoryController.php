<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreRestaurantCategoryRequest;
use App\Http\Requests\UpdateRestaurantCategoryRequest;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    public function index()
    {
        $restaurantCategories = RestaurantCategory::all();

        return view('admin.restaurant-categories.index', compact('restaurantCategories'));
    }

    public function create()
    {
        return view('admin.restaurant-categories.create');
    }

    public function store(StoreRestaurantCategoryRequest $request)
    {
        try {
            RestaurantCategory::query()->create($request->validated());
            return redirect()->route('admin.restaurant-categories.index')->with('success', 'category added successfully');
        } catch (\Exception $e) {
            return redirect(status: 500)->route('admin.restaurant-categories.create')->with('error', $e->getMessage());
        }
    }
    public function show(RestaurantCategory $restaurantCategory)
    {
        return view('admin.restaurant-categories.show', compact('restaurantCategory'));
    }

    public function edit(RestaurantCategory $restaurantCategory)
    {
        return view('admin.restaurant-categories.edit', compact('restaurantCategory'));
    }

    public function update(UpdateRestaurantCategoryRequest $request, RestaurantCategory $restaurantCategory)
    {

        try {
            $restaurantCategory->update($request->validated());
            return redirect()->route('admin.restaurant-categories.index')->with('success', 'category edit successfully');
        } catch (\Exception $e) {
            return redirect(status: 500)->route('admin.restaurant-categories.edit')->with('error', $e->getMessage());
        }
    }

    public function destroy(RestaurantCategory $restaurantCategory)
    {
        try {
            $restaurantCategory->delete();
            return redirect()->route('admin.restaurant-categories.index')->with('success', 'category deleted successfully');
        } catch (\Exception $e) {
            return redirect(status: 500)->route('admin.restaurant-categories.index')->with('error', $e->getMessage());
        }
    } 
}
