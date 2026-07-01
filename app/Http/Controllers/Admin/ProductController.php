<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $selectedCategory = $request->string('category')->toString();
        $selectedBrand = $request->string('brand')->trim()->toString();

        $products = Product::with('category')
            ->when($selectedCategory !== '', fn($query) => $query->where('category_id', $selectedCategory))
            ->when($selectedBrand !== '', fn($query) => $query->where('brand', $selectedBrand))
            ->latest()
            ->get();

        $categories = Category::ordered()->get();
        $brands = Product::query()
            ->whereNotNull('brand')
            ->where('brand', '!=', '')
            ->distinct()
            ->orderBy('brand')
            ->pluck('brand');

        return view('admin.products.index', compact(
            'products',
            'categories',
            'brands',
            'selectedCategory',
            'selectedBrand',
        ));
    }

    public function create(): View
    {
        $categories = Category::ordered()->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'brand' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp', 'max:255'],
            'description' => ['nullable', 'string'],
            'where_to_buy' => ['nullable', 'string', 'max:255'],
            'is_approved' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['slug'] ?: $validated['name']);
        $validated['is_approved'] = $request->boolean('is_approved');

        $product = Product::create($validated);
        if ($request->hasFile('image')) {
            $path = $request->image->store('products', 'public');
            $product->update([
                'image' => $path,
            ]);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product): View
    {
        $categories = Category::ordered()->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($product->id)],
            'brand' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp', 'max:255'],
            'description' => ['nullable', 'string'],
            'where_to_buy' => ['nullable', 'string', 'max:255'],
            'is_approved' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['slug'] ?: $validated['name']);
        $validated['is_approved'] = $request->boolean('is_approved');

        $product->update($validated);

        if ($request->hasFile('image')) {
            $path = $request->image->store('products', 'public');
            $product->update([
                'image' => $path,
            ]);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
