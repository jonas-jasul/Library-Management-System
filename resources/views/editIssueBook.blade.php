@extends("layouts.main")

@section("content")

<form action="{{route('returnBookIssue', ['id' =>$issues->id])}}" method="post">
@csrf
<div class="container">

    <h3 class="mt-3 mb-3 pt-2">Return book</h3>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User: {{$issues->user->name}}</h5>
            <p class="card-text">Book Title: {{$issues->book->title}}</p>
            <p class="card-text">Phone Number: {{$issues->user->member_phone_num}}</p>
            <p class="card-text">Email: {{$issues->user->email}}</p>
            <a href="/issueBook" class="btn btn-danger">Cancel</a>
            <button class="btn edit_btn" type="submit">Return Book</button>
            
        </div>
    </div>
    
</div>
</form>
@endsection
