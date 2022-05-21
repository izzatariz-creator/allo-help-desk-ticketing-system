<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ticketupdate;
    public $sendtoemail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticketupdate, $sendtoemail)
    {
        $this->ticketupdate = $ticketupdate;
        $this->sendtoemail = $sendtoemail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('info@allo.com')
        ->to($this->sendtoemail)
        ->subject('New Ticket Update!')
        ->markdown('email.ticket_update')
        ->with('ticketupdate', $this->ticketupdate);
    }
}
