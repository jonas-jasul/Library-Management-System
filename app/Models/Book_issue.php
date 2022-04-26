<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book_issue extends Model
{
    use HasFactory;

    

    public function book():BelongsTo {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function user():BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        "user_id",
        "book_id",
        "issue_date",
        "return_date",
        "status",
        "return_day"
        
    ];
}
