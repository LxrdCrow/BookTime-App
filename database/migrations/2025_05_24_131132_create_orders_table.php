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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->index();

        $table->string('order_number')->unique();
        $table->decimal('total_price', 10, 2);
        $table->decimal('discount_amount', 10, 2)->default(0.00);
        $table->decimal('tax_amount', 10, 2)->default(0.00);
        $table->decimal('shipping_cost', 10, 2)->default(0.00);
        $table->string('currency', 3)->default('USD');

        $table->string('status')->default('pending'); // pending, completed, cancelled
        $table->timestamp('ordered_at')->nullable();
        $table->timestamp('completed_at')->nullable();
        $table->timestamp('cancelled_at')->nullable();

        $table->string('payment_method')->nullable(); 
        $table->string('payment_status')->default('unpaid'); // unpaid, paid, refunded

        $table->string('shipment_status')->default('not_shipped'); // not_shipped, shipped, delivered
        $table->string('shipment_provider')->nullable(); 
        $table->string('tracking_number')->nullable();
        $table->string('shipment_tracking_url')->nullable();

        $table->string('shipping_address')->nullable();
        $table->string('billing_address')->nullable();
        $table->string('customer_email')->nullable();

        $table->text('status_message')->nullable();
        $table->text('notes')->nullable();
        $table->text('gift_message')->nullable();
        $table->boolean('gift_wrap')->default(false);

        $table->string('coupon_code')->nullable();
        $table->string('referral_code')->nullable();
        $table->string('affiliate_id')->nullable();

        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
