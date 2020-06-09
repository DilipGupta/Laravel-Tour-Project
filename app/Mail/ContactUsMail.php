<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($data,$data1)
    {
        $this->data=$data;
        $this->data1=$data1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject='Thanks for contacting us';
        return $this->attach(public_path('/assets/images/packageImage/thumbnail/').'/'.$this->data1->image,
                 [
                     'as'=>'profile_pic.jpg',
                     'mime'=>'image/jpg'
                 ]
               )
               ->subject($subject)
               ->view('email.contactus')->with('data',$this->data);
    }
}
