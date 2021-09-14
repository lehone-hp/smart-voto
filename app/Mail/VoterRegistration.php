<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VoterRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $voter;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($voter)
    {
        $this->voter = $voter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.voter_reg');
    }
}
