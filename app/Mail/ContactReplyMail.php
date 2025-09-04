<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $adminReply;
    public string $originalSubject;
    public string $recipientName;

    /**
     * Create a new message instance.
     */
    public function __construct(string $adminReply, string $originalSubject, string $recipientName)
    {
        $this->adminReply = $adminReply;
        $this->originalSubject = $originalSubject;
        $this->recipientName = $recipientName;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = 'Re: ' . $this->originalSubject;

        return $this->subject($subject)
            ->view('emails.contact_reply');
    }
}
