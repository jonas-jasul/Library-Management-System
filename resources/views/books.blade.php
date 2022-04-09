@extends("layouts.main")

@section("content")



@auth
@if(Auth::user()->role_id==2)
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
        <div class="col-12">
            <h3 class="mt-0 mb-3 text-center head-title">Books</h3>
        </div>
    </div>
    <div class="row">
        <table class="table table-light table-striped table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    @if(Auth::user()->role_id==2)
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->title}}</td>
                    <td>{{ $book->publisher}}</td>
                    <td>{{$book->category}}</td>
                    <td>{{Str::limit($book->author, 20)}}</td>
                    {{-- <td>{{str_repeat("*", $book->rating)}}</td> --}}
                    @if(Auth::user()->role_id==2)
                    <td>
                        <a class="no-underline" href="/books/edit/{{ $book->id }}">edit</a>
                        /
                        <a class="no-underline" href="/books/remove/ask/{{ $book->id }}">remove</a>
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
<h1 class="mt-3 ml-3">You are logged out. Please log in.</h1>

@endguest

{{-- @foreach ($books as $book)

<p>Title: {{$book->title}}</p>

@endforeach --}}

@endsection
