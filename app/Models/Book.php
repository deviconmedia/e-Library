<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    //relasi belongsTo ke tabel categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    //relasi belongsTo ke tabel publishers
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }
}


