<?php

namespace App\Mail;

use App\Models\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class EnviaNewsMail extends Mailable
{
    use Queueable, SerializesModels;


    public $noticia;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(Newsletter $noticia)
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
        ->from('remetente@rementente.com')
        ->view('Email.Mail.email')
        ->with([
            'noticia' => $this->noticia,
        ]);
    
    }
}
