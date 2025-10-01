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
        <main class="flex flex-1 items-center w-full px-4 flex-col mt-24">
            <h1 class="text-5xl font-extrabold font-montserrat text-[#1a8dc3] mb-6">We Value Your Feedback</h1>

            <div class="bg-white rounded-xl shadow-xl max-w-5xl w-full flex flex-col items-center py-16 px-8 relative overflow-hidden">
                <p class="text-gray-700 mb-6 text-center max-w-2xl">Let us know how we can improve your TreaZure experience.</p>

                <form class="bg-[#f4f8ff] shadow-md rounded-lg p-6 space-y-4 w-full max-w-2xl">
                <textarea rows="5" placeholder="Type your feedback here..."
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#1a8dc3]"></textarea>
                <div class="flex justify-center">
                    <button type="submit"
                    class="px-6 py-2 bg-[#1a8dc3] text-white font-bold rounded-lg hover:bg-[#176fa1] transition">
                    Submit
                    </button>
                </div>
                </form>
            </div>
        </main>



        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>