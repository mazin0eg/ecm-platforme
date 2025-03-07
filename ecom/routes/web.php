<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/cart', function () {
    return view('cart');
});

// Route for listing products and rendering admin view
Route::get('/add_product', [ProductController::class, 'index'])->name('admin.index');
// Route for storing a new product
Route::post('/add_product', [ProductController::class, 'store'])->name('admin.products.store');

Route::get('/categories', function () {
    return view('categories');
});

// Simple product-details page
Route::get('/product', function () {
    return view('product-details');
});

// Define edit and destroy routes outside the product-details closure
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Single product page
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
// Order routes (to be defined based on OrderController methods)
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

Route::middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'home'])->middleware(['auth', 'verified'])->name('home');
    require __DIR__.'/auth.php';
});
