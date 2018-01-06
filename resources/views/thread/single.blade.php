@extends('layouts.front')

@section('content')
<div class="content-wrap well">
    <h4>{{$thread->subject}}</h4>
    <hr>

    <div class="thread-details">
        {!! \Michelf\Markdown::defaultTransform($thread->thread) !!}
        {{--{{$thread->thread}}--}}

    </div>
    <br>
    {{--         controls the visibity of the button ie authenticated user that wrote the post only can see the update and delete button   --}}
    {{--@if(auth()->user()->id == $thread->user_id)--}}
    @can('update', $thread)
    <div class="actions">

        {{--// to edit--}}
        <a href="{{route('threads.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>

        {{--to delete a posst we use a form to delete  very important         --}}
        <form action="{{route('threads.destroy', $thread->id)}}" method="post" class="inline-it">
           {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="btn btn-warning btn-xs" type="submit" value="Delete">
        </form>



    </div>
    @endcan
</div>
<hr>
<br>

    {{--comments to the blog post--}}
@foreach($thread->comments as $comment)
            <div class="comment-list well well-lg">

      @include('thread.partials.comment-list')


            </div>

<hr>
            {{--reply to comment--}}
<button class="btn btn-xs btn-default" onclick="toggleReply('{{$comment->id}}')">reply</button>
 <br>
            {{-- reply form--}}
            <div style="margin-left: 40px" class="reply-form-{{$comment->id}} hidden">
                <form action="{{route('replycomment.store', $comment->id)}}" method="post" role="form">
                    {{csrf_field()}}
                    <legend>Reply</legend>
                    <div class="form-group">

                        <input type="text" class="form-control" name="body" id="" placeholder="Reply here...  ">
                    </div>
                    <button type="submit" class="btn btn-primary">Reply</button>
                </form>
            </div>
            <br>
            @foreach($comment->comments as $reply)

                {{--<div class="small well text-info reply-list"style="margin-left: 30px">--}}
                    {{--<p> {{$reply->body}}</p>--}}

                    {{--<lead> by  {!! ucwords($reply->user->name) !!} </lead>--}}
                    {{--</div>   confirm this div code--}}
                    {{--<div class="actions">--}}

                        {{--<a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$reply->id}}">Edit</a>--}}
                        {{--<div class="modal fade" id="{{$reply->id}}">--}}
                            {{--<div class="modal-dialog">--}}
                                {{--<div class="modal-content">--}}
                                    {{--<div class="modal-header">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;--}}
                                        {{--</button>--}}
                                        {{--<h4 class="modal-title">Edit your Comment</h4>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-body">--}}
                                        {{--<div class="comment-form">--}}
                                            {{--<form action="{{route('comment.update', $reply->id)}}" method="post" role="form">--}}
                                                {{--{{csrf_field()}}--}}
                                                {{--{{method_field('put')}}--}}
                                                {{--<legend>Edit</legend>--}}
                                                {{--<div class="form-group">--}}

                                                    {{--<input type="text" class="form-control" name="body" id="" value="{{$reply->body}}"     placeholder="Enter your Comment">--}}
                                                {{--</div>--}}
                                                {{--<button type="submit" class="btn btn-primary">Reply</button>--}}
                                            {{--</form>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div><!-- /.modal-content -->--}}
                            {{--</div><!-- /.modal-dialog -->--}}
                        {{--</div><!-- /.modal -->--}}


                        {{--<a href="{{route('threads.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>--}}
                        {{--to delete a post we use a form to delete  very important--}}
                        {{--<form action="{{route('threads.destroy', $reply->id)}}" method="post" class="inline-it">--}}
                            {{--{{csrf_field()}}--}}
                            {{--{{method_field('DELETE')}}--}}
                            {{--<input class="btn btn-danger btn-xs" type="submit" value="Delete">--}}
                        {{--</form>--}}



                    {{--</div>--}}
                {{--</div>--}}




            {{--@endforeach--}}
                @include('thread.partials.reply-list')

@endforeach
    {{--</div>--  check--}}




    <br><br>


            @include('thread.partials.comment-form')
    {{--<div class="comment-form">--}}
        {{--<form action="{{route('threadcomment.store', $thread->id)}}" method="post" role="form">--}}
            {{--{{csrf_field()}}--}}
            {{--<legend>Comment</legend>--}}
            {{--<div class="form-group">--}}

                {{--<input type="text" class="form-control" name="body" id="" placeholder="Enter your Comment">--}}
            {{--</div>--}}
          {{--<button type="submit" class="btn btn-primary">Comment</button>--}}
        {{--</form>--}}
    {{--</div>--}}


@endsection

@section('js')


<script>
    function toggleReply(commentId){
        $('.reply-form-'+commentId).toggleClass('hidden');
    }
</script>

@endsection