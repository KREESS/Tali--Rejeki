<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'file_url',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    // Relasi: file milik satu katalog
    public function catalogItem()
    {
        return $this->belongsTo(CatalogItem::class, 'item_id');
    }
}
