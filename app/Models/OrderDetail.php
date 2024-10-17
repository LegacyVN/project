<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details'; // Specify the table name if needed

    protected $primaryKey = 'detail_id';
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id'); // Giả sử bảng products có cột id là khóa chính
    }
}
