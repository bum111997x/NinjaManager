@extends('home')
@section('title','FORM ADD')
@section('content')

    <h1 style="text-align: center">FORM EDIT NINJA INFORMATION</h1>

    <form method="post" enctype="multipart/form-data" action="{{route('ninja.update',$ninja->id)}}">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$ninja->name}}">
                    </div>
                    <div class="form-group">
                        <label for="dateOfBirth">Date Of Birth</label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="{{$ninja->dateOfBirth}}">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role" value="{{$ninja->role}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$ninja->address}}">
                    </div>
                    <div class="form-group">
                        <label for="specialSkill">Address</label>
                        <input type="text" class="form-control" id="specialSkill" name="specialSkill" value="{{$ninja->specialSkill}}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <img src="{{asset('storage/'. $ninja->image)}}"  style="width: 150px; height: 120px">
                        <input type="file" class="form-control-file" id="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>

@endsection
