<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Story;
use Log;

class StoryPublishedMail extends Mailable implements ShouldQueue
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
        return $this->from('mani00manu@gmail.com')->subject("Story Published, {$this->story->title}")
                 ->view('emails.stories.published')->with([
                     'story' => $this->story
                 ]);
    }
}
