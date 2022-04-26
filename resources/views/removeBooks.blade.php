@extends("layouts.main")

@section("content")


<div class="container">

    <h3 class="mt-3 mb-3 pt-2">Do you want to remove this book?</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title: {{$book->title}}</h5>
            <p class="card-text">Publisher: {{$book->publisher->publisherName}}</p>
            <p class="card-text">Author: {{$book->author->name}}</p>
            <p class="card-text">Category: {{$book->category->categoryName}}</p>
            <a href="/books" class="btn btn-danger">No</a>
            <a href="/books/remove/{{$book->id}}" class="btn btn-primary">Yes</a>
        </div>
    </div>
</div>

@endsection
