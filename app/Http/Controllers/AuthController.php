<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;
use App\Http\Requests\ValidarCadastro;

class AuthController extends Controller
{
    
    public function Cadastro(ValidarCadastro $request)
    {

        $novoUsuario = new Usuarios;
        $novoUsuario->apelido = $request->apelido;
        $novoUsuario->email = $request->email;
        $novoUsuario->password = bcrypt($request->senha);
        
        $salvar = $novoUsuario->save();

        if ($salvar){

        return redirect()
        ->Route('Login')
        ->with('sucesso', 'Sucesso! Sua Conta foi criada!');

        }else{

        return redirect()
        ->back()
        ->with('erroInterno', 'Ocorreu um Erro Interno');
            
        }

    }


    public function Login (Request $request)
    {

    if (Auth::attempt([
        'email' => $request->email, 
        'password' => $request->senha], 
        $request->lembrar)) {

     return redirect()
     ->Route('Dashboard');

    } else {

     return redirect()
     ->back()
     ->with('erro', 'E-Mail ou Senha Incorreto(s)');

    }




    }


}
