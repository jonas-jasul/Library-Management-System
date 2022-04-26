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
        <div class="row mt-3">
            <div class="col-sm-10">
            <a href="/issueBook"><i style="color:#ADD8E6;" class="pt-2 fa-solid fa-circle-arrow-left fa-2x"></i></a>
                <div class="mb-3 ml-5 mt-3">
                    <label for="book_id" class="form-label">Book</label><br>
                    {{-- <input type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher"> --}}
                    <select class=""name="book_id">
                        @foreach ($books as $book)
                            <option value="{{$book->id}}">{{$book->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-sm-10">
                <div class="mb-3 ml-5">
                    <label for="user_id" class="form-label">User</label><br>
                    {{-- <input type="text" class="form-control" id="publisher" placeholder="Enter book publisher" name="publisher"> --}}
                    <select class=""name="user_id">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

      
        <br>
        <button type="submit" class="btn ml-5 add_btn">Issue Book</button>
    </div>
</form>
@endauth

@guest
You are logged out. Please log in
@endguest
@endsection
