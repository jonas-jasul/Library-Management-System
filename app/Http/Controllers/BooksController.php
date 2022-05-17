<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use DB;
class BooksController extends Controller
{

    //leidziama tik prisijungusiam vartotojui
    //except naudojamas, kad leisti visiems 
    // public function __construct()
    // {
    //     $this->middleware(['auth'])->except("index");
    // }
    public function index()
    {
        // $books = Book::all();
        $books=Book::sortable()->paginate();
        return view("books", compact("books"));
    }

   

    public function addBooks()
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $categories = Category::all();
        return view("addBooks", compact("publishers", "authors", "categories"));
    }

    public function store(Request $request)
    {
        //dd($request);
        $validated = $request->validate([
            "title" => "required|max:255",
            "publisher_id" => "required|max:255",
            "category_id" => "required",
            "author_id" => "required|max:255",
            "status" => "Y"
        ]);

        Book::create([
            "title" => request("title"),
            "publisher_id" => request("publisher_id"),
            "category_id" => request("category_id"),
            "author_id" => request("author_id"),
            "status" => "Y"
            

        ]);
        return redirect("/books");
    }

    public function editForm($id)
    {
        $book = Book::where("id", $id)->firstOrFail();
        $publishers=Publisher::all();
        $categories=Category::all();
        $authors=Author::all();
        return view("editBooks", compact("book", "publishers", "categories", "authors"));
    }

    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => "required|max:255",
            'publisher_id' => "required|max:255",
            'category_id' => "required",
            'author_id' => "required|max:255"

        ]);

        $book = Book::where("id", $id)->firstOrFail();

        $book->title = request("title");
        $book->publisher_id = request("publisher_id");
        $book->category_id = request("category_id");
        $book->author_id = request("author_id");
        // $book->status = request("status");

        $book->save();

        return redirect("/books");
    }

    public function removeForm($id)
    {
        $book = Book::where("id", $id)->firstOrFail();

        return view("removeBooks", compact("book"));
    }

    public function remove($id)
    {
        $book = Book::where("id", $id)->firstOrFail();

        $book->delete();

        return redirect("/books");
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $books = Book::query();

        if ($request) {
            $books = $books->where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhereHas('publisher', function($query) use($keyword) {
                    $query->where('publisherName', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhereHas('category', function($query) use($keyword) {
                    $query->where('categoryName', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhereHas('author', function($query) use($keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                });
        }
        
        $books = $books->get();

    return view("books", compact("books"));
    }

}
