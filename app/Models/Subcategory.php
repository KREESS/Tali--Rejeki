<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'meta_title', 'meta_description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // app/Models/Category.php (juga di Subcategory.php & Product.php)
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
