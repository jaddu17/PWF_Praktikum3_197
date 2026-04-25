<x-app-layout>
    <div class="min-h-[calc(100vh-64px)] bg-[#0f172a] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full">
            <div class="p-10 bg-[#1e293b] border border-slate-700/50 shadow-2xl rounded-2xl">
                <div class="flex items-center gap-4 mb-2">
                    <a href="{{ route('product.index') }}" class="text-slate-400 hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <h2 class="text-3xl font-bold text-white tracking-tight">Edit Product</h2>
                </div>
                <p class="text-sm text-slate-400 mb-10 ml-10">Update the product details below</p>

                <form action="{{ route('product.update', $product->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <!-- Nama Produk -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-400 mb-2 ml-1">Nama Produk</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required autofocus
                               class="block w-full bg-[#2d3748]/50 border-slate-700 text-slate-100 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 py-3 px-4">
                        @error('name')
                            <p class="mt-2 text-xs text-rose-500 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-slate-400 mb-2 ml-1">Category</label>
                        <select id="category_id" name="category_id" 
                                class="block w-full bg-[#0f172a] border-slate-700 text-slate-100 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 py-3 px-4 appearance-none cursor-pointer">
                            <option value="">No Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id') ?? $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-xs text-rose-500 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Quantity & Price -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="quantity" class="block text-sm font-semibold text-slate-400 mb-2 ml-1">Quantity</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required
                                   class="block w-full bg-[#2d3748]/50 border-slate-700 text-slate-100 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 py-3 px-4">
                            @error('quantity')
                                <p class="mt-2 text-xs text-rose-500 font-medium ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-semibold text-slate-400 mb-2 ml-1">Price (Rp)</label>
                            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required
                                   class="block w-full bg-[#2d3748]/50 border-slate-700 text-slate-100 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200 py-3 px-4">
                            @error('price')
                                <p class="mt-2 text-xs text-rose-500 font-medium ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-4 pt-4">
                        <a href="{{ route('product.index') }}" class="px-8 py-2.5 bg-transparent border border-slate-600 text-slate-300 font-semibold rounded-lg hover:bg-slate-700/50 transition-all active:scale-95">
                            Cancel
                        </a>
                        <button type="submit" class="px-8 py-2.5 bg-[#4f46e5] hover:bg-[#4338ca] text-white font-semibold rounded-lg shadow-lg transition-all active:scale-95">
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
