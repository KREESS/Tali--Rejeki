<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    // Relasi: satu item punya banyak file
    public function files()
    {
        return $this->hasMany(CatalogFile::class, 'item_id');
    }

    // Relasi: satu item punya banyak gambar
    public function images()
    {
        return $this->hasMany(CatalogImage::class, 'item_id');
    }
}
