<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    //leidziama tik prisijungusiam vartotojui
    //except naudojamas, kad leisti visiems 
    // public function __construct()
    // {
    //     $this->middleware(['auth'])->except("index");
    // }
    public function index() {
        $books= Book::all();
        return view("books", compact("books"))  ;
    }

    public function addBooks() {
        return view("addBooks");
    }

    public function store (Request $request) {
        //dd($request);
        $validated = $request->validate([
            "title" => "required|max:255",
            "publisher" => "required|max:255",
            "author" => "required|max:255"
        ]);

        Book::create([
            "title" => request("title"),
            "publisher" => request("publisher"),
            "author" => request("author")

        ]);
        return redirect("/books");
    }

    public function editForm($id) {
        $book = Book::where("id", $id)->firstOrFail();
        return view("editBooks", compact("book"));
    }

    public function edit(Request $request, $id) {
        $validated = $request->validate([
            'title' => "required|max:255",
            'publisher'=>"required|max:255",
            'author'=>"required|max:255"

        ]);

        $book = Book::where("id", $id)->firstOrFail();

        $book->title=request("title");
        $book->publisher=request("publisher");
        $book->author=request("author");

        $book->save();

        return redirect("/books");
    }

    public function removeForm($id) {
        $book=Book::where("id", $id)->firstOrFail();

        return view("removeBooks", compact("book"));
    }

    public function remove($id) {
        $book= Book::where("id", $id)->firstOrFail();

        $book->delete();

        return redirect("/books");
    }
}
