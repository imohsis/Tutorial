@extends('layouts.front')

@section('heading')
    <a class="btn btn-primary pull-right"   href="{{route('threads.create')}}">Create Thread</a><br>

@endsection



@section('content')

    @include('thread.partials.thread-list')




@endsection