<?php

namespace App\Http\Requests\Igromania\Game;

use App\Http\Requests\ApiRequest;

class DetailGameRequest extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'integer|required|exists:games,id'
        ];
    }
}
