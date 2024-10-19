<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details'; 

    protected $primaryKey = 'detail_id';
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
    ];

    //Define Relationships
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id'); // Giả sử bảng products có cột id là khóa chính
    }

    //More function
    public function count_products($products, $id)
    {
        $total = 0;
        foreach ($products as $product) {
            if ($product->product_id == $id) {
                $total++;
            }
        }
        return $total;
    }
}
