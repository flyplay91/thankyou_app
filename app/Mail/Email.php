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
        $without_protocal_url = explode('://', $store_url)[1];
        $without_shopify_url = explode('.myshopify.com', $without_protocal_url)[0];
        $store_title = ucwords(str_replace("-", " ", $without_shopify_url));
        
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