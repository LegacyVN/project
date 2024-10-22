<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings'; // Specify the table name if needed

    protected $primaryKey = 'rate_id';
    protected $fillable = [
        'rate_comment',
        'rate_score',
        'user_id',
        'product_id',
        'created_at'
    ];

    // Define Relationships
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    // More function

    public function checkUser($user_id)
    {
        if($this->user_id == $user_id){
            return true;
        }
        return false;
    }
}
