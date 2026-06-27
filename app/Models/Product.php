<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'brand',
        'category_id',
        'image',
        'description',
        'where_to_buy',
        'rating_avg',
        'rating_count',
        'is_approved',
    ];

    protected function casts(): array
    {
        return [
            'rating_avg'  => 'float',
            'is_approved' => 'boolean',
        ];
    }

    // ─── Relations ───────────────────────────────────────────

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // ─── Scopes ──────────────────────────────────────────────

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeByCategory($query, $categorySlug)
    {
        return $query->whereHas('category', fn($q) => $q->where('slug', $categorySlug));
    }

    public function scopeSearch($query, string $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('brand', 'like', "%{$term}%");
        });
    }

    // ─── Helpers ─────────────────────────────────────────────

    public function updateRatingCache(): void
    {
        $result = $this->reviews()->selectRaw('AVG(rating) as avg, COUNT(*) as count')->first();

        $this->update([
            'rating_avg'   => round($result->avg ?? 0, 2),
            'rating_count' => $result->count ?? 0,
        ]);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/product-placeholder.png');
    }
}
