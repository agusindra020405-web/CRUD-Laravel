<a href="{{ route('register') }}" class="inline-block w-64 group">
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden transition-all duration-500 group-hover:border-emerald-500/50">
        @php
            $imageMapping = [
                5 => 'nike-tee.jpg', 6 => 'adidas.jpg', 7 => 'carhart.jpg',
                8 => 'vans-tee.jpg', 9 => 'stussy.jpg', 10 => 'noah.jpeg',
                11 => 'supreme.jpg', 12 => 'bape.jpg'
            ];
            $displayImage = $imageMapping[$product->id] ?? 'logo.png';
        @endphp

        <div class="h-48 overflow-hidden bg-gray-950 flex items-center justify-center">
            <img src="{{ asset('images/' . $displayImage) }}" 
                 class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-110 transition duration-700">
        </div>

        <div class="p-4 border-t border-gray-800">
            <h3 class="text-white font-bold text-sm uppercase truncate">{{ $product->name }}</h3>
            <p class="text-emerald-500 font-black text-lg">
                Rp{{ number_format($product->price, 0, ',', '.') }}
            </p>
        </div>
    </div>
</a>