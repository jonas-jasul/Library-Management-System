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
        <label for="name" class="form-label mt-3">Author name</label>
        <input value="{{ $author->name}}" type="text" class="form-control" id="name" placeholder="Enter author name" name="name">
    </div>
    <div class="mb-3 ml-5">
        <label for="birthCountry" class="form-label">Author country of origin</label>
        <input value="{{$author->birthCountry}}"type="text" class="form-control" id="birthCountry" placeholder="Enter author country of birth" name="birthCountry">
    </div>

    <div class="mb-3 ml-5">
        <label for="dateOfBirth" class="form-label">Author birthdate</label>
        <input value="{{$author->dateOfBirth}}"type="text" class="form-control" id="dateOfBirth" placeholder="Enter author date of birth" name="dateOfBirth">
    </div>

    <button type="submit" class="btn ml-5 edit_btn">Save changes</button>

</form>
</div>
@endsection
