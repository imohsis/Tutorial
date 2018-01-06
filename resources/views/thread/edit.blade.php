@extends('layouts.front')
@section('heading', "Edit This Thread"  )
@section('content')

@include('layouts.partials.error')
@include('layouts.partials.success')

<div class="row">

    <div class="well">

        <form class="form-vertical" action="{{route('threads.update',$thread->id)}}" method="post" role="form" id="create-thread-form">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="form-group">
                <label for="subject"> Subject</label>
                <input type="text" class="form-control" name="subject" id="" placeholder="Input..." value="{{$thread->subject}}">
            </div>

            <div class="form-group">
                <label for="type"> Type</label>
                <input type="text" class="form-control" name="type" id="" placeholder="Input..." value="{{$thread->type}}">
            </div>

            <div class="form-group">
                <label for="thread"> Thread</label>
                <textarea class="form-control" name="thread" id="" placeholder="Input..." >{{$thread->thread}}</textarea>
            </div>

            <div class="form-group">
                {!! app('captcha')->display() !!}
            </div>


            <button type="submit" class=" btn btn-primary">Submit</button>


            <div class="g-recaptcha" data-sitekey="6Le9dT4UAAAAAODevg7HW8aUb7Rx4yb-WTbRHdQ8"></div>


        </form>









    </div>




</div>





@endsection