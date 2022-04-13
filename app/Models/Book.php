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
        "publisher",
        "category",        
        "author",
        "status"
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function issues() {
        return $this->hasMany(Book_issue::class);
    }
    public function book():BelongsTo
    {
        return $this->belongsTo(Book::class, 'id');
    }

}
