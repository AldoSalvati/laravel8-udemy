@php
    /**
     * @var $photo App\Models\Photo
    */
@endphp
@extends('templates.default')
@section('content')
    <h1>
        @if($photo->id)
            Update {{$photo->name}}
        @else
            New Image
        @endif
    </h1>
    @if($photo->id)
        <form action="{{route('photos.update', $photo->id)}}" method="POST" enctype="multipart/form-data">
            {{method_field('PATCH')}}
            @else
                <form action="{{route('photos.store')}}" method="POST" enctype="multipart/form-data">
                    @endif
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$photo->name}}"
                               placeholder="Image name">

                    </div>
                    <div class="form-group">
                        <select class="form-field" required name="album_id" id="album_id">
                            <option value="">SELECT</option>
                            @foreach($albums as $item)
                                <option
                                    {{$item->id == $album->id?'selected' :''}} value="{{$item->id}}">{{$item->album_name}}</option>
                            @endforeach
                        </select>


                    </div>

                    @include('images.partials.fileupload')
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="description" class="form-control"
                                  placeholder="Album description">{{$photo->description}}</textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
@stop
