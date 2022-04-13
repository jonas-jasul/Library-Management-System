<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublishersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addCategory', function () {
    return view('addCategory');
});

Route::get("/addAuthor", function() {
    return view('addAuthor');
});

Route::get("/publishers/add", function() {
    return view('addPublisher');
});

Route::get("/categories/add", function() {
    return view('addCategory');
});

Route::get("/authors/add", function() {
    return view("addAuthor");
});

Route::get("/issueBook/add", function() {
    return view("issueBook");
});

Route::get("/books", [BooksController::class, "index"]);
Route::get("/books/add", [BooksController::class, "addBooks"]);
Route::post("/books/add", [BooksController::class, "store"]);

Route::get("/issueBook/", [BookIssueController::class, "index"]);
Route::get("/issueBook/add", [BookIssueController::class, "addIssue"]);
Route::post("/issueBook/add", [BookIssueController::class, "store"]);

Route::get("/publishers", [PublishersController::class, "index"]);
Route::post("/addAuthor", [AuthorsController::class, "storeAuthor"]);
// Route::post("/addCategory", [CategoriesController::class, "storeCategory"]);
Route::post("/publishers/add", [PublishersController::class, "storePublisher"]);

Route::get("/books/edit/{id}", [BooksController::class, "editForm"]);
Route::post("/books/edit/{id}", [BooksController::class, "edit"]);
Route::get("/books/remove/ask/{id}", [BooksController::class, "removeForm"]);
Route::get("/books/remove/{id}", [BooksController::class, "remove"]);

Route::get("/publishers/edit/{id}", [PublishersController::class, "editForm"]);
Route::post("/publishers/edit/{id}", [PublishersController::class, "edit"]);
Route::get("/publishers/remove/ask/{id}", [PublishersController::class, "removeForm"]);
Route::get("/publishers/remove/{id}", [PublishersController::class, "remove"]);

Route::get("/categories", [CategoriesController::class, "index"]);
Route::post("/categories/add", [CategoriesController::class, "storeCategory"]);
Route::get("/categories/edit/{id}", [CategoriesController::class, "editForm"]);
Route::post("/categories/edit/{id}", [CategoriesController::class, "edit"]);
Route::get("/categories/remove/ask/{id}", [CategoriesController::class, "removeForm"]);
Route::get("/categories/remove/{id}", [CategoriesController::class, "remove"]);

Route::get("/authors", [AuthorsController::class, "index"]);
Route::post("/authors/add", [AuthorsController::class, "storeAuthor"]);
Route::get("/authors/edit/{id}", [AuthorsController::class, "editForm"]);
Route::post("/authors/edit/{id}", [AuthorsController::class, "edit"]);
Route::get("/authors/remove/ask/{id}", [AuthorsController::class, "removeForm"]);
Route::get("/authors/remove/{id}", [AuthorsController::class, "remove"]);

Route::get("/dashboard", [DashboardController::class, "index"])->name('dashboard');
Route::get("/viewMembers", [UsersController::class, "viewMembers"]);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



// Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
// Route::get('/logout', 'Auth\LoginController@logout');
// Route::group(['middleware' => 'auth'], function() {
//     Route::group(['middleware' => 'role:user', 'as' => 'user'], function() {
//         Route::resource('books', UserController::class);
//     });
//     Route::group(['middleware' => 'role:admin', 'as' => 'admin'], function() {
//         Route::resource('books', AdminContro ller::class);
//     });
// });
