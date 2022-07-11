<?php

namespace App\Http\Requests\Game\Auth;


use App\Http\Requests\ApiRequest;
use App\Models\User;

class RegistrationRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required|min:3|max:100',
            'email' => 'email|required|unique:users,email',
            'password' => 'min:6',
            'role_id' => 'integer|min:1|max:2|required'
        ];
    }
}
