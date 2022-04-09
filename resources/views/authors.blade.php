@extends("layouts.main")

@section("content")



@auth

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/authors/add" class="float-right mt-3 pt-2 pb-2 pl-2 pr-2 add_btn" role="button">Add authors</a>
        </div>
    </div>
</div>

<div class="container">
<div class="row">
        <div class="col-12">
            <h3 class="mt-0 mb-3 text-center head-title">Authors</h3>
        </div>
    </div>
    <table class="table table-light table-striped table-bordered">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Author name</th>
                <th scope="col">Author country of origin</th>
                <th scope="col">Author birthdate</th>                
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr>
                <th scope="row">{{$author->id}}</th>
                <td>{{$author->name}}</td>
                <td>{{$author->birthCountry}}</td>
                <td>{{$author->dateOfBirth}}</td>
                {{-- <td>{{str_repeat("*", $book->rating)}}</td> --}}
                <td>
                    <a class="no-underline" href="/authors/edit/{{ $author->id }}">edit</a>
                    /
                    <a class="no-underline" href="/authors/remove/ask/{{ $author->id }}">remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endauth

@guest
<h1 class="mt-3 ml-3">You are logged out. Please log in.</h1>

@endguest

{{-- @foreach ($books as $book)

<p>Title: {{$book->title}}</p>

@endforeach --}}

@endsection
