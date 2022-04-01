<?php

namespace App\Listeners;

use App\Events\StorySubmittedForApproval;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\StorySubmittedForApprovalMail;
use App\Models\{Story};
use App\Role;


class StorySubmittedForApprovalListener implements ShouldQueue
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
     * @param  StorySubmittedForApproval  $event
     * @return void
     */
    public function handle(StorySubmittedForApproval $event)
    {
        $story = Story::whereUuid($event->uuid)->firstOrFail();
        // $council = Role::where('name', 'council')->with('users')->first();
        // $users = $council->users;
        $users = User::where('position', 'council')->where('show', true)->get();
        foreach ($users as $user) {
            \Mail::to($user->email)->send(new StorySubmittedForApprovalMail($story));
        }
    }
}
