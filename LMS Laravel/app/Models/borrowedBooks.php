<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowedBooks extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'user_id', 'borrowed_date', 'return_date', 'status'];

    public function book()
    {
        return $this->belongsTo(booksTables::class);
    }
}
