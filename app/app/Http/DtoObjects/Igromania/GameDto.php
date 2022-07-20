<?php

namespace App\Http\DtoObjects\Igromania;

use App\Http\DtoObjects\DtoCore;

use function PHPUnit\Framework\isJson;


/**
 * @OA\Schema (
 *     title="GameDto",
 *     description="create game, game-dto body data",
 *     type="object",
 *     required={"name"},
 *
 * )
 */
class GameDto extends DtoCore
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
     * @OA\Property(
     *     title="name",
     *     type="string",
     *     description="name of game",
     *     example="Saints Row 4"
     * )
     * @var $name string
     */
    protected $name;
    protected $slug;

    /**
     * @OA\Property(
     *     title="description",
     *     type="string",
     *     description="description of game",
     *     example="The best game in the world"
     * )
     * @var $description string
     */
    protected $description;

    /**
     * @OA\Property(
     *     title="preview",
     *     type="file",
     *     description="preview of game"
     * )
     * @var $description object
     */
    protected $preview;

    /**
     * @OA\Property(
     *     title="studio_id",
     *     type="integer",
     *     description="studio id of game",
     *     example=1
     * )
     * @var $studio_id integer
     */
    protected $studio_id;

    /**
     * @OA\Property(
     *     title="genres",
     *     type="string",
     *     description="genres IDs of game",
     *     example="[1,4]"
     * )
     * @var $genres string
     */
    protected $genres;

    /**
     * @return mixed
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param  mixed  $genres
     * @return GameDto
     */
    public function setGenres($genres)
    {
        $this->genres = $genres;
        return $this;
    }

    /**
     * @param  mixed  $name
     * @return GameDto
     */
    public function setName($name): GameDto
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param  mixed  $slug
     * @return GameDto
     */
    public function setSlug($slug): GameDto
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @param  mixed  $description
     * @return GameDto
     */
    public function setDescription($description): GameDto
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param  mixed  $preview
     * @return GameDto
     */
    public function setPreview($preview): GameDto
    {
        $this->preview = $preview;
        return $this;
    }

    /**
     * @param  mixed  $studioId
     * @return GameDto
     */
    public function setStudio_id($studioId): GameDto
    {
        $this->studio_id = $studioId;
        return $this;
    }

    /**
     * @param  mixed  $id
     * @return GameDto
     */
    public function setId($id): GameDto
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * @return mixed
     */
    public function getStudio_Id()
    {
        return $this->studio_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}