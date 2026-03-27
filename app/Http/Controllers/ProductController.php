<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. Menampilkan semua data produk
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // 2. Menampilkan form tambah produk
    public function create()
    {
        return view('products.create');
    }

    // 3. Menyimpan data produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // 4. Menampilkan detail satu produk
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // 5. Menampilkan form edit produk
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // 6. Menyimpan perubahan data produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // 7. Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

    // 8. Landing Page (Homepage)
    public function landing()
    {
        $products = Product::latest()->take(3)->get();
        return view('landing', compact('products'));
    }
}
