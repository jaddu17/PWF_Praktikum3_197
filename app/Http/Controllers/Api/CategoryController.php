<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::all();
            return response()->json([
                'message' => 'Categories retrieved successfully',
                'data' => $categories
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data kategori', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $validated = $request->validated();
            $category = Category::create($validated);
            Log::info('Menambah data kategori', ['data' => $category]);

            return response()->json([
                'message' => 'Kategori berhasil ditambahkan!!',
                'data' => $category,
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah kategori', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menambah kategori'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
            }
            return response()->json(['message' => 'Category retrieved successfully', 'data' => $category], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data kategori', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, int $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
            }

            $validated = $request->validated();
            $category->update($validated);
            Log::info('Update data kategori', ['data' => $category]);

            return response()->json([
                'message' => 'Kategori berhasil diperbarui!!',
                'data' => $category,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat update kategori', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal update kategori'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
            }

            $category->delete();
            Log::info('Hapus data kategori', ['id' => $id]);

            return response()->json(['message' => 'Kategori berhasil dihapus!!'], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat hapus kategori', ['message' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal hapus kategori'], 500);
        }
    }
}
