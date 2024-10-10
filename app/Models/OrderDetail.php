<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details'; // Specify the table name if needed

    protected $primarykey = 'detail_id';
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
    ];

    // Define a relationship with the Order model
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    // Define a relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
