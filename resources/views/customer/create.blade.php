@extends('home')
@section('title','FORM ADD')
@section('content')

    <h1 style="text-align: center">FORM CREATE NINJA INFORMATION</h1>

    <form method="post" enctype="multipart/form-data" action="{{route('ninja.store')}}">
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
                    <div class="form-group">
                        <label for="dateOfBirth">Date Of Birth</label>
                        <input type="" class="form-control
                        @if($errors->has('dateOfBirth'))
                            border-danger
                        @endif
                        "
                               id="dateOfBirth" name="dateOfBirth">
                        @if($errors->has('dateOfBirth'))
                            <p class="text-danger">{{$errors->first('dateOfBirth')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="specialSkill">Special Skill</label>
                        <input type="text" class="form-control
                        @if($errors->has('specialSkill'))
                            border-danger
                        @endif
                        "
                               id="specialSkill" name="specialSkill">
                        @if($errors->has('specialSkill'))
                            <p class="text-danger">{{$errors->first('specialSkill')}}</p>
                        @endif
                    </div>
                    <div>
                        <select name="city_id">
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-file" id="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>

@endsection
