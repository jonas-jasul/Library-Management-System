@extends("layouts.main")

@section("content")

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
            <a href="/authors"><i style="color:#ADD8E6;" class="pt-2 fa-solid fa-circle-arrow-left fa-2x"></i></a>
                <div class="mb-3 ml-5 mt-3">
                    <label for="name" class="form-label">Author name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter author name" name="name">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-10">
                <div class="mb-3 ml-5">
                    <label for="birthCountry" class="form-label">Author country of origin</label>
                    <input type="text" class="form-control" id="birthCountry" placeholder="Enter author's country of origin" name="birthCountry">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-10">
                <div class="mb-3 ml-5">
                    <label for="dateOfBirth" class="form-label">Author's birthdate</label>
                    <input type="date" class="form-control" id="dateOfBirth" placeholder="Enter author's date of birth" name="dateOfBirth">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn ml-5 add_btn">Add</button>
    </div>
</form>
@endauth

@guest
You are logged out. Please log in
@endguest
@endsection
