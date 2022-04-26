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
        <div style="overflow:auto">
            <table class="table table-light table-striped table-bordered">
                <thead>
                    <tr class="table-info">
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Book title</th>
                        <th scope="col">User phone number</th>
                        <th scope="col">User email</th>
                        <th scope="col">Issue date</th>
                        <th scope="col">Return by date</th>
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
                            <a class="no-underline btn btn-danger btn-sm" href="/books/remove/ask/{{ $book->id }}">remove</a>
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
