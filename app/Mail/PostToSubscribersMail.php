<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostToSubscribersMail extends Mailable
{
    use Queueable, SerializesModels;
    public $post;
    public $website;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post,$website)
    {
        $this->post = $post;
        $this->website = $website;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.email_subscribers')->subject($this->website->name . '-' . $this->post->title);
    }
}
