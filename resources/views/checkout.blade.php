@extends('layouts.app')

@section('content')
    <section class="bg-gray-950 min-h-screen py-20 px-6 md:px-16 text-white">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-5xl font-black uppercase mb-10">
                CHECKOUT <span class="text-emerald-500">DETAILS</span>
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="bg-gray-900 border border-gray-800 p-8 rounded-2xl shadow-xl">
                    <form action="{{ route('checkout.place') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <label for="phone"
                                    class="block text-xs uppercase tracking-[0.2em] text-emerald-500 font-bold mb-2">NO HANDPHONE</label>
                                <input type="tel" name="phone" id="phone" required placeholder="e.g. 08123456789"
                                    class="w-full bg-gray-950 border border-gray-800 rounded-lg py-3 px-4 text-white focus:outline-none focus:border-emerald-500 transition-all">
                            </div>

                            <div>
                                <label for="address"
                                    class="block text-xs uppercase tracking-[0.2em] text-emerald-500 font-bold mb-2">ALAMAT PENGIRIMAN</label>
                                <textarea name="address" id="address" rows="4" required placeholder="alamat anda"
                                    class="w-full bg-gray-950 border border-gray-800 rounded-lg py-3 px-4 text-white focus:outline-none focus:border-emerald-500 transition-all"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-black py-4 rounded-full transition-all uppercase tracking-widest shadow-lg shadow-emerald-900/20 mt-4">
                                Confirm & Buy
                            </button>
                        </div>
                    </form>
                </div>

                <div class="space-y-6">
                    <h3 class="text-xl font-bold uppercase tracking-widest border-b border-gray-800 pb-4">Order Summary</h3>

                    <div class="max-h-[400px] overflow-y-auto space-y-4 pr-2 custom-scrollbar">
                        @foreach ($cartItems as $item)
                            <div class="flex items-center gap-4 bg-gray-900/50 p-4 rounded-xl border border-gray-800">
                                <img src="{{ asset('storage/' . $item->product->image) }}"
                                    class="w-16 h-16 object-cover rounded-lg">
                                <div class="flex-1">
                                    <h4 class="font-bold uppercase text-sm">{{ $item->product->name }}</h4>
                                    <p class="text-emerald-500 font-mono text-sm">
                                        Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 uppercase text-xs tracking-widest">Total Amount</span>
                            <span class="text-2xl font-black text-emerald-500 font-mono">
                                Rp{{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <p class="text-[10px] text-gray-500 uppercase text-center tracking-tighter">
                        By clicking "Confirm & Buy", you agree to our terms of service.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #0a0a0a;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #10b981;
            border-radius: 10px;
        }
    </style>
@endsection
