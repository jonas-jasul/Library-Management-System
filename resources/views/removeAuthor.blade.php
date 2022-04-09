@extends("layouts.main")

@section("content")


<div class="container">

<h3 class="mt-3 mb-3">Do you want to remove this author?</h3>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Name: {{$author->name}}</h5>
        <p class="card-text">Country: {{$author->birthCountry}}</p>
        <p class="card-text">Birthdate: {{$author->dateOfBirth}}</p>
        <a href="/authors" class="btn btn-danger">No</a>
        <a href="/authors/remove/{{$author->id}}" class="btn btn-primary">Yes</a>
    </div>
</div>
</div>

@endsection
