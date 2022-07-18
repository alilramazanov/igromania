<?php

namespace App\Http\Filter\Igromania;

use App\Http\Filter\QueryFilter;
use App\Models\Game;

class GameQueryFilter extends QueryFilter
{

    public function makeQueryModel(): \Illuminate\Database\Eloquent\Builder
    {
        return Game::query();
    }

    public function name(string $value){
        $this->builder
            ->where('name','ilike',"%{$value}%");
    }

    public function studios($value){
        $this->builder
            ->whereIn('studio_id', $value);
    }

    public function genres($value){
        $columns = [
            'games.id as id',
            'games.name as name',
            'games.description as description',
            'games.preview as preview',
            'studio_id',
            'gg.genre_id as genre_id',
        ];

        $this->builder
            ->select($columns)
            ->leftJoin('games_genres as gg','gg.game_id','=','games.id')
            ->whereIn('genre_id', $value);

    }
}