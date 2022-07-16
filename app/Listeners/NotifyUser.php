<?php

namespace App\Listeners;

use App\Events\CategoryCreated;
use App\Mail\AdminMail;
use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyUser implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CategoryCreated  $event
     * @return void
     */
    public function handle(CategoryCreated $event)
    {
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new UserMail($event->data));
        }
    }
}
