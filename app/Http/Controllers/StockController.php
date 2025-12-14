<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockMovement;

class StockController extends Controller
{
    public function create()
    {
        // Pass all products to the stock form
        $products = Product::all();
        return view('stock.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'remarks' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check if stock out is possible
        if ($request->type === 'out' && $request->quantity > $product->quantity) {
            return back()->withErrors(['quantity' => 'Cannot remove more than current stock.'])->withInput();
        }

        // Create stock movement
        StockMovement::create([
            'product_id' => $product->id,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'remarks' => $request->remarks,
        ]);

        // Update product stock
        if ($request->type === 'in') {
            $product->increment('quantity', $request->quantity);
        } else {
            $product->decrement('quantity', $request->quantity);
        }

        return redirect()->route('stock.history')->with('success', 'Stock updated successfully.');
    }

    public function history()
    {
        $movements = StockMovement::with('product')->orderBy('created_at', 'desc')->get();
        return view('stock.history', compact('movements'));
    }
}
