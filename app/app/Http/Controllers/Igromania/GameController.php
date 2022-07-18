<?php

namespace App\Http\Controllers\Igromania;

use App\Http\Controllers\Controller;
use App\Http\DtoObjects\Igromania\DtoFactory;
use App\Http\DtoObjects\MakeDtoStrategies\MakeDtoFromRequest;
use App\Http\Repository\Igromania\GameRepository;
use App\Http\Requests\Igromania\Game\CreateGameRequest;
use App\Http\Requests\Igromania\Game\DetailGameRequest;
use App\Http\Requests\Igromania\Game\GameListRequest;
use App\Http\Requests\Igromania\Game\UpdateGameRequest;
use App\Http\Resources\Igromania\Game\DetailGameResource;
use App\Http\Resources\Igromania\Game\ListGameResource;
use App\Http\Responses\ApiResponse;

class GameController extends Controller
{
    protected $gameRepository;
    protected $dtoFactory;
    protected $makeDto;

    public function __construct(GameRepository $repository, DtoFactory $dtoFactory, MakeDtoFromRequest $makeDtoFromRequest){
        $this->gameRepository = $repository;
        $this->dtoFactory = $dtoFactory;
        $this->makeDto = $makeDtoFromRequest;
    }

    public function list(GameListRequest $request){
//         Обращаюсь к фабрике dto и указываю какую мне dto вернуть, а так же передаю в фабрику
//         параметры для конструктора dto. $request, и алгоритм, который будет использоваться для
//         заполнения полей dto модели
        $filterGameDto = $this->dtoFactory::create('filterGameDto', $request, $this->makeDto);

//        Получаю игры из репозитория, в который передаю объект dto и пагинацию
        $games = $this->gameRepository->getFilteredListOfGames($filterGameDto, 10);
        return ListGameResource::collection($games);
    }

    public function detail(DetailGameRequest $request){
        $filterGameDto = $this->dtoFactory::create('gameDto', $request, $this->makeDto);
        $game = $this->gameRepository->getGameById($filterGameDto);
        return new DetailGameResource($game);
    }

    public function create(CreateGameRequest $request){
        $gameDto = $this->dtoFactory::create('gameDto', $request, $this->makeDto);
        $game = $this->gameRepository->createGame($gameDto);
        if ($game){
            return ApiResponse::response(201, 'Сreated');
        }
    }

    public function update(UpdateGameRequest $request){
        $gameDto = $this->dtoFactory::create('gameDto', $request, $this->makeDto);
        $isUpdateGame = $this->gameRepository->updateGame($gameDto);
        if ($isUpdateGame){
            return ApiResponse::response(200,'Updated');
        }

    }

    public function delete(DetailGameRequest $request){
        $gameDto = $this->dtoFactory::create('gameDto', $request, $this->makeDto);
        $isDeleteGame = $this->gameRepository->deleteGame($gameDto);
        if ($isDeleteGame){
            return ApiResponse::response(200,'Deleted');
        }
    }
}
