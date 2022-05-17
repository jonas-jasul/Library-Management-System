@extends("layouts.main")

@section("content")


<div class="container">

    <h3 class="mt-3 mb-3 pt-2">Do you want to return this book issue?</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Book title: {{$issue->book->title}}</h5>
            <p class="card-text">User: {{$issue->user->name}}</p>
            <p class="card-text">Issued at: {{$issue->issue_date}}</p>
            <p class="card-text">Must return by: {{$issue->return_date}}</p>
            <a href="/issueBook" class="btn btn-danger">No</a>
            <a href="/issueBook/remove/{{$issue->id}}" class="btn btn-primary">Yes</a>
        </div>
    </div>
</div>

@endsection
