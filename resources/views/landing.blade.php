@extends('layouts.app')

@section('content')

<section class="relative h-screen flex items-center justify-center bg-cover bg-center text-center px-6" 
         style="background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.4)), url('{{ asset('images/hero-bg.jpg') }}');">
    
    <div class="relative z-10">
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tighter uppercase">
            SECOND <span class="text-emerald-500">DRIP.</span>
        </h1>
        <p class="text-gray-300 max-w-xl mx-auto mb-10 tracking-widest text-sm uppercase">
            Thrift pilihan dengan style terbaik. Barang second, rasa first class.
        </p>
        <a href="{{ url('/shop') }}"
           class="bg-white text-black px-10 py-4 font-bold uppercase tracking-widest hover:bg-emerald-500 hover:text-white transition-all duration-300">
            Shop Now
        </a>
    </div>
</section>

<section class="bg-gray-950 py-24 overflow-hidden border-t border-gray-900">
    <div class="text-center mb-16">
        <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tighter">
            SYNDICATE <span class="text-emerald-500">COLLECTION</span>
        </h2>
        <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4"></div>
        <p class="text-gray-500 mt-4 text-xs uppercase tracking-[0.3em]">Join to see full details</p>
    </div>

    <div class="flex overflow-x-hidden mb-8 group">
        <div class="flex animate-marquee-left whitespace-nowrap gap-6">
            {{-- Loop pertama --}}
            @foreach($products as $product)
                @include('components.marquee-card', ['product' => $product])
            @endforeach
            {{-- Loop kedua (untuk menyambung tanpa putus) --}}
            @foreach($products as $product)
                @include('components.marquee-card', ['product' => $product])
            @endforeach
        </div>
    </div>

    <div class="flex overflow-x-hidden group">
        <div class="flex animate-marquee-right whitespace-nowrap gap-6">
            {{-- Loop pertama --}}
            @foreach($products as $product)
                @include('components.marquee-card', ['product' => $product])
            @endforeach
            {{-- Loop kedua --}}
            @foreach($products as $product)
                @include('components.marquee-card', ['product' => $product])
            @endforeach
        </div>
    </div>
</section>

<!-- OUR STORY -->
<section id="our-story" class="scroll-mt-24 bg-gray-950 py-24 px-6 md:px-16 border-t border-gray-800">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-center">
        
        <!-- Logo -->
        <div class="flex justify-center relative">
            <div class="absolute w-72 h-72 bg-emerald-500/10 blur-3xl rounded-full"></div>
            <img src="/images/logo.png" alt="Second Drip Logo" 
                 class="w-full max-w-md md:max-w-lg lg:max-w-xl relative z-10 drop-shadow-[0_0_20px_rgba(16,185,129,0.4)]">
        </div>

        <!-- Story -->
        <div>
            <h2 class="text-3xl md:text-5xl font-black mb-6 tracking-tight uppercase">
                OUR <span class="text-emerald-500">STORY</span>
            </h2>

            <div class="w-16 h-1 bg-emerald-500 mb-8"></div>

            <p class="text-gray-400 leading-relaxed mb-5 text-lg">
                SECOND DRIP berawal dari perjalanan sederhana sebagai pedagang pakaian bekas yang beroperasi secara offline. Pada masa tersebut, proses transaksi dilakukan secara langsung melalui sistem <span class="italic text-gray-300">Cash on Delivery</span> (COD), yang memerlukan waktu, tenaga, serta mobilitas yang cukup tinggi.
            </p>

            <p class="text-gray-400 leading-relaxed mb-5 text-lg">
                Seiring dengan perkembangan zaman dan pesatnya pertumbuhan teknologi digital, pola konsumsi masyarakat pun mulai beralih ke arah yang lebih praktis dan efisien melalui platform online. Fenomena ini membuka peluang baru dalam dunia bisnis, khususnya di industri fashion.
            </p>

            <p class="text-gray-400 leading-relaxed text-lg">
                Berangkat dari pengalaman tersebut, muncul gagasan untuk menghadirkan sebuah platform yang mampu menjangkau lebih banyak pelanggan tanpa terbatas oleh ruang dan waktu. Dengan semangat inovasi dan adaptasi terhadap perubahan, SECOND DRIP kemudian lahir sebagai bentuk transformasi dari penjualan konvensional menuju era digital.
            </p>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact" class= "scroll-mt-24 bg-gray-950 py-24 px-6 md:px-16 border-t border-gray-800">
    <div class="max-w-6xl mx-auto text-center">

        <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tight mb-4">
            CONTACT <span class="text-emerald-500">US</span>
        </h2>

        <div class="w-16 h-1 bg-emerald-500 mx-auto mb-10"></div>

        <p class="text-gray-400 max-w-2xl mx-auto mb-16 text-lg">
            Hubungi kami untuk pertanyaan, kolaborasi, atau informasi lebih lanjut mengenai SECOND DRIP.
        </p>

        <div class="grid md:grid-cols-2 gap-12 items start">
            <div class="text-left space-y-6">

            <div>
                <h3 class="text-white font-bold text-lg mb-1">Email</h3>
                <p class="text-gray-400">seconddrip@gmail.com</p>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-1">Phone</h3>
                <p class="text-gray-400">+62 812 3456 7890</p>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-1">Location</h3>
                <p class="text-gray-400">Bali, Indonesia</p>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-1">Instagram</h3>
                <p class="text-emerald-400">@seconddrip</p>
            </div>
            </div>

            <form class="space-y-6">
                
                <input type="text" placeholder="Your Name"
                    class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:outline-none focus:border-emerald-500">

                <input type="email" placeholder="Your Email"
                    class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:outline-none focus:border-emerald-500">

                <textarea rows="5" placeholder="Your Message"
                    class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:outline-none focus:border-emerald-500"></textarea>

                <button type="submit"
                    class="w-full bg-white text-black py-3 font-bold uppercase tracking-widest hover:bg-emerald-500 hover:text-white transition">
                    Send Message
                </button>

            </form>


        </div>
    </div>
