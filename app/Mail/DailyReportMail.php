<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\ReportService;

class DailyReportMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $stats;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($stats)
    {
        $this->stats = $stats;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mani00manu@gmail.com')->subject("Daily Stats")
                 ->view('emails.reports.daily')->with([
                     'stats' => $this->stats
                 ]);
    }
}
