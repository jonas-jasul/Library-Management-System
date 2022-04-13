<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_issue;
use App\Models\User;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    public function addIssue() {
        $books= Book::all();
        $users=User::all();
        return view("issueBook", compact("books", "users"));
    }
    
    public function store (Request $request) {
        $issue_date = date('Y-m-d');   
        $return_date = date('Y-m-d');   
        $data = book_issue::create( [
            'user_id' => $request->user,
            'book_id' => $request->book,
            'issue_date' => $issue_date,
            'return_date' => $return_date
        ]);
        $data->save();
        $book = book::find($request->book);
        $book->status="N";
        $book->save();
        
        return redirect("/issueBook");
    }

    public function index() {
        // $issues=Book_issue::all();
        $books=Book::all();        
        return view("viewIssueBook", compact("books"));
    }
}
