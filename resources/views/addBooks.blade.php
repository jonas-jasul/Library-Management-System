@extends("layouts.main")

@section("content")


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Library Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="/books">View Books</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/books/add">Add Books</a>
      </li>
    </ul>
  </div>
</nav>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif
<form action="" method="post">
    @csrf
    <div class="mb-3 ml-5">
        <label for="title" class="form-label">Book title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter book title" name="title">
    </div>
    <div class="mb-3 ml-5">
        <label for="publisher" class="form-label">Book publisher</label>
        <input type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher">
    </div>

    <div class="mb-3 ml-5">
        <label for="author" class="form-label">Book author</label>
        <input type="text" class="form-control" id="author" placeholder="Enter book author" name="author">
    </div>

    <button type="submit" class="btn ml-5">Add</button>

</form>
@endsection
