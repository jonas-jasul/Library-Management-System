@extends("layouts.main")

@section("content")



@auth


<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/publishers/add" class="float-right mt-3 pt-2 pb-2 pl-2 pr-2 add_btn" role="button">Add publishers</a>
        </div>
    </div>
</div>
<div class="container">
<div class="row">
        <div class="col-12">
            <h3 class="mt-0 mb-3 text-center head-title">Publishers</h3>
        </div>
    </div>
    <table class="table table-light table-striped table-bordered">
        <thead>
            <tr class="table-danger">
                <th scope="col">#</th>
                <th scope="col">Publisher</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publishers as $publisher)
            <tr>
                <th scope="row">{{$publisher->id}}</th>
                <td>{{$publisher->publisherName}}</td>
                {{-- <td>{{str_repeat("*", $book->rating)}}</td> --}}
                <td>
                    <a class="no-underline btn btn-primary btn-sm" href="/publishers/edit/{{ $publisher->id }}">edit</a>
                    /
                    <a class="no-underline btn btn-danger btn-sm" href="/publishers/remove/ask/{{ $publisher->id }}">remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endauth

@guest
<div class="pt-5 d-flex justify-content-center align-items-center">
<h1>You are logged out. Please log in.</h1>
</div>
@endguest
{{-- @foreach ($books as $book)

<p>Title: {{$book->title}}</p>

@endforeach --}}

@endsection
