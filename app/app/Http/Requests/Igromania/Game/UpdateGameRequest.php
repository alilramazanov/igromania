<?php

namespace App\Http\Requests\Igromania\Game;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:games,id|integer',
            'name' => 'string|min:3|required',
            'studio_id' => 'exists:studios,id',
            'genres' => 'nullable|array',
            'preview' => 'image|nullable|max:1999'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'genres' => json_decode($this->genres),
        ]);
    }
}
