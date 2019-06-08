<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var string $token */
    public $token;

    /** @var string $userName */
    public $nickName;

    /**
     * Create a new message instance.
     *
     * @param string $token
     * @param string $nickName
     */
    public function __construct(string $token, string $nickName)
    {
        $this->token    = $token;
        $this->nickName = $nickName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
                    ->view('auth.passwords.reset_email')
                    ->text('auth.passwords.reset_email_plain');
    }
}
