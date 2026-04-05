<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'book_id', 'borrowed_at', 'returned_at'];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function book(){
        return $this->belongsTo(Book::class, 'book_id');
    }
}
