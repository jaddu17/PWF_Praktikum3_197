<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Product::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'nullable|exists:category,id',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'quantity.required' => 'Jumlah (kuantitas) produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
        ]);

        $validated['user_id'] = auth()->id();

        $product = Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function create()
    {
        Gate::authorize('create', Product::class);

        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('product.create', compact('users', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.view', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        Gate::authorize('update', $product);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'quantity' => 'sometimes|integer',
            'price' => 'sometimes|numeric',
            'category_id' => 'nullable|exists:category,id',
        ]);

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function edit(Product $product)
    {
        Gate::authorize('update', $product);

        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('product.edit', compact('product', 'users', 'categories'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        Gate::authorize('delete', $product);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}
