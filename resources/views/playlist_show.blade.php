@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Welcome</h1>
            {{ Auth::user()->name }}
        </div>
    </div>

    <div class="row">
        <h1>Add Songs in the Playlist ({{ $playlist->name }})
        </h1>
       <label>Search video in youtube :</label>
        <input type="text" name="search" id="query" value="" placeholder="Search">

    </div>
    <div id="search-container" class="row">

    </div>

    <script>
        $(function () {
            $('#query').on("change keyup paste", function(){
                search();
            });
        });
    </script>

    <script src="{{ url('assets/js/search.js') }}"></script>
    <script src="https://apis.google.com/js/client.js?onload=onClientLoad" type="text/javascript"></script>
@stop