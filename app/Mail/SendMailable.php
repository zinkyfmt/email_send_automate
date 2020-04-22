<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'admin@pegasolution.com';
        $ownName = 'Luca';
        $subject = 'Automate Sending Email Demo';

        return $this->view('email.name')
                    ->from($address, $ownName)
                    // ->cc($address, $name)
                    // ->bcc($address, $name)
                    // ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'name' => $this->data['name'], 'ownName' => $ownName]);
    }
}