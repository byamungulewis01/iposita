<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data,$subject)
    {
        //
        $this->data=$data;
        info($subject);
        $this->subject($subject,);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        info($this->data);
        return $this->markdown('emails.custom_email')
            ->with(['data', $this->data]);
    }
}
