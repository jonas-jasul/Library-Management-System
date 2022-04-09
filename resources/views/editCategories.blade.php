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
        <label for="title" class="form-label">Category</label>
        <input value="{{ $category->categoryName}}" type="text" class="form-control" id="categoryName" placeholder="Enter category name" name="categoryName">
    </div>
    <button type="submit" class="btn ml-5 edit_btn">Rename</button>

</form>
</div>
@endsection
