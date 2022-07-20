<?php

namespace App\Http\Repository\Igromania;

use App\Http\DtoObjects\Igromania\FilterGameDto;
use App\Http\DtoObjects\Igromania\GameDto;
use App\Http\Filter\Igromania\GameQueryFilter;
use App\Http\Services\FileUploadAction;
use App\Models\Game;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GameRepository
{
    /**
     * @var Game $gameModel
     * @var GameQueryFilter $gameQueryFilter
     */
    protected $gameModel;
    protected $gameQueryFilter;

    /**
     * @param  Game  $game
     * @param  GameQueryFilter  $gameQueryFilter
     */
    public function __construct(Game $game, GameQueryFilter $gameQueryFilter)
    {
        $this->gameModel = $game;
        $this->gameQueryFilter = $gameQueryFilter;

    }

    public function getGameById(GameDto $gameDto){
        return $this->gameModel->newQuery()
            ->find($gameDto->getId());
    }

    public function getFilteredListOfGames(FilterGameDto $filterGameDto, $paginate): LengthAwarePaginator
    {
        return $this->gameQueryFilter
            ->apply($filterGameDto)
            ->paginate($paginate);
    }

    public function createGame(GameDto $gameDto){
        $data = $gameDto->toArray();
        $data['slug'] = Str::slug($data['name']);

        if (is_file($gameDto->getPreview())){
            $filePath = FileUploadAction::handle($gameDto->getPreview(),$data['slug']);
            $data['preview'] = $filePath;
        }

        $newGame = $this->gameModel->newQuery()->create($data);

        if (!is_null($gameDto->getGenres())){
            $gameId = $newGame->id;
            foreach ($gameDto->getGenres() as $genreId) {
                $data = [
                    'game_id' => $gameId,
                    'genre_id' => $genreId
                ];
                DB::table('games_genres')->insert($data);
            }
        }

        return $newGame;
    }

    public function updateGame(GameDto $gameDto){
        $gameId = $gameDto->getId();
        $game = $this->gameModel
            ->newQuery()
            ->find($gameId);

        $data = $gameDto->toArray();
        if (!is_null($gameDto->getName())){
            $data['slug'] = Str::slug($gameDto->getName());
        }

        if ($gameDto->getPreview()){
            $filePath = FileUploadAction::handle($gameDto->getPreview(),$data['slug']);
            $data['preview'] = $filePath;

        }
        return $game->update($data);

    }

    public function deleteGame(GameDto $gameDto){
        return $this->gameModel
            ->newQuery()
            ->find($gameDto->getId())
            ->delete();
    }

}