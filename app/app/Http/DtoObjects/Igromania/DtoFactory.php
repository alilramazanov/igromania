<?php

namespace App\Http\DtoObjects\Igromania;


use App\Http\DtoObjects\MakeDtoStrategyInterface;

class DtoFactory
{
    public static function create(string $type, $request, MakeDtoStrategyInterface $makeDtoStrategy){
        switch ($type){
            case 'filterGameDto': return new FilterGameDto($request, $makeDtoStrategy);
            case 'gameDto': return new GameDto($request, $makeDtoStrategy);

        }
    }

}