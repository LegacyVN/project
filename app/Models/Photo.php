<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos'; 

    protected $fillable = [
        'photo_name',
        'product_id',
    ];

    protected $primaryKey = 'photo_id';

    // Define relationships
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
