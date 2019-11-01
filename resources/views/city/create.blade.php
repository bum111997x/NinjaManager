@extends('home')
@section('title','FORM ADD')
@section('content')

    <h1 style="text-align: center">FORM CREATE CITY </h1>

    <form method="post" enctype="multipart/form-data" action="{{route('city.store')}}">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control
                         @if($errors->has('name'))
                            border-danger
                        @endif
                            "
                               id="name" name="name">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
