<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestFailed;

class StoreUserRequest extends FormRequest
{
    use RequestFailed;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required|max:255'],
            'usuario' => ['required'],
            'password' => ['required']

        ];
    }

    public function message()
    {

        return [
            'usuario.required' => 'Campo usuário é requerido',
            'password.required' => 'Campo senha é requerido'
        ];
    }
}