</section>
<section>
    <footer class="bg-gray-950 text-white pt-16 pb-8 px-6 md:px-16 border-t border-gray-800 mt-auto ">
    <div class="max-w-7xl mx-auto">
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-12 mb-12">
            
            <div>
                <h4 class="font-black text-xl mb-5 uppercase tracking-tight text-white">
                    Second <span class="text-emerald-500">Drip</span>
                </h4>
                <ul class="space-y-3 text-sm text-gray-400 font-medium">
                    <li><a href="#" class="hover:text-emerald-500 hover:underline transition">About Us</a></li>
                    <li><a href="#" class="hover:text-emerald-500 hover:underline transition">Koleksi</a></li>
                    <li><a href="#" class="hover:text-emerald-500 hover:underline transition">Blog</a></li>
                    <li><a href="#" class="hover:text-emerald-500 hover:underline transition">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-lg mb-5 uppercase tracking-wider text-gray-200">Help</h4>
                <ul class="space-y-3 text-sm text-gray-400 font-medium">
                    <li><a href="#" class="hover:text-emerald-500 hover:underline transition">Help Center</a></li>
                    <li><a href="#" class="hover:text-emerald-500 hover:underline transition">Trust & Safety</a></li>
                    <li><a href="#" class="hover:text-emerald-500 hover:underline transition">Buying</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-lg mb-5 uppercase tracking-wider text-gray-200">Community</h4>
                <ul class="space-y-3 text-sm text-gray-400 font-medium">
                    <li><a href="#" class="hover:text-emerald-500 hover:underline transition">Forum</a></li>
                </ul>
            </div>

        </div>

        <div class="border-t border-gray-800 pt-8 mt-8 flex flex-col md:row justify-between items-center gap-6">
            
            <div class="flex gap-8 text-xl text-gray-600">
                <a href="#" class="hover:text-emerald-500 hover:-translate-y-1 transition duration-300"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-emerald-500 hover:-translate-y-1 transition duration-300"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="hover:text-emerald-500 hover:-translate-y-1 transition duration-300"><i class="fab fa-x-twitter"></i></a>
            </div>
            
            <p class="text-sm text-gray-600 font-mono tracking-widest uppercase">
                &copy; Second Drip 2026
            </p>
        </div>
    </div>
</footer>
</section>

@endsection