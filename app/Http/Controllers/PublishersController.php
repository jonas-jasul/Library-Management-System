<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
class PublishersController extends Controller
{
    public function storePublisher (Request $request) {
        $validated=$request->validate([
            "publisherName" => "required"
        ]);

        Publisher::create([
            "publisherName"=>request("publisherName")
        ]);
        return redirect("/publishers");
    }

    public function index() {
        // $publishers=Publisher::all();
        $publishers=Publisher::sortable()->paginate();
        return view("publishers", compact("publishers"));
    }

    public function create() {
        $publishers= Publisher::pluck('publisherName');
        return view('/books', compact('publishers'));
    }

    public function editForm($id) {
        $publisher = Publisher::where("id", $id)->firstOrFail();
        return view("editPublishers", compact("publisher"));
    }

    public function edit(Request $request, $id) {
        $validated = $request->validate([            
            'publisherName'=>"required|max:255"

        ]);

        $publisher = Publisher::where("id", $id)->firstOrFail();

        $publisher->publisherName=request("publisherName");

        $publisher->save();

        return redirect("/publishers");
    }

    public function removeForm($id) {
        $publisher=Publisher::where("id", $id)->firstOrFail();

        return view("removePublisher", compact("publisher"));
    }

    public function remove($id) {
        $publisher= Publisher::where("id", $id)->firstOrFail();

        $publisher->delete();

        return redirect("/publishers");
    }

}
