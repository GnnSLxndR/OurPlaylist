@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
           <h1>Welcome</h1>
            {{ Auth::user()->name }}
        </div>

    </div>
    <div class="row">
        <a class="btn btn-primary" href="{{ route('playlist.create') }}">Create Playlist</a>
        <ul>
            @foreach( $playlist as $playlist )
                <li><a href="{{ route('playlist.show', $playlist->id) }}">{{ $playlist->name }}</a></li>
            @endforeach
        </ul>
    </div>
@stop