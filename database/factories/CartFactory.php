<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
    {
        $totalItems = $this->faker->numberBetween(1, 10);
        $status = $this->faker->randomElement(['active', 'completed', 'abandoned']);
        $isCompleted = $status === 'completed';
        $isAbandoned = $status === 'abandoned';

        return [
            'user_id' => \App\Models\User::factory(),
            'session_id' => $this->faker->uuid(),
            'status' => $status,
            'total_amount' => $amount = $this->faker->randomFloat(2, 20, 500),
            'total_items' => $totalItems,
            'notes' => $this->faker->optional()->sentence(),
            'completed_at' => $isCompleted ? $this->faker->dateTimeBetween('-1 week', 'now') : null,
            'abandoned_at' => $isAbandoned ? $this->faker->dateTimeBetween('-1 week', 'now') : null,
            'coupon_code' => $this->faker->optional()->lexify('COUPON-????'),
            'discount_amount' => $this->faker->randomFloat(2, 0, 50),
            'currency' => 'EUR',
            'shipping_method' => $this->faker->optional()->randomElement(['standard', 'express', 'pickup']),
            'shipping_cost' => $this->faker->randomFloat(2, 0, 20),
            'payment_method' => $this->faker->optional()->randomElement(['paypal', 'credit_card', 'cash_on_delivery']),
            'tax_amount' => $this->faker->randomFloat(2, 0, 50),
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
            'locale' => $this->faker->randomElement(['en', 'it', 'fr', 'es']),
            'referrer' => $this->faker->optional()->url(),
            'utm_source' => $this->faker->optional()->word(),
            'utm_medium' => $this->faker->optional()->word(),
            'utm_campaign' => $this->faker->optional()->word(),
            'utm_term' => $this->faker->optional()->word(),
            'utm_content' => $this->faker->optional()->word(),
        ];
    }
}
