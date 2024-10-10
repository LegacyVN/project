<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public $table = "products";
    protected $primarykey = "id";
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'category_id',
        'quantity',
        'discount_price',
        'status',
        'created_at'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    // Define a relationship with the Category model (if you have one)/
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    // In Products model
    public function photos()
    {
        return $this->hasMany(Photo::class, 'product_id'); // Ensure this uses 'product_id'
    }


    // You can add additional methods or scopes here as needed
}
