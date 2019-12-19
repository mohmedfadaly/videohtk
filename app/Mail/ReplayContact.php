<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayContact extends Mailable
{
    use Queueable, SerializesModels;
    protected $message;
    protected $replay;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message , $replay)
    {
        $this->message = $message;
        $this->replay = $replay;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactMessage = $this->message;
        $replay         = $this->replay;
        return $this->to($contactMessage->email)
            ->view('back_end.mails.replay-message' , compact('contactMessage' , 'replay'));
    }
}
