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
        //for piechart
        $allcategories = Category::all();
        $categoryproduct = [];
        foreach($allcategories as $category)
        {
            $categoryproduct[] = Product::where('category_id',$category->id)->count();
        }
        $allcategories = $allcategories->pluck('name')->toArray();

        //for area chart
        $date = \Carbon\Carbon::today()->subDays(90);
        $orderdates = Order::where('created_at', '>=', $date)->pluck('created_at')->toArray();
        $orderdates = array_map(function($date){
            return date('Y-m-d', strtotime($date));
        },$orderdates);
        $orderdates = array_unique($orderdates);
        $ordercount = [];
        foreach($orderdates as $orderdate)
        {
            $ordercount[] = Order::whereDate('created_at',$orderdate)->count();
        }
        $orderdates = json_encode(array_values($orderdates));
        $ordercount = json_encode(array_values($ordercount));

        return view('dashboard',compact('totalproducts','totalcategories','totalorders','pendingorders','processingorders','deliveredorders','allcategories','categoryproduct','orderdates','ordercount'));
    }
}
