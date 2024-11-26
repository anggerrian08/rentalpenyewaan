<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-400 to-blue-500 p-6 sm:p-12">
        <div class="max-w-md w-full bg-white rounded-lg shadow-xl p-8">
            <!-- Header -->
            <div class="text-center">
                <h2 class="text-4xl font-bold text-gray-800">{{ __('Welcome Back!') }}</h2>
                <p class="mt-2 text-gray-600">
                    {{ __('Sign in to continue to your account') }}
                </p>
            </div>

            <!-- Login Form -->
            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-green-700">{{ __('Email Address') }}</label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full rounded-lg border-green-300 shadow-sm py-2 px-3 text-gray-900
                               focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-green-700">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full rounded-lg border-green-300 shadow-sm py-2 px-3 text-gray-900
                               focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-green-300 rounded">
                        <span class="ml-2 text-sm text-green-700">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-green-600 hover:text-green-500">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg shadow-sm
                               text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        {{ __('Sign In') }}
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    {{ __('Don\'t have an account?') }}
                    <a href="{{ route('register') }}" class="text-green-600 hover:text-green-500 font-medium">
                        {{ __('Register here') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
