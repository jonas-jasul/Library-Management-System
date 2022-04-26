<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Book_issue;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $authors = Author::count();
        $publishers=Publisher::count();
        $categories=Category::count();
        $books=Book::count();
        $users=User::count();
        $issued_books=Book_issue::count();
        return view("dashboard", compact("authors", "publishers", "categories", "books", "users", "issued_books"))  ;
    }
}
