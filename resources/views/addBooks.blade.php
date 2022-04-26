@extends("layouts.main")

@section("content")
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@auth


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
        <div class="row mt-4">
            <div class="col-sm-10">
            <a href="/books"><i style="color:#ADD8E6;" class="pt-2 fa-solid fa-circle-arrow-left fa-2x"></i></a>
                <div class="mb-3 ml-5 mt-3">
                    <label for="title" class="form-label">Book title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter book title" name="title">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-10">
                <div class="mb-3 ml-5">
                    <label for="publisher" class="form-label">Book publisher</label><br>
                    {{-- <input type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher"> --}}
                    <select class="" name="publisher_id">
                        @foreach ($publishers as $publisher)
                        <option value="{{$publisher->id}}">{{$publisher->publisherName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-10">
                <div class="mb-3 ml-5">
                    <label for="category" class="form-label">Book category</label><br>
                    {{-- <input type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher"> --}}
                    <select class="" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-10">
                <div class="mb-3 ml-5">
                    <label for="author" class="form-label">Book author</label><br>
                    {{-- <input type="text" class="form-control" id="author" placeholder="Enter book author" name="author"> --}}
                    <select class="" name="author_id">
                        @foreach ($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn ml-5 add_btn">Add</button>
    </div>
</form>
@endauth

@guest
You are logged out. Please log in
@endguest
@endsection
