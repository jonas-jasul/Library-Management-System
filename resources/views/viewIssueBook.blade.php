@extends("layouts.main")

@section("content")



@auth
@if(Auth::user()->role_id==3)
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/issueBook/add" class="float-right mt-3 pt-2 pb-2 pl-2 pr-2 add_btn" role="button">Issue Book</a>
        </div>
        <form action="/issueBook" method="POST" role="searchIssue">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" id="searchIssue" name="searchIssue" placeholder="Enter search query">
                <button type="submit" id="filter_btn" class="btn btn-primary ml-2">Search</button>
                <button class="ml-3 pl-2 pr-2" style="background-color:green; color:white;"><a class="refresh_btn" href="/issueBook"><i class="fa-solid fa-arrows-rotate"></i></a></button>
            </div>
        </form>
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
        <div style="overflow:auto">
            <table class="table table-light table-striped table-bordered">
                <thead>
                    <tr class="table-info">
                        <th scope="col">#</th>
                        <th scope="col">@sortablelink('user_id', "User")</th>
                        <th scope="col">@sortablelink('book_id', "Book title")</th>
                        <th scope="col">User phone number</th>
                        <th scope="col">User email</th>
                        <th scope="col">@sortablelink('issue_date', "Date")</th>
                        <th scope="col">@sortablelink('return_date', "Return by date")</th>
                        <th scope="col">@sortablelink('status')</th>
                        @if(Auth::user()->role_id==3)
                        <th scope="col">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td>{{$book->user->name ?? "None"}}</td>
                        <td>{{$book->book->title}}</td>
                        <td>{{$book->user->member_phone_num ?? "-"}}</td>
                        <td>{{$book->user->email ?? "-"}}</td>
                        <td class="text-nowrap">{{$book->issue_date}}</td>
                        <td class="text-nowrap">{{$book->return_date}}</td>
                        <td>
                            @if ($book->status == "Y")
                            <span class="badge badge-pill badge-success">Returned</span>
                            @elseif($book->status=="N")
                            <span class="badge badge-pill badge-danger">Issued</span>
                            @endif
                        </td>
                        {{-- <td>{{str_repeat("*", $book->rating)}}</td> --}}
                        @if(Auth::user()->role_id==3)
                        <td class="text-nowrap">
                            <a class="no-underline btn btn-primary btn-sm" href="/issueBook/edit/{{ $book->id }}">edit</a>
                            /
                            <a class="no-underline btn btn-danger btn-sm" href="/issueBook/remove/ask/{{ $book->id }}">remove</a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endauth

@guest
<div class="pt-5 d-flex justify-content-center align-items-center">
<h1>You are logged out. Please log in.</h1>
</div>
@endguest

{{-- @foreach ($books as $book)

<p>Title: {{$book->title}}</p>

@endforeach --}}

@endsection
