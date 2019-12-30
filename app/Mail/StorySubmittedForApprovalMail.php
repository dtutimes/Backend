<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Story;

class StorySubmittedForApprovalMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $story;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Story $story)
    {
        $this->story = $story;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mani00manu@gmail.com')->subject("Story Submitted for Approval, {$this->story->title}")
                 ->view('emails.stories.pending')->with([
                     'story' => $this->story
                 ]);
    }
}
