@extends('home')
@section('title','Danh sách NINJA trong NARUTO theo search')

@section('content')
    <h1 style="text-align: center">NINJA NARUTO'S LIST</h1>
    <br>
    <form class="form-inline my-2 my-lg-0 justify-content-center" method="get" action="{{route("ninja.search")}}">
        <input class="form-control mr-sm-2" type="search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <br>
    <table class="table table-bordered table-dark">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Date Of Birth</th>
            <th scope="col">Role</th>
            <th scope="col">Address</th>
            <th scope="col">Special Skill</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($DBSearch as $key => $ninja)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$ninja->name}}</td>
                <td>{{$ninja->dateOfBirth}}</td>
                <td>{{$ninja->role}}</td>
                <td>{{$ninja->address}}</td>
                <td>{{$ninja->specialSkill}}</td>
                <td><img src="{{asset('storage/'. $ninja->image)}}" alt="" class="rounded mx-auto d-block"
                         style="width: 150px; height: 120px"></td>
                <td><a href="{{route('ninja.edit', $ninja->id)}}">Edit</a></td>
                <td><a href="{{route('ninja.delete', $ninja->id)}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
