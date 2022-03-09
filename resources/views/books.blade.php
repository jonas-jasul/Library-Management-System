@extends("layouts.main")

@section("content")

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Library Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/books">View Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/books/add">Add Books</a>
      </li>
    </ul>
  </div>
</nav>

<h3>Books</h3>
<table class="table table-light ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Publisher</th>
            <th scope="col">Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <th scope="row">{{$book->id}}</th>
            <td>{{$book->title}}</td>
            <td>{{ $book->publisher}}</td>
            <td>{{Str::limit($book->author, 20)}}</td>
            {{-- <td>{{str_repeat("*", $book->rating)}}</td> --}}
            <td>
                <a class="no-underline" href="/books/edit/{{ $book->id }}">edit</a>
                <a class="no-underline" href="/books/remove/ask/{{ $book->id }}">remove</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{-- @foreach ($books as $book)

<p>Title: {{$book->title}}</p>

@endforeach --}}

@endsection
