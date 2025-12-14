<?php

namespace App\Http\Controllers;

use App\Models\Product;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $grandTotal = $products->sum(function($p) {
            return $p->price * $p->quantity;
        });

        return view('inventory.index', compact('products', 'grandTotal'));
    }
}
