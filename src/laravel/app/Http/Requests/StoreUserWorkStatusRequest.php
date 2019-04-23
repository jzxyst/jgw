<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StoreUserWorkStatusRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'exists:users',
            'work_state_id' => 'required|numeric|exists:work_states',
        ];
    }
}
