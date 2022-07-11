<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});


Route::group(
    ['prefix' => 'igromania'],
    function () {
        Route::group(
            ['prefix' => 'v1'],
            function () {
                Route::group(
                    ['prefix' => 'auth'],
                    function () {
                        Route::post('login', 'Igromania\AuthController@login');
                        Route::post('registration', 'Igromania\AuthController@registration');
                        Route::post('logout', 'Igromania\AuthController@logout');
                        Route::post('refresh', 'Igromania\AuthController@refresh');
                        Route::post('me', 'Igromania\AuthController@me');
                    }
                );


                Route::group(['prefix' => 'games', 'middleware' => 'auth'],
                    function () {
                        Route::get('list', 'Igromania\GameController@list');
                        Route::get('detail','Igromania\GameController@detail');
                        Route::group(['middleware'=>'role.admin'],
                            function (){
                            Route::post('create', 'Igromania\GameController@create');
                            Route::put('update','Igromania\GameController@update' );
                            Route::delete('delete', 'Igromania\GameController@delete');

                            }
                        );
                    }
                );
            }
        );
    }
);
