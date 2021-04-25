<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarCadastro extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'apelido'  => 'required|min:5|regex:/(^([a-zA-z]+)(\d+)?$)/u|unique:usuarios,apelido' ,
         'email' => 'required|email|unique:usuarios,email',
         'senha' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [ 
        'apelido.required' => 'Insira seu apelido',
        'email.required' => 'Insira algum E-Mail',
        'senha.required' => 'Insira alguma Senha',
        'apelido.min' => 'Apelido Inválido',
        'senha.min' => 'Insira uma Senha com pelo menos 6 carácteres',
        'apelido.regex' => 'Apelido Inválido ele não pode começar com um número nem conter espaços',
        'email.email' => 'Insira um E-Mail válido',
        'email.unique' => 'E-Mail Cadastrado anteriormente',
        'apelido.unique' => 'Apelido já foi Cadastrado anteriormente'
        ];
    }

}
