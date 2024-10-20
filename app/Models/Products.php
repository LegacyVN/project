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

    // Define a relationships
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class, 'product_id'); // Ensure this uses 'product_id'
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

}
