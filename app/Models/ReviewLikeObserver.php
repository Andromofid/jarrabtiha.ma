<?php

namespace App\Observers;

use App\Models\ReviewLike;

class ReviewLikeObserver
{
    /**
     * Recalcule le cache likes_count sur la review
     * après chaque like / unlike.
     */
    public function created(ReviewLike $reviewLike): void
    {
        $reviewLike->review->updateLikesCache();
    }

    public function deleted(ReviewLike $reviewLike): void
    {
        $reviewLike->review->updateLikesCache();
    }
}
