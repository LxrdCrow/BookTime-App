<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock'];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function isAvailable(): bool
    {
        return $this->stock > 0;
    }

    public function scopeAvailable($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeSearch($query, string $term)
    {
        return $query->where('name', 'like', '%' . $term . '%')
                     ->orWhere('description', 'like', '%' . $term . '%');
    }

    public function scopeOrderByPrice($query, string $direction = 'asc')
    {
        return $query->orderBy('price', $direction);
    }
}

