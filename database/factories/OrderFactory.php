<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['pending', 'completed', 'cancelled'];
        $paymentStatuses = ['unpaid', 'paid', 'refunded'];
        $shipmentStatuses = ['not_shipped', 'shipped', 'delivered'];
        $currencies = ['USD', 'EUR', 'GBP', 'JPY'];

        $status = $this->faker->randomElement($statuses);

        return [
            'user_id' => \App\Models\User::factory(),
            'order_number' => $this->faker->unique()->bothify('ORD-####??'),
            'total_price' => $this->faker->randomFloat(2, 10, 1000),
            'discount_amount' => $this->faker->randomFloat(2, 0, 100),
            'tax_amount' => $this->faker->randomFloat(2, 0, 50),
            'shipping_cost' => $this->faker->randomFloat(2, 0, 20),
            'currency' => $this->faker->randomElement($currencies),
            'status' => $status,
            'ordered_at' => $orderedAt = $this->faker->dateTimeBetween('-1 month', 'now'),
            'completed_at' => $status === 'completed' ? $this->faker->dateTimeBetween($orderedAt, 'now') : null,
            'cancelled_at' => $status === 'cancelled' ? $this->faker->dateTimeBetween($orderedAt, 'now') : null,
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'payment_status' => $this->faker->randomElement($paymentStatuses),
            'shipment_status' => $this->faker->randomElement($shipmentStatuses),
            'shipment_provider' => $this->faker->optional()->randomElement(['UPS', 'FedEx', 'DHL']),
            'tracking_number' => $this->faker->optional()->numerify('TRACK-#####'),
            'shipment_tracking_url' => $this->faker->optional()->url(),
            'shipping_address' => $this->faker->address(),
            'billing_address' => $this->faker->address(),
            'customer_email' => $this->faker->unique()->safeEmail(),
            'status_message' => $this->faker->optional()->sentence(),
            'notes' => $this->faker->optional()->paragraph(),
            'gift_message' => $this->faker->optional()->sentence(),
            'gift_wrap' => $this->faker->boolean(),
            'coupon_code' => $this->faker->optional()->word(),
            'referral_code' => $this->faker->optional()->word(),
            'affiliate_id' => $this->faker->optional()->randomNumber(5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

}
