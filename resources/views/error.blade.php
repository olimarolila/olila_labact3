<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

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
    <body class="bg-[#f4f8ff]">

    <!-- Main Content -->
    <main class="flex flex-1 items-center justify-center w-full px-4 min-h-screen">
        <div class="bg-white rounded-xl shadow-xl max-w-5xl w-full flex flex-col items-center py-20 px-12 relative overflow-hidden">
            <!-- Decorative Background Shape -->
            <div class="absolute top-0 left-0 w-32 h-32 bg-[#1a8dc3]/10 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 right-0 w-40 h-40 bg-yellow-200/20 rounded-full blur-3xl -z-10"></div>

            <!-- Header -->
            <div class="mb-8 flex flex-col items-center text-center">
                <div class="text-6xl font-extrabold font-montserrat text-[#1a8dc3] mb-2">Oops!</div>
                <div class="text-xl font-semibold text-gray-600">You don’t have permission to access this page.</div>
                <img src="https://cdn-icons-png.flaticon.com/512/564/564619.png" alt="Error Icon" class="w-24 h-24 mt-6">
            </div>

            <!-- Divider -->
            <div class="border-t-2 border-dashed border-gray-200 w-2/3 mb-8"></div>

            <!-- Error Text -->
            <p class="mb-6 text-center text-[#706f6c] max-w-3xl">
                This page is restricted. Please return to the homepage or log in with the appropriate credentials.  
                If you believe this is an error, contact support.
            </p>

            <!-- Features -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 text-center">
                <div class="p-4 bg-[#f4f8ff] rounded-lg shadow-sm transform transition duration-300 hover:scale-110 hover:shadow-md">
                    <div class="text-2xl mb-2">🔒</div>
                    <h3 class="font-bold text-lg text-[#1a8dc3]">Secure</h3>
                    <p class="text-base text-gray-600">Your data and access are protected.</p>
                </div>

                <div class="p-4 bg-[#f4f8ff] rounded-lg shadow-sm transform transition duration-300 hover:scale-110 hover:shadow-md">
                    <div class="text-2xl mb-2">🧭</div>
                    <h3 class="font-bold text-lg text-[#1a8dc3]">Navigate</h3>
                    <p class="text-base text-gray-600">Use the buttons below to continue safely.</p>
                </div>

                <div class="p-4 bg-[#f4f8ff] rounded-lg shadow-sm transform transition duration-300 hover:scale-110 hover:shadow-md">
                    <div class="text-2xl mb-2">📞</div>
                    <h3 class="font-bold text-lg text-[#1a8dc3]">Support</h3>
                    <p class="text-base text-gray-600">We’re here to help if you get stuck.</p>
                </div>
            </div>

            <!-- CTA -->
            <div class="flex gap-4">
                <a href="{{ route('browse') }}" class="px-8 py-3 bg-[#1a8dc3] text-white font-bold rounded-lg hover:bg-[#176fa1] transition">Go Back</a>
                <a href="{{ route('login') }}" class="px-8 py-3 bg-white text-[#1a8dc3] font-bold border border-[#1a8dc3] rounded-lg hover:bg-[#1a8dc3] hover:text-white transition">Login</a>
            </div>
        </div>
    </main>

    </body>
</html>
