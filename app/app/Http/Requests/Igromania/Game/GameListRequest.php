<?php

namespace App\Http\Requests\Igromania\Game;

use App\Http\Requests\ApiRequest;

class GameListRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'genres' => 'nullable|array|',
            'studios' => 'nullable|array|',
            'name' => 'nullable|string|between:1,100'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'genres' => json_decode($this->genres),
            'studios' => json_decode($this->studios)
        ]);
    }
}
