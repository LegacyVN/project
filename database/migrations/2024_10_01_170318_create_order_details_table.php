<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('detail_id'); // Custom ID field
            $table->unsignedBigInteger('order_id'); // Foreign key for orders
            $table->unsignedBigInteger('product_id'); // Corrected to match convention
            $table->decimal('price', 8, 2)->nullable(); // Use DECIMAL for price
            $table->integer('quantity')->nullable(); // Use INTEGER for quantity
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Corrected to product_id
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
