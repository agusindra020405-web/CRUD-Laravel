@extends('layouts.app')

@section('content')
<div class="bg-gray-950 min-h-screen text-white pt-24 pb-12">
    <div class="max-w-6xl mx-auto px-6">
        
        <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-emerald-500 transition mb-10 uppercase tracking-widest text-xs font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Collection
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
            <div class="bg-gray-900 rounded-3xl border border-gray-800 p-3 shadow-2xl overflow-hidden group">
                @php
                    $imageMapping = [
                        5 => 'nike-tee.jpg', 6 => 'adidas.jpg', 7 => 'carhartt.jpg',
                        8 => 'vans-tee.jpg', 9 => 'stussy.jpg', 10 => 'noah.jpg',
                        11 => 'supreme.jpg', 12 => 'bape.jpg',
                    ];
                    $displayImage = $imageMapping[$product->id] ?? 'logo.png';
                @endphp
                <img src="{{ asset('images/' . $displayImage) }}" 
                     class="w-full h-auto object-cover rounded-2xl transform transition duration-500 group-hover:scale-105" 
                     alt="{{ $product->name }}">
            </div>

            <div class="flex flex-col justify-center">
                <span class="text-emerald-500 font-black tracking-[0.3em] uppercase text-[10px] mb-4">Curated Syndicate</span>
                
                <h1 class="text-5xl md:text-6xl font-black uppercase tracking-tighter mb-6 leading-none">
                    {{ $product->name }}
                </h1>

                <p class="text-3xl font-bold text-emerald-400 mb-8">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                <div class="border-t border-gray-800 pt-8 mb-10">
                    <p class="text-gray-400 leading-relaxed text-lg italic">
                        {{ $product->description ?? 'Premium vintage selection. Carefully curated for the "Second Drip" collection. High quality, authentic, and sustainable.' }}
                    </p>
                </div>

                <div class="flex items-center gap-6 mb-10">
                    <div class="bg-gray-900 border border-gray-800 px-4 py-2 rounded-lg">
                        <span class="block text-[10px] uppercase text-gray-500 font-bold">Stock</span>
                        <span class="text-white font-bold">{{ $product->stock }} Available</span>
                    </div>
                    <div class="bg-gray-900 border border-gray-800 px-4 py-2 rounded-lg">
                        <span class="block text-[10px] uppercase text-gray-500 font-bold">Condition</span>
                        <span class="text-white font-bold">9/10</span>
                    </div>
                </div>

                <button class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-black py-5 rounded-2xl transition duration-300 uppercase tracking-widest text-sm shadow-xl shadow-emerald-900/20">
                    Add to Selection
                </button>
            </div>
        </div>
    </div>
</div>
@endsection