<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function inventoryReport()
    {
        $products = Product::with('category')->get();

        // Load PDF-specific view
        $pdf = Pdf::loadView('reports.inventory_pdf', compact('products'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('pionere_inventory_report.pdf');
    }
}
