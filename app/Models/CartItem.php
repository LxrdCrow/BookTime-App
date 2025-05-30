<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    protected $appends = ['total_price'];

    /**
     * Get the cart that owns the cart item.
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the product that this cart item refers to.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Calculate the total price of the cart item.
     */
    public function getTotalPriceAttribute(): float
    {
        return $this->product ? $this->product->price * $this->quantity : 0;
    }

    /**
     * Add a quantity to the cart item.
     */
    public function addQuantity(int $quantity): void
    {
        $this->quantity += $quantity;
        $this->save();
    }

    /**
     * Update the quantity of the cart item.
     */
    public function updateQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
        $this->save();
    }

    /**
     * Remove the cart item.
     */
    public function remove(): void
    {
        $this->delete();
    }
}

