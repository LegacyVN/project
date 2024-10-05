<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name',
    ];

    // Define the relationship with Product
    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'category_id', 'id');
    // }
    // In Category.php model
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
