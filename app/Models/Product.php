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

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }
}
