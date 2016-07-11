@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Login </h2>
            <a class="btn btn-primary" href="{{ route('social.login', ['google']) }}">Google</a>
        </div>
    </div>
@stop