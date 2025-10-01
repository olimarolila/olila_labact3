<x-guest-layout>
    <div class="bg-[#f3f4f6] min-h-screen grid place-items-center px-4 relative">
        <div class="absolute top-10 left-10 w-32 h-32 bg-[#1a8dc3]/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-10 right-10 w-40 h-40 bg-yellow-200/20 rounded-full blur-3xl -z-10"></div>

        <x-authentication-card>
            <x-slot name="logo">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616490.png"
                     alt="TreaZure Logo"
                     class="w-20 h-20 mx-auto rounded-full">
                <div class="mt-3 text-center">
                    <span class="text-4xl font-extrabold font-montserrat text-[#1a8dc3]">TreaZure</span>
                </div>
            </x-slot>

            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="mb-4 font-medium text-base text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}" class="bg-white rounded-xl p-6 sm:p-8">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="font-semibold text-gray-700"/>
                    <x-input id="email"
                             class="block mt-1 w-full rounded-lg border-gray-300 focus:border-[#1a8dc3] focus:ring-2 focus:ring-[#1a8dc3]"
                             type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="font-semibold text-gray-700"/>
                    <x-input id="password"
                             class="block mt-1 w-full rounded-lg border-gray-300 focus:border-[#1a8dc3] focus:ring-2 focus:ring-[#1a8dc3]"
                             type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-base text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-base text-[#1a8dc3] hover:text-[#176fa1] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1a8dc3]"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button
                        class="ms-4 bg-[#1a8dc3] hover:bg-[#176fa1] text-white rounded-lg shadow px-5 py-2 text-base font-semibold">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </div>
</x-guest-layout>