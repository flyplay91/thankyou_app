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
        $store_url = $this->data['domain_url'];
        
        if ($store_url == 'https://ocean-bottle-dev.myshopify.com') {
            $store_title = 'Ocean Bottle';
        } else if ($store_url == 'https://freestar-dev.myshopify.com') {
            $store_title = 'Freestar';
        } else if ($store_url = 'https://agood-dev.myshopify.com') {
            $store_title == 'A Good Co';
        } else if ($store_url = 'https://squeeze-skincare.myshopify.com') {
            $store_title == 'Squeeze Skincare';
        }

        $address = "hello@joinohana.io";
        $subject = "From  " . $store_title. ", Here's the Brands We Think You'll Love";
        $name = $store_title . " x Ohana";

        return $this->view('emails.index')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'store' => $this->data['store'], 'domain_url' => $this->data['domain_url'] ]);
    }
}