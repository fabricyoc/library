<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroUpdateRequest extends FormRequest
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
            'autor' => 'required|string',
            'titulo' => 'required|string',
            // 'slug' => 'nullable',
            'assunto' => 'required|string',
            'dataAquisicao' => 'required|date',
            'totLivro' => 'required|integer',
            'emprestimo' => 'nullable|integer', // é required na verdade
            'numPropria' => 'nullable',
            'imagem' => 'nullable',
            'genero' => 'nullable',
            'nacionalidade' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
        ];
    }
}
