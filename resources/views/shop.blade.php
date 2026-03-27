@extends('layouts.app')

@section('content')

<section class="bg-gray-950 min-h-screen py-20 px-6 md:px-16">

    <!-- Title -->
    <div class="text-center mb-16">
        <h2 class="text-3xl md:text-5xl font-black uppercase">
            SHOP <span class="text-emerald-500">COLLECTION</span>
        </h2>
        <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4"></div>
    </div>

    <!-- Grid -->
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">

        @forelse($products as $product)
        <!-- CARD -->
        <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden group hover:-translate-y-2 hover:shadow-2xl transition duration-300">

            <!-- Image -->
            <div class="h-64 flex items-center justify-center bg-gray-950">
                <img src="{{ asset('images/logo.png') }}" 
                     class="w-32 opacity-80 group-hover:scale-110 transition duration-300">
            </div>

            <!-- Info -->
            <div class="p-5 border-t border-gray-800">
                
                <!-- Nama Produk (kosong dulu) -->
                <div class="h-5 bg-gray-800 rounded w-3/4 mb-3"></div>

                <!-- Harga (kosong dulu) -->
                <div class="h-5 bg-gray-800 rounded w-1/2"></div>

            </div>

        </div>
        @empty

        <!-- Dummy cards kalau belum ada data -->
        @for ($i = 0; $i < 8; $i++)
        <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden ">

            <div class="h-64 flex items-center justify-center bg-gray-950">
                <img src="{{ asset('images/logo.png') }}" class="w-24 opacity-50">
            </div>

            <div class="p-5 border-t border-gray-800 space-y-3">
                <div class="h-4 bg-gray-800 rounded w-3/4"></div>
                <div class="h-4 bg-gray-800 rounded w-1/2"></div>
            </div>

        </div>
        @endfor

        @endforelse

    </div>

</section>

@endsection