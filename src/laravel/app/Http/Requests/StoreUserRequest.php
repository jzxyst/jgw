<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

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
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user, 'user_id')
            ],
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'sex_id' => 'numeric|exists:sexes',
            'position_id' => 'numeric|exists:positions',
            'password' => 'required|max:255',
            'unique_id' => 'unique:users|max:255',
        ];
    }
}
