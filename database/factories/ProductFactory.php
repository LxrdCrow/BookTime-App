<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
    {
        $name = $this->faker->words(3, true);
        $isOnSale = $this->faker->boolean(30); // 30% dei prodotti sono in saldo

        return [
            'name' => ucfirst($name),
            'description' => $this->faker->optional()->paragraph(),
            'price' => $price = $this->faker->randomFloat(2, 10, 500),
            'category_id' => \App\Models\Category::factory(), // Relazione con category
            'sku' => strtoupper(Str::random(8)),
            'barcode' => $this->faker->unique()->ean13(),
            'image' => $this->faker->optional()->imageUrl(640, 480, 'product'),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'is_active' => $this->faker->boolean(90),
            'is_featured' => $this->faker->boolean(20),
            'is_on_sale' => $isOnSale,
            'sale_price' => $isOnSale ? $this->faker->randomFloat(2, 5, $price - 1) : null,
            'sale_start_date' => $isOnSale ? $this->faker->dateTimeBetween('-1 month', 'now') : null,
            'sale_end_date' => $isOnSale ? $this->faker->dateTimeBetween('now', '+1 month') : null,
        ];
    }
}
