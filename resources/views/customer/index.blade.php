@extends('home')
@section('title','Danh sách NINJA trong NARUTO')

@section('content')
    <h1 style="text-align: center">NINJA NARUTO'S LIST</h1>
    <br>
    <form class="form-inline my-2 my-lg-0 justify-content-center" method="get" action="{{route("ninja.search")}}">
        <div class="col-md-3">
            <input class="form-control mr-sm-2 " type="search" name="search">
            <button class="btn btn-warning" type="submit">Search</button>
            <a href="{{route('ninja.create')}}" class="btn btn-primary">ADD</a>
        </div>

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
            <th scope="col">City</th>
            <th scope="col">Special Skill</th>
            <th scope="col">Image</th>
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ninjas as $key => $ninja)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$ninja->name}}</td>
                <td>{{$ninja->dateOfBirth}}</td>
                <td>{{$ninja->role}}</td>
                <td>{{$ninja->address}}</td>
                <td>{{$ninja->city->name}}</td>
                <td>{{$ninja->specialSkill}}</td>
                <td><img src="{{asset('storage/'. $ninja->image)}}" alt="" class="rounded mx-auto d-block"
                         style="width: 150px; height: 120px"></td>
                <td><a href="{{route('ninja.edit', $ninja->id)}}" class="btn btn-success">Edit</a></td>
                <td><a href="{{route('ninja.delete', $ninja->id)}}" class="btn btn-danger"
                       onclick="return confirm('Are you sure you want to delete it???')">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    {{$ninjas->links()}}--}}
@endsection
