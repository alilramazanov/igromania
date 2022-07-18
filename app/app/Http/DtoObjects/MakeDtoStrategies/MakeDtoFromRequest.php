<?php

namespace App\Http\DtoObjects\MakeDtoStrategies;

use App\Http\DtoObjects\MakeDtoStrategyInterface;
use Illuminate\Foundation\Http\FormRequest;

class MakeDtoFromRequest implements MakeDtoStrategyInterface
{

    /**
     * @param FormRequest $request
     * @return bool
     */
    public function makeDto($request, object $object)
    {
        $fields = $request->toArray();
        foreach($fields as $key => $value){
            $method = "set" . str_replace($key[0], strtoupper($key[0]),$key);
            $object->$method($value);

        }
        return true;
    }
}