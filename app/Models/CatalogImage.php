<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'image_url',
        'alt_text',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'sort_order',
        'is_primary',
    ];

    // Relasi: image milik satu katalog
    public function catalogItem()
    {
        return $this->belongsTo(CatalogItem::class, 'item_id');
    }
}
