<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $marques = Product::select('brand')
            ->where('is_approved', true)
            ->whereNotNull('brand')
            ->distinct()
            ->orderBy('brand')
            ->get();

        $categories = Category::childrens()->get();
        $parentCategories = Category::parents()
            ->with('children')
            ->get();

        $popularProducts = Product::query()
            ->approved()
            ->with('category')
            ->orderByDesc('rating_count')
            ->latest()
            ->limit(6)
            ->get();

        $communityReviews = Review::query()
            ->approved()
            ->with(['user', 'product.category'])
            ->whereHas('product', fn($query) => $query->approved())
            ->orderByDesc('verified')
            ->orderByDesc('likes_count')
            ->latest()
            ->limit(3)
            ->get();

        $popularBrands = Product::query()
            ->approved()
            ->whereNotNull('brand')
            ->where('brand', '!=', '')
            ->selectRaw('brand, COUNT(*) as products_count')
            ->groupBy('brand')
            ->orderByDesc('products_count')
            ->orderBy('brand')
            ->limit(6)
            ->get();

        $stats = [
            'products' => Product::approved()->count(),
            'reviews' => Review::approved()->count(),
            'categories' => Category::count(),
            'users' => User::count(),
        ];

        return view('market.welcome', compact(
            'categories',
            'marques',
            'parentCategories',
            'popularProducts',
            'communityReviews',
            'popularBrands',
            'stats'
        ));
    }
    public function categories()
    {
        $parentCategories = Category::parents()
            ->withCount('children')
            ->with([
                'children' => fn($query) => $query
                    ->withCount([
                        'products as approved_products_count' => fn($productQuery) => $productQuery->approved(),
                    ]),
            ])
            ->get();

        return view('market.categories.index', compact('parentCategories'));
    }
    public function brands()
    {
        $brands = Product::query()
            ->approved()
            ->whereNotNull('brand')
            ->where('brand', '!=', '')
            ->selectRaw('brand, COUNT(*) as products_count, AVG(COALESCE(rating_avg, 0)) as average_rating')
            ->groupBy('brand')
            ->orderBy('brand')
            ->get();

        return view('market.brands.index', compact('brands'));
    }
    public function brandsByCategory(Request $request)
    {
        $categorySlug = $request->query('category');

        $category = Category::where('slug', $categorySlug)->first();

        if (! $category) {
            return response()->json([]);
        }

        $brands = Product::where('is_approved', true)
            ->where('category_id', $category->id)
            ->whereNotNull('brand')
            ->distinct()
            ->orderBy('brand')
            ->pluck('brand');

        return response()->json($brands);
    }
}
