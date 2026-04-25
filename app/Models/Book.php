<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'category', 'class', 'price', 'base_price', 'stock', 'image', 'desc'
    ];
}
