<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id('photo_id'); // Custom ID field
            $table->string('photo_name'); // Photo name field
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade'); // Foreign key to products, made nullable
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
