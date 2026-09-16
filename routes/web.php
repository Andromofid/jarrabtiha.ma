<?php

use App\Http\Controllers\Market\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
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
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/suggestions', [ProductController::class, 'storeSuggestion'])
    ->name('products.suggestions.store');
Route::get('/categories', function () {
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
})->name('categories.index');

Route::get('/brands', function () {
    $brands = Product::query()
        ->approved()
        ->whereNotNull('brand')
        ->where('brand', '!=', '')
        ->selectRaw('brand, COUNT(*) as products_count, AVG(COALESCE(rating_avg, 0)) as average_rating')
        ->groupBy('brand')
        ->orderBy('brand')
        ->get();

    return view('market.brands.index', compact('brands'));
})->name('brands.index');

Route::get('/brands-by-category', function (Request $request) {
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
})->name('brands.by.category');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/adminRoutes.php';
