<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    // Define the relationship with Product
    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'category_id', 'id');
    // }
    // In Category.php model
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
