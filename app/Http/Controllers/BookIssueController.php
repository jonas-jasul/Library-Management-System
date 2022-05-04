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

    public function editBookIssueForm($id) {
        $issues = Book_issue::where("id", $id)->firstOrFail();        
        return view("editIssueBook", compact("issues"));
    }

    public function returnBookIssue($id) {

        $issue= Book_issue::find($id);
        $issue->update(['status'=>'Y']);
        $issue->save();

        return redirect("/issueBook");
    }
    
    public function store (Request $request) {
        $issue_date = date('Y-m-d');   
        $return_date = date('Y-m-d', strtotime("+" . 30 . "days"));   
        $data = book_issue::create( [
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'issue_date' => $issue_date,
            'status'=>"N",
            'return_date' => $return_date            
        ]);
        $data->save();
        // $book = book::find($request->book);
        // $book->status="N";
        // $book->save();
        
        return redirect("/issueBook");
    }

    public function index() {
        // $issues=Book_issue::all();
        $books=Book_issue::sortable()->paginate();       
        return view("viewIssueBook", compact("books"));
    }

    public function searchIssue(Request $request)
    {
        $keyword = $request->input('searchIssue');
        $books = Book_issue::query();

        if ($request) {
            $books = $books->where('id', 'LIKE', '%' . $keyword . '%')
                ->orWhereHas('user', function($query) use($keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhereHas('book', function($query) use($keyword) {
                    $query->where('title', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhereHas('user', function($query) use($keyword) {
                    $query->where('member_phone_num', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhereHas('user', function($query) use($keyword) {
                    $query->where('email', 'LIKE', '%' . $keyword . '%');
                });
        }
        
        $books = $books->get();

    return view("viewIssueBook", compact("books"));
    }
}
