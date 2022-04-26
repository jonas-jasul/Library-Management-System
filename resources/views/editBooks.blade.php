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
    <div class="container">
        <div class="mb-3 ml-5">
            <label for="title" class="form-label mt-3">Book title</label>
            <input value="{{ $book->title}}" type="text" class="form-control" id="title" placeholder="Enter book title" name="title">
        </div>
        <div class="mb-3 ml-5">
            <label for="publisher" class="form-label">Book publisher</label><br>
            {{-- <input type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher"> --}}
            <select class="" name="publisher_id">
                @foreach ($publishers as $publisher)
                <option value="{{$publisher->id}}">{{$publisher->publisherName}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-5">
            {{-- <input value="{{$book->category->categoryName}}" type="text" class="form-control" id="category_id" placeholder="Enter book category" name="category_id"> --}}
            <label for="category" class="form-label">Book category</label><br>
            {{-- <input type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher"> --}}
            <select class="" name="category_id">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-5">
            {{-- <input value="{{$book->author->name}}" type="text" class="form-control" id="author_id" placeholder="Enter book author" name="author_id"> --}}
            <label for="author" class="form-label">Book author</label><br>
            {{-- <input type="text" class="form-control" id="author" placeholder="Enter book author" name="author"> --}}
            <select class="" name="author_id">
                @foreach ($authors as $author)
                <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn ml-5 edit_btn">Save changes</button>

</form>
</div>
@endsection
