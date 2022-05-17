@extends("layouts.main")

@section("content")



@auth
@if(Auth::user()->role_id==3)
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/books/add" class="float-right mt-3 pt-2 pb-2 pl-2 pr-2 add_btn" role="button">Add books</a>
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="row">
        <form action="/books" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Enter search query">
                <button type="submit" id="filter_btn" class="btn btn-primary ml-2">Search</button>
                <button class="ml-3 pl-2 pr-2" style="background-color:green; color:white;"><a class="refresh_btn" href="/books"><i class="fa-solid fa-arrows-rotate"></i></a></button>
            </div>
        </form>
        <div class="col-12">

            <h3 class="mt-0 mb-3 text-center head-title">Books</h3>
        </div>
    </div>
    <div class="row" style="overflow:auto">
        <table class="table table-light table-striped table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">@sortablelink("title")</th>
                    <th scope="col">@sortablelink("publisher_id", "Publisher")</th>
                    <th scope="col">@sortablelink("category_id", "Category")</th>
                    <th scope="col">@sortablelink("author_id", "Author")</th>
                    @if(Auth::user()->role_id==3)
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->title}}</td>
                    <td>{{$book->publisher->publisherName}}</td>
                    <td>{{$book->category->categoryName}}</td>
                    <td>{{$book->author->name}}</td>
                    {{-- <td>{{str_repeat("*", $book->rating)}}</td> --}}
                    @if(Auth::user()->role_id==3)
                    <td class="text-nowrap">
                        <a class="no-underline btn btn-primary btn-sm" href="/books/edit/{{ $book->id }}">edit</a>
                        /
                        <a class="no-underline btn btn-danger btn-sm" href="/books/remove/ask/{{ $book->id }}">remove</a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
