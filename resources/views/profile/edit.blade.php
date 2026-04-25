<x-app-layout>
    <div class="py-12 bg-[#0f172a] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-3xl font-extrabold text-white tracking-tight">Settings</h2>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl text-sm flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 gap-8">
                <!-- Profile Information Section -->
                <div class="p-8 bg-[#1e293b] border border-slate-700/50 shadow-2xl rounded-2xl transition-all hover:border-slate-600/50">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profile Information
                                </h2>
                                <p class="mt-2 text-sm text-slate-400 leading-relaxed">
                                    Update your account's profile information and email address.
                                </p>
                            </header>

                            <form action="{{ route('profile.update') }}" method="POST" class="mt-8 space-y-6">
                                @csrf
                                @method('PATCH')

                                <div class="grid grid-cols-1 gap-6">
                                    <!-- Name -->
                                    <div>
                                        <label for="name" class="block text-sm font-semibold text-slate-300 ml-1">Full Name</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                                               class="mt-2 block w-full bg-[#0f172a] border-slate-700 text-slate-100 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 py-3">
                                        @error('name')
                                            <p class="mt-2 text-xs text-rose-500 font-medium ml-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block text-sm font-semibold text-slate-300 ml-1">Email Address</label>
                                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                                               class="mt-2 block w-full bg-[#0f172a] border-slate-700 text-slate-100 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 py-3">
                                        @error('email')
                                            <p class="mt-2 text-xs text-rose-500 font-medium ml-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex items-center pt-2">
                                    <button type="submit" class="px-8 py-3 bg-white hover:bg-slate-200 text-slate-900 font-bold rounded-xl shadow-lg shadow-white/5 transition-all active:scale-[0.98]">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>

                <!-- Update Password Section -->
                <div class="p-8 bg-[#1e293b] border border-slate-700/50 shadow-2xl rounded-2xl transition-all hover:border-slate-600/50">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Security Settings
                                </h2>
                                <p class="mt-2 text-sm text-slate-400 leading-relaxed">
                                    Ensure your account is using a long, random password to stay secure.
                                </p>
                            </header>

                            <form action="{{ route('profile.update') }}" method="POST" class="mt-8 space-y-6">
                                @csrf
                                @method('PATCH')
                                
                                <input type="hidden" name="name" value="{{ $user->name }}">
                                <input type="hidden" name="email" value="{{ $user->email }}">

                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="password" class="block text-sm font-semibold text-slate-300 ml-1">New Password</label>
                                        <input type="password" id="password" name="password" 
                                               class="mt-2 block w-full bg-[#0f172a] border-slate-700 text-slate-100 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 py-3">
                                        @error('password')
                                            <p class="mt-2 text-xs text-rose-500 font-medium ml-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-300 ml-1">Confirm New Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" 
                                               class="mt-2 block w-full bg-[#0f172a] border-slate-700 text-slate-100 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 py-3">
                                    </div>
                                </div>

                                <div class="flex items-center pt-2">
                                    <button type="submit" class="px-8 py-3 bg-white hover:bg-slate-200 text-slate-900 font-bold rounded-xl shadow-lg shadow-white/5 transition-all active:scale-[0.98]">
                                        Update Password
                                    </button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
