<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\StockHistoryController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // Product CRUD (protected)
    Route::resource('products', ProductController::class);

    // Stock movement routes
    Route::post('/stock', [StockController::class, 'store'])->name('stock.store');

    // Inventory overview
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

    // Stock history
    Route::get('/stock-history', [StockHistoryController::class, 'index'])
    ->name('stock.history');

    // Inventory report
    Route::get('/reports/inventory', [ReportController::class, 'inventoryReport'])
    ->name('reports.inventory');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Category CRUD (protected)
    Route::resource('categories', CategoryController::class);
});

require __DIR__.'/auth.php';
