<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaNews extends FormRequest
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
            'titulo'  => 'required|max:20',
            'noticia' => 'required|min:24',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required'  => 'Insira um Título',
            'noticia.required' => 'Insira uma Noticia',
            'titulo.max'  => 'Título muito longo! Insira um título de até 20 caracteres',
            'noticia.min' => 'Insira uma nóticia mais longa!',
        ];
    }
}
