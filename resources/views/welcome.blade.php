@extends('layouts.front')


{{--this  section is will be replaced with a carousel which will come from the backend--}}
@section('banner')
    <div class="jumbotron">
        <div class="container">
            <h1>Join Our Community</h1>
            <p>Help and get Help</p>
            <p> <a href="/" class="btn btn-primary btn-lg">Learn more</a>  </p>
        </div>
    </div>
@stop

@section('heading',"Threads")


@section('content')
    @include('thread.partials.thread-list')

@stop
