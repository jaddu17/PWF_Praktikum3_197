<x-app-layout> <!-- Layout utama aplikasi -->

<div class="py-12 bg-[#0f172a] min-h-screen"> <!-- Container utama, full screen, background gelap -->
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> <!-- Wrapper konten dengan max width -->
        
        <div class="p-8 bg-[#1e293b] border border-slate-700/50 shadow-2xl rounded-2xl"> <!-- Card utama -->
            
            <div class="flex justify-between items-center mb-8"> <!-- Header: judul + tombol tambah -->
                
                <div>
                    <h2 class="text-3xl font-bold text-white tracking-tight">Category List</h2> <!-- Judul -->
                    <p class="text-sm text-slate-400 mt-1">Manage your category</p> <!-- Subjudul -->
                </div>

                <a href="{{ route('category.create') }}" class="px-5 py-2.5 bg-[#4f46e5] hover:bg-[#4338ca] text-white text-sm font-semibold rounded-lg shadow-lg transition-all active:scale-95 flex items-center gap-2"> <!-- Tombol tambah category -->
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <!-- Icon plus -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /> <!-- Bentuk plus -->
                    </svg>

                    Add Category <!-- Text tombol -->
                
                </a>
            
            </div>

            @if (session('success')) <!-- Cek apakah ada pesan sukses -->
                <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-lg text-sm flex items-center gap-3"> <!-- Alert sukses -->
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <!-- Icon checklist -->
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    {{ session('success') }} <!-- Menampilkan pesan -->
                
                </div>
            @endif

            <div class="overflow-hidden rounded-xl border border-slate-700/50"> <!-- Wrapper tabel -->
                
                <table class="w-full text-left border-collapse"> <!-- Tabel utama -->
                    
                    <thead>
                        <tr class="bg-[#2d3748] text-slate-400"> <!-- Header tabel -->
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider w-16 text-center">#</th> <!-- Nomor -->
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">NAME</th> <!-- Nama kategori -->
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-center">TOTAL PRODUCT</th> <!-- Jumlah produk -->
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-center">ACTION</th> <!-- Aksi -->
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-700/50"> <!-- Isi tabel -->
                        
                        @forelse ($categories as $index => $category) <!-- Loop data kategori -->
                            
                            <tr class="hover:bg-slate-800/30 transition-colors"> <!-- Row -->
                                
                                <td class="px-6 py-4 text-sm text-slate-500 text-center font-medium">{{ $index + 1 }}</td> <!-- Nomor urut -->

                                <td class="px-6 py-4 text-sm font-semibold text-slate-200">{{ $category->name }}</td> <!-- Nama kategori -->

                                <td class="px-6 py-4 text-sm text-slate-400 text-center font-medium">{{ $category->products_count }}</td> <!-- Jumlah produk (relasi count) -->

                                <td class="px-6 py-4 text-sm text-center"> <!-- Kolom aksi -->
                                    
                                    <div class="flex justify-center gap-5 text-slate-400"> <!-- Container tombol -->
                                        
                                        <a href="{{ route('category.edit', $category) }}" class="hover:text-white transition-colors" title="Edit"> <!-- Tombol edit -->
                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <!-- Icon edit -->
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        
                                        </a>

                                        <form action="{{ route('category.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure?')"> <!-- Form delete -->
                                            
                                            @csrf <!-- Token keamanan -->
                                            @method('DELETE') <!-- Method delete -->

                                            <button type="submit" class="hover:text-rose-500 transition-colors" title="Delete"> <!-- Tombol delete -->
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <!-- Icon delete -->
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            
                                            </button>
                                        
                                        </form>
                                    
                                    </div>
                                
                                </td>
                            
                            </tr>

                        @empty <!-- Jika data kosong -->
                            
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-slate-500 italic">No categories found.</td> <!-- Pesan kosong -->
                            </tr>

                        @endforelse <!-- End loop -->
                    
                    </tbody>
                
                </table>
            
            </div>
        
        </div>
    
    </div>

</div>

</x-app-layout> <!-- Penutup layout -->