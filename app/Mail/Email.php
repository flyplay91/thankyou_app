<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {   
        $address = "hello@joinohana.io";
        $subject = "From Form, Here's the Brands We Think You'll Love";
        $name = "Form " . str_replace("https://", " ", $this->data['domain_url']) . " Ohana";

        return $this->view('emails.index')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'store' => $this->data['store'], 'domain_url' => $this->data['domain_url'] ]);
    }
}