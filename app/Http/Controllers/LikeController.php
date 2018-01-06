<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LikeController extends Controller
{
    public function toggleLike()
    {
        $commentId = Input::get('commentId');
        $comment = Comment::find($commentId);

        //$usersLike= $comment->like()->where('user_id', auth()->id())->where('likable_id', $commentId)->first();

    if(!$comment->isLiked()){
        $comment->likeIt();
        return response()->json(['status' =>'success','message'=>'liked']);
    }else{
        $comment->unlikeIt();
        return response()->json(['status' =>'success','message'=>'unliked']);
    }


       // $comment->likeIt();   //this fetch all the likes for a comment


       // return response()->json(['status' =>'success']);
    }
}
