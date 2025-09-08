<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'subcategory_id',
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'brands',
        'price',
        'price_strike',
        'currency',
        'sku',
        'attr1',
        'attr2',
        'attr3',
        'attr4',
        'attr5',
        'attr6',
        'attr7',
        'attr8',
        'attr9',
        'attr10'
    ];

    protected $casts = [
        'brands' => 'array',
        'price'  => 'decimal:2',
        'price_strike' => 'decimal:2',
    ];

    // Relationships
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function category()
    {
        return $this->hasOneThrough(Category::class, Subcategory::class, 'id', 'id', 'subcategory_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    // Accessors for compatibility
    public function getDescriptionAttribute()
    {
        return $this->attr1 ?? $this->meta_description ?? '';
    }

    public function getSpecificationsAttribute()
    {
        return $this->attr2 ?? '';
    }

    public function getCategoryIdAttribute()
    {
        return $this->subcategory ? $this->subcategory->category_id : null;
    }
}
