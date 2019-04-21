<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class ApiFormRequest extends FormRequest
{
    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'result' => [
                'errors' => $validator->errors()->toArray()
            ]
        ];

        throw new HttpResponseException(response()->json($response, Response::HTTP_UNSUPPORTED_MEDIA_TYPE));
    }
}
