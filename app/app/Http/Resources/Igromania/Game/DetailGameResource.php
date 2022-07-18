<?php

namespace App\Http\Resources\Igromania\Game;

use App\Models\Genre;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailGameResource extends JsonResource
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
            'description' => $this->description,
            'preview' => $this->preview,
            'detailPhotos' => $this->detail_photos,
            'videos' => $this->videos,
            'studio' => new GenreResource($this->studio),
            'genres' => GenreResource::collection($this->genres)

        ];
    }
}
