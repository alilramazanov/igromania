<?php

namespace App\Http\Controllers\Igromania;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{


    public function list(){
        return 'listed';
    }

    public function detail(){

        return 'detail';
    }

    public function create(){
        return 'created';
    }

    public function update(){
        return 'updated';

    }

    public function delete(){
        return 'deleted';
    }

}
