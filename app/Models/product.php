<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'category_id',
        'quantity',
        'discount_price',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    // Define a relationship with the Category model (if you have one)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // You can add additional methods or scopes here as needed
}
