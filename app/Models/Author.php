<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Author extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = [
        "name",
        "birthCountry",
        "dateOfBirth"
    ];

    public $sortable = [
        "name",
        "birthCountry",
        "dateOfBirth"
    ];
}
