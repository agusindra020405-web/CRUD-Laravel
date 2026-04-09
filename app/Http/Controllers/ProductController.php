<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 1. Menampilkan semua data produk
    public function index()
    {
        $products = Product::paginate(3);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Simpan file ke storage/app/public/products
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        Product::create($data);

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
            'price' => ['required', 'numeric'],
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Tambahkan validasi image
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus foto lama di folder jika ada (opsional agar storage tidak penuh)
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Simpan foto baru
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);
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
        // Mengambil produk untuk ditampilkan di marquee
        $products = Product::all();
        return view('landing', compact('products'));
    }

    // Menampilkan semua produk di halaman Shop
    public function shop()
    {
        $products = Product::all();

        return view('shop', compact('products'));
    }

    public function shopDetail(Product $product)
    {
        return view('shop-detail', compact('product'));
    }
}
