<?php

namespace App\Http\DtoObjects\Igromania;

use App\Http\DtoObjects\DtoCore;

use function PHPUnit\Framework\isJson;

class FilterGameDto extends DtoCore
{
    protected $name;
    protected $studios;
    protected $genres;

    public function getName(){
        return $this->name;
    }
    public function getStudios(){
        return $this->studios;
    }
    public function getGenres(){
        return $this->genres;
    }

    public function setName($value){
        $this->name = $value;
    }
    public function setStudios($value){
        $this->studios = $value;
    }
    public function setGenres( $value){
        $this->genres =  $value;
    }

}