<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', fn() => redirect()->route('admin.products.index'))->name('dashboard');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('products', ProductController::class)->except('show');
        Route::resource('users', UserController::class)->only(['index', 'show']);
        Route::post('/logout', [AdminLoginController::class, 'destroy'])->name('logout');
    });

Route::middleware('guest:admin')->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/login', [AdminLoginController::class, 'create'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'store'])->name('login.store');
});
