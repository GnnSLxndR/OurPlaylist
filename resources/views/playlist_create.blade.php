@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Welcome</h1>
            {{ Auth::user()->name }}
        </div>
    </div>

    <div class="row">
        <h1>Create Playlist</h1>
        <form action="{{ route('playlist.create') }}" method="post" class="create-playlist">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <input type="text" name="name" id="">
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </div>
@stop