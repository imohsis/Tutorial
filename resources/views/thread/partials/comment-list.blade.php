<h5>{{$comment->body}}</h5>


@if(!empty($thread->solution))
    @if($thread->solution == $comment->id)
        {{--<button class="btn btn-default btn-xs">{{$comment->likes()->count()}}</button>--}}
        <button class="btn btn-success pull-right" ><span class="glyphicon glyphicon-ok"></span></button>

        @endif

    @else

    {{--@if(auth()->check())--}}
      {{--@if(auth()->user()->id == $thread->user_id)--}}
        {{--mark as solution form that is solution form--}}
        {{--<form   action="{{route('markAsSolution')}}"  method="post">--}}
    {{--{{csrf_field()}}--}}
    {{--<input type="hidden" name="threadId" value="{{$thread->id}}">--}}

    {{--<input type="hidden" name="solutionId" value="{{$comment->id}}">--}}


{{--<button class="btn btn-success pull-right">Mark as solution</button>--}}

{{--</form>--}}
        @can('update',$thread)
    <div class="btn btn-success pull-right" onclick="markAsSolution('{{$thread->id}}','{{$comment->id}}',this)">Mark as solution</div>
        @endcan
    {{--  @endif   @endif--}}
@endif
<lead>{{$comment->user->name}}</lead>
<div class="actions">
    {{--<button class="btn btn-default btn-xs">{{$comment->likes()->count()}}</button>--}}
    {{--<button class="btn btn-default btn-xs" onclick="likeIt('{{$comment->id}}',this)"><span class="glyphicon glyphicon-heart"></span></button>--}}
    <button class="btn btn-default btn-xs" id="{{$comment->id}}-count" >{{$comment->likes()->count()}}</button>
    <span  class="btn btn-default btn-xs  {{$comment->isLiked()?"liked":""}}" onclick="likeIt('{{$comment->id}}',this)"><span class="glyphicon glyphicon-heart"></span></span>

    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$comment->id}}">Edit</a>
    <div class="modal fade" id="{{$comment->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="comment-form">
                        <form action="{{route('comment.update', $comment->id)}}" method="post" role="form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <legend>Edit</legend>
                            <div class="form-group">

                                <input type="text" class="form-control" name="body" id="" value="{{$comment->body}}"     placeholder="Enter your Comment">
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    {{--<a href="{{route('threads.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>--}}
    {{--to delete a post we use a form to delete  very important--}}
    <form action="{{route('threads.destroy', $comment->id)}}" method="post" class="inline-it">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input class="btn btn-danger btn-xs" type="submit" value="Delete">
    </form>



</div>

@section('js')
    <script>

        function markAsSolution(threadId,solutionId,elem){
            var csrfToken= '{{csrf_token()}}';
            $.post('{{route('markAsSolution')}}', {solutionId: solutionId, threadId: ThreadId,  _token: csrfToken},function(data){
                $(elem).text('Solution')
            });

        }
        // this function is for liking the comment
        function likeIt(commentId, elem){
            var csrfToken='{{csrf_token()}}';
            var likesCount=parseInt($('#'+commentId+"-count").text());
            $.post('{{route('toggleLike')}}', {commentId: commentId, _token: csrfToken},function(data){
//                $(elem).text('Solution')
                console.log(data);
                if(data.message==='liked'){
                    $(elem).addClass('liked');
                    $('#'+commentId+"-count").text(likesCount+1);
//                   $(elem).css({color:'red'});
                }else{
//                   $(elem).css({color:'black'});
                    $('#'+commentId+"-count").text(likesCount-1);
                    $(elem).removeClass('liked');
                }
            });

        }


    </script>
    @endsection