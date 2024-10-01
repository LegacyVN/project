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
        'price',
        'quantity',
        'category_id', // Ensure this is the correct column name
        'image',
        'discount_price'
    ];

    // Define the relationship with Category
    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id', 'id');
    // }
    // In Product.php model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
