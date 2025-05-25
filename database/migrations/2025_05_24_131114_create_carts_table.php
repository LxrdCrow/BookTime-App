<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('session_id')->nullable();
            $table->string('status')->default('active'); // e.g., active, completed, abandoned
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->integer('total_items')->default(0);
            $table->text('notes')->nullable(); // Additional notes or instructions
            $table->timestamp('completed_at')->nullable(); // Timestamp for when the cart was completed
            $table->timestamp('abandoned_at')->nullable(); // Timestamp for when the cart was abandoned
            $table->string('coupon_code')->nullable(); // Optional coupon code applied to the cart
            $table->decimal('discount_amount', 10, 2)->default(0.00); // Discount amount applied to the cart
            $table->string('currency', 3)->default('EUR'); // Currency code for the cart, e.g., EUR, USD
            $table->string('shipping_method')->nullable(); // Shipping method selected for the cart
            $table->decimal('shipping_cost', 10, 2)->default(0.00); // Shipping cost for the cart
            $table->string('payment_method')->nullable(); // Payment method selected for the cart
            $table->decimal('tax_amount', 10, 2)->default(0.00); // Tax amount applied to the cart
            $table->string('ip_address')->nullable(); // IP address of the user
            $table->string('user_agent')->nullable(); // User agent string for tracking device/browser
            $table->string('locale')->default('en'); // Locale for the cart, e.g., en, fr, es
            $table->string('referrer')->nullable(); // Referrer URL for tracking purposes
            $table->string('utm_source')->nullable(); // UTM source for marketing tracking
            $table->string('utm_medium')->nullable(); // UTM medium for marketing tracking
            $table->string('utm_campaign')->nullable(); // UTM campaign for marketing tracking
            $table->string('utm_term')->nullable(); // UTM term for marketing tracking
            $table->string('utm_content')->nullable(); // UTM content for marketing tracking
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
