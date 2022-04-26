<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "publisher_id",
        "category_id",        
        "author_id",
        "status"
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author() {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function issues() {
        return $this->hasMany(Book_issue::class);
    }
    // public function book():BelongsTo
    // {
    //     return $this->belongsTo(Book::class, 'book_id');
    // }

}
