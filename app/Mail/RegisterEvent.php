<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Guest;
use App\Models\Event;

class RegisterEvent extends Mailable
{
    use Queueable, SerializesModels;

    public $guest;
    public $event;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Guest $guest, Event $event)
    {
        $this->guest = $guest;
        $this->event = $event;
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
