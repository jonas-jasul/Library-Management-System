@extends("layouts.main")

@section("content")



<div class="container">

<h3 class="mt-3 mb-3 pt-2">Do you want to remove this publisher?</h3>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{$publisher->publisherName}}</h5>
        <a href="/publishers" class="btn btn-danger">No</a>
        <a href="/publishers/remove/{{$publisher->id}}" class="btn btn-primary">Yes</a>
    </div>
</div>
</div>

@endsection
