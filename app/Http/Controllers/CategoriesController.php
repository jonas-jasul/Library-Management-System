<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoriesController extends Controller
{
    public function storeCategory (Request $request) {
        $validated=$request->validate([
            "categoryName" =>"required"
        ]);

        Category::create([
            "categoryName"=>request("categoryName")
        ]);
        return redirect("/categories");
    }

    public function index() {
        $categories=Category::all();
        return view("categories", compact("categories"));
    }

    public function editForm($id) {
        $category = Category::where("id", $id)->firstOrFail();
        return view("editCategories", compact("category"));
    }

    public function edit(Request $request, $id) {
        $validated = $request->validate([            
            'categoryName'=>"required|max:255"

        ]);

        $category = Category::where("id", $id)->firstOrFail();

        $category->categoryName=request("categoryName");

        $category->save();

        return redirect("/categories");
    }

    public function removeForm($id) {
        $category=Category::where("id", $id)->firstOrFail();

        return view("removeCategory", compact("category"));
    }

    public function remove($id) {
        $category= Category::where("id", $id)->firstOrFail();

        $category->delete();

        return redirect("/categories");
    }

}
