<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index()
    {
        Gate::authorize('manage-product');
        $categories = Category::withCount('products')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        Gate::authorize('manage-product');
        return view('category.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('manage-product');
        
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:category,name',
        ]);

        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        Gate::authorize('manage-product');
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        Gate::authorize('manage-product');

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:category,name,' . $category->id,
        ]);

        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        Gate::authorize('manage-product');
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
