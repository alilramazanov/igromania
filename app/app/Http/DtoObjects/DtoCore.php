<?php

namespace App\Http\DtoObjects;

use App\Http\Helpers\DtoHelper;

abstract class DtoCore implements DtoObjectInterface
{
    /**
     * @var MakeDtoStrategyInterface $makeDtoStrategy
     */
    protected $makeDtoStrategy;

    public function __construct($request, MakeDtoStrategyInterface $makeDtoStrategy){
        $this->setMakeDtoStrategy($makeDtoStrategy);
        $this->makeDto($request);

    }

    /**
     * @param  MakeDtoStrategyInterface  $dtoStrategy
     */
    public function setMakeDtoStrategy(MakeDtoStrategyInterface $dtoStrategy){
        $this->makeDtoStrategy = $dtoStrategy;
    }


    /**
     * @return array
     */
    public function toArray(): array {
        return DtoHelper::getArrayOfMethodValues($this, 'get');
    }

    public function makeDto($request){
        $this->makeDtoStrategy->makeDto($request, $this);
    }

//    public function makeDtoFromRequest(FormRequest $request): bool{
//        return DtoHelper::makeDtoObjectFromArray($this, $request->toArray());
//    }

}