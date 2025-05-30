<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart_product')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalPriceAttribute(): float
    {
        return $this->products->sum(fn($product) =>
            $product->price * $product->pivot->quantity
        );
    }

    public function getTotalQuantityAttribute(): int
    {
        return $this->products->sum(fn($product) =>
            $product->pivot->quantity
        );
    }

    public function getProductsWithQuantitiesAttribute(): array
    {
        return $this->products->mapWithKeys(fn($product) =>
            [$product->id => $product->pivot->quantity]
        )->toArray();
    }

    public function getProductsWithDetailsAttribute(): array
    {
        return $this->products->map(fn($product) => [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $product->pivot->quantity,
            'total_price' => $product->price * $product->pivot->quantity,
        ])->toArray();
    }

    public function addProduct(Product $product, int $quantity = 1): void
    {
        $existing = $this->products()->where('product_id', $product->id)->exists();

        if ($existing) {
            $this->updateProductQuantity($product, $quantity);
        } else {
            $this->products()->attach($product->id, ['quantity' => $quantity]);
        }
    }

    public function updateProductQuantity(Product $product, int $quantity): void
    {
        $this->products()->updateExistingPivot($product->id, ['quantity' => $quantity]);
    }

    public function removeProduct(Product $product): void
    {
        $this->products()->detach($product->id);
    }

    public function clear(): void
    {
        $this->products()->detach();
    }

    public function isEmpty(): bool
    {
        return $this->products->isEmpty();
    }
}

