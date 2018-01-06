<?php

namespace App\Policies;

use App\User;
use App\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;
//hence it is easy to assign certain roles to user based on the things that are available

    public function update(User $user, Thread $thread)

    {





        return $thread->user_id == $user->id;

//        if (auth()->user()->id !== $thread->user_id){
//            abort(401,'Unauthorized');
//        }
    }


}
