<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalCategories = \App\Models\Category::count();
    $totalProducts = \App\Models\Product::count();
    $totalClients = \App\Models\Client::count();
    $totalOrders = \App\Models\Order::count();
    $lowStockProducts = \App\Models\Product::where('quantity', '<=', 5)->get();

    return view('dashboard', compact('totalCategories', 'totalProducts', 'totalClients', 'totalOrders', 'lowStockProducts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);


});

require __DIR__.'/auth.php';
