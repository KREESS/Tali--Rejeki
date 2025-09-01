<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_robots',
        'canonical_url',
        'status',
        'published_at',
        'og_image_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /** Eager load biar hemat query saat listing */
    protected $with = [
        'primaryImage',
    ];

    /** Biar accessor kebaca di JSON/API */
    protected $appends = [
        'og_image_url',
    ];

    /** Route model binding pakai slug */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /** Semua gambar (urutan stabil: sort_order lalu id) */
    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class, 'gallery_id')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    /** Gambar primary (dijaga unik di DB) */
    public function primaryImage(): HasOne
    {
        return $this->hasOne(GalleryImage::class, 'gallery_id')
            ->where('is_primary', true);
    }

    /** OG image spesifik (kalau di-set) */
    public function ogImage(): BelongsTo
    {
        return $this->belongsTo(GalleryImage::class, 'og_image_id');
    }

    /** Hanya entri published & sudah saatnya tayang */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    /** Accessor: URL OG (fallback ke primary) */
    protected function ogImageUrl(): Attribute
    {
        return Attribute::get(function () {
            // Gunakan relasi yang sudah diload dulu (hemat query)
            if ($this->relationLoaded('ogImage') && $this->ogImage) {
                return $this->ogImage->image_url;
            }
            if ($this->relationLoaded('primaryImage') && $this->primaryImage) {
                return $this->primaryImage->image_url;
            }

            // Fallback query cepat kalau relasi belum diload
            $og = $this->ogImage()->value('image_url');
            if ($og) return $og;

            return $this->primaryImage()->value('image_url');
        });
    }

    /** Auto-generate slug unik dari title jika kosong */
    protected static function booted(): void
    {
        static::saving(function (Gallery $gallery) {
            if (blank($gallery->slug) && filled($gallery->title)) {
                $base = Str::slug($gallery->title);
                $slug = $base;
                $i = 2;

                // Hindari duplikat slug (abaikan diri sendiri saat update)
                while (static::where('slug', $slug)
                    ->when($gallery->exists, fn($q) => $q->where('id', '!=', $gallery->id))
                    ->exists()
                ) {
                    $slug = "{$base}-{$i}";
                    $i++;
                }

                $gallery->slug = $slug;
            }
        });
    }
}
