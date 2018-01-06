<div class="list-group">
    @forelse($threads as $thread)

        {{--<a href="{{route('threads.show', $thread->id)}}" class="list-group-item">--}}
            {{--<h4 class="list-group-item-heading"></h4>--}}
            {{--  {{$thread->subject}}  <p class="list-group-item-text">{{str_limit($thread->thread,100)}} <br>--}}

            {{--Posted by <a href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a> </p>--}}
        {{--</a>--}}

        {{--!-- i must try and change the whole panel body to b clickable -->--}}

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="{{route('threads.show', $thread->id)}}">{{$thread->subject}}</a></h3>
            </div>
            <div class="panel-body">
                <p class="list-group-item-text">{{str_limit($thread->thread,100)}} <br>

                    Posted by <a href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a>

                {{$thread->created_at->diffForHumans()}}
                </p>
            </div>
        </div>

    @empty
        <h5>No Threads</h5>

    @endforelse



</div>