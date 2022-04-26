@extends("layouts.main")

@section("content")

@auth
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="mt-2 ml-3 mb-3 text-center head-title">Registered members</h3>
        </div>
    </div>
    <div style="overflow:auto">
        <table class="table table-light table-striped table-bordered">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Member name</th>
                    <th scope="col">Email</th>
                    <th scope="col">School</th>
                    <th scope="col">Phone number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->member_school}}</td>
                    <td class="text-nowrap">{{$user->member_phone_num}}</td>
                    {{-- <td>{{Str::limit($book->author, 20)}}</td> --}}
                    {{-- <td>{{str_repeat("*", $book->rating)}}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
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
