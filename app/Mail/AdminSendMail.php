<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminSendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $phone_number;
    private $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inquirys)
    {
        $this->name  = $inquirys['name'];
        $this->email  = $inquirys['email'];
        $this->phone_number  = $inquirys['phone_number'];
        $this->content = $inquirys['content'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('お客様からのお問い合わせ')
            ->view('inquiry.admin_mail')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'content' => $this->content
        ]);
    }
}
