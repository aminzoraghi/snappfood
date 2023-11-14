<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    public function index()
    {
        $discounts = Discount::all();
        dd($discounts);

        return view('discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('discounts.create');
    }

    public function store(Request $request)
    {
        $discount = new Discount();
        $discount->fill($request->all());
        $discount->save();

        return redirect()->route('discounts.index');
    }

    public function show(Discount $discount)
    {
        return view('discounts.show', compact('discount'));
    }

    public function edit(Discount $discount)
    {
        return view('discounts.edit', compact('discount'));
    }

    public function update(Request $request, Discount $discount)
    {
        $discount->fill($request->all());
        $discount->save();

        return redirect()->route('discounts.index');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('discounts.index');
    }
}
