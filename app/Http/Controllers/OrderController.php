<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Menampilkan halaman checkout dengan ringkasan belanja
     */
    public function checkout()
    {
        // Ambil item keranjang milik user yang sedang login
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        
        // Jika keranjang kosong, balikkan ke halaman cart
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda masih kosong!');
        }

        // Hitung total harga
        $total = $cartItems->sum(function($item) {
            return $item->product->price;
        });

        return view('checkout', compact('cartItems', 'total'));
    }

    /**
     * Memproses pesanan dan menyimpannya ke database
     */
    public function placeOrder(Request $request)
    {
        // Validasi input dari form checkout
        $request->validate([
            'phone' => 'required|string|min:10',
            'address' => 'required|string',
        ]);

        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('shop')->with('error', 'Tidak ada item untuk di-checkout.');
        }

        // Gunakan Database Transaction agar data aman jika terjadi error di tengah jalan
        DB::transaction(function () use ($request, $cartItems) {
            
            // 1. Hitung Total
            $totalPrice = $cartItems->sum(function($item) {
                return $item->product->price;
            });

            // 2. Buat Data Order Utama
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'SD-' . strtoupper(uniqid()), // Contoh: SD-643A12BC
                'total_price' => $totalPrice,
                'status' => 'pending',
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            // 3. Pindahkan setiap item dari Cart ke OrderItems
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'price' => $item->product->price, // Simpan harga saat ini
                ]);

                // 4. LOGIKA THRIFT: Update stok produk menjadi 0 agar "Sold Out"
                Product::where('id', $item->product_id)->update(['stock' => 0]);
            }

            // 5. Kosongkan Keranjang User
            Cart::where('user_id', Auth::id())->delete();
        });

        // Arahkan kembali ke shop dengan pesan sukses
        return redirect()->route('shop')->with('success', 'Pesanan berhasil dibuat! Admin akan segera menghubungi Anda.');
    }
}