<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'meta_title', 'meta_description'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    // app/Models/Category.php
    public function getRouteKeyName(): string
    {
        // Use ID for DELETE requests, slug for others
        return request()->isMethod('DELETE') ? 'id' : 'slug';
    }
}
