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
        <div class="row mt-4">
            <div class="col-sm-10">
            <a href="/categories"><i style="color:#ADD8E6;" class="pt-2 fa-solid fa-circle-arrow-left fa-2x"></i></a>
                <div class="mb-3 ml-5 mt-3">
                    <label for="categoryName" class="form-label">Book category</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter a book category" name="categoryName">
                </div>
            </div>
        </div>
        <button type="submit" class="btn ml-5 add_btn">Add</button>
    </div>
</form>
@endsection
