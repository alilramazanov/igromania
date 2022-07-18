<?php

namespace App\Http\DtoObjects\Igromania;

use App\Http\DtoObjects\DtoCore;


class GameDto extends DtoCore
{

    protected $id;
    protected $name;
    protected $slug;
    protected $description;
    protected $preview;
    protected $studioId;

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
        $this->studioId = $studioId;
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
        return $this->studioId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}