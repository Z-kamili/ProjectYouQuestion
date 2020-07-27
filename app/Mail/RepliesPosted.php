<?php

namespace App\Mail;

use App\Reply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RepliesPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $replie; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reply $reply)
    {
        $this->replie = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Reply for Your  Question ";
        return $this->subject($subject)->view('view.name');
    }
}
