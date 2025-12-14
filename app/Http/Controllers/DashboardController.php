<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalStock = Product::sum('quantity');
        $lowStockProducts = Product::whereColumn('quantity', '<=', 'low_stock_level')->get();
        $recentProducts = Product::latest()->take(5)->get();

        // Data for chart
        $categories = Category::with('products')->get();
        $categoryNames = $categories->pluck('name');
        $categoryStock = $categories->map(function($cat){
            return $cat->products->sum('quantity');
        });

        return view('dashboard', compact(
            'totalProducts',
            'totalStock',
            'lowStockProducts',
            'recentProducts',
            'categoryNames',
            'categoryStock'
        ));
    }
}
