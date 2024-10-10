<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $table = "categories";
    protected $primarykey = "id";
    protected $fillable = [
        'cat_name',
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
