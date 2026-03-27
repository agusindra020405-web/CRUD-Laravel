<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Jangan lupa baris ini!

Route::get('/', [ProductController::class, 'landing']);

Route::get('/shop', function () {
    $products = []; // sementara
    return view('shop', compact('products'));
});

// Baris yang menghubungkan semua fungsi CRUD (index, create, store, dll)
Route::resource('products', ProductController::class);

