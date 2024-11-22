<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-r from-blue-200 via-white to-blue-200 flex items-center justify-center">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-6">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-700">Welcome Back!</h2>
                <p class="text-sm text-gray-500">Please login to your account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-400"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                    <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-400"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-400" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between">
                    <x-primary-button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow-md transition duration-200">
                        {{ __('Log in') }}
                    </x-primary-button>

                    <a href="{{ route('register') }}" class="text-blue-500 text-sm hover:underline">
                        {{ __('Create Account') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
