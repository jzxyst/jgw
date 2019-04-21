<?php

namespace App\Http\Requests;

class StoreUserRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users|max:255',
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'sex_id' => 'numeric|exists:sexes',
            'position_id' => 'numeric|exists:positions',
            'password' => 'required|max:255',
            'unique_id' => 'unique:users|max:255',
        ];
    }
}
