<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::with('category')->get();
            return response()->json([
                'message' => 'Products retrieved successfully',
                'data' => $products
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data produk', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $validated = $request->validated();

            $validated['user_id'] = Auth::id();

            $product = Product::create($validated);

            Log::info('Menambah data produk', [
                'list' => $product
            ]);

            return response()->json([
                'message' => 'Produk berhasil ditambahkan!!',
                'data' => $product,
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah product', [
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            $product = Product::with('category')->find($id);

            if (!$product)
            {
                return response()->json([
                    'message' => 'Product tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'message' => 'Product retrieved successfully',
                'data' => $product
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data produk', [
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, int $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json(['message' => 'Product tidak ditemukan'], 404);
            }

            $validated = $request->validated();
            $product->update($validated);
            Log::info('Update data produk', ['data' => $product]);

            return response()->json([
                'message' => 'Produk berhasil diperbarui!!',
                'data' => $product,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat update product', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal update product'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json(['message' => 'Product tidak ditemukan'], 404);
            }

            $product->delete();
            Log::info('Hapus data produk', ['id' => $id]);

            return response()->json(['message' => 'Produk berhasil dihapus!!'], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat hapus product', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal hapus product'], 500);
        }
    }
}
