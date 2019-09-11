<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Guest;

class RegisterEvent extends Mailable
{
    use Queueable, SerializesModels;

    public $guest;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Guest $guest, $password)
    {
        $this->guest = $guest;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.register');
    }
}
