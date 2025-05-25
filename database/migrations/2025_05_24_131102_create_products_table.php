<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2);
        $table->unsignedBigInteger('category_id');
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->string('sku')->unique()->nullable(); // Stock Keeping Unit, unique identifier for the product
        $table->string('barcode')->unique()->nullable(); // Barcode for the product
        $table->string('image')->nullable(); // URL or path to the product image
        $table->integer('stock_quantity')->default(0); // Quantity available in stock
        $table->boolean('is_active')->default(true); // Indicates if the product is active or not
        $table->boolean('is_featured')->default(false); // Indicates if the product is featured
        $table->boolean('is_on_sale')->default(false); // Indicates if the product is on sale
        $table->decimal('sale_price', 8, 2)->nullable(); // Sale price if the product is on sale
        $table->date('sale_start_date')->nullable(); // Start date for the sale
        $table->date('sale_end_date')->nullable(); // End date for the sale
        $table->timestamps();

        $table->softDeletes(); // Soft delete column
        $table->index(['name', 'category_id']); // Index for faster search by name and category
    });
}
public function down()
{
    Schema::dropIfExists('products');
}
};


