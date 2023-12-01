<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ApiUsersRequest extends FormRequest
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
            //

            'name'=> ['required','min:3','max:50'],
            'email'=> ['required','email:rfc,dns'],
            'password'=> ['required','min:6','max:20']
            
        ];
    }

    public function failedValidation(Validator $validator)
    {
    throw new HttpResponseException(response()->json([
        'success'   => false,
        'message'   => 'Validation errors',
        'data'      => $validator->errors()
    ]));
    }

    public function messages()  #pernalizar suas mensagens
    {
        return
        [
            'name.required' =>  "O campo name é obrigatório",
            'email.required' =>  "O campo email é obrigatório",
            'password.required' =>  "O campo password é obrigatório",              
            'name.min'     => 'o campo nome precisa de pelo menos 6 carateres e maximo 50',
            'password.min'  => "A senha deve conter no mínimo seis dígitos"
        ];
    }
}
