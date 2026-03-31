<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SECOND DRIP | Thrift Syndicate</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Varela+Round" rel="stylesheet">

    <style>
        @keyframes marquee-left {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        @keyframes marquee-right {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }

        .animate-marquee-left {
            display: flex;
            width: max-content;
            animation: marquee-left 30s linear infinite;
        }

        .animate-marquee-right {
            display: flex;
            width: max-content;
            animation: marquee-right 30s linear infinite;
        }

        .animate-marquee-left:hover, .animate-marquee-right:hover {
            animation-play-state: paused;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 font-sans antialiased text-gray-200">
    <div id="app">
        <nav class="bg-[#0f172a] sticky top-0 z-50 shadow-2xl border-b border-gray-800">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="/" class="text-white text-2xl font-extrabold tracking-tighter hover:scale-105 transition-transform">
                    SECOND <span class="text-emerald-500">DRIP.</span>
                </a>

                <div class="hidden md:flex items-center gap-10 text-[10px] font-bold uppercase tracking-[0.3em] text-gray-400">
                    <a href="/" class="hover:text-emerald-400 transition-colors">Home</a>
                    <a href="{{ url('/shop') }}" class="hover:text-emerald-400 transition-colors">Shop</a>
                    <a href="#our-story" class="hover:text-emerald-400 transition-colors">Our Story</a>
                    <a href="#contact" class="hover:text-emerald-400 transition-colors">Contact</a>
                </div>

                <div class="flex items-center gap-6">
                    <button class="hidden sm:block hover:text-emerald-400 transition text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>

                    <button class="relative hover:text-emerald-400 transition text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.115 10.033a2.25 2.25 0 0 1-2.243 2.493H5.282a2.25 2.25 0 0 1-2.243-2.493L4.154 8.507a2.25 2.25 0 0 1 2.243-2.493h11.214a2.25 2.25 0 0 1 2.243 2.493Z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-emerald-500 text-[9px] text-black font-bold px-1.5 py-0.5 rounded-full">0</span>
                    </button>

                    <div class="hidden md:flex items-center gap-6 border-l border-gray-700 ml-2 pl-6 text-[10px] font-bold uppercase tracking-widest">
                        @guest
                        <a href="{{ route('login') }}" class="text-gray-400 hover:text-white">Login</a>

                        <a href="{{ route('register') }}" 
                            class="bg-white text-black px-4 py-2 rounded-sm hover:bg-emerald-500 hover:text-white transition text-center">
                            Join
                        </a>
                        @else
                        <div class="flex items-center gap-4 text-gray-300">
                            <span class="text-sm normal-case">Hi {{ auth()->user()->name }}</span>
                            <span class="h-5 w-px bg-gray-600"></span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-400 hover:text-white">Logout</button>
                            </form>
                        </div>
                        @endguest
                    </div>

                    <button id="menu-btn" class="md:hidden text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>

            <div id="menu" class="hidden md:hidden bg-[#1e293b] px-6 py-6 space-y-4 border-t border-gray-800">
                <a href="#" class="block text-sm font-bold uppercase tracking-widest text-gray-300">Home</a>
                <a href="#" class="block text-sm font-bold uppercase tracking-widest text-gray-300">Shop</a>
                @guest
                    <a href="{{ route('login') }}" class="block text-sm font-bold uppercase tracking-widest text-emerald-400">Login</a>
                    <a href="{{ route('register') }}" class="block text-sm font-bold uppercase tracking-widest text-white bg-emerald-500 px-4 py-2 rounded-sm">Join</a>
                @else
                    <div class="space-y-2">
                        <span class="block text-sm font-bold uppercase tracking-widest text-gray-300">Hi {{ auth()->user()->name }}</span>
                        <span class="block h-px w-full bg-gray-700"></span>
                        <a href="{{ route('logout') }}" class="block text-sm font-bold uppercase tracking-widest text-emerald-400"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endguest
            </div>
        </nav>

        @if(session('error'))
            <div class="bg-red-500 text-white text-center py-3 font-semibold">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-emerald-500 text-black text-center py-3 font-semibold">
                {{ session('success') }}
             </div>
        @endif

        <main>
            @yield('content')
        </main>
    </div>

    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('menu');
        btn.addEventListener('click', () => { menu.classList.toggle('hidden'); });
    </script>
</body>
</html>