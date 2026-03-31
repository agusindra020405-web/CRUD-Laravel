<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', [ProductController::class, 'landing']);

Route::get('/shop', [ProductController::class, 'shop'])->name('shop.index')->middleware('auth');

// Shop & Detail (Bisa diakses user yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/shop', [ProductController::class, 'shop'])->name('shop.index');
    Route::get('/shop/{product}', [ProductController::class, 'shopDetail'])->name('shop.detail');
});

// Admin Area (HANYA ADMIN yang bisa akses, User biasa 404)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
});

// autentifikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/shop/{product}', [ProductController::class, 'shopDetail'])->name('shop.detail');

