<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Portfolio Contact: '.$this->mailData['subject'],
            replyTo: [
                $this->mailData['email']
            ]
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.contact-mail'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}