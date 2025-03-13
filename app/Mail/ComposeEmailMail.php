<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComposeEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    public $save;

    /**
     * Create a new message instance.
     */
    public function __construct($save)
    {
        $this->save = $save;
    }

    /**
     * Build the message.
     */
    public function build()
{
    return $this->markdown('emails.compose_email_mail')
                ->subject(config('app.name') . ' ,New Email Sent');
}

}
