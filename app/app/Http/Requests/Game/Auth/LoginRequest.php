<?php

namespace App\Http\Requests\Game\Auth;

use App\Http\Requests\ApiRequest;
use App\Models\User;

class LoginRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'email' => 'email|required',
            'password' => 'min:6|max:50|string|required'
        ];
    }
}
