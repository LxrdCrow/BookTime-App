<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Order::factory(100)->create()->each(function ($order) {
            $order->items()->saveMany(
                \App\Models\OrderItem::factory(rand(1, 5))->make()
            );
        });
    }
}

