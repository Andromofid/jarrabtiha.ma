<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',

        'guest_name',
        'guest_email',
        'guest_phone',
        'guest_token',
        'ip_address',

        'rating',
        'title',
        'body',
        'result_duration',
        'skin_type',
        'hair_type',
        'would_recommend',

        'verified',
        'is_approved',
        'likes_count',
    ];
    protected function casts(): array
    {
        return [
            'would_recommend' => 'boolean',
            'verified'        => 'boolean',
            'rating'          => 'integer',
            'is_approved'     => 'boolean',
        ];
    }

    // ─── Relations ───────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => $this->guest_name ?? 'Utilisatrice',
        ]);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function likes()
    {
        return $this->hasMany(ReviewLike::class);
    }

    // ─── Scopes ──────────────────────────────────────────────

    public function scopeVerified($query)
    {
        return $query->where('verified', true);
    }

    public function scopeForSkinType($query, string $skinType)
    {
        return $query->where('skin_type', $skinType);
    }

    public function scopeForHairType($query, string $hairType)
    {
        return $query->where('hair_type', $hairType);
    }

    public function scopeMostLiked($query)
    {
        return $query->orderByDesc('likes_count');
    }
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    // ─── Helpers ─────────────────────────────────────────────

    public function updateLikesCache(): void
    {
        $this->update([
            'likes_count' => $this->likes()->count(),
        ]);
    }

    public function getResultDurationLabelAttribute(): string
    {
        return match ($this->result_duration) {
            '1week'   => '1 semaine',
            '2weeks'  => '2 semaines',
            '1month'  => '1 mois',
            '3months' => '3 mois',
            'more'    => 'Plus de 3 mois',
            default   => 'Non précisé',
        };
    }

    public function getStarsAttribute(): string
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }
}
