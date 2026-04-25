<x-app-layout>
    <div class="min-h-[calc(100vh-64px)] bg-[#0f172a] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full">
            <div class="p-10 bg-[#1e293b] border border-slate-700/50 shadow-2xl rounded-2xl">
                <div class="flex items-start gap-4 mb-8">
                    <a href="{{ route('product.index') }}" class="mt-1 text-slate-400 hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h2 class="text-2xl font-bold text-white tracking-tight leading-tight">Add Product</h2>
                        <p class="text-sm text-slate-400 mt-1">Fill in the details to add a new product</p>
                    </div>
                </div>

                <form action="{{ route('product.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">Nama Produk</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                               placeholder="e.g. Wireless Headphones"
                               class="block w-full bg-slate-700/50 border-none text-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all duration-200 py-3 px-4 placeholder-slate-500">
                        @error('name')
                            <p class="mt-2 text-xs text-rose-500 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-slate-300 mb-2">Category</label>
                        <div class="relative">
                            <select id="category_id" name="category_id" 
                                    class="block w-full bg-slate-700/50 border-none text-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all duration-200 py-3 px-4 appearance-none cursor-pointer">
                                <option value="" class="bg-[#1e293b]">No Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }} class="bg-[#1e293b]">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="quantity" class="block text-sm font-semibold text-slate-300 mb-2">Quantity</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 0) }}" required
                                   class="block w-full bg-slate-700/50 border-none text-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all duration-200 py-3 px-4">
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-semibold text-slate-300 mb-2">Price (Rp)</label>
                            <input type="number" id="price" name="price" value="{{ old('price', 0) }}" required
                                   class="block w-full bg-slate-700/50 border-none text-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all duration-200 py-3 px-4">
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-6">
                        <a href="{{ route('product.index') }}" class="px-6 py-2 bg-slate-700/50 border border-slate-600 text-slate-300 font-semibold rounded-lg hover:bg-slate-700 transition-all text-sm">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-2 bg-[#5850ec] hover:bg-[#4f46e5] text-white font-semibold rounded-lg shadow-lg transition-all active:scale-95 text-sm">
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>