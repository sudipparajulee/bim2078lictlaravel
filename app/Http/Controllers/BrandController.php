<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        Brand::create($data);
        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $brand = Brand::find($id);
        $brand->update($data);
        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
