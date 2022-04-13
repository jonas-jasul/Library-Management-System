@extends("layouts.main")

@section("content")



@auth
@if(Auth::user()->role_id==3)
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/issueBook/add" class="float-right mt-3 pt-2 pb-2 pl-2 pr-2 add_btn" role="button">Issue Book</a>
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="mt-0 mb-3 text-center head-title">Book Issues</h3>
        </div>
    </div>
    <div class="row">
        <table class="table table-light table-striped table-bordered">
            <thead>
                <tr class="table-info">
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">User Phone Number</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Issue Date</th>
                    <th scope="col">Returning Date</th>
                    <th scope="col">Status</th>
                    @if(Auth::user()->role_id==3)
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->user->name}}</td>
                    <td>{{$book->book->title}}</td>
                    <td>{{$book->user->member_phone_num}}</td>
                    <td>{{$book->user->email}}</td>
                    <td>{{$book->issue_date}}</td>
                    <td>{{$book->return_date}}</td>
                    <td>{{$book->status}}</td>
                    {{-- <td>{{str_repeat("*", $book->rating)}}</td> --}}
                    @if(Auth::user()->role_id==2)
                    <td>
                        <a class="no-underline" href="/books/edit/{{ $book->id }}">edit</a>
                        /
                        <a class="no-underline" href="/books/remove/ask/{{ $book->id }}">remove</a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endauth

@guest
<h1 class="mt-3 ml-3">You are logged out. Please log in.</h1>

@endguest

{{-- @foreach ($books as $book)

<p>Title: {{$book->title}}</p>

@endforeach --}}

@endsection
