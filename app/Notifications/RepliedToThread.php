<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use ReflectionProperty;

class RepliedToThread extends Notification
{
    use Queueable;

//this thread is passed from the comment controller
    public $thread;

    /**
     * Create a new notification instance.
     *
     * @return void
     */


    public function __construct($thread)
    {
        $this->thread = $thread;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //used to return whatever u wnt
        return ['database','broadcast '];
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        dd($notifiable);
        return [
//            'repliedTime'=>Carbon::now()
            'thread' => $this->thread,
            'user' => auth()->user()      //the person thag replied to the thread
        ];
}
    public function toBroadcast($notifiable)
    {

        return new BrodcastMessage([

            'thread' => $this->thread,
            'user' => auth()->user()
        ]);
    }
}
