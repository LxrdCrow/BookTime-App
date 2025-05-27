<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalItems = $this->faker->numberBetween(1, 10);


        return [
            'cart_id' => \App\Models\Cart::factory(),
            'product_id' => \App\Models\Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'name' => $this->faker->word(),
            'image' => $this->faker->optional()->imageUrl(640, 480, 'products'),
            'options' => json_encode($this->faker->optional()->words(3)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
