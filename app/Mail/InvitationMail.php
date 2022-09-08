<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $route;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->route = auth('customer')->user()->getReferralLink();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this
            ->markdown('mail.invitation-mail');
    }
}
