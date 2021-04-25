<?php

namespace App\Jobs;

use App\Mail\EnviaNewsMail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class EnviaNews implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;
    private $email;
    private $noticia;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $noticia)
    {
        $this->email = $email;
        $this->noticia = $noticia;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new EnviaNewsMail($this->noticia));
    }
}
