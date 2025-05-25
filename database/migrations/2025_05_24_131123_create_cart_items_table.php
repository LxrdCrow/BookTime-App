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
       
       Schema::create('cart_items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('cart_id');
        $table->unsignedBigInteger('product_id');
        $table->unsignedInteger('quantity')->default(1);
        $table->decimal('price', 10, 2);
        $table->string('name');
        $table->string('image')->nullable();
        $table->string('options')->nullable();
        $table->timestamps();

        $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->unique(['cart_id', 'product_id']);
        $table->index('cart_id');
        $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
    
