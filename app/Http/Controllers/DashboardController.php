<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalproducts = Product::count();
        $totalcategories = Category::count();
        return view('dashboard',compact('totalproducts','totalcategories'));
    }
}
