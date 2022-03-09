@extends("layouts.main")

@section("content")

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
        <input value="{{ $book->title}}" type="text" class="form-control" id="title" placeholder="Enter book title" name="title">
    </div>
    <div class="mb-3 ml-5">
        <label for="publisher" class="form-label">Book publisher</label>
        <input value="{{$book->publisher}}"type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher">
    </div>

    <div class="mb-3 ml-5">
        <label for="author" class="form-label">Book author</label>
        <input value="{{$book->author}}" type="text" class="form-control" id="author" placeholder="Enter book author" name="author">
    </div>

    <button type="submit" class="btn ml-5">Add</button>

</form>
@endsection
