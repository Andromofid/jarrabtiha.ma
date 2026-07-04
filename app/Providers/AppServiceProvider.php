<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Review;
use App\Models\ReviewLike;
use App\Observers\ReviewObserver;
use App\Observers\ReviewLikeObserver;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
        Review::observe(ReviewObserver::class);
        ReviewLike::observe(ReviewLikeObserver::class);
    }
}
