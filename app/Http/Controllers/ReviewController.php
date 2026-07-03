<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateReview($request);

        $alreadyReviewed = Review::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->exists();

        // if ($alreadyReviewed) {
        //     return back()
        //         ->withErrors(['review' => 'Vous avez dÃ©jÃ  donnÃ© votre avis sur ce produit.'])
        //         ->withInput();
        // }

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'rating' => $validated['rating'],
            'title' => $validated['title'] ?? null,
            'body' => $validated['body'],
            'result_duration' => $validated['result_duration'],
            'would_recommend' => $request->boolean('would_recommend'),
            'verified' => false,
            'likes_count' => 0,
        ]);

        $product->update([
            'rating_avg' => $product->reviews()->avg('rating') ?? 0,
            'rating_count' => $product->reviews()->count(),
        ]);

        return back()->with('success', 'Merci ! Votre avis a été publié.');
    }

    public function edit(Review $review): View
    {
        abort_unless($review->user_id === auth()->id(), 403);

        $review->load('product');

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review): RedirectResponse
    {
        abort_unless($review->user_id === auth()->id(), 403);

        $validated = $this->validateReview($request);

        $review->update([
            'rating' => $validated['rating'],
            'title' => $validated['title'] ?? $review->title,
            'body' => $validated['body'],
            'result_duration' => $validated['result_duration'],
            'would_recommend' => $request->boolean('would_recommend'),
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Votre avis a été mis à jour.');
    }

    private function validateReview(Request $request): array
    {
        return $request->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
            'title' => ['nullable', 'string', 'max:120'],
            'body' => ['required', 'string', 'min:10', 'max:2000'],
            'result_duration' => ['required', 'in:1week,2weeks,1month,3months,more'],
            'would_recommend' => ['nullable', 'boolean'],
        ]);
    }
}
