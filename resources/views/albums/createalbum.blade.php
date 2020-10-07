@extends('templates.default')
@section('content')
    <h1>New Album</h1>

    <form action="{{route('albums.store')}}" method="POST">
        {{csrf_field()}}

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" required name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Album name">

        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea  name="description" id="description" class="form-control" placeholder="Album description">{{old('description')}}</textarea>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
