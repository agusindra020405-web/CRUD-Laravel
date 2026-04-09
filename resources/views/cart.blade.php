@extends('layouts.app')

@section('content')
    <section class="bg-gray-950 min-h-screen py-20 px-6 md:px-16 text-white">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl md:text-5xl font-black uppercase mb-10">
                YOUR <span class="text-emerald-500">CART</span>
            </h2>

            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500 text-emerald-500 rounded-lg font-bold uppercase tracking-widest text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Cek menggunakan count() karena ini adalah Collection Database --}}
            @if ($cartItems->count() > 0)
                <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
                    <table class="w-full text-left">
                        <thead
                            class="bg-gray-950 border-b border-gray-800 text-emerald-500 uppercase text-sm tracking-widest">
                            <tr>
                                <th class="p-5">Product</th>
                                <th class="p-5 text-center">Price</th>
                                <th class="p-5 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @php $total = 0 @endphp
                            @foreach ($cartItems as $item)
                                @php $total += $item->product->price * $item->quantity @endphp
                                <tr class="hover:bg-gray-800/50 transition">
                                    <td class="p-5 flex items-center gap-4">
                                        <img src="{{ asset('storage/' . $item->product->image) }}"
                                            class="w-16 h-16 object-cover rounded-lg border border-gray-700">
                                        <span class="font-bold uppercase">{{ $item->product->name }}</span>
                                    </td>
                                    <td class="p-5 text-center font-mono">
                                        Rp{{ number_format($item->product->price, 0, ',', '.') }}
                                    </td>

                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="action" value="increase">
                                        <button
                                            class="w-8 h-8 bg-gray-800 rounded border border-gray-700 hover:text-emerald-500">+</button>
                                    </form>
                </div>
                </td>
                <td class="p-5 text-right">
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- ID yang dikirim adalah ID dari tabel carts --}}
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit"
                            class="text-red-500 hover:text-red-400 transition font-bold uppercase text-xs tracking-tighter">
                            <i class="fas fa-trash"></i> Remove
                        </button>
                    </form>
                </td>
                </tr>
            @endforeach
            </tbody>
            </table>

            <div class="p-8 bg-gray-950 flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <p class="text-gray-400 uppercase text-xs tracking-widest">Grand Total</p>
                    <h3 class="text-3xl font-black text-emerald-500 font-mono">
                        Rp{{ number_format($total, 0, ',', '.') }}
                    </h3>
                </div>
                <button
                    class="bg-emerald-600 hover:bg-emerald-500 text-white font-black py-4 px-10 rounded-full transition-all uppercase tracking-widest shadow-lg shadow-emerald-900/20">
                    <a href="{{ route('checkout.index') }}">Checkout Now</a>
                </button>
            </div>
        </div>
    @else
        <div class="text-center py-20 bg-gray-900 border border-dashed border-gray-800 rounded-xl">
            <p class="text-gray-500 uppercase tracking-widest mb-6">Your cart is empty</p>
            <a href="{{ route('shop') }}" class="text-emerald-500 font-bold hover:underline underline-offset-8">BACK
                TO SHOP</a>
        </div>
        @endif
        </div>
    </section>
@endsection
