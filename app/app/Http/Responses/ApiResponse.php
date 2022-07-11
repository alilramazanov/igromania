<?php

namespace App\Http\Responses;

class ApiResponse
{

    /**
     *  code is status http response
     * @method static \Illuminate\Http\Response response($code, $text)
     *
     * code is status http response
     * @param $code
     * @param $text
     * @return \Illuminate\Http\Response|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */

    public static function response($code, $text){
        $data = [
            'code' => $code,
            'text' => $text
        ];

        return response()->make($data);

    }
}