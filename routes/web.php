<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Public Landing
Route::get('/', [ProductController::class, 'landing'])->name('landing');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Proteksi User Login
Route::middleware('auth')->group(function () {
    // Shop & Detail
    Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
    Route::get('/shop/{product}', [ProductController::class, 'shopDetail'])->name('shop.detail');

    // Cart System
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.index');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('checkout.place');
});

// Admin Area
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
});
