@extends('home')
@section('title','Danh sách NINJA cua 1 CITY trong NARUTO')

@section('content')
    <h1 style="text-align: center">CITY NARUTO'S LIST</h1>
    <br>
    <a href="{{route('city.create')}}">ADD</a>
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
                <td>{{$ninja->specialSkill}}</td>
                <td><img src="{{asset('storage/'. $ninja->image)}}" alt="" class="rounded mx-auto d-block"
                         style="width: 150px; height: 120px"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
