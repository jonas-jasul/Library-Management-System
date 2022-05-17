<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorsController extends Controller
{
    public function storeAuthor (Request $request) {
        $validated=$request->validate([
            "name" =>"required|regex:/^[\pL\s\-]+$/u",
            "birthCountry" => "required",
            "dateOfBirth" => "required"

        ]);

        Author::create([
            "name" =>request("name"),
            "birthCountry" => request("birthCountry"),
            "dateOfBirth" =>request("dateOfBirth")
        ]);
        return redirect("/authors");
    }

    public function index() {
        // $authors= Author::all();
        $authors=Author::sortable()->paginate();
        return view("authors", compact("authors"));
    }

    public function editForm($id) {
        $author = Author::where("id", $id)->firstOrFail();
        return view("editAuthor", compact("author"));
    }

    public function edit(Request $request, $id) {
        $validated = $request->validate([
            'name' => "required|max:255|regex:/^[\pL\s\-]+$/u",
            'birthCountry'=>"required|max:255",
            'dateOfBirth'=>"required|max:255"

        ]);

        $author = Author::where("id", $id)->firstOrFail();

        $author->name=request("name");
        $author->birthCountry=request("birthCountry");        
        $author->dateOfBirth=request("dateOfBirth");

        $author->save();

        return redirect("/authors");
    }

    public function removeForm($id) {
        $author=Author::where("id", $id)->firstOrFail();

        return view("removeAuthor", compact("author"));
    }

    public function remove($id) {
        $author= Author::where("id", $id)->firstOrFail();

        $author->delete();

        return redirect("/authors");
    }
}
