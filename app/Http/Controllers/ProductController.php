<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::query()
            ->with('category.parent')
            ->approved();

        if ($request->filled('q')) {
            $query->search($request->string('q')->toString());
        }

        if ($request->filled('category')) {
            $query->byCategory($request->string('category')->toString());
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->string('brand')->toString());
        }

        $products = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Category::childrens()->with('parent')->get();
        $parentCategories = Category::parents()
            ->with('children')
            ->withCount('children')
            ->get();
        $brands = Product::query()
            ->approved()
            ->whereNotNull('brand')
            ->distinct()
            ->orderBy('brand')
            ->pluck('brand');

        return view('products.index', [
            'brands' => $brands,
            'categories' => $categories,
            'parentCategories' => $parentCategories,
            'products' => $products,
            'selectedBrand' => $request->string('brand')->toString(),
            'selectedCategory' => $request->string('category')->toString(),
            'searchTerm' => $request->string('q')->toString(),
        ]);
    }

    public function show(Request $request, Product $product): View
    {
        abort_unless($product->is_approved, 404);

        $product->load('category.parent');

        $reviews = $product->reviews()
            ->with('user')
            ->when(
                $request->rating,
                fn($query) =>
                $query->where('rating', $request->rating)
            )
            ->when(
                $request->duration,
                fn($query) =>
                $query->where('result_duration', $request->duration)
            )
            ->when(
                $request->recommend === '1',
                fn($query) =>
                $query->where('would_recommend', true)
            )
            ->when(
                $request->verified === '1',
                fn($query) =>
                $query->where('verified', true)
            )
            ->when(
                $request->sort === 'oldest',
                fn($query) =>
                $query->oldest()
            )
            ->when(
                $request->sort === 'top',
                fn($query) =>
                $query->orderByDesc('rating')
            )
            ->when(
                ! in_array($request->sort, ['oldest', 'top']),
                fn($query) =>
                $query
                    ->orderByDesc('verified')
                    ->orderByDesc('likes_count')
                    ->latest()
            )
            ->paginate(6)
            ->withQueryString();

        $relatedProducts = Product::query()
            ->approved()
            ->with('category')
            ->where('id', '!=', $product->id)
            ->when(
                $product->category_id,
                fn($query) => $query->where('category_id', $product->category_id),
                fn($query) => $query->where('brand', $product->brand)
            )
            ->latest()
            ->limit(3)
            ->get();

        return view('products.show', [
            'product' => $product,
            'reviews' => $reviews,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    public function storeSuggestion(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'where_to_buy' => ['nullable', 'url', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['name']);
        $validated['is_approved'] = false;

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produit ajouté avec succès. Il est maintenant en attente de validation.');
    }

    protected function generateUniqueSlug(string $name): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug !== '' ? $baseSlug : 'produit';
        $suffix = 1;

        while (Product::where('slug', $slug)->exists()) {
            $slug = ($baseSlug !== '' ? $baseSlug : 'produit') . '-' . $suffix;
            $suffix++;
        }

        return $slug;
    }
}
