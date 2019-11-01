@extends('home')
@section('title','Danh sách CITY trong NARUTO')

@section('content')
    <h1 style="text-align: center">CITY NARUTO'S LIST</h1>
    <br>
    <a href="{{route('city.create')}}">ADD</a>
    <table class="table table-bordered table-dark">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Number</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cities as $key => $city)
            <tr>
                <td>{{++$key}}</td>
                <td><a href="{{route('city.list',$city->id)}}">{{$city->name}}</a></td>
                <td>{{count($city->ninjas)}}</td>
                <td><a href="{{route('city.edit',$city->id)}}">EDIT</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
