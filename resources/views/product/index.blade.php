<x-app-layout>
    <div class="py-12 bg-[#0f172a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="p-8 bg-[#1e293b] border border-slate-700/50 shadow-2xl rounded-2xl">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-white tracking-tight">Product List</h2>
                        <p class="text-sm text-slate-400 mt-1">Manage your product inventory</p>
                    </div>
                    @can('manage-product')
                    <a href="{{ route('product.create') }}" class="px-5 py-2.5 bg-[#4f46e5] hover:bg-[#4338ca] text-white text-sm font-semibold rounded-lg shadow-lg transition-all active:scale-95 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Product
                    </a>
                    @endcan
                </div>

                @if (session('success'))
                    <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-lg text-sm flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-hidden rounded-xl border border-slate-700/50">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#2d3748] text-slate-400">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider w-16 text-center">#</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">NAME</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-center">QUANTITY</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">PRICE</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">OWNER</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700/50">
                            @forelse ($products as $index => $product)
                                <tr class="hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 text-sm text-slate-500 text-center font-medium">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-slate-200">{{ $product->name }}</td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        <span class="inline-flex items-center justify-center min-w-[1.8rem] h-5 rounded-full text-[10px] font-bold {{ $product->quantity <= 10 ? 'bg-red-500/20 text-red-500' : 'bg-green-500/20 text-green-500' }}">
                                            {{ $product->quantity }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-300 font-medium">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-400">
                                        {{ $product->user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        <div class="flex justify-center gap-5 text-slate-400">
                                            <a href="{{ route('product.show', $product->id) }}" class="hover:text-white transition-colors" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            
                                            @can('update', $product)
                                            <a href="{{ route('product.edit', $product->id) }}" class="hover:text-white transition-colors" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            @endcan

                                            @can('delete', $product)
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="hover:text-rose-500 transition-colors" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-slate-500 italic">No products found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
