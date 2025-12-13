<?php

namespace App\Http\Controllers;

use App\Models\StockMovement;

class StockHistoryController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with('product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('stock.history', compact('movements'));
    }
}
