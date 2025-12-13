<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function inventoryReport()
    {
        $products = Product::with('category')->get();

        $pdf = Pdf::loadView('reports.inventory', compact('products'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('pionere_inventory_report.pdf');
    }
}
