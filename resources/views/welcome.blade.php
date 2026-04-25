<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#111111] text-gray-100 font-sans antialiased min-h-screen flex flex-col items-center justify-center p-6">
    <!-- Container -->
    <div class="w-full max-w-2xl flex flex-col items-center">
        <!-- Header -->
        <header class="w-full flex justify-end mb-4">
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white transition px-4 py-2">Log in</a>
                <a href="{{ url('/register') }}" class="text-sm text-gray-300 hover:text-white border border-[#333] rounded-md px-4 py-2 hover:bg-[#1a1a1a] transition">Register</a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="w-full">
            <div class="bg-[#151515] border border-[#222] rounded-xl p-8 w-full shadow-lg">
                <h2 class="text-lg font-bold text-white mb-1">Atiqah Shafa Muthmainnah Jaddu</h2>
                <p class="text-sm text-gray-400 mb-8">20230140197</p>

                <a href="{{ route('product.index') }}" class="inline-block bg-white text-black font-semibold text-sm px-6 py-2.5 rounded-md hover:bg-gray-200 transition shadow">
                    Modul Pertemuan 1
                </a>
            </div>
        </main>
    </div>
</body>
</html>
