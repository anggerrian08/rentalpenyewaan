<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-green-400 to-blue-500 py-6 sm:py-12 relative">
            <!-- Logo Section -->
            <div class="absolute top-4 left-4">
                <a href="/" class="block">
                    <x-application-logo class="w-16 h-16 text-white" />
                </a>
            </div>

            <!-- Content Section -->
            <div class="w-full sm:max-w-md lg:max-w-lg bg-green-50 dark:bg-green-900 shadow-lg rounded-lg px-5 py-5">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>
