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

            <form method="POST" action="{{ route('register') }}" class="bg-white rounded-xl p-6 sm:p-8">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="font-semibold text-gray-700"/>
                    <x-input id="name"
                             class="block mt-1 w-full rounded-lg border-gray-300 focus:border-[#1a8dc3] focus:ring-2 focus:ring-[#1a8dc3]"
                             type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" class="font-semibold text-gray-700"/>
                    <x-input id="email"
                             class="block mt-1 w-full rounded-lg border-gray-300 focus:border-[#1a8dc3] focus:ring-2 focus:ring-[#1a8dc3]"
                             type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="font-semibold text-gray-700"/>
                    <x-input id="password"
                             class="block mt-1 w-full rounded-lg border-gray-300 focus:border-[#1a8dc3] focus:ring-2 focus:ring-[#1a8dc3]"
                             type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="font-semibold text-gray-700"/>
                    <x-input id="password_confirmation"
                             class="block mt-1 w-full rounded-lg border-gray-300 focus:border-[#1a8dc3] focus:ring-2 focus:ring-[#1a8dc3]"
                             type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" />

                                <div class="ms-2 text-sm text-gray-600">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-[#1a8dc3] hover:text-[#176fa1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1a8dc3]">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-[#1a8dc3] hover:text-[#176fa1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1a8dc3]">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-6">
                    <a class="underline text-base text-[#1a8dc3] hover:text-[#176fa1] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1a8dc3]"
                       href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button
                        class="ms-4 bg-[#1a8dc3] hover:bg-[#176fa1] text-white rounded-lg shadow px-5 py-2 text-base font-semibold">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </div>
</x-guest-layout>
