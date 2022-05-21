<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCommentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $commentdata;
    public $useremail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($commentdata, $useremail)
    {
        $this->commentdata = $commentdata;
        $this->useremail = $useremail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->markdown('email.new_comment')
        ->from('info@allo.com')
        ->to($this->useremail)
        ->subject('New Comment Added!')
        ->with('commentdata', $this->commentdata);
    }
}
