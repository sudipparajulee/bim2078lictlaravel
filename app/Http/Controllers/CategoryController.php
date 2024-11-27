<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories
        $categories = Category::all();

        // Merge sort implementation
        function mergeSort($array, $key)
        {
            if (count($array) <= 1) {
                return $array;
            }

            $middle = count($array) / 2;
            $left = array_slice($array, 0, $middle);
            $right = array_slice($array, $middle);

            $left = mergeSort($left, $key);
            $right = mergeSort($right, $key);

            return merge($left, $right, $key);
        }

        function merge($left, $right, $key)
        {
            $result = [];

            while (count($left) > 0 && count($right) > 0) {
                if ($left[0]->$key <= $right[0]->$key) {
                    $result[] = array_shift($left);
                } else {
                    $result[] = array_shift($right);
                }
            }

            return array_merge($result, $left, $right);
        }

        // Sort categories by priority
        $categories = mergeSort($categories->toArray(), 'priority');
        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|alpha',
            'priority' => 'required|integer'
        ]);
        Category::create($data);
        return redirect()->route('categories.index')->with('success','Category Created Successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|alpha',
            'priority' => 'required|integer'
        ]);
        $category = Category::find($id);
        $category->update($data);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index');
    }
}
