<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen">
            <!-- Navbar Sederhana -->
            <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center gap-6">
                            <h1 class="text-xl font-bold text-indigo-600 dark:text-indigo-400">App CRUD</h1>
                            <a href="{{ route('product.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 {{ request()->routeIs('product.*') ? 'font-bold text-indigo-600' : '' }}">
                                Products
                            </a>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            @auth
                                <span class="text-sm font-medium">✨ {{ Auth::user()->name }} ({{ Auth::user()->role }})</span>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
