<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalproducts = Product::count();
        $totalcategories = Category::count();
        $totalorders = Order::count();
        $pendingorders = Order::where('status','Pending')->count();
        $processingorders = Order::where('status','Processing')->count();
        $deliveredorders = Order::where('status','Delivered')->count();
        return view('dashboard',compact('totalproducts','totalcategories','totalorders','pendingorders','processingorders','deliveredorders'));
    }
}
