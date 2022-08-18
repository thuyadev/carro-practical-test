<?php

namespace App\Mail;

use App\Models\ContactUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactUser $contactUser)
    {
        $this->contactUser = $contactUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                ->view('emails.contact_user_email');
    }
}
