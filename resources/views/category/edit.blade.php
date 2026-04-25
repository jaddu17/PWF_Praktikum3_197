<x-app-layout> <!-- Layout utama aplikasi (Blade component) -->

<div class="min-h-[calc(100vh-64px)] bg-[#0f172a] flex justify-center pt-24 px-4 sm:px-6 lg:px-8"> <!-- Container full height, background gelap, center -->
    
    <div class="max-w-2xl w-full"> <!-- Membatasi lebar form agar rapi -->
        
        <div class="p-10 bg-[#1e293b] border border-slate-700/50 shadow-2xl rounded-2xl"> <!-- Card form -->
            
            <div class="flex items-center gap-4 mb-10"> <!-- Header: tombol back + judul -->
                
                <a href="{{ route('category.index') }}" class="text-slate-400 hover:text-white transition-all"> <!-- Link kembali -->
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <!-- Icon panah -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /> <!-- Bentuk panah kiri -->
                    </svg>
                
                </a>

                <h2 class="text-2xl font-bold text-white tracking-tight">Edit Category</h2> <!-- Judul halaman -->
            
            </div>

            <form action="{{ route('category.update', $category) }}" method="POST" class="space-y-8"> <!-- Form update data -->
                
                @csrf <!-- Token keamanan -->
                @method('PUT') <!-- Method spoofing karena HTML hanya support GET/POST -->

                <div> <!-- Wrapper input -->
                    
                    <label for="name" class="block text-sm font-semibold text-slate-400 mb-3 ml-1">Category</label> <!-- Label -->

                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $category->name) }}"  <!-- Isi default: old input (kalau error) atau data dari DB -->
                           required autofocus
                           class="block w-full bg-[#111827] border-slate-700 text-slate-100 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 py-3.5 px-4"> <!-- Input field -->

                    @error('name') <!-- Jika ada error validasi -->
                        <p class="mt-2 text-xs text-rose-500 font-medium ml-1">{{ $message }}</p> <!-- Tampilkan pesan error -->
                    @enderror
                
                </div>

                <div class="flex items-center justify-end gap-4 pt-6"> <!-- Section tombol -->
                    
                    <a href="{{ route('category.index') }}" class="px-8 py-3 bg-slate-700/40 hover:bg-slate-700/60 text-slate-300 font-bold rounded-xl transition-all active:scale-95 border border-slate-600/30"> <!-- Tombol batal -->
                        Cancel
                    </a>

                    <button type="submit" class="px-8 py-3 bg-[#4f46e5] hover:bg-[#4338ca] text-white font-bold rounded-xl shadow-lg transition-all active:scale-95"> <!-- Tombol submit -->
                        Save Category
                    </button>
                
                </div>
            
            </form>
        
        </div>
    
    </div>

</div>

</x-app-layout> <!-- Penutup layout -->