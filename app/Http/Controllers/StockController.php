<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'remarks' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->type === 'out' && $product->quantity < $request->quantity) {
            return back()->withErrors(['quantity' => 'Not enough stock']);
        }

        // Update product quantity
        if ($request->type === 'in') {
            $product->quantity += $request->quantity;
        } else {
            $product->quantity -= $request->quantity;
        }

        $product->save();

        // Save stock movement
        StockMovement::create($request->all());

        return back();
    }
}
