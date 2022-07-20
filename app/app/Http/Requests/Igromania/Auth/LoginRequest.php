<?php

namespace App\Http\Requests\Igromania\Auth;

use App\Http\Requests\ApiRequest;
use App\Models\User;


/**
 * @OA\Schema (
 *     title="LoginRequest",
 *     description="LoginRequest body data",
 *     type="object",
 *     required={"name"},
 *
 * )
 */
class LoginRequest extends ApiRequest
{


    /**
     * @OA\Property(
     *     title="email",
     *     type="string",
     *     description="email of user",
     *     example="admin@gmail.com"
     * )
     * @var $email string
     */
    protected $email;

    /**
     * @OA\Property(
     *     title="password",
     *     type="string",
     *     description="password of user",
     *     example="admin1"
     * )
     * @var $password string
     */
    protected $password;

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
