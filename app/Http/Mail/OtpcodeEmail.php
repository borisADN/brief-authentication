<?php

namespace App\Http\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class OtpcodeEmail extends Mailable
{
    /**
     * Create a new class instance.
     */
    public function __construct(private $name, private $code)
    {
        //
    }
    public function envelope():Envelope
    {
        return new Envelope(
            subject: 'Code de Confirmation',
            from: new Address('accounts@unetah.net', 'no reply ADN'),
        );
    }

    public function content():Content
    {
        return new Content(
            view: 'mails.otpcode',
            with : [
                'name' => $this->name,
                'code' => $this->code,
            ],
        );
    }
}
