<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        dd($banners);

        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->fill($request->all());
        $banner->save();

        return redirect()->route('banners.index');
    }

    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $banner->fill($request->all());
        $banner->save();

        return redirect()->route('banners.index');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('banners.index');
    }
}
