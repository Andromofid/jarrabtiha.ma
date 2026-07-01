<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
            'title' => ['nullable', 'string', 'max:120'],
            'body' => ['required', 'string', 'min:10', 'max:2000'],
            'result_duration' => ['required', 'in:1week,2weeks,1month,3months,more'],
            'would_recommend' => ['nullable', 'boolean'],
        ]);

        $alreadyReviewed = Review::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->exists();

        if ($alreadyReviewed) {
            return back()
                ->withErrors(['review' => 'Vous avez déjà donné votre avis sur ce produit.'])
                ->withInput();
        }

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
}
