<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        $brands = Brand::all();
        return view('products.create',compact('categories','brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required',
            'photopath' => 'required|image',
        ]);

        $photoname = time().'.'.$request->photopath->extension();
        $request->photopath->move(public_path('images'), $photoname);
        $data['photopath'] = $photoname;

        Product::create($data);
        return redirect()->route('products.index')->with('success','Product created successfully');
    }

    public function edit($id)
    {
        $categories = Category::orderBy('priority')->get();
        $brands = Brand::all();
        $product = Product::find($id);
        return view('products.edit',compact('categories','brands','product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required',
        ]);
        $product = Product::find($id);
        if($request->hasFile('photopath'))
        {
            $photoname = time().'.'.$request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);
            $data['photopath'] = $photoname;

            //delete old photo
            $oldphoto = public_path('images').'/'.$product->photopath;
            if(file_exists($oldphoto))
            {
                unlink($oldphoto);
            }
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $photo = public_path('images').'/'.$product->photopath;
        if(file_exists($photo))
        {
            unlink($photo);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
