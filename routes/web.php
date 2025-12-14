<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\StockHistoryController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | STAFF + ADMIN (shared access)
    |--------------------------------------------------------------------------
    */
    Route::middleware('staff')->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Inventory
        Route::get('/inventory', [InventoryController::class, 'index'])
            ->name('inventory.index');

        // Stock
        Route::get('/stock/create', [StockController::class, 'create'])
            ->name('stock.create');
        Route::post('/stock', [StockController::class, 'store'])
            ->name('stock.store');

        // Stock History
        Route::get('/stock-history', [StockHistoryController::class, 'index'])
            ->name('stock.history');

        // Reports (read-only + PDF allowed)
        Route::get('/reports/inventory', [ReportController::class, 'inventoryReport'])
            ->name('reports.inventory');

        // Profile (both roles)
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware('admin')->group(function () {

        // Product & Category Management
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
    });

});

require __DIR__.'/auth.php';
