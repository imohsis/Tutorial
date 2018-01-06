<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notifications\RepliedToThread;
use App\Thread;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function addTheadComment(Request $request, Thread $thread )
    {
        $this->validate($request,[
            'body' => 'required'
        ]);

//        $comment = new Comment();               this whole code is replaced with the trait
//        $comment->body = $request->body;
//        $comment->user_id = auth()->user()->id;
//
//        $thread->comments()->save($comment);

        $thread->addComment($request->body);
//notifies the other user
       $thread->user()->notify(new RepliedToThread($thread));

        return back()->withMessage('comment created');




    }

    public function addReplyComment(Request $request, Comment $comment )
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
//
//        $reply = new Comment();
//        $reply->body = $request->body;
//        $reply->user_id = auth()->user()->id;

        $comment->addComment($request->body);

        return back()->withMessage('Reply created');




    }
    public function store(Request $request)
    {
        //
    }




    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id !== auth()->user()->id);
        abort(401);

        $this->validate($request,[
            'body' => 'required'
        ]);
        $comment->update($request->all());
        return back()->withMessage('updated');
    }


    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== auth()->user()->id);
           abort(401);



        $comment->delete();

        return back()->withMessage('deleted');
    }
}
