<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'name' => 'required|string',
            'cpf' => 'required|string|min:14|max:14',
            'email' => 'required|email|unique',
            'telephone' => 'required|string|min:14|max:14',
            'logradouro' => 'nullable|string',
            'numero' => 'nullable|string|max:6',
            'bairro' => 'nullable|string',
            'referencia' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo NOME é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'email.required' => 'O campo E-MAIL é obrigatório.',
            'telephone.required' => 'O campo TELEFONE é obrigatório.',
        ];
    }
}
