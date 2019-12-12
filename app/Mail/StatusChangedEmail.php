<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusChangedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $statusObject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($statusObject)
    {
        $this->statusObject = $statusObject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.status_changed');
    }
}
