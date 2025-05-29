<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function scopeWithProducts($query)
    {
        return $query->with('products:id,name,price,category_id');
    }

    public function scopeByName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    public function scopeById($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeByIds($query, array $ids)
    {
        return $query->whereIn('id', $ids);
    }

    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeBySlugs($query, array $slugs)
    {
        return $query->whereIn('slug', $slugs);
    }

    public function scopeWithProductCount($query)
    {
        return $query->withCount('products');
    }

    public function scopeWithProductCountAndDetails($query)
    {
        return $query
            ->withCount('products')
            ->with('products:id,name,price,category_id');
    }
}

