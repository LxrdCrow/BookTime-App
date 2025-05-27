<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
    {
        return [
            'name' => $name = $this->faker->unique()->words(2, true),
            'slug' => Str::slug($name),
            'description' => $this->faker->optional()->sentence(),
            'image' => $this->faker->optional()->imageUrl(640, 480, 'categories'),
            'is_active' => $this->faker->boolean(90),
            'parent_id' => null, // o logica ricorsiva in un secondo momento
            'sort_order' => $this->faker->numberBetween(0, 100),
            'is_featured' => $this->faker->boolean(20),
            'is_visible' => $this->faker->boolean(95),
            'is_deleted' => false,
            'meta_title' => $this->faker->optional()->sentence(3),
            'meta_description' => $this->faker->optional()->text(100),
            'meta_keywords' => $this->faker->optional()->words(3, true),
        ];
    }
}
