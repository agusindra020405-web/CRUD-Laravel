<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Jangan lupa baris ini!

Route::get('/', function () {
    return view('welcome');
});

// Baris sakti yang menghubungkan semua fungsi CRUD (index, create, store, dll)
Route::resource('products', ProductController::class);