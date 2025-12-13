<?php

namespace App\Http\Controllers;

use App\Models\Product;

class InventoryController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $lowStockProducts = Product::whereColumn('quantity', '<=', 'low_stock_level')->get();

        return view('inventory.index', compact(
            'totalProducts',
            'lowStockProducts'
        ));
    }
}
