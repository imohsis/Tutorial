<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/29/2017
 * Time: 9:50 AM
 */

namespace App;


trait LikableTrait
{

    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }

    public function likeIt(){
        $like = new Like();

        $like->user_id = auth()->user()->id;

        $this->likes()->save($like);        // this depends on d model
        return $like;
    }

    public function unlikeIt(){


        $this->likes()->where('user_id', auth()->id())->delete();
        //this is the first method that was used in d tutorial
        // $like = Like::find($id);
      //  $like->user_id = auth()->user()->id;
//
//        $like->delete();
//        return true;
    }

    public function isLiked()
    {
        return !!$this->likes()->where('user_id', auth()->id())->count(); //  !! or (bool) is used to cast function to boolean
    }
}