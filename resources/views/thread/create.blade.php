@extends('layouts.front')
@section('heading', "Create A Thread"  )
@section('content')



<div class="row">

    <div class="well">

        <form class="form-vertical" action="{{route('threads.store')}}" method="post" role="form" id="create-thread-form">
            {{csrf_field()}}
            <div class="form-group">
                <label for="subject"> Subject</label>
                <input type="text" class="form-control" name="subject" id="" placeholder="Input..." value="{{old('subject')}}">
            </div>

            <div class="form-group">
                <label for="tag"> Tags</label>
                <select type="text" class="form-control" multiple  name="tags[] " id="tag" placeholder="Tags" value="{{old('type')}}">

                    {{--<option value="1">one</option>--}}
                    {{--<option value="2">Two</option>--}}
                    {{--<option value="3">Three</option>--}}
                    {{--<option value="4">Four</option>--}}

                    @foreach($tags as $tag)
                        <option  value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach

                </select>
            </div>

            {{--<div class="form-group">--}}
                {{--<label for="thread"> Thread</label>--}}
                {{--<textarea class="form-control" name="thread" id="" placeholder="Input..." value="{{old('thread')}}"></textarea>--}}
            {{--</div>--}}


            <div class="form-group">
                <label for="thread">Thread</label>
                <textarea class="form-control" name="thread" id="" placeholder="Input..."> {{old('thread')}} </textarea>
            </div>

            {{--<div class="form-group">--}}
                {{--{!! app('captcha')->display() !!}--}}
            {{--</div>--}}


            <button type="submit" class=" btn btn-primary">Submit</button>


            {{--<div class="g-recaptcha" data-sitekey="6Le9dT4UAAAAAODevg7HW8aUb7Rx4yb-WTbRHdQ8"></div>--}}
        </form>









    </div>




</div>





@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>


    <script>

        $(function(){
            $('#tag').selectize();
        })

    </script>





@endsection