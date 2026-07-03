<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
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
    return view('welcome', compact('categories', 'marques', 'parentCategories'));
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

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
