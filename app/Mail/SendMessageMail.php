<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class SendMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /* public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'hello every one',
        );
    }
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.invoice-paid',
        );
    } */


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   //we can use (view) instead of (markdown)
        //send-message ths is my view
        return $this->markdown('mails.send-message');
    }
}
