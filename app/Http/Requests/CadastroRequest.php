<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestFailed;

class CadastroRequest extends FormRequest
{
    use RequestFailed;
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
            'email' => ['required'],
            'idade' => ['required'],
            'telefone' => ['required'],
            'nome' => ['required'],
            'sobrenome' => ['required'],
            'endereco' => ['required'],
            'cidade' => ['required'],
            'uf' => ['required'],
            'bairro' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email é requerido',
            'idade.required' => 'Idade é requerida',
            'telefone.required' => 'Telefone é requerido',
            'nome.required' => 'Nome é requerido',
            'sobrenome.required' => 'Sobrenome é requerido',
            'endereco.required' => 'Endereço é requerido',
            'cidade.required' => 'Cidade é requerido',
            'uf.required' => 'Uf é requerido',
            'bairro.required' => 'Bairro é requerido'
        ];
    }
}
