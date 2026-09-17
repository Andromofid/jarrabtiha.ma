<?php

use App\Http\Controllers\Market\LandingPageController;
use App\Http\Controllers\Market\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/suggestions', [ProductController::class, 'storeSuggestion'])
    ->name('products.suggestions.store');
Route::get('/categories', [LandingPageController::class, 'categories'])->name('categories.index');
Route::get('/brands', [LandingPageController::class, 'brands'])->name('brands.index');
Route::get('/brands-by-category', [LandingPageController::class, 'brandsByCategory'])->name('brands.by.category');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/adminRoutes.php';
