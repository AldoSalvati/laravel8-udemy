   @extends('templates.layout')
   @section('title', $title)
   @section('content')
    <h1>
        With Blade
        {{$title}}
    </h1>


    @if($staff)
        <ul>
            @foreach ($staff as $person)

                <li> {{$person['name']}}   {{$person['name']}} </li>

            @endforeach
        </ul>
    @endif

@endsection