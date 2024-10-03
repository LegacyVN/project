<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts'; // Specify the table name if different from the default

    protected $fillable = [
        'user_id',
        'contact_name',
        'contact_email',
        'contact_comment',
    ];

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
