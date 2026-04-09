<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menampilkan isi keranjang belanja user
     */
    public function index()
    {
        // Mengambil data dari database berdasarkan user yang sedang login
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        return view('cart', compact('cartItems'));
    }

    /**
     * Menambahkan produk ke keranjang
     */
    public function addToCart($id)
    {
        // Proteksi agar hanya user login yang bisa akses
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        // Cek apakah produk ini SUDAH ADA di keranjang user
        $exists = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->exists();

        if ($exists) {
            return redirect()->route('cart.index')->with('info', 'Produk ini sudah ada di keranjang Anda.');
        }

        // Tambahkan ke database. 
        // Karena thrift, quantity selalu 1 (diatur otomatis lewat default value migration atau create)
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'quantity' => 1
        ]);

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    /**
     * Menghapus produk dari keranjang
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            // Hapus data berdasarkan ID di tabel carts dan pastikan milik user yang login
            Cart::where('id', $request->id)
                ->where('user_id', Auth::id())
                ->delete();

            return redirect()->back()->with('success', 'Produk dihapus dari keranjang!');
        }
    }

    // Fungsi update() dihapus karena stok barang thrift hanya satu.
}
