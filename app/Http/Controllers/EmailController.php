<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Email;
use App\Models\Usuarios;
use App\Models\NewsEnviadas;
use App\Jobs\EnviaNews;



class EmailController extends Controller
{

    public function enviarIndex(Request $request)
    {

        $id = request('id');
        $dadosNoticias = Newsletter::where('id', $id)
                        ->where('id_usuario', Auth::user()->id)
                        ->first();

        if ($dadosNoticias){
            return view('Email.inicio', compact('id', 'dadosNoticias'));
        }else{
            return abort(404);
        }
        

    }

   
    public function enviar(Request $request)
    {

         function validaEmail($email) 
         {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
         }

        $id = request('id');

        $dadosNoticias = Newsletter::where('id', $id)
                        ->where('id_usuario', Auth::user()->id)
                        ->first();


        if ($dadosNoticias){

            if(validaEmail(request('email')))  {

                if (!Email::where('email', '=', request('email'))
                          ->where('id_usuario', Auth::user()->id)
                          ->exists()) 
                 {
                    
                    $adicionaEmail = new Email;
                    $adicionaEmail->email = request('email');
                    $adicionaEmail->id_usuario = Auth::user()->id;
                    $adicionaEmail->save();

                 }


                $email = request('email');

                EnviaNews::dispatch($email, $dadosNoticias)->delay(now());

                
                $pegaid = Email::where('email', '=', request('email'))->first();

                $novoEnvio = new NewsEnviadas;
                $novoEnvio->id_email = $pegaid->id;
                $novoEnvio->id_noticia = request('id');
                $novoEnvio->save();

                return request('email');

            }else{

                return "ERRO ". request('email') ; 

            }  
            
        }
    }

    public function MeusEmails()
    {

        $meusEmails = Usuarios::find(Auth::user()->id)->Emails()->paginate(8);
        return view('EmailCrud.meusemails', compact('meusEmails'));


    }

    public function DeletarEmail(Request $request)
    {

        $id = request('id');
        $deletaEmail = Email::where('id', $id)->where('id_usuario', Auth::user()->id)->delete();
 
 
        if ($deletaEmail) {
 
            return redirect()->route('E-mails')->with('sucesso','Email deletado com sucesso!');
 
        } else {
 
            return abort(404);
        }

    }



    public function Recebidos(){


        $id = request('id');
        $dadosNoticias = Newsletter::where('id', $id)->where('id_usuario', Auth::user()->id)->first();
    
    
        if ($dadosNoticias) {

            $recebidos = Newsletter::find(request('id'))
                        ->Noticia()
                        ->orderBy('created_at', 'desc')
                        ->with('EmailRecebido')
                        ->paginate(8);
    
            return view('News.recebeunews', compact('recebidos' , 'dadosNoticias'));
    
        } else {
    
          return abort(404);
        }
       



    }

}
