<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;

trait RequestFailed {
    protected function failedValidation($validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'message' => 'Erro de validação'
        ], 422));
    }
}
