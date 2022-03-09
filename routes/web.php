<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

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

Route::get("/books", [BooksController::class, "index"]);

Route::get("/books/add", [BooksController::class, "addBooks"]);

Route::post("/books/add", [BooksController::class, "store"]);
Route::get("/books/edit/{id}", [BooksController::class, "editForm"]);
Route::post("/books/edit/{id}", [BooksController::class, "edit"]);
Route::get("/books/remove/ask/{id}", [BooksController::class, "removeForm"]);
Route::get("/books/remove/{id}", [BooksController::class, "remove"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
