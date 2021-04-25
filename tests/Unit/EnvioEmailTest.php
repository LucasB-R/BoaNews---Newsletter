<?php

namespace Tests\Unit;

use App\Mail\TesteEnvioMail;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

class EnvioEmailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEnvio()
    {
   
        Mail::fake();

        $noticia = new \stdClass();
        $noticia->from = "remetente@email.com";
        $noticia->titulo = "Teste Unit";
        $noticia->noticia = "Teste Unit";
        
        $email = "teste@unit.com";
        
        Mail::to($email)->send(new TesteEnvioMail($noticia));
 
        Mail::assertSent(TesteEnvioMail::class);
 
        Mail::assertSent(TesteEnvioMail::class, function ($mail) {
            $mail->build();
            $this->assertTrue($mail->hasFrom('remetente@email.com'));
            $this->assertTrue($mail->hasTo('teste@unit.com'));
 
            return true;
        });
    }
}
