<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings'; // Specify the table name if needed

    protected $fillable = [
        'rate_comment',
        'rate_score',
        'user_id',
        'product_id',
    ];

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define a relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
