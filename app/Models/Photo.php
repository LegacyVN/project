<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos'; // Specify the table name if needed

    protected $fillable = [
        'photo_name',
        'product_id',
    ];

    // Define a relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
