<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->request = $request;
        $this->subject = 'Thank you for your feedback';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($subject)
                    ->view('emails.contact_confirm');
    }
}
