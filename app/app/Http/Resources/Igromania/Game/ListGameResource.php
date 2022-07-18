<?php

namespace App\Http\Resources\Igromania\Game;

use Illuminate\Http\Resources\Json\JsonResource;

class ListGameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'preview' => $this->preview,
            'studioName' => $this->studio->name

        ];
    }
}
