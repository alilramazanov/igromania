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


/**
 *
 * @OA\Get(
 *     path="/games/list",
 *     tags={"Games"},
 *     summary="Get filtered list of games",
 *     description="return list of games",
 *
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *     ),
 *     @OA\Parameter (
 *          name="name",
 *          description="name of game. Сase insensitive",
 *          in="query",
 *          @OA\Schema (
 *              type="string",
 *              example="T"
 *          )
 *     ),
 *    @OA\Parameter (
 *          name="genres",
 *          description="array of genre IDs",
 *          in="query",
 *          @OA\Schema (
 *              type="json",
 *              example="[1,2]"
 *          )
 *
 *     ),
 *    @OA\Parameter (
 *          name="studios",
 *          description="array of studios IDs",
 *          in="query",
 *          @OA\Schema (
 *              type="json",
 *              example="[1,2]"
 *          )
 *
 *     ),
 *
 * )
 *
 *
 *  @OA\Get(
 *     path="/games/detail",
 *     tags={"Games"},
 *     summary="Get detail info of game",
 *     description="return detail info game",
 *
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *     ),
 *     @OA\Parameter (
 *          name="id",
 *          description="id of game",
 *          required=true,
 *          in="query",
 *          @OA\Schema (
 *              type="integer",
 *              example="2"
 *          )
 *     ),
 *)
 *
 * @OA\Post(
 *     path="/games/create",
 *     tags={"Games"},
 *     summary="create new game",
 *     @OA\Response (
 *          response=201,
 *          description="Created",
 *     ),
 *
 *     @OA\RequestBody (
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/GameDto")
 *      )
 * ),
 *
 *
 * @OA\Post(
 *     path="/games/update",
 *     tags={"Games"},
 *     summary="update game",
 *     @OA\Response (
 *          response=200,
 *          description="Updated",
 *     ),
 *     @OA\RequestBody (
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/GameDto")
 *      )
 * ),
 *
 * @OA\Post(
 *     path="/games/delete",
 *     tags={"Games"},
 *     summary="delete game",
 *     @OA\Response (
 *          response=200,
 *          description="Deleted",
 *     ),
 *     @OA\RequestBody (
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/DetailGameRequest")
 *      )
 * )
 *
 *
 *
 *
 */

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
            return response('Created',201);
        }
    }

    public function update(UpdateGameRequest $request){
        $gameDto = $this->dtoFactory::create('gameDto', $request, $this->makeDto);
        $isUpdateGame = $this->gameRepository->updateGame($gameDto);
        if ($isUpdateGame){
            return response('Updated', 200);
        }

    }

    public function delete(DetailGameRequest $request){
        $gameDto = $this->dtoFactory::create('gameDto', $request, $this->makeDto);
        $isDeleteGame = $this->gameRepository->deleteGame($gameDto);
        if ($isDeleteGame){
            return response('Deleted', 200);
        }
    }
}
