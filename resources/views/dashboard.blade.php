<x-app-layout> <!-- Layout utama aplikasi -->

<div class="bg-[#0f172a] min-h-screen"> <!-- Container utama dengan background gelap full screen -->
    
    <!-- Header Section -->
    <div class="bg-[#1e293b]/50 border-b border-slate-700/50 py-8"> <!-- Header dengan background semi transparan + border bawah -->
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> <!-- Wrapper agar konten rapi dan responsif -->
            
            <h2 class="text-2xl font-bold text-white">Dashboard</h2> <!-- Judul halaman -->
        
        </div>
    
    </div>

    <!-- Content Section -->
    <div class="py-12"> <!-- Section isi dengan padding atas bawah -->
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> <!-- Wrapper konten -->
            
            <div class="bg-[#1e293b] border border-slate-700/30 shadow-lg rounded-xl overflow-hidden"> <!-- Card konten -->
                
                <div class="px-8 py-6"> <!-- Padding dalam card -->
                    
                    <p class="text-base font-medium text-slate-300"> <!-- Text role -->
                        
                        Role: 
                        <span class="text-white font-bold">
                            {{ Auth::user()->role === 'admin' ? 'Admin' : 'User' }}
                        </span>
                        <!-- Mengecek role user:
                             jika 'admin' tampil Admin,
                             selain itu tampil User -->
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
    
    </div>

</div>

</x-app-layout> <!-- Penutup layout -->