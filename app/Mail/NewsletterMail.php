<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $newsletterObject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newsletterObject)
    {
        $this->newsletterObject = $newsletterObject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.newsletter')->subject('UKF Mobility - Nezmeškajte príležitosť na vycestovanie')->from('no_reply@ukf.sk');
    }
}
