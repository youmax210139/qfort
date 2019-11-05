<?php

namespace App\Mail;

use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Article;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    public $article;
    public $subscription;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article, Subscription $subscription)
    {
        $this->article = $article;
        $this->subscription = $subscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notification');
    }
}
