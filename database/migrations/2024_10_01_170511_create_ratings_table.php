<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('rate_id'); // Custom ID field
            $table->text('rate_comment')->nullable(); // Optional comment field
            $table->float('rate_score')->nullable(); // Optional score field
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign key to products
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings'); // Adjusted for plural
    }
};
