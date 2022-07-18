<?php

namespace App\Http\Requests\Igromania\Game;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateGameRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|min:3|required',
            'studio_id' => 'exists:studios,id',
            'image|nullable|max:1999'
        ];
    }
}
