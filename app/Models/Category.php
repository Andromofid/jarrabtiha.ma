<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'icon',
        'order',
    ];

    // ─── Relations ───────────────────────────────────────────

    /** Sous-catégories de cette catégorie */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('order');
    }

    /** Catégorie parente */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /** Produits directement liés à cette catégorie */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // ─── Scopes ──────────────────────────────────────────────

    /** Seulement les catégories parentes (niveau 1) */
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id')->orderBy('order');
    }

    /** Seulement les sous-catégories (niveau 2) */
    public function scopeChildren($query)
    {
        return $query->whereNotNull('parent_id')->orderBy('order');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // ─── Helpers ─────────────────────────────────────────────

    public function isParent(): bool
    {
        return is_null($this->parent_id);
    }

    public function isChild(): bool
    {
        return ! is_null($this->parent_id);
    }
}
