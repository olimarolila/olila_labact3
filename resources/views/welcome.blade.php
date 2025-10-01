<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/616/616490.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#f4f8ff] text-black flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-between gap-4 bg-[#1a8dc3] w-full rounded-none px-4 py-2 fixed top-0 left-0 right-0 z-10">
                    <div class="w-full max-w-7xl mx-auto flex items-center justify-between gap-4">
                        <!-- Left: Guest Links -->
                        <div class="flex gap-4">
                            <a href="{{ route('browse') }}"   class="inline-block px-5 py-1.5 text-white font-bold border border-transparent hover:border-white rounded-sm text-base leading-normal">Browse</a>
                            <a href="{{ route('about') }}"    class="inline-block px-5 py-1.5 text-white font-bold border border-transparent hover:border-white rounded-sm text-base leading-normal">About</a>
                            <a href="{{ route('events') }}"   class="inline-block px-5 py-1.5 text-white font-bold border border-transparent hover:border-white rounded-sm text-base leading-normal">Events</a>
                            <a href="{{ route('faq') }}"      class="inline-block px-5 py-1.5 text-white font-bold border border-transparent hover:border-white rounded-sm text-base leading-normal">FAQ</a>
                            <a href="{{ route('feedback') }}" class="inline-block px-5 py-1.5 text-white font-bold border border-transparent hover:border-white rounded-sm text-base leading-normal">Feedback</a>
                        </div>
                        <!-- Right: Auth Links -->
                        <div class="flex gap-4">
                            @auth
                                @php
                                    $dashboardUrl = auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard');
                                @endphp
                                <a href="{{ $dashboardUrl }}" class="inline-block px-5 py-1.5 border-white hover:border-white border text-white rounded-sm text-base leading-normal">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 text-white font-bold border border-transparent hover:border-white rounded-sm text-base leading-normal">Log In</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 bg-white text-[#1a8dc3] border border-transparent rounded-sm text-base leading-normal hover:bg-transparent hover:border-white hover:text-white transition font-bold">Register </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </nav>
            @endif
        </header>

    <!-- Main Content -->
    <main class="flex flex-1 items-center justify-center w-full px-4">
        <div class="bg-white rounded-xl shadow-xl max-w-5xl w-full flex flex-col items-center py-20 px-12 relative overflow-hidden">
            <!-- Decorative Background Shape -->
            <div class="absolute top-0 left-0 w-32 h-32 bg-[#1a8dc3]/10 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 right-0 w-40 h-40 bg-yellow-200/20 rounded-full blur-3xl -z-10"></div>

            <!-- Header -->
            <div class="mb-8 flex flex-col items-center text-center">
                <div class="text-5xl font-extrabold font-montserrat text-[#1a8dc3] mb-2">TreaZure</div>
                <div class="text-lg font-semibold text-gray-600">Discover, Share, and Treasure Your Experiences</div>
                <img src="https://cdn-icons-png.flaticon.com/512/616/616490.png" alt="TreaZure Logo" class="w-20 h-20 mt-4">
            </div>

            <!-- Divider -->
            <div class="border-t-2 border-dashed border-gray-200 w-2/3 mb-8"></div>

            <!-- Feature Text -->
            <p class="mb-6 text-center text-[#706f6c] max-w-3xl">
                Welcome to <span class="font-bold text-lg text-[#1a8dc3]">TreaZure</span>, your trusted jewelry shop for discovering 
                elegant pieces, sharing your style, and treasuring every moment. Each collection is crafted with care to bring sparkle into your life.
            </p>

            <!-- Features -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 text-center">
                <div class="p-4 bg-[#f4f8ff] rounded-lg shadow-sm transform transition duration-300 hover:scale-110 hover:shadow-md">
                    <div class="text-2xl mb-2">💎</div>
                    <h3 class="font-bold text-lg text-[#1a8dc3]">Authentic</h3>
                    <p class="text-base text-gray-600">Certified jewelry pieces with timeless value.</p>
                </div>

                <div class="p-4 bg-[#f4f8ff] rounded-lg shadow-sm transform transition duration-300 hover:scale-110 hover:shadow-md">
                    <div class="text-2xl mb-2">💰</div>
                    <h3 class="font-bold text-lg text-[#1a8dc3]">Affordable Luxury</h3>
                    <p class="text-base text-gray-600">Luxury designs made accessible for everyone.</p>
                </div>

                <div class="p-4 bg-[#f4f8ff] rounded-lg shadow-sm transform transition duration-300 hover:scale-110 hover:shadow-md">
                    <div class="text-2xl mb-2">🤝</div>
                    <h3 class="font-bold text-lg text-[#1a8dc3]">Trusted</h3>
                    <p class="text-base text-gray-600">Serving hundreds of satisfied customers.</p>
                </div>
            </div>

            <!-- CTA -->
            <div class="flex gap-4">
                <a href="{{ route('browse') }}" class="px-8 py-3 bg-[#1a8dc3] text-white font-bold rounded-lg hover:bg-[#176fa1] transition">Browse Shop</a>
                <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-[#1a8dc3] font-bold border border-[#1a8dc3] rounded-lg hover:bg-[#1a8dc3] hover:text-white transition">Get Started</a>
            </div>
        </div>

    </main>
        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>