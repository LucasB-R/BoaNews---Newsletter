<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TesteEnvioMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($noticia)
    {
       $this->noticia = $noticia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject($this->noticia->titulo);

        return 
        $this
        ->from($this->noticia->from)
        ->view('Email.Mail.email')
        ->with([
            'noticia' => $this->noticia,
        ]);
    }
}
