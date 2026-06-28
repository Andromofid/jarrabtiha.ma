<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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

        $categories = Category::childrens()->get();
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

    public function show(Product $product): View
    {
        abort_unless($product->is_approved, 404);

        $product->load([
            'category.parent',
            'reviews' => fn ($query) => $query
                ->with('user')
                ->orderByDesc('verified')
                ->orderByDesc('likes_count')
                ->latest(),
        ]);

        $relatedProducts = Product::query()
            ->approved()
            ->with('category')
            ->where('id', '!=', $product->id)
            ->when(
                $product->category_id,
                fn ($query) => $query->where('category_id', $product->category_id),
                fn ($query) => $query->where('brand', $product->brand)
            )
            ->latest()
            ->limit(3)
            ->get();

        return view('products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
