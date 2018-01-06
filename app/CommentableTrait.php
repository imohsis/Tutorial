<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/29/2017
 * Time: 9:50 AM
 */

namespace App;


trait CommentableTrait
{

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function addComment($body){
        $comment = new Comment();
        $comment->body = $body;
        $comment->user_id = auth()->user()->id;

        $this->comments()->save($comment);        // this depends on d model
        return $comment;
    }

}