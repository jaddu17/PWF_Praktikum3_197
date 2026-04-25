<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#111827] text-gray-100 font-sans antialiased min-h-screen flex flex-col items-center justify-center p-6">

    <!-- Logo -->
    <div class="mb-8">
        <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300">
            <path d="M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C193.33 79.155 192.58 80.405 192.58 81.755V109.935L120.59 68.325C119.24 67.545 117.58 67.545 116.23 68.325L11.5303 128.875C10.3503 129.555 9.60028 130.805 9.60028 132.155V246.955C9.60028 248.305 10.3503 249.555 11.5303 250.235L116.23 310.785C117.58 311.565 119.24 311.565 120.59 310.785L225.29 250.235C226.47 249.555 227.22 248.305 227.22 246.955V192.055L299.21 150.445C300.56 149.665 301.31 148.415 301.31 147.065V84.825C301.31 83.475 300.56 82.225 299.21 81.545L305.8 81.125ZM251.32 64.335L285.92 84.315L251.32 104.295L216.72 84.315L251.32 64.335ZM202.48 93.395L246.42 118.765V161.415L202.48 136.045V93.395ZM198.81 184.665L122.76 228.585L46.7103 184.665L122.76 140.745L198.81 184.665ZM118.41 85.115L181.33 121.455L122.76 155.285L64.1903 121.455L118.41 85.115ZM19.4003 138.895L112.96 84.865V158.465L19.4003 212.495V138.895ZM112.96 295.915L19.4003 241.885V168.285L112.96 222.315V295.915ZM122.76 295.915V222.315L216.32 168.285V241.885L122.76 295.915ZM226.12 148.965L260.72 168.945L226.12 188.925L191.52 168.945L226.12 148.965ZM256.22 161.415V118.765L300.16 93.395V136.045L256.22 161.415Z" fill="currentColor" />
        </svg>
    </div>

    <!-- Card -->
    <div class="bg-[#1f2937] p-8 rounded-lg shadow-md w-full max-w-md">
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 bg-[#111827] border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 bg-[#f3f4f6] border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition" value="password">
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded bg-[#111827] border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-400">Remember me</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end mt-4 gap-4">
                <a href="#" class="text-sm text-gray-400 hover:text-gray-200 underline underline-offset-4">Forgot your password?</a>
                
                <button type="submit" class="bg-white text-black font-semibold text-sm px-6 py-2.5 rounded-md hover:bg-gray-200 transition shadow">
                    LOG IN
                </button>
            </div>
        </form>
    </div>

</body>
</html>
