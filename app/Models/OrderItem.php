<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal:2',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeWithProductDetails($query)
    {
        return $query->with('product:id,name,price');
    }

    public function scopeWithOrderDetails($query)
    {
        return $query->with('order:id,user_id,total_amount,status');
    }

    public function scopeWithUserDetails($query)
    {
        return $query->with('order.user:id,name,email');
    }

    public function scopeWithAllDetails($query)
    {
        return $query->with([
            'product:id,name,price',
            'order:id,user_id,total_amount,status',
            'order.user:id,name,email',
        ]);
    }

    public function scopeByOrderId($query, $orderId)
    {
        return $query->where('order_id', $orderId);
    }

    public function scopeByProductId($query, $productId)
    {
        return $query->where('product_id', $productId);
    }

    public function scopeByUserId($query, $userId)
    {
        return $query->whereHas('order.user', function ($q) use ($userId) {
            $q->where('id', $userId);
        });
    }

    public function scopeWithQuantityAndPrice($query)
    {
        return $query->select('id', 'order_id', 'product_id', 'quantity', 'price');
    }
}