<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            // Removi o min:14 e max:14 do cpf
            'cpf' => 'required|string',
            // Removi o unique de email
            'email' => 'required|string|email',
            // Removi o min:14 e max:14 do telephone
            'telephone' => 'required|string',
            'logradouro' => 'nullable|string',
            'numero' => 'nullable|string|max:6',
            'bairro' => 'nullable|string',
            'referencia' => 'nullable|string',
        ];
    }
}
