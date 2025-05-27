<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // Relazione con OrderItem (un ordine ha molti items)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

