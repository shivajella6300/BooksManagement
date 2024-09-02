<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBooks extends Model
{
    use HasFactory;
    protected $table="borrowed_books";
    protected $primaryKey="borrow_id";
    protected $fillable = [
        'borrow_id', 'user_id', 'book_id',
        'borrowed_at','returned_at','status'
    ];
}
