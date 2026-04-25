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
    <body class="font-sans antialiased text-gray-100 bg-[#111827]">
        <div class="min-h-screen">
            <!-- Navbar -->
            <nav class="bg-[#1f2937] border-b border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('product.index') }}">
                                    <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg" class="block h-9 w-auto fill-current text-gray-200">
                                        <path d="M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C193.33 79.155 192.58 80.405 192.58 81.755V109.935L120.59 68.325C119.24 67.545 117.58 67.545 116.23 68.325L11.5303 128.875C10.3503 129.555 9.60028 130.805 9.60028 132.155V246.955C9.60028 248.305 10.3503 249.555 11.5303 250.235L116.23 310.785C117.58 311.565 119.24 311.565 120.59 310.785L225.29 250.235C226.47 249.555 227.22 248.305 227.22 246.955V192.055L299.21 150.445C300.56 149.665 301.31 148.415 301.31 147.065V84.825C301.31 83.475 300.56 82.225 299.21 81.545L305.8 81.125ZM251.32 64.335L285.92 84.315L251.32 104.295L216.72 84.315L251.32 64.335ZM202.48 93.395L246.42 118.765V161.415L202.48 136.045V93.395ZM198.81 184.665L122.76 228.585L46.7103 184.665L122.76 140.745L198.81 184.665ZM118.41 85.115L181.33 121.455L122.76 155.285L64.1903 121.455L118.41 85.115ZM19.4003 138.895L112.96 84.865V158.465L19.4003 212.495V138.895ZM112.96 295.915L19.4003 241.885V168.285L112.96 222.315V295.915ZM122.76 295.915V222.315L216.32 168.285V241.885L122.76 295.915ZM226.12 148.965L260.72 168.945L226.12 188.925L191.52 168.945L226.12 148.965ZM256.22 161.415V118.765L300.16 93.395V136.045L256.22 161.415Z"/>
                                    </svg>
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-medium leading-5 text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-400 hover:text-gray-300 hover:border-gray-300 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out' }}">
                                    Dashboard
                                </a>
                                <a href="{{ route('product.index') }}" class="{{ request()->routeIs('product.index') ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-medium leading-5 text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-400 hover:text-gray-300 hover:border-gray-300 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out' }}">
                                    Product
                                </a>
                                @can('manage-product')
                                    <a href="{{ route('category.index') }}" class="{{ request()->routeIs('category.index') ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-medium leading-5 text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-400 hover:text-gray-300 hover:border-gray-300 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out' }}">
                                        Category
                                    </a>
                                @endcan
                                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-medium leading-5 text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-400 hover:text-gray-300 hover:border-gray-300 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out' }}">
                                    About
                                </a>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="relative group">
                                @auth
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-400 bg-[#1f2937] hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>

                                <!-- Dropdown Menu -->
                                <div class="absolute right-0 w-48 mt-0 origin-top-right rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                    <div class="py-1 bg-[#1f2937] border border-gray-700 rounded-md shadow-xs">
                                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-400 hover:bg-gray-700 hover:text-gray-300 transition duration-150 ease-in-out">
                                            Profile
                                        </a>
                                        <hr class="border-gray-700">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-400 hover:bg-gray-700 hover:text-gray-300 transition duration-150 ease-in-out">
                                                Log Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endauth
                            </div>
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
