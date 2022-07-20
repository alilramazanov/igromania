<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 *   @OA\Info(
 *     version="1.0.0",
 *     title="Igromania",
 *     description="igromania documentation")
 *
 *   @OA\Server (
 *     url="http://localhost:8081/api/igromania/v1/",
 *     description="test",
 *     )
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
