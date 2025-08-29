<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_path',
        'alt_text',
        'is_primary',
        'sort_order'
    ];

    /**
     * Get the full URL for the image
     */
    public function getImageUrlAttribute()
    {
        return asset($this->image_path);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
