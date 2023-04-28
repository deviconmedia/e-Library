<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Book;
use App\Models\History;
class Borrower extends Model
{
    use HasFactory;
    protected $table = 'borrowers';
    protected $guarded = ['created_at', 'updated_at'];

    public function member(){
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function book(){
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
