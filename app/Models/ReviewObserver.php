<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    /**
     * Recalcule le cache rating_avg / rating_count sur le produit
     * après chaque création, mise à jour ou suppression d'une review.
     */
    public function created(Review $review): void
    {
        $review->product->updateRatingCache();
    }

    public function updated(Review $review): void
    {
        $review->product->updateRatingCache();
    }

    public function deleted(Review $review): void
    {
        $review->product->updateRatingCache();
    }
}
