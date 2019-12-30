<?php

namespace App\Listeners;

use App\Events\StoryPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\StoryPublishedMail;
use Illuminate\Support\Facades\Mail;

class StoryPublishedListener
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
     * @param  StoryPublished  $event
     * @return void
     */
    public function handle(StoryPublished $event)
    {
        $story = $event->story;

        Mail::to($story->user->email)->send(new StoryPublishedMail($story));
    }
}
