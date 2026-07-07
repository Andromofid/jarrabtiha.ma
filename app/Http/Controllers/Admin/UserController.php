<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();
        $verified = $request->string('verified')->toString();
        $provider = $request->string('provider')->toString();

        $users = User::query()
            ->withCount(['reviews', 'reviewLikes'])
            ->withAvg('reviews', 'rating')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('city', 'like', "%{$search}%");
                });
            })
            ->when($verified === 'verified', fn($query) => $query->whereNotNull('email_verified_at'))
            ->when($verified === 'unverified', fn($query) => $query->whereNull('email_verified_at'))
            ->when($provider === 'google', fn($query) => $query->whereNotNull('google_id'))
            ->when($provider === 'password', fn($query) => $query->whereNull('google_id'))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $totalUsers = User::count();
        $verifiedUsers = User::whereNotNull('email_verified_at')->count();
        $reviewersCount = User::has('reviews')->count();

        return view('admin.users.index', compact(
            'users',
            'search',
            'verified',
            'provider',
            'totalUsers',
            'verifiedUsers',
            'reviewersCount',
        ));
    }

    public function show(User $user): View
    {
        $user->loadCount(['reviews', 'reviewLikes']);

        $reviews = $user->reviews()
            ->with('product')
            ->latest()
            ->paginate(10, ['*'], 'reviews_page')
            ->withQueryString();

        $approvedReviewsCount = $user->reviews()->where('is_approved', true)->count();
        $avgRating = round((float) $user->reviews()->avg('rating'), 1);
        $productsReviewedCount = $user->reviews()->distinct('product_id')->count('product_id');
        $recommendedCount = $user->reviews()->where('would_recommend', true)->count();

        return view('admin.users.show', compact(
            'user',
            'reviews',
            'approvedReviewsCount',
            'avgRating',
            'productsReviewedCount',
            'recommendedCount',
        ));
    }
}
