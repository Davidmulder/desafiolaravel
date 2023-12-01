<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // validação de formulario

            /*• Nome (obrigatório, mínimo de 3 caracteres, máximo de 50 caracteres).
        • E-mail (obrigatório, deve ser um e-mail válido).
        • Senha (obrigatória, mínimo de 6 caracteres, máximo de 20 caracteres).
        • Confirmação de Senha (obrigatória e deve coincidir com a senha). senha2*/

            'name'=> ['required','min:3','max:50'],
            'email'=> ['required','email:rfc,dns'],
            'password'=> ['required','min:6','max:20'],
            'senha2'=> ['required','same:password']
        ];
    }

    public function messages()  #pernalizar suas mensagens
    {
        return
        [
            'required' =>  "O campo :attribute é obrigatório",
            'email.required'=> 'Campo nome é obrigatorio e email valido',
            'nome.min'     => 'o campo nome precisa de pelo menos 6 carateres e maximo 50',
            'password.min'  => "A senha deve conter no mínimo seis dígitos"
        ];
    }
}
