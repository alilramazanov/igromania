<?php

namespace App\Http\Requests\Igromania\Game;

use App\Http\Requests\ApiRequest;

/**
 * @OA\Schema (
 *     title="DetailGameRequest",
 *     description="detail game request body data",
 *     type="object",
 *     required={"id"},
 * )
 */

class DetailGameRequest extends ApiRequest
{

    /**
     * @OA\Property(
     *     title="id",
     *     type="integer",
     *     description="id of game",
     *     example=1
     * )
     * @var $id integer
     */

    protected $id;

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
