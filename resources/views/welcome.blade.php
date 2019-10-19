@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to Tasklist</h1>
                {!! link_to_route('signup.get', 'Sign up now', [] ['class' => 'btn btn-lg btn-info']) !!}
            </div>
        </div>
    </div>
@endsection